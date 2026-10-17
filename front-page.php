
<?php

$page_data = require get_template_directory() . '/data/pages/home.php';

get_header();

$components = [
    'hero'        => 'hero',
    'benefits'    => 'benefits',
    'service-grid' => 'services',
    'process-steps' => 'process',
    'case-grid'    => 'cases',
    'about'         => 'about',
    'reviews'       => 'reviews',
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

    <!-- Тут підключатимуться інші секції головної сторінки. -->

</main>

<?php get_footer(); ?>
