
<?php /* Template Name: Services page */

$page_data = require get_template_directory() . '/data/pages/services.php';

get_header();

$components = [
    'hero'        => 'hero',
    'catalog'        => 'catalog',
    'pick'        => 'pick',
    'compare'        => 'compare',
    'process'        => 'process',
    'faq'        => 'faq',
    'contact'        => 'contact',
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
