<?php get_header() ?>

<?php $subdomainLinks = new WP_Query(
    array(
        'post_type' => 'subdomain',
        'posts_per_page' => 10,
        'post_status'            => 'all',
        'no_found_rows'          => true,
        'ignore_sticky_posts'    => true,
        'update_post_term_cache' => false,
        'update_post_meta_cache' => false,
        'orderby'                => 'post_date ID',
        'order'                  => 'ASC'
)); ?>


<main id="top" class="relative flex flex-col mx-auto px-4 py-8 text-center min-h-screen bg-zinc-900 z-20 text-white overflow-hidden">
    <section class="container mx-auto py-8 text-center">
        <div class=" mx-auto mb-16 py-4 space-y-4 flex flex-col text-left border-b-2 border-white">
            <!-- Logo -->
            <h2 class="text-xl md:text-2xl px-4">
                Featured Projects
            </h2>
        </div>
        <div class="text-5xl md:text-8xl mx-auto mb-32 py-4 flex flex-col text-left border-white">
            <h2>Explore my featured work</h2>
        </div>
        <?php
        // WP_Query to fetch Projects custom post type
        $projects_query = new WP_Query(
            array(
                'post_type' => 'projects',
                'posts_per_page' => 10,
                'post_status'            => 'all',
                'no_found_rows'          => true,
                'ignore_sticky_posts'    => true,
                'update_post_term_cache' => false,
                'update_post_meta_cache' => false,
                'orderby'                => 'post_date ID',
                'order'                  => 'ASC'
            )
        );
        if ($projects_query->have_posts()) :
            while ($projects_query->have_posts()) : $projects_query->the_post(); ?>
                <article>
                    <h3><?php the_title(); ?></h3>
                    <div><?php the_content(); ?></div>
                </article>
        <?php endwhile;
        endif;
        wp_reset_postdata();
        ?>
        </div>

        <!-- Content -->
    </section>

    <section id="skills" class="container mx-auto py-8 text-center">
        <div class="mx-auto mb-16 py-4 space-y-4 flex flex-col text-left border-b-2 border-white">
            <!-- Logo -->
            <h2 class="text-xl md:text-2xl text-white px-4">
                Skills and Services
            </h2>
        </div>
        <div class="text-5xl md:text-8xl mx-auto mb-32 py-4 flex flex-col text-left border-white">
            <h2>Capabilities And Areas Of Expertise</h2>
        </div>
        <div class="flex flex-col h-full">
            <?php $skills_query = new WP_Query(
                array(
                    'post_type' => 'skills',
                    'posts_per_page' => 10,
                    'post_status'            => 'all',
                    'no_found_rows'          => true,
                    'ignore_sticky_posts'    => true,
                    'update_post_term_cache' => false,
                    'update_post_meta_cache' => false,
                    'orderby'                => 'post_date ID',
                    'order'                  => 'ASC'
                )
            ); ?>
            <div class="flex flex-col justify-between space-y-16">
                <?php
                // WP_Query to fetch Services custom post type
                if ($skills_query->have_posts()) :
                    while ($skills_query->have_posts()) : $skills_query->the_post();
                        $skill_icon = get_field('icons');
                ?>
                        <div class="grid grid-cols-5 gap-8 items-center">
                            <div class="hidden icon sm:col-span-2 sm:flex sm:justify-center sm:relative sm:p-4">
                                <?php
                                switch ($skill_icon) {
                                    case 'Accessibility':
                                        echo '
                                <svg xmlns="http://www.w3.org/2000/svg" fill="currentcolor" class="w-full h-auto max-w-[200px]" viewBox="0 0 16 16">
                                    <path d="M8 4.143A1.071 1.071 0 1 0 8 2a1.071 1.071 0 0 0 0 2.143m-4.668 1.47 3.24.316v2.5l-.323 4.585A.383.383 0 0 0 7 13.14l.826-4.017c.045-.18.301-.18.346 0L9 13.139a.383.383 0 0 0 .752-.125L9.43 8.43v-2.5l3.239-.316a.38.38 0 0 0-.047-.756H3.379a.38.38 0 0 0-.047.756Z"/>
                                    <path d="M8 0a8 8 0 1 0 0 16A8 8 0 0 0 8 0M1 8a7 7 0 1 1 14 0A7 7 0 0 1 1 8"/>
                                </svg>
                                ';
                                        break;

                                    case 'Pen':
                                        echo '
                                <svg xmlns="http://www.w3.org/2000/svg" fill="currentColor" class="w-full h-auto max-w-[200px]" viewBox="0 0 16 16">
                                    <path d="m13.498.795.149-.149a1.207 1.207 0 1 1 1.707 1.708l-.149.148a1.5 1.5 0 0 1-.059 2.059L4.854 14.854a.5.5 0 0 1-.233.131l-4 1a.5.5 0 0 1-.606-.606l1-4a.5.5 0 0 1 .131-.232l9.642-9.642a.5.5 0 0 0-.642.056L6.854 4.854a.5.5 0 1 1-.708-.708L9.44.854A1.5 1.5 0 0 1 11.5.796a1.5 1.5 0 0 1 1.998-.001m-.644.766a.5.5 0 0 0-.707 0L1.95 11.756l-.764 3.057 3.057-.764L14.44 3.854a.5.5 0 0 0 0-.708z"/>
                                </svg>
                                ';
                                        break;

                                    case 'Wordpress':
                                        echo '
                                <svg xmlns="http://www.w3.org/2000/svg" fill="currentColor" class="w-full h-auto max-w-[200px]" viewBox="0 0 16 16">
                                    <path d="M12.633 7.653c0-.848-.305-1.435-.566-1.892l-.08-.13c-.317-.51-.594-.958-.594-1.48 0-.63.478-1.218 1.152-1.218q.03 0 .058.003l.031.003A6.84 6.84 0 0 0 8 1.137 6.86 6.86 0 0 0 2.266 4.23c.16.005.313.009.442.009.717 0 1.828-.087 1.828-.087.37-.022.414.521.044.565 0 0-.371.044-.785.065l2.5 7.434 1.5-4.506-1.07-2.929c-.369-.022-.719-.065-.719-.065-.37-.022-.326-.588.043-.566 0 0 1.134.087 1.808.087.718 0 1.83-.087 1.83-.087.37-.022.413.522.043.566 0 0-.372.043-.785.065l2.48 7.377.684-2.287.054-.173c.27-.86.469-1.495.469-2.046zM1.137 8a6.86 6.86 0 0 0 3.868 6.176L1.73 5.206A6.8 6.8 0 0 0 1.137 8"/>
                                    <path d="M6.061 14.583 8.121 8.6l2.109 5.78q.02.05.049.094a6.85 6.85 0 0 1-4.218.109m7.96-9.876q.046.328.047.706c0 .696-.13 1.479-.522 2.458l-2.096 6.06a6.86 6.86 0 0 0 2.572-9.224z"/>
                                    <path fill-rule="evenodd" d="M0 8c0-4.411 3.589-8 8-8s8 3.589 8 8-3.59 8-8 8-8-3.589-8-8m.367 0c0 4.209 3.424 7.633 7.633 7.633S15.632 12.209 15.632 8C15.632 3.79 12.208.367 8 .367 3.79.367.367 3.79.367 8"/>
                                </svg>
                                ';
                                        break;

                                    case 'Code':
                                        echo '
                                <svg xmlns="http://www.w3.org/2000/svg" fill="#e8eaed" class="w-full h-auto max-w-[200px]" viewBox="0 0 16 16">
                                    <path d="M10.478 1.647a.5.5 0 1 0-.956-.294l-4 13a.5.5 0 0 0 .956.294zM4.854 4.146a.5.5 0 0 1 0 .708L1.707 8l3.147 3.146a.5.5 0 0 1-.708.708l-3.5-3.5a.5.5 0 0 1 0-.708l3.5-3.5a.5.5 0 0 1 .708 0m6.292 0a.5.5 0 0 0 0 .708L14.293 8l-3.147 3.146a.5.5 0 0 0 .708.708l3.5-3.5a.5.5 0 0 0 0-.708l-3.5-3.5a.5.5 0 0 0-.708 0"/>
                                </svg>
                                ';
                                        break;

                                    default:
                                        // Code to execute if no cases match
                                        echo "";
                                        break;
                                }
                                ?>
                            </div>
                            <article class="skill-text col-span-5 sm:col-span-3 sm:text-left">
                                <h4 class="text-2xl md:text-5xl text-white mb-8"><?php the_title(); ?></h4>
                                <div class="text-lg text-white"><?php the_content(); ?></div>
                            </article>
                        </div>
                <?php endwhile;
                endif;
                wp_reset_postdata();
                ?>
            </div>
        </div>
    </section>

    <section id="about" class="container mx-auto py-8 text-center">
        <div class="mx-auto mb-16 py-4 space-y-4 flex flex-col text-left border-b-2 border-white">
            <!-- Logo -->
            <h2 class="text-xl md:text-2xl px-4">
                About
            </h2>
        </div>
        <div class="text-5xl md:text-8xl mx-auto mb-32 py-4 flex flex-col text-left border-white">
            <h2>Front-end Developer</h2>
        </div>

        <div class="flex flex-col sm:grid sm:grid-cols-12 sm:gap-4">
            <div class="sm:col-span-4"></div>
            <div class="sm:col-span-8">
                <?php
                // Get the About page content
                $about_page_query = new WP_Query(
                    array(
                        'post_type'              => 'page',
                        'title'                  => 'About',
                        'post_status'            => 'all',
                        'posts_per_page'         => 1,
                        'no_found_rows'          => true,
                        'ignore_sticky_posts'    => true,
                        'update_post_term_cache' => false,
                        'update_post_meta_cache' => false,
                        'orderby'                => 'post_date ID',
                        'order'                  => 'ASC',
                    )
                );
                if ($about_page_query->have_posts()) :
                    while ($about_page_query->have_posts()) : $about_page_query->the_post(); ?>
                        <div class="text-left text-lg text-white">
                            <?php echo apply_filters('the_content', get_the_content()); ?>
                        </div>
                <?php
                    endwhile;
                    wp_reset_postdata(); // Reset the global $post object
                endif; ?>
            </div>
        </div>
    </section>
</main>

<?php get_footer(); ?>