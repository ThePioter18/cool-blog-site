<?php get_header(); ?>

<main class="max-w-4xl mx-auto px-6 py-12">
   
    <article class="prose prose-lg max-w-none">
        
        <h1 class="text-4xl font-bold tracking-tight text-white mb-8">
            Moje notatki
        </h1>

        <div class="container container--narrow page-section text-gray-300 leading-relaxed ">

            <div class="create-note">
                <h2 class="headline headline--medium">Utwórz nową notatkę</h2>
                <input class="new-note-title" placeholder="Tytuł notatki">
                <textarea class="new-note-body" placeholder="Tutaj napisz swoją notatkę..."></textarea>
                <span class="submit-note">Utwórz notatkę</span>
                <span class="note-limit-message"></span>
            </div>

            <ul class="min-list link-list" id="my-notes">
                <?php
                $userNotes = new WP_Query(array(
                    'post_type' => 'note',
                    'posts_per_page' => -1,
                    'author' => get_current_user_id()
                ));

                while($userNotes->have_posts()) {
                    $userNotes->the_post(); ?>
                    <li class="flex flex-col note py-3" data-id="<?php echo esc_attr(get_the_ID()); ?>">
                        <span class="note-date text-sm pb-2">
                                <i class="ti ti-calendar" aria-hidden="true"></i>
                                <span class="pr-4">
                                    <?php echo esc_html(get_the_date('d.m.Y')); ?>
                                </span>

                                <i class="ti ti-clock" aria-hidden="true"></i>
                                <?php echo esc_html(get_the_date('H:i')); ?>
                        </span>

                        
                        <div class="note-title-box font-bold flex flex-col sm:flex-row sm:justify-between items-start gap-4">
                            
                            <textarea readonly class="note-title-field h-12 text-xl w-full sm:flex-1 min-w-0 resize-none"><?php echo esc_textarea(str_replace('Private: ', '', get_the_title())); ?></textarea>
                            <div class="note-btn-box flex w-fit gap-6 shrink-0 ">
                                <span class="edit-note cursor-pointer w-fit"><i class="ti ti-edit" aria-hidden="true"></i>Edytuj</span>
                                <span class="delete-note cursor-pointer w-fit"><i class="ti ti-trash" aria-hidden="true"></i>Usuń</span>
                            </div>
                        </div>
                        
                        <textarea readonly class="note-body-field h-[20vh] italic"> <?php echo esc_textarea(
                            wp_strip_all_tags(get_the_content())); ?></textarea>
                         
                        <span class="update-note btn btn--blue btn--small self-end"><i class="ti ti-square-arrow-right" aria-hidden="true"></i> Zapisz</span> 
                    </li>
                <?php }

                ?>
            </ul>
        </div>
        

    </article>

</main>

<?php get_footer(); ?>