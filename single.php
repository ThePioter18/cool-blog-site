<?php

get_header(); ?>

<div class="max-w-4xl mx-auto px-4">
  
  <?php if (have_posts()) {
    while(have_posts()) {
      the_post(); ?>
      
      <div class="flex items-center pt-5 mb-6">
        <div class="w-24 rounded-xl overflow-hidden text-center shrink-0 bg-teal-500">
          <div class="flex justify-around">
            <span class="text-white block text-xl uppercase leading-8"><?php the_time('M'); ?></span>
            <span class="text-white block text-sm"><?php the_time('Y'); ?></span>
          </div>
            <span class="block bg-teal-100 text-teal-700 text-5xl py-2"><span class="relative bottom-1"><?php the_time('d'); ?></span></span>
        </div>
      
        <div class="pl-6">
          <h1 class="text-xl sm:text-2xl xl:text-3xl font-bold text-white"><?php the_title(); ?></h1>
           <p class="text-xl text-gray-200">by <?php the_author_meta('display_name'); ?></p>
        </div>
      </div>

      <div class="metabox pb-2 border-b border-gray-100">
        <div class="flex items-center flex-wrap gap-3 text-sm">
          
          <!-- Link Blog Home -->
          <a href="<?php echo site_url('/blog'); ?>" 
              class="metabox__blog-home-link">
                <i class="ti ti-home" aria-hidden="true"></i>
                Blog Home
          </a>

          <!-- Meta info -->
          <div class="text-gray-200">
              <span class="mx-2">•</span>
              Posted by <span class="author_post">
                  <?php the_author_posts_link(); ?>
              </span>  in
              <span class="category_text hover:underline">
                  <?php echo get_the_category_list(', '); ?>
              </span>
          </div>
        </div>
      </div>

      
      <div class="prose max-w-full md:text-lg mt-5 mb-10 text-gray-200">
        <p><?php the_content(); ?></p>
      </div>

    <?php }
  } ?>

  <div class="sm:grid sm:grid-cols-2 bg-teal-700 text-white mb-10 rounded-2xl overflow-hidden">
    <div class="py-5 px-7">
      <h3 class="text-2xl font-bold mb-2">Najnowsze posty</h3>
      <ul class="list-disc pl-4 text-sm leading-loose">
      <?php 
	      $latestPosts = new WP_Query(array( 
		      'posts_per_page' => 5  
	      ));
	      
	      while($latestPosts->have_posts()){
		      
		      $latestPosts->the_post(); ?>
		      <!-- our LI or list item html can go here -->
		      <li><a class="hover:text-teal-200 hover:underline" href="<?php the_permalink();?>"><?php the_title();?></a></li>

	      <?php } ?> 
	      
      </ul>     
      
    </div> 
    <div class="hidden sm:block bg-cover bg-center" style="background-image: url('<?php echo get_theme_file_uri('/img/wokandapix-blog.jpg'); ?>');"></div> 
  </div>    

</div>

<?php get_footer();
