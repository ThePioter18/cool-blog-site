<?php 
/**
 * FILE: home.php
 * DESCRIPTION: Main template for the articles page (Blog)
 */

get_header(); ?>

<div class="max-w-4xl mx-auto px-6 py-12">
    <h1 class="text-4xl font-bold mb-10 text-white">Blog</h1>

    <?php if (have_posts()) : ?>
        <div class="space-y-10">
            <?php while (have_posts()) : the_post(); ?>
                <div class="border-b border-gray-200 pb-10">
                    <h2 class="text-2xl font-semibold mb-3">
                        <a href="<?php the_permalink(); ?>" class="text-white hover:text-secondary-color">
                            <?php the_title(); ?>
                        </a>
                    </h2>
                    
                    <div class="text-gray-200 text-sm mb-4">
                        <?php the_date('d F Y'); ?> • <?php the_author(); ?>
                    </div>

                    <div class="prose max-w-none text-gray-200">
                        <?php echo wp_trim_words(get_the_content(), 50, '...'); ?>
                    </div>

                    <a href="<?php the_permalink(); ?>" class="inline-block mt-4 text-secondary-color hover:underline font-medium">
                        Czytaj więcej →
                    </a>
                </div>
            <?php endwhile; ?>
        </div>

        <!-- Paginacja -->
        <div class="mt-12">
            <?php echo paginate_links(); ?>
        </div>

    <?php else : ?>
        <p>Nie znaleziono wpisów.</p>
    <?php endif; ?>
</div>

<?php get_footer(); ?>