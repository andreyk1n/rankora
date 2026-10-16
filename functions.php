
<?php

/**
 * Theme setup.
 */
function rankora_setup(): void
{
    add_theme_support('title-tag');
    add_theme_support('post-thumbnails');
    add_theme_support('html5', [
        'search-form',
        'comment-form',
        'comment-list',
        'gallery',
        'caption',
        'style',
        'script',
    ]);

    register_nav_menus([
        'primary' => __('Primary Menu', 'rankora'),
        'footer'  => __('Footer Menu', 'rankora'),
    ]);
}
add_action('after_setup_theme', 'rankora_setup');


/**
 * Enqueue styles and scripts.
 */
function rankora_enqueue_assets(): void
{
    $theme_dir = get_template_directory();
    $theme_uri = get_template_directory_uri();

    // CSS files.
    $styles = [
        'rankora-main'       => '/assets/css/main.css',
        'rankora-components' => '/assets/css/components.css',
        'rankora-responsive' => '/assets/css/responsive.css',
    ];

    foreach ($styles as $handle => $relative_path) {
        $file_path = $theme_dir . $relative_path;

        if (file_exists($file_path)) {
            wp_enqueue_style(
                $handle,
                $theme_uri . $relative_path,
                [],
                (string) filemtime($file_path)
            );
        }
    }

    // JavaScript.
    $script_path = '/assets/js/main.js';
    $script_file = $theme_dir . $script_path;

    if (file_exists($script_file)) {
        wp_enqueue_script(
            'rankora-main',
            $theme_uri . $script_path,
            [],
            (string) filemtime($script_file),
            true
        );
    }
}
add_action('wp_enqueue_scripts', 'rankora_enqueue_assets');
