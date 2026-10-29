<?php
/* Template Name: Contacts page */

$page_data = require get_template_directory() . '/data/pages/contacts.php';

get_header();

$components = [
    'hero-contacts' => [
        'hero' => $page_data['hero'] ?? [],
    ],
    'contact-channels' => [
        'channels' => $page_data['channels'] ?? [],
    ],
    '../partials/contact-form' => [
        'form' => $page_data['form'] ?? [],
        'contact' => $page_data['contact'] ?? [],
    ],
    'faq' => [
        'faq' => $page_data['faq'] ?? [],
    ],
];
?>

<main id="main-content" class="main">
    <?php foreach ($components as $component => $args): ?>
        <?php get_template_part('template-parts/components/' . $component, null, $args); ?>
    <?php endforeach; ?>
</main>

<?php get_footer(); ?>