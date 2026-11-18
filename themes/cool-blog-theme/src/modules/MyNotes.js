import axios from 'axios';

class MyNotes {
	constructor() {
		if (document.querySelector('#my-notes')) {
			axios.defaults.headers.common['X-WP-Nonce'] = ourData.nonce;
			this.myNotes = document.querySelector('#my-notes');
			this.events();
		}
	}

	events() {
		this.myNotes.addEventListener('click', e => {
			this.clickHandler(e);
		});
		document.querySelector('.submit-note').addEventListener('click', () => {
			this.createNote();
		});
	}

	clickHandler(e) {
		if (e.target.classList.contains('delete-note') || e.target.classList.contains('ti ti-trash')) this.deleteNote(e);
		if (
			e.target.classList.contains('edit-note') ||
			e.target.classList.contains('ti ti-edit') ||
			e.target.classList.contains('ti ti-clock')
		)
			this.editNote(e);
		if (e.target.classList.contains('update-note') || e.target.classList.contains('fa-arrow-right')) this.updateNote(e);
	}

	findNearestParentLi(el) {
		let thisNote = el;
		while (thisNote.tagName !== 'LI') {
			thisNote = thisNote.parentElement;
		}
		return thisNote;
	}

	//Methods will go here
	editNote(e) {
		const thisNote = this.findNearestParentLi(e.target);

		if (thisNote.getAttribute('data-state') === 'editable') {
			this.makeNoteReadOnly(thisNote);
		} else {
			this.makeNoteEditable(thisNote);
		}
	}

	makeNoteEditable(thisNote) {
		thisNote.querySelector('.edit-note').innerHTML = '<i class="ti ti-square-x" aria-hidden="true"></i> Anuluj';
		thisNote.querySelector('.note-title-field').removeAttribute('readonly');
		thisNote.querySelector('.note-body-field').removeAttribute('readonly');
		thisNote.querySelector('.note-title-field').classList.add('note-active-field');
		thisNote.querySelector('.note-body-field').classList.add('note-active-field');
		thisNote.querySelector('.update-note').classList.add('update-note--visible');
		thisNote.setAttribute('data-state', 'editable');
	}

	makeNoteReadOnly(thisNote) {
		thisNote.querySelector('.edit-note').innerHTML = '<i class="ti ti-edit" aria-hidden="true"></i> Edytuj';
		thisNote.querySelector('.note-title-field').setAttribute('readonly', 'true');
		thisNote.querySelector('.note-body-field').setAttribute('readonly', 'true');
		thisNote.querySelector('.note-title-field').classList.remove('note-active-field');
		thisNote.querySelector('.note-body-field').classList.remove('note-active-field');
		thisNote.querySelector('.update-note').classList.remove('update-note--visible');
		thisNote.setAttribute('data-state', 'cancel');
	}

	async deleteNote(e) {
		const thisNote = this.findNearestParentLi(e.target);

		try {
			const response = await axios.delete(ourData.root_url + '/wp-json/wp/v2/note/' + thisNote.getAttribute('data-id'));

			thisNote.style.height = `${thisNote.offsetHeight}px`;
			setTimeout(function () {
				thisNote.classList.add('fade-out');
			}, 20);
			setTimeout(function () {
				thisNote.remove();
			}, 401);
			if (response.data.userNoteCount < 5) {
				document.querySelector('.note-limit-message').classList.remove('active');
			}
		} catch (e) {
			console.log('Sorry');
		}
	}

	async updateNote(e) {
		const thisNote = this.findNearestParentLi(e.target);

		const ourUpdatedPost = {
			title: thisNote.querySelector('.note-title-field').value,
			content: thisNote.querySelector('.note-body-field').value,
		};

		try {
			const response = await axios.post(
				ourData.root_url + '/wp-json/wp/v2/note/' + thisNote.getAttribute('data-id'),
				ourUpdatedPost,
			);

			this.makeNoteReadOnly(thisNote);
		} catch (e) {
			console.log('Sorry');
		}
	}

	async createNote() {
		const titleField = document.querySelector('.new-note-title');
		const bodyField = document.querySelector('.new-note-body');
		const message = document.querySelector('.note-limit-message');

		[titleField, bodyField].forEach(field => {
			field.addEventListener('input', () => {
				message.classList.remove('active');
			});
		});

		const title = titleField.value.trim();
		const content = bodyField.value.trim();

		// Check if both fields are filled in.
		if (title === '' || content === '') {
			message.textContent = 'Please enter a title and note content.';
			message.classList.add('active');
			return;
		}

		const ourNewPost = {
			title: title,
			content: content,
			status: 'publish',
		};

		try {
			const response = await axios.post(ourData.root_url + '/wp-json/wp/v2/note/', ourNewPost);

			if (response.data != 'You have reached your note limit.') {
				message.textContent = '';
				message.classList.remove('active');

				titleField.value = '';
				bodyField.value = '';

				document.querySelector('#my-notes').insertAdjacentHTML(
					'afterbegin',

					`<li class="flex flex-col note fade-in-calc" data-id="${response.data.id}">

						<span class="note-date text-sm pb-2">
							<i class="ti ti-calendar" aria-hidden="true"></i>
							<span class="pr-4">
								${new Date(response.data.date).toLocaleDateString('pl-PL')}
							</span>

							<i class="ti ti-clock" aria-hidden="true"></i>
							${new Date(response.data.date).toLocaleTimeString('pl-PL', {
								hour: '2-digit',
								minute: '2-digit',
							})}
						</span>

						<div class="note-title-box font-bold flex flex-col sm:flex-row sm:justify-between items-start gap-4">

							<textarea
								readonly
								class="note-title-field h-12 text-xl w-full sm:flex-1 min-w-0 resize-none"
							>${response.data.title.raw}</textarea>

							<div class="note-btn-box flex w-fit gap-6 shrink-0">
								<span class="edit-note cursor-pointer">
									<i class="ti ti-edit" aria-hidden="true"></i>
									Edytuj
								</span>

								<span class="delete-note cursor-pointer">
									<i class="ti ti-trash" aria-hidden="true"></i>
									Usuń
								</span>
							</div>

						</div>

						<textarea
							readonly
							class="note-body-field h-[20vh] italic"
						>${response.data.content.raw}</textarea>

						<span class="update-note btn btn--blue btn--small">
							<i class="fa fa-arrow-right" aria-hidden="true"></i>
							Zapisz
						</span>

					</li>`,
				);

				// notice in the above HTML for the new <li> I gave it a class of fade-in-calc which will make it invisible temporarily so we can count its natural height

				let finalHeight; // browser needs a specific height to transition to, you can't transition to 'auto' height
				let newlyCreated = document.querySelector('#my-notes li');

				// give the browser 30 milliseconds to have the invisible element added to the DOM before moving on
				setTimeout(function () {
					finalHeight = `${newlyCreated.offsetHeight}px`;
					newlyCreated.style.height = '0px';
				}, 30);

				// give the browser another 20 milliseconds to count the height of the invisible element before moving on
				setTimeout(function () {
					newlyCreated.classList.remove('fade-in-calc');
					newlyCreated.style.height = finalHeight;
				}, 50);

				// wait the duration of the CSS transition before removing the hardcoded calculated height from the element so that our design is responsive once again
				setTimeout(function () {
					newlyCreated.style.removeProperty('height');
				}, 450);
			} else {
				message.textContent = 'Note limit reached: delete an existing note to make room for a new one.';
				message.classList.add('active');
			}
		} catch (e) {
			console.error(e);
			console.log('ERROR RESPONSE:', e.response);
			console.log('ERROR DATA:', e.response?.data);
		}
	}
}

export default MyNotes;
