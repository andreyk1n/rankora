<?php
/* Template Name: Terms of use page */

$page_data = require get_template_directory() . '/data/pages/terms.php';

get_header();

get_template_part('template-parts/components/terms', null, [
    'terms' => $page_data,
]);

get_footer();