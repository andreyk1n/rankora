<?php

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
        'primary' => __('Головна навігація', 'rankora'),
        'footer' => __('Меню футера', 'rankora'),
    ]);
}
add_action('after_setup_theme', 'rankora_setup');


function rankora_enqueue_assets(): void
{
    $theme_dir = get_template_directory();
    $theme_uri = get_template_directory_uri();

    // Google Fonts: Manrope
    wp_enqueue_style(
        'rankora-fonts',
        'https://fonts.googleapis.com/css2?family=Manrope:wght@400;500;600;700;800&display=swap',
        [],
        null
    );

    // Stylesheets with automatic cache busting.
    $styles = [
        'rankora-main' => '/assets/css/main.css',
        'rankora-components' => '/assets/css/components.css',
        'rankora-responsive' => '/assets/css/responsive.css',
    ];

    $dependencies = [];

    foreach ($styles as $handle => $path) {
        $file = $theme_dir . $path;

        if (file_exists($file)) {
            wp_enqueue_style(
                $handle,
                $theme_uri . $path,
                $dependencies,
                (string) filemtime($file)
            );

            $dependencies[] = $handle;
        }
    }

    /*
 * Single post and archive stylesheet.
 */
if (is_singular('post') || is_archive()) {
    $single_path = '/assets/css/single.css';
    $single_file = $theme_dir . $single_path;

    if (file_exists($single_file)) {
        wp_enqueue_style(
            'rankora-single',
            $theme_uri . $single_path,
            $dependencies,
            (string) filemtime($single_file)
        );
    }
}

    // Main JavaScript.
    $js_path = '/assets/js/main.js';
    $js_file = $theme_dir . $js_path;

    if (file_exists($js_file)) {
        wp_enqueue_script(
            'rankora-main',
            $theme_uri . $js_path,
            [],
            (string) filemtime($js_file),
            true
        );
    }
}
add_action('wp_enqueue_scripts', 'rankora_enqueue_assets');

require_once get_template_directory() . '/inc/data-loader.php';