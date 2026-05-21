<?php get_header(); ?>

<main class="max-w-6xl mx-auto px-4 space-y-24 py-2">

    <!-- SECTION 1: HERO (Main heading) -->
    <section class="flex flex-col items-center text-center space-y-6 pt-12">
        <h1 class="text-4xl md:text-5xl font-extrabold tracking-tight text-white max-w-3xl leading-snug">Koduję nowoczesne strony i motywy WordPress dopasowane do Twojego <span class="text-sky-400">Biznesu</span></h1>

        <p class="text-lg text-slate-300 max-w-2xl">
            Łączę znajomość HTML, CSS i JavaScript z programistycznym podejściem do systemu WordPress. Przekształcam unikalne projekty graficzne w szybkie, responsywne i bezpieczne strony internetowe.
        </p>
        <div class="flex gap-4">
            <a id="projects-btn" href="#projects" class="px-6 py-3 bg-sky-500 hover:bg-sky-400 text-slate-950 font-semibold rounded-lg shadow-lg shadow-sky-500/20 transition duration-300">
                Zobacz projekty
            </a>

            <a href="<?php echo esc_url(get_permalink(get_page_by_path('contact'))); ?>" id="contact-btn" href="#contact" class="px-6 py-3 bg-slate-800 hover:bg-slate-700 text-slate-200 font-semibold rounded-lg border border-slate-700 transition duration-300">
                Kontakt
            </a>
        </div>
    </section>

    <!-- SECTION 2: GRID WITH SERVICES (3 columns) -->
    <section class="space-y-8">
        <div class="text-center space-y-2">
            <h2 class="text-3xl font-bold text-white">Zakres Specjalizacji</h2>
            <p class="text-slate-300">Szybkie, responsywne i bezpieczne witryny dopasowane do wymagań współczesnego internetu.</p>
        </div>
        
        <div class="grid grid-cols-1 md:grid-cols-3 gap-6">
            <!-- Card 1 -->
            <div class="p-6 bg-slate-800/50 rounded-xl border border-slate-800 hover:border-sky-500/50 transition group">
                <div class="w-10 h-10 bg-sky-500/10 text-sky-400 rounded-lg flex items-center justify-center font-bold mb-4 group-hover:bg-sky-500 group-hover:text-slate-950 transition">01</div>
                <h3 class="text-xl font-bold text-white mb-2">Web Development</h3>
                <p class="text-sm text-slate-300">Tworzenie dedykowanych motywów WordPress, wdrażanie pól niestandardowych (ACF), integracja z WP REST API oraz tworzenie aplikacji wspierających biznes.</p>

            </div>
            <!-- Card 2 -->
            <div class="p-6 bg-slate-800/50 rounded-xl border border-slate-800 hover:border-sky-500/50 transition group">
                <div class="w-10 h-10 bg-sky-500/10 text-sky-400 rounded-lg flex items-center justify-center font-bold mb-4 group-hover:bg-sky-500 group-hover:text-slate-950 transition">02</div>
                <h3 class="text-xl font-bold text-white mb-2">Wdrażanie Projektów</h3>
                <p class="text-sm text-slate-300">Przenoszenie projektów graficznych z programu Figma do czystego kodu HTML, CSS i JavaScript.</p>

            </div>
            <!-- Card 3 -->
            <div class="p-6 bg-slate-800/50 rounded-xl border border-slate-800 hover:border-sky-500/50 transition group">
                <div class="w-10 h-10 bg-sky-500/10 text-sky-400 rounded-lg flex items-center justify-center font-bold mb-4 group-hover:bg-sky-500 group-hover:text-slate-950 transition">03</div>
                <h3 class="text-xl font-bold text-white mb-2">Automatyzacja Procesów</h3>
                <p class="text-sm text-slate-300">Optymalizacja czasu pracy zespołów poprzez dedykowane skrypty i aplikacje (Electron/JS).</p>
            </div>
        </div>
    </section>

    <!-- SECTION 3: GRID WITH PROJECTS -->
    <section class="space-y-8 mt-16">
    <div class="text-center space-y-2">
        <h2 class="text-3xl font-bold text-white">Wybrane Projekty</h2>
        <p class="text-slate-300">Zobacz moje strony internetowe. Sprawdź kod na GitHubie lub przetestuj wersję Live.</p>
    </div>

    <div id="projects" class="grid grid-cols-1 md:grid-cols-3 gap-6 scroll-mt-20">
        <!-- Project 1: TropicVibes -->
        <div class="bg-slate-800/40 rounded-xl border border-slate-800 overflow-hidden flex flex-col hover:border-sky-500/30 transition group">
            <div class="p-6 grow space-y-3">
                <div class="flex justify-between items-center">
                    <span class="text-xs font-semibold uppercase tracking-wider text-sky-400 bg-sky-500/10 px-2.5 py-1 rounded-md">Frontend / GSAP</span>
                </div>
                <h3 class="text-xl font-bold text-white group-hover:text-sky-400 transition">🌴 TropicVibes</h3>
                <p class="text-sm text-slate-300 leading-relaxed">Nowoczesna, responsywna strona z ofertami wakacyjnymi. Skupiona na zaawansowanych, płynnych animacjach interfejsu z wykorzystaniem biblioteki GSAP.</p>
            </div>
            <div class="p-6 pt-0 border-t border-slate-800/60 flex gap-4 mt-auto">
                <a href="https://tropicvibes.netlify.app/" target="_blank" class="text-xs font-medium text-white bg-slate-700 hover:bg-sky-500 hover:text-slate-950 px-4 py-2 rounded-lg transition flex items-center gap-1">
                    Live Demo
                </a>
                <a href="https://github.com/ThePioter18/TropicVibes" target="_blank" class="text-xs font-medium text-slate-300 hover:text-white px-4 py-2 rounded-lg border border-slate-700 hover:border-slate-500 transition">
                    GitHub
                </a>
            </div>
        </div>

        <!-- Project 2: EasyTranslator -->
        <div class="bg-slate-800/40 rounded-xl border border-slate-800 overflow-hidden flex flex-col hover:border-sky-500/30 transition group">
            <div class="p-6 grow space-y-3">
                <div class="flex justify-between items-center">
                    <span class="text-xs font-semibold uppercase tracking-wider text-sky-400 bg-sky-500/10 px-2.5 py-1 rounded-md">React.js</span>
                </div>
                <h3 class="text-xl font-bold text-white group-hover:text-sky-400 transition">🌐 EasyTranslator</h3>
                <p class="text-sm text-slate-300 leading-relaxed">Strona internetowa prezentująca usługi profesjonalnego tłumacza. Jest napisana w bibliotece React i stylizowana przy użyciu SCSS. Wykorzystuje zewnętrzne API do wyświetlenia oferty dostępnych języków obcych oraz integruje oficjalne API platformy Groq do obsługi inteligentnego, interaktywnego czatu AI. Posiada przyjazny dla użytkownika interfejs, umożliwiający uzyskanie informacji i skontaktowanie się z tłumaczem.</p>
                </p>
            </div>
            <div class="p-6 pt-0 border-t border-slate-800/60 flex gap-4 mt-auto">
                <a href="https://easytranslator.netlify.app/" target="_blank" class="text-xs font-medium text-white bg-slate-700 hover:bg-sky-500 hover:text-slate-950 px-4 py-2 rounded-lg transition">
                    Live Demo
                </a>
                <a href="https://github.com/ThePioter18/EasyTranslator" target="_blank" class="text-xs font-medium text-slate-300 hover:text-white px-4 py-2 rounded-lg border border-slate-700 hover:border-slate-500 transition">
                    GitHub
                </a>
            </div>
        </div>

        <!-- Project 3: GameHaven -->
        <div class="bg-slate-800/40 rounded-xl border border-slate-800 overflow-hidden flex flex-col hover:border-sky-500/30 transition group">
            <div class="p-6 grow space-y-3">
                <div class="flex justify-between items-center">
                    <span class="text-xs font-semibold uppercase tracking-wider text-sky-400 bg-sky-500/10 px-2.5 py-1 rounded-md">JavaScript (ES6)</span>
                </div>
                <h3 class="text-xl font-bold text-white group-hover:text-sky-400 transition">🎮 GameHaven</h3>
                <p class="text-sm text-slate-300 leading-relaxed">Strona z systemem rezerwacji pokoi gamingowych z dostępnością w czasie rzeczywistym i automatycznym wygaśnięciem rezerwacji na podstawie wybranego czasu trwania. Zawiera formularz kontaktowy, który wysyła wiadomości bezpośrednio na firmową skrzynkę odbiorczą Gmail przy użyciu bezpiecznej konfiguracji Nodemailera.</p>
            </div>
            <div class="p-6 pt-0 border-t border-slate-800/60 flex gap-4 mt-auto">
                <a href="https://gamehaven.netlify.app/" target="_blank" class="text-xs font-medium text-white bg-slate-700 hover:bg-sky-500 hover:text-slate-950 px-4 py-2 rounded-lg transition">
                    Live Demo
                </a>
                <a href="https://github.com/ThePioter18/GameHaven" target="_blank" class="text-xs font-medium text-slate-300 hover:text-white px-4 py-2 rounded-lg border border-slate-700 hover:border-slate-500 transition">
                    GitHub
                </a>
            </div>
        </div>
    </div>
</section>
</main>

<?php get_footer(); ?>
