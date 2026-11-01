<?php /* Template Name: Cases page */

$page_data = require get_template_directory() . '/data/pages/cases.php';

get_header();

$components = [
    'hero' => 'hero',
    'featured-case' => 'featured',
    'cases-catalog' => 'catalog',
    'results' => 'results',
    'testimonial' => 'testimonial',
    'contact' => 'contact',
];

?>

<main id="main-content" class="main">

    <?php foreach ($components as $component => $data_key): ?>

        <?php
        get_template_part(
            'template-parts/components/' . $component,
            null,
            [
                $data_key => $page_data[$data_key] ?? [],
            ]
        );
        ?>

    <?php endforeach; ?>

</main>

<?php get_footer(); ?>