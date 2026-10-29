<?php
/* Template Name: Privacy policy page */

$page_data = require get_template_directory() . '/data/pages/privacy.php';

get_header();

get_template_part('template-parts/components/privacy', null, [
    'privacy' => $page_data,
]);

get_footer();