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
        <?php 
        $skills_query = new WP_Query(
            array(
                'post_type' => 'skills',
                'posts_per_page' => 10,
                'post_status' => 'all',
                'no_found_rows' => true,
                'ignore_sticky_posts' => true,
                'update_post_term_cache' => false,
                'update_post_meta_cache' => false,
                'orderby' => 'post_date ID',
                'order' => 'ASC'
            )
        ); 
        ?>
        <div class="flex flex-col justify-between space-y-16">
            <?php
            // WP_Query to fetch skills custom post type
            if ($skills_query->have_posts()) :
                while ($skills_query->have_posts()) : $skills_query->the_post();
                    $skill_icon = get_field('icons');
                    $chips = get_post_meta(get_the_ID(), '_skills_chips', true); // Fetch the chips
            ?>
                <div class="grid grid-cols-5 gap-8 items-center">
                    <div class="hidden icon sm:col-span-1 sm:flex sm:justify-center sm:relative sm:p-4">
                        <?php
                        switch ($skill_icon) {
                            case 'Accessibility':
                                echo '
                                <svg xmlns="http://www.w3.org/2000/svg" fill="currentcolor" class="w-full h-auto max-w-[200px]" viewBox="0 0 16 16">
                                    <path d="M8 4.143A1.071 1.071 0 1 0 8 2a1.071 1.071 0 0 0 0 2.143m-4.668 1.47 3.24.316v2.5l-.323 4.585A.383.383 0 0 0 7 13.14l.826-4.017c.045-.18.301-.18.346 0L9 13.139a.383.383 0 0 0 .752-.125L9.43 8.43v-2.5l3.239-.316a.38.38 0 0 0-.047-.756H3.379a.38.38 0 0 0-.047.756Z"/>
                                    <path d="M8 0a8 8 0 1 0 0 16A8 8 0 0 0 8 0M1 8a7 7 0 1 1 14 0A7 7 0 0 1 1 8"/>
                                </svg>';
                                break;

                            case 'Pen':
                                echo '
                                <svg xmlns="http://www.w3.org/2000/svg" fill="currentColor" class="w-full h-auto max-w-[200px]" viewBox="0 0 16 16">
                                    <path d="m13.498.795.149-.149a1.207 1.207 0 1 1 1.707 1.708l-.149.148a1.5 1.5 0 0 1-.059 2.059L4.854 14.854a.5.5 0 0 1-.233.131l-4 1a.5.5 0 0 1-.606-.606l1-4a.5.5 0 0 1 .131-.232l9.642-9.642a.5.5 0 0 0-.642.056L6.854 4.854a.5.5 0 1 1-.708-.708L9.44.854A1.5 1.5 0 0 1 11.5.796a1.5 1.5 0 0 1 1.998-.001m-.644.766a.5.5 0 0 0-.707 0L1.95 11.756l-.764 3.057 3.057-.764L14.44 3.854a.5.5 0 0 0 0-.708z"/>
                                </svg>';
                                break;

                            case 'Code':
                                echo '
                                <svg xmlns="http://www.w3.org/2000/svg" fill="#e8eaed" class="w-full h-auto max-w-[200px]" viewBox="0 0 16 16">
                                    <path d="M10.478 1.647a.5.5 0 1 0-.956-.294l-4 13a.5.5 0 0 0 .956.294zM4.854 4.146a.5.5 0 0 1 0 .708L1.707 8l3.147 3.146a.5.5 0 0 1-.708.708l-3.5-3.5a.5.5 0 0 1 0-.708l3.5-3.5a.5.5 0 0 1 .708 0m6.292 0a.5.5 0 0 0 0 .708L14.293 8l-3.147 3.146a.5.5 0 0 0 .708.708l3.5-3.5a.5.5 0 0 0 0-.708l-3.5-3.5a.5.5 0 0 0-.708 0"/>
                                </svg>';
                                break;

                            default:
                                echo "";
                                break;
                        }
                        ?>
                    </div>
                    <article class="skill-text col-span-5 sm:col-span-4 text-left">
                        <h4 class="text-2xl md:text-5xl text-white mb-8"><?php the_title(); ?></h4>
                        <div class="text-lg text-white text-left"><?php the_content(); ?></div>
                        <?php if (!empty($chips) && is_array($chips)) : ?>
                            <ul class="chips-list flex flex-wrap justify-left gap-4 mt-4">
                                <?php foreach ($chips as $chip) : ?>
                                    <li class="chip bg-white text-black px-4 py-2 rounded-full text-sm">
                                        <?php echo esc_html($chip); ?>
                                    </li>
                                <?php endforeach; ?>
                            </ul>
                        <?php endif; ?>
                    </article>
                </div>
            <?php 
                endwhile;
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