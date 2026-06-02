<footer class="site-footer border-t mt-4 py-4">
      <div class="site-footer container text-gray-200 max-w-6xl mx-auto px-4 space-y-24 py-2">
        <div class="group grid grid-cols-1 md:grid-cols-3 gap-10 justify-items-center md:justify-items-start">

          <!-- Column 1  -->
          <div class="site-footer__col-one place-self-center">

            <h1 class="blog-logo-text font-bold  hover:text-secondary-color transition duration-300 text-2xl mb-4 grid justify-items-center md:justify-items-start">
              <a href="<?php echo esc_url( home_url() ); ?>">CoolBlog</a>
            </h1>
            <p class="hover:text-amber-400 transition duration-300">
              <a href="tel:343404922" class="site-footer__lin">
              <i class="ti ti-phone-outgoing mr-2 text-2xl" aria-hidden="true"></i>
              343 404 922</a>
            </p>
          </div>

          <!-- Column 2 i 3 -->
          <div class="site-footer__col-two-three-group grid grid-cols-2 gap-10 mt-6 ml-1  justify-self-center">
            <div class="site-footer__col-two justify-items-center md:justify-items-start">
              <h3 class="headline headline--small mb-4 font-bold text-lg">Klikaj chętnie</h3>
              <nav class="nav-list">
                <ul class="justify-items-center md:justify-items-start">
                  <li <?php if (is_page('about-me')) echo 'class="current-menu-item"'; ?>
                  ><a href="<?php echo esc_url(get_permalink(get_page_by_path('about-me'))); ?>">Trochę o mnie</a></li>
                  <li <?php if (is_page('projects')) echo 'class="current-menu-item"'; ?>
                  ><a href="<?php echo esc_url(get_permalink(get_page_by_path('projects'))); ?>">Realizacje</a></li>
                  <li <?php if (is_page('contact')) echo 'class="current-menu-item"'; ?>
                  ><a href="<?php echo esc_url(get_permalink(get_page_by_path('contact'))); ?>">Kontakt</a></li>
                </ul>
              </nav>
            </div>

            <div class="site-footer__col-three justify-items-center md:justify-items-end">
              <h3 class="headline headline--small mb-4 font-bold text-lg">Poznaj</h3>
              <nav class="nav-list">
                <ul class="justify-items-center md:justify-items-end">
                  <li><a href="#">Legal</a></li>
                  <li <?php if (is_page('privacy-policy')) echo 'class="current-menu-item"'; ?>
                  ><a href="<?php echo esc_url(get_permalink(get_page_by_path('privacy-policy'))); ?>">Privacy</a></li>
                  <li><a href="#">Terms & Conditions</a></li>
                </ul>
              </nav>
            </div>
          </div>

          <div class="site-footer__col-four  place-self-center w-3xs">
            <h3 class="headline headline--small text-center mt-4">Skontaktuj się ze mną <span class="block">lub zainspiruj się wybranymi projektami.</span></h3>
            <div class="flex justify-center mt-8 md:mt-4">
              <nav>
                <ul class="social-icons-list grid grid-cols-3 md:grid-cols-6 gap-4 md:gap-6">
                  <li>
                    <a href="https://www.facebook.com/" 
                    class="social-color-facebook hover:text-secondary-color text-2xl transition duration-300"
                    aria-label="Facebook"
                    target="_blank" rel="noopener noreferrer">
                    <i class="ti ti-brand-facebook" aria-hidden="true"></i></a>
                  </li>
                  <li>
                    <a href="https://x.com/?lang=pl" 
                    class="social-color-twitter hover:text-secondary-color text-2xl transition duration-300"
                    aria-label="Twitter"
                    target="_blank" rel="noopener noreferrer">
                    <i class="ti ti-brand-twitter" aria-hidden="true"></i></a>
                  </li>
                  <li>
                    <a href="https://www.youtube.com/" 
                    class="social-color-youtube hover:text-secondary-color text-2xl transition duration-300"
                    aria-label="YouTube"
                    target="_blank" rel="noopener noreferrer">
                    <i class="ti ti-brand-youtube" aria-hidden="true"></i></a>
                  </li>
                  <li>
                    <a href="https://pl.linkedin.com/" 
                    class="social-color-linkedin hover:text-secondary-color text-2xl transition duration-300"
                    aria-label="LinkedIn"
                    target="_blank" rel="noopener noreferrer">
                    <i class="ti ti-brand-linkedin" aria-hidden="true"></i></a>
                  </li>
                  <li>
                    <a href="https://www.instagram.com/" 
                    class="social-color-instagram hover:text-secondary-color text-2xl transition duration-300"
                    aria-label="Instagram"
                    target="_blank" rel="noopener noreferrer">
                    <i class="ti ti-brand-instagram" aria-hidden="true"></i></a>
                  </li>
                  <li>
                    <a href="https://www.behance.net/piotrekrucced7" 
                    class="social-color-behance hover:text-secondary-color text-2xl transition duration-300"
                    aria-label="Behance"
                    target="_blank" rel="noopener noreferrer">
                    <i class="ti ti-brand-behance" aria-hidden="true"></i></a>
                  </li>
                </ul>
              </nav>
            </div>
          </div>
        </div>
      </div>

      <div class="footerCopyright py-4 mt-10">
        <div class="footerCopyright__year max-w-4xl px-4 mx-auto text-gray-400 text-center">Copyright &copy; <?php echo date("Y"); ?> CoolBlog</div>
        
        <div class="footerCopyright__repo max-w-4xl px-4 mt-2 mx-auto text-gray-400 text-center">
            <span class="mb-1 font-bold block">Created by</span>
            <a href="https://github.com/ThePioter18" class="hover:text-amber-400 transition duration-300" target="_blank" rel="noopener noreferrer"><i class="ti ti-brand-github"></i> PiotrWebWorks</a>
        </div>
      
      </div>

</footer>

<?php wp_footer(); ?>
</body>
</html>