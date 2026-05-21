<!DOCTYPE html>
<html <?php language_attributes(); ?>>
  <head>
    <meta charset="<?php bloginfo('charset'); ?>">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;700&display=swap" rel="stylesheet">
    <?php wp_head(); ?>
  </head>
  <body <?php body_class(); ?> style="background-color: rebeccapurple;">

    <header class="site-header relative">
      <nav class="bg-white shadow-sm border-b border-gray-100">
       <div class="max-w-7xl mx-auto px-6">
        <div class="flex items-center justify-between py-5">
            
            <!-- Logo -->
            <a href="<?php echo home_url(); ?>" class="text-2xl font-bold text-gray-900">
                CoolBlog
            </a>

            <!-- Menu Desktope -->
            <?php 
            wp_nav_menu([
                'theme_location' => 'primary',
                'menu'           => 'blog-menu',
                'container'      => false,
                'menu_class'     => 'hidden md:flex items-center gap-x-8 nav-menu',
                'items_wrap'     => '<ul id="%1$s" class="%2$s">%3$s</ul>',
                'fallback_cb'    => false,
            ]); 
            ?>
            <!-- Hamburger Button -->
            <button id="mobile-menu-button" 
                        class="md:hidden text-3xl text-gray-700 focus:outline-none z-50 transition-transform">
                    ☰
                </button>
          </div>
        </div>

            <!-- Overlay z Blur -->
            <div id="mobile-overlay" class="hidden fixed inset-0 bg-black/50 backdrop-blur-md z-40 md:hidden transition-opacity duration-300"></div>

            <div id="mobile-menu" class="fixed inset-x-0 top-0 bg-white shadow-2xl z-50 
            -translate-y-full transition-transform duration-300 ease-out overflow-y-auto
            hidden md:hidden">

                <div class="max-w-7xl mx-auto px-6">
                  <!-- Top bar -->
                  <div class="flex items-center justify-between py-5 border-b">
                    <a href="<?php echo home_url(); ?>" class="text-2xl font-bold text-gray-900">
                        CoolBlog
                    </a>
                    <button id="close-mobile-menu" 
                            class="text-4xl text-gray-700 hover:text-gray-900 transition-colors">
                        ✕
                    </button>
                  </div>
                  <!-- Menu links -->
                   <?php 
                  wp_nav_menu([
                    'theme_location' => 'primary',
                    'menu'           => 'blog-menu',
                    'container'      => false,
                    'menu_class'     => 'flex flex-col py-8 space-y-1 nav-mobile', 
                    'items_wrap'     => '<ul id="%1$s" class="%2$s">%3$s</ul>',
                    'fallback_cb'    => false,
                  ]); 
                  ?>
                </div>
            </div>
        </nav>
    </header>
    
    <div class="bg-third-color">
      <div class="max-w-4xl mx-auto mb-5 px-4 flex justify-between items-center">
        <h1 id="find-articles-text" class="text-xl sm:text-3xl py-10 hover:text-secondary-color cursor-pointer">Znajdź artykuły i tutoriale technologiczne</h1>

        <svg id="search-icon" xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="icon icon-tabler icons-tabler-outline icon-tabler-search text-gray-500 hover:text-gray-700 cursor-pointer"><path stroke="none" d="M0 0h24v24H0z" fill="none" /><path d="M3 10a7 7 0 1 0 14 0a7 7 0 1 0 -14 0" /><path d="M21 21l-6 -6" /></svg>
      </div>
    </div>

    <div id="search-overlay" class="transition scale-125 opacity-0 duration-300 ease-in-out flex justify-center invisible bg-white/90 backdrop-blur-sm fixed inset-0 z-10">
      <div class="w-160 max-w-full pt-4 sm:pt-16 px-4 sm:px-0">
        <div class="flex justify-end mb-3">
          <svg id="close-overlay-icon" xmlns="http://www.w3.org/2000/svg" width="48" height="48" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="icon icon-tabler icons-tabler-outline icon-tabler-square-x text-red-400 hover:text-red-600 cursor-pointer"><path stroke="none" d="M0 0h24v24H0z" fill="none" /><path d="M3 5a2 2 0 0 1 2 -2h14a2 2 0 0 1 2 2v14a2 2 0 0 1 -2 2h-14a2 2 0 0 1 -2 -2v-14" /><path d="M9 9l6 6m0 -6l-6 6" /></svg>
        </div>
        <div class="flex justify-between bg-white border-gray-200 border drop-shadow-md">
          <input id="search-field" placeholder="Jakiego artykułu szukasz?" type="text" class="flex-1 text-xl text-gray-500 py-5 px-6 outline-none">
          <div id="search-button" class="flex items-center bg-teal-600 hover:bg-teal-700 cursor-pointer px-5">
              <svg xmlns="http://www.w3.org/2000/svg" width="32" height="32" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="icon icon-tabler icons-tabler-outline icon-tabler-search text-white"><path stroke="none" d="M0 0h24v24H0z" fill="none" /><path d="M3 10a7 7 0 1 0 14 0a7 7 0 1 0 -14 0" /><path d="M21 21l-6 -6" /></svg>
          </div>
        </div>

        <div class="mt-7 py-7 px-8 bg-white border-gray-200 drop-shadow-md">
          <p id="default-message" class=" text-gray-400 text-xl p-5 text-center">Wyniki pojawią się tutaj</p>

          <p id="no-results-message" class="hidden text-red-600"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="currentColor" class="icon icon-tabler icons-tabler-filled icon-tabler-alert-octagon inline-block mr-2"><path stroke="none" d="M0 0h24v24H0z" fill="none" /><path d="M14.897 1a4 4 0 0 1 2.664 1.016l.165 .156l4.1 4.1a4 4 0 0 1 1.168 2.605l.006 .227v5.794a4 4 0 0 1 -1.016 2.664l-.156 .165l-4.1 4.1a4 4 0 0 1 -2.603 1.168l-.227 .006h-5.795a3.999 3.999 0 0 1 -2.664 -1.017l-.165 -.156l-4.1 -4.1a4 4 0 0 1 -1.168 -2.604l-.006 -.227v-5.794a4 4 0 0 1 1.016 -2.664l.156 -.165l4.1 -4.1a4 4 0 0 1 2.605 -1.168l.227 -.006h5.793zm-2.887 14l-.127 .007a1 1 0 0 0 0 1.986l.117 .007l.127 -.007a1 1 0 0 0 0 -1.986l-.117 -.007zm-.01 -8a1 1 0 0 0 -.993 .883l-.007 .117v4l.007 .117a1 1 0 0 0 1.986 0l.007 -.117v-4l-.007 -.117a1 1 0 0 0 -.993 -.883z" /></svg>
          <span>Nie znaleźliśmy artykułów dla tego hasła.</span></p>
          
          <div id="loading-icon" class="hidden text-center text-gray-300">
            <svg xmlns="http://www.w3.org/2000/svg" width="32" height="32" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="icon icon-tabler icons-tabler-outline icon-tabler-rotate-clockwise-2 inline-block animate-spin"><path stroke="none" d="M0 0h24v24H0z" fill="none" /><path d="M9 4.55a8 8 0 0 1 6 14.9m0 -4.45v5h5" /><path d="M5.63 7.16l0 .01" /><path d="M4.06 11l0 .01" /><path d="M4.63 15.1l0 .01" /><path d="M7.16 18.37l0 .01" /><path d="M11 19.94l0 .01" /></svg>
          </div> 

          <ul id="results-area" class="hidden space-y-4">
            

          </ul>

        </div>

      </div>
    </div>  

    <template id="li-template"> 
          <li>
            <a class="flex items-center text-sm text-teal-700 hover:text-teal-500" href="#">
              
            <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="icon icon-tabler icons-tabler-outline icon-tabler-file-dots mr-3"><path stroke="none" d="M0 0h24v24H0z" fill="none" /><path d="M14 3v4a1 1 0 0 0 1 1h4" /><path d="M17 21h-10a2 2 0 0 1 -2 -2v-14a2 2 0 0 1 2 -2h7l5 5v11a2 2 0 0 1 -2 2" /><path d="M9 14v.01" /><path d="M12 14v.01" /><path d="M15 14v.01" /></svg>
            
              <span class="title-text"></span>
            
            </a>
          </li>

    </template>