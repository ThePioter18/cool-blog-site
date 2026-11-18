<?php get_header(); ?>

<main class="max-w-4xl mx-auto px-6 py-12">
    
    <?php 
    if (have_posts()) :
        while (have_posts()) : the_post(); 
    ?>

        <article class="prose prose-lg max-w-none">
            
            <h1 class="text-4xl font-bold tracking-tight text-white mb-8">
                <?php the_title(); ?>
            </h1>

            <div class="text-gray-700 leading-relaxed">
                <?php the_content(); ?>
            </div>

        </article>

    <?php 
        endwhile;
    else :
    ?>
        <p>Nie znaleziono treści.</p>
    <?php endif; ?>

</main>

<?php get_footer(); ?>