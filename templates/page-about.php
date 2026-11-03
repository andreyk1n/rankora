<?php
/* Template Name: About us page */

$page_data = require get_template_directory() . '/data/pages/about.php';

get_header();

$components = [
    'hero' => 'hero',
    'mission' => 'mission',
    'principles' => 'principles',
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