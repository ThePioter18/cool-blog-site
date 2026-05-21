<?php get_header(); ?>

<!-- The main page container fits the screen -->
<main id="contact" class="flex items-center justify-center">

    <div class="max-w-6xl w-full my-12 p-8 sm:p-12 bg-main-color rounded-3xl flex flex-col lg:flex-row gap-12 items-center justify-between shadow-2xl">
        
        <!-- Left Side: Header, SVG, and Contact Details -->
        <div class="space-y-8 max-w-md w-full">
            <div>
                <h1 class="text-4xl sm:text-5xl font-extrabold text-white tracking-tight mb-4">Kontakt</h1>
                <p class="text-third-color/80 text-lg leading-relaxed">Masz pytania dotyczące tutoriali lub współpracy? Napisz bezpośrednio lub skorzystaj z poniższych danych.</p>
            </div>

            <!-- SVG -->
            <div style="display: flex; flex-direction: column; justify-content: center; align-items: center; min-height: 120px; width: 100%;" class="bg-white/5 rounded-2xl border border-white/10 p-4">
                <svg
                  xmlns="http://www.w3.org/2000/svg"
                  width="60"
                  height="60"
                  viewBox="0 0 24 24"
                  fill="none"
                  stroke="#00bcff"
                  stroke-width="1.25"
                  stroke-linecap="round"
                  stroke-linejoin="round"
                >
                  <path d="M8 9h8" />
                  <path d="M8 13h6" />
                  <path d="M9 18h-3a3 3 0 0 1 -3 -3v-8a3 3 0 0 1 3 -3h12a3 3 0 0 1 3 3v8a3 3 0 0 1 -3 3h-3l-3 3l-3 -3z" />
                </svg>
                <span class="text-secondary-color font-bold text-xs uppercase tracking-widest mt-2">Wyślij nam wiadomość</span>
            </div>
            
            <!-- Contact details -->
            <div class="space-y-4 pt-6 border-t border-white/10">
                <div class="flex flex-col sm:flex-row sm:items-center gap-2 text-white">
                    <span class="text-secondary-color font-bold text-xs uppercase tracking-wider w-32">Phone number:</span>
                    <span class="text-lg font-medium">343 404 922</span>
                </div>
                <div class="flex flex-col sm:flex-row sm:items-center gap-2 text-white">
                    <span class="text-secondary-color font-bold text-xs uppercase tracking-wider w-32">Email address:</span>
                    <a href="mailto:coolblog@gmail.com" class="text-lg font-medium hover:text-secondary-color transition-colors duration-200">coolblog@gmail.com</a>
                </div>
            </div>
        </div>

        <!-- Right side: space for your photo -->
        <div class="w-full lg:w-125 aspect-4/3 sm:aspect-video lg:aspect-square relative group">
            <div class="absolute inset-0 bg-linear-to-tr from-secondary-color/30 to-transparent rounded-2xl blur-xl opacity-50 group-hover:opacity-75 transition-opacity duration-300"></div>
            
            <div class="w-full h-full relative rounded-2xl overflow-hidden border-2 border-white/10 group-hover:border-secondary-color/40 transition-colors duration-300 shadow-xl">
                <img 
                    src="<?php echo get_theme_file_uri('img/contact-computer.jpg'); ?>" 
                    alt="Contact background" 
                    class="w-full h-full object-cover grayscale-20 group-hover:grayscale-0 group-hover:scale-105 transition-all duration-500"
                />
            </div>
        </div>

    </div>

</main>

<?php get_footer(); ?>
