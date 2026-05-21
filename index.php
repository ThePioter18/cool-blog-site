<?php
/**
 * Index.php - Fallback template
 */

get_header(); ?>

<main class="max-w-4xl mx-auto px-6 py-12">

    <?php if (have_posts()) : ?>

        <?php while (have_posts()) : the_post(); ?>
            
            <article class="mb-12">
                <h1 class="text-3xl font-bold mb-4">
                    <a href="<?php the_permalink(); ?>" class="hover:text-secondary-color">
                        <?php the_title(); ?>
                    </a>
                </h1>
                
                <div class="text-gray-200 mb-4">
                    <?php the_date('d F Y'); ?> • <?php the_author(); ?>
                </div>

                <div class="prose max-w-none">
                    <?php the_excerpt(); ?>
                </div>

                <a href="<?php the_permalink(); ?>" class="inline-block mt-4 text-secondary-color hover:underline">
                    Czytaj więcej →
                </a>
            </article>

        <?php endwhile; ?>

        <div class="mt-10">
            <?php echo paginate_links(); ?>
        </div>

    <?php else : ?>
        <p>Nie znaleziono wpisów.</p>
    <?php endif; ?>

</main>

<?php get_footer(); ?>