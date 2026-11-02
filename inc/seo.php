<?php

/**
 * Load SEO configuration.
 */
function rankora_get_seo_data(): array {
    static $seo_data = null;

    if ($seo_data === null) {
        $seo_data = require get_template_directory() . '/data/global/seo.php';
    }

    return $seo_data;
}


/**
 * Get SEO data for the current page.
 */
function rankora_get_current_seo(): array {
    $seo_data = rankora_get_seo_data();

    $defaults = $seo_data['defaults'] ?? [];

    $page_seo = [];

    // Homepage.
    if (is_front_page()) {
        $page_seo = $seo_data['pages']['home'] ?? [];

    // Blog posts.
    } elseif (is_singular('post')) {
        $post_slug = get_post_field('post_name', get_queried_object_id());

        $page_seo = $seo_data['posts'][$post_slug] ?? [];

    // Static pages.
    } elseif (is_page()) {
        $page_slug = get_post_field('post_name', get_queried_object_id());

        $page_seo = $seo_data['pages'][$page_slug] ?? [];

    // Blog archive.
    } elseif (is_home()) {
        $page_seo = $seo_data['pages']['blog'] ?? [];
    }

    return wp_parse_args($page_seo, $defaults);
}


/**
 * Override document title.
 */
function rankora_seo_document_title(): string {
    $seo = rankora_get_current_seo();

    return $seo['title'] ?? '';
}

add_filter('pre_get_document_title', 'rankora_seo_document_title');


/**
 * Output SEO meta tags.
 */
function rankora_seo_meta_tags(): void {
    $seo = rankora_get_current_seo();

    $title = $seo['title'] ?? '';
    $description = $seo['description'] ?? '';

    $url = is_singular()
        ? get_permalink()
        : home_url(add_query_arg([], $GLOBALS['wp']->request ?? ''));

    $og_image = $seo['og_image'] ?? '';

    if ($og_image && !preg_match('~^https?://~i', $og_image)) {
        $og_image = get_template_directory_uri() . $og_image;
    }

    $og_type = is_singular('post') ? 'article' : 'website';

    ?>

    <?php if ($description) : ?>
        <meta name="description" content="<?php echo esc_attr($description); ?>">
    <?php endif; ?>

    <meta property="og:type" content="<?php echo esc_attr($og_type); ?>">
    <meta property="og:title" content="<?php echo esc_attr($title); ?>">
    <meta property="og:description" content="<?php echo esc_attr($description); ?>">
    <meta property="og:url" content="<?php echo esc_url($url); ?>">

    <?php if ($og_image) : ?>
        <meta property="og:image" content="<?php echo esc_url($og_image); ?>">
    <?php endif; ?>

    <meta name="twitter:card" content="<?php echo $og_image ? 'summary_large_image' : 'summary'; ?>">
    <meta name="twitter:title" content="<?php echo esc_attr($title); ?>">
    <meta name="twitter:description" content="<?php echo esc_attr($description); ?>">

    <?php if ($og_image) : ?>
        <meta name="twitter:image" content="<?php echo esc_url($og_image); ?>">
    <?php endif; ?>

    <?php
}

add_action('wp_head', 'rankora_seo_meta_tags', 1);