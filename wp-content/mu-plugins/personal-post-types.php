<?php

function personal_post_types() {
    register_post_type('projects', array(
        'public'      => true,
        'has_archive' => true,
        'supports'    => array('title', 'editor', 'thumbnail'),
        'labels' => array(
            'name' => 'Projects', 
            'singular_name' => 'Project'
        ),
    ));
    register_post_type('skills', array(
        'public'      => true,
        'has_archive' => true,
        'supports'    => array('title', 'editor', 'thumbnail'),
        'labels' => array(
            'name' => 'Skills', 
            'singular_name' => 'Skill'
        ),
    ));
}

add_action('init', 'personal_post_types')

?>