<?php

function enqueue_scripts()
{
    // Register the script
    wp_register_script(
        'build-script', // Handle
        get_template_directory_uri() . '/build/index.js', // Source
        array(), // Dependencies (optional)
        null, // Version (optional, you can use filemtime() for cache-busting)
        true // Load in footer (true) or header (false)
    );

    // Enqueue the script
    wp_enqueue_script('build-script');
}

function tailwind_setup_scripts()
{
    wp_enqueue_style(
        'build-css',
        get_template_directory_uri() . '/build/index.css', // Path to the stylesheet
        array(), // Dependencies (empty array if none)
        null // Version number (null to avoid appending version)
    );
}

add_action('wp_enqueue_scripts', 'tailwind_setup_scripts');
add_action('wp_enqueue_scripts', 'enqueue_scripts');

