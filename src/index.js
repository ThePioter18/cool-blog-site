const cloneableContent = document.querySelector('#li-template').content;
let ourTimer = null;
let previousSearchValue = '';
const searchField = document.querySelector('#search-field');
const searchOverlay = document.querySelector('#search-overlay');

document.querySelector('#search-icon').addEventListener('click', openSearch);
document.querySelector('#find-articles-text').addEventListener('click', openSearch);

function openSearch() {
	searchOverlay.classList.remove('invisible', 'opacity-0', 'scale-125');
	searchOverlay.classList.add('scale-100', 'opacity-100');

	setTimeout(() => {
		searchField.focus();
	}, 50);
}

document.querySelector('#close-overlay-icon').addEventListener('click', closeSearch);

function closeSearch() {
	searchOverlay.classList.add('scale-125', 'opacity-0');
	searchOverlay.classList.remove('scale-100', 'opacity-100');
	searchField.blur();

	setTimeout(() => {
		searchOverlay.classList.add('invisible');
	}, 301);
}
document.addEventListener('DOMContentLoaded', function () {
	const button = document.getElementById('mobile-menu-button');
	const closeButton = document.getElementById('close-mobile-menu');
	const mobileMenu = document.getElementById('mobile-menu');
	const overlay = document.getElementById('mobile-overlay');
	const searchIcon = document.getElementById('search-icon');
	const closeOverlayIcon = document.getElementById('close-overlay-icon');

	searchIcon.addEventListener('click', function () {
		button.classList.add('hidden');
	});

	closeOverlayIcon.addEventListener('click', function () {
		button.classList.remove('hidden');
	});

	function openMenu() {
		mobileMenu.classList.remove('hidden');

		requestAnimationFrame(() => {
			mobileMenu.classList.remove('-translate-y-full');
		});

		overlay.classList.remove('hidden');
		overlay.style.opacity = '1';

		button.textContent = '✕';
		document.body.style.overflow = 'hidden';
	}

	function closeMenu() {
		mobileMenu.classList.add('-translate-y-full');
		overlay.style.opacity = '0';

		setTimeout(() => {
			mobileMenu.classList.add('hidden');
			overlay.classList.add('hidden');
		}, 300);

		button.textContent = '☰';
		document.body.style.overflow = '';
	}

	button.addEventListener('click', function () {
		if (mobileMenu.classList.contains('hidden')) {
			openMenu();
		} else {
			closeMenu();
		}
	});

	closeButton.addEventListener('click', closeMenu);
	overlay.addEventListener('click', closeMenu);
});

searchField.addEventListener('keyup', handleInputChange);

function handleInputChange(e) {
	//when to show spinner loader and hide default message
	if (e.target.value.trim() != previousSearchValue) {
		if (e.target.value.trim() != '') {
			document.querySelector('#loading-icon').classList.remove('hidden');
			document.querySelector('#default-message').classList.add('hidden');
			document.querySelector('#no-results-message').classList.add('hidden');
			document.querySelector('#results-area').classList.add('hidden');
		}

		if (e.target.value.trim() == '') {
			document.querySelector('#loading-icon').classList.add('hidden');
			document.querySelector('#default-message').classList.remove('hidden');
			document.querySelector('#no-results-message').classList.add('hidden');
			document.querySelector('#results-area').classList.add('hidden');

			clearTimeout(ourTimer);
			return;
		}

		clearTimeout(ourTimer);

		ourTimer = setTimeout(() => {
			actuallyFetchData(e.target.value);
		}, 750);
	}

	previousSearchValue = e.target.value.trim();

	//when to hide spinner and show default message again

	//wait a bit of time and then actually trigger the real search event
}

async function actuallyFetchData(searchTerm) {
	// 1 actually fetch data
	const results = await getResultsData(searchTerm);

	if (results.length === 0) {
		document.querySelector('#no-results-message').classList.remove('hidden');
		document.querySelector('#loading-icon').classList.add('hidden');
		return;
	}

	const wrapper = document.createDocumentFragment();
	results.forEach(item => {
		const clone = cloneableContent.cloneNode(true);
		clone.querySelector('a').href = item.url;
		clone.querySelector('.title-text').textContent = item.title;
		wrapper.appendChild(clone);
	});

	document.querySelector('#results-area').innerHTML = '';
	document.querySelector('#results-area').appendChild(wrapper);

	document.querySelector('#results-area').classList.remove('hidden');
	document.querySelector('#loading-icon').classList.add('hidden');

	// 2 update the ui on screen
}

async function getResultsData(term) {
	const resultsPromise = await fetch(ourData.root_url + `/wp-json/wp/v2/search?search=${term}`);
	const results = await resultsPromise.json();
	return results;
}
