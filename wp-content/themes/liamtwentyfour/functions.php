<?php

// Register Meta Box
function add_skills_meta_box() {
    add_meta_box(
        'skills_chips_meta_box', // Unique ID for the meta box
        'Skill Chips',           // Title of the meta box
        'skills_chips_callback', // Callback function
        'skills',                // Post type
        'normal',                // Context
        'high'                   // Priority
    );
}
add_action('add_meta_boxes', 'add_skills_meta_box');

// Save Meta Box Data
function save_skills_chips($post_id) {
    // Security checks
    if (!isset($_POST['skills_chips_nonce_field']) || !wp_verify_nonce($_POST['skills_chips_nonce_field'], 'skills_chips_nonce')) {
        return;
    }
    if (defined('DOING_AUTOSAVE') && DOING_AUTOSAVE) {
        return;
    }
    if (isset($_POST['post_type']) && $_POST['post_type'] === 'skills' && !current_user_can('edit_post', $post_id)) {
        return;
    }

    // Save chips data
    if (isset($_POST['skills_chips'])) {
        $chips = array_map('sanitize_text_field', $_POST['skills_chips']);
        update_post_meta($post_id, '_skills_chips', $chips);
    } else {
        delete_post_meta($post_id, '_skills_chips');
    }
}
add_action('save_post', 'save_skills_chips');

// Meta Box Callback
function skills_chips_callback($post) {
    // Security nonce
    wp_nonce_field('skills_chips_nonce', 'skills_chips_nonce_field');

    // Retrieve saved chips
    $chips = get_post_meta($post->ID, '_skills_chips', true);
    $chips = $chips ? $chips : []; // Default to an empty array if no chips exist

    // Render the container for chips
    echo '<div id="chips-container">';
    foreach ($chips as $chip) {
        echo '<div class="chip-row">
                <input type="text" name="skills_chips[]" value="' . esc_attr($chip) . '" placeholder="Skill Chip">
                <button type="button" class="remove-chip">Remove</button>
              </div>';
    }
    echo '</div>';

    // Add button to create new chips
    echo '<button type="button" id="add-chip-button">Add Chip</button>';
}

// Enqueue Admin Scripts for Skills Post Type
function skills_enqueue_admin_scripts($hook) {
    $screen = get_current_screen();
    if ($screen->post_type === 'skills') {
        wp_enqueue_script(
            'skills-admin-script',
            get_template_directory_uri() . '/build/admin/admin.js',
            [],
            filemtime(get_template_directory() . '/build/admin/admin.js'),
            true
        );
    }
}
add_action('admin_enqueue_scripts', 'skills_enqueue_admin_scripts');


// Enqueue Front-End Scripts and Styles
function enqueue_frontend_scripts_and_styles() {
    // Enqueue Styles
    $css_path = get_template_directory() . '/build/frontend/frontend.css';
    wp_enqueue_style(
        'tailwind-css',
        get_template_directory_uri() . '/build/frontend/frontend.css',
        [],
        filemtime($css_path) // Cache-busting
    );

    // Enqueue Scripts
    $script_path = get_template_directory() . '/build/frontend/frontend.js';
    wp_enqueue_script(
        'build-script',
        get_template_directory_uri() . '/build/frontend/frontend.js',
        [],
        filemtime($script_path), // Cache-busting
        true
    );
}
add_action('wp_enqueue_scripts', 'enqueue_frontend_scripts_and_styles');
