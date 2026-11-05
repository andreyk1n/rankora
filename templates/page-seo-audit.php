<?php /* Template Name: SEO Audit */

$page_data = require get_template_directory() . '/data/pages/seo-audit.php';

get_header();

$components = [
    'hero' => 'hero',
];

?>

<main id="main-content" class="main">

    <?php foreach ($components as $component => $data_key) : ?>

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