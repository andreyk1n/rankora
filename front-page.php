
<?php

$page_data = require get_template_directory() . '/data/pages/home.php';

get_header();

$hero_data = $page_data['hero'] ?? [];

get_template_part(
    'template-parts/components/hero',
    null,
    ['hero' => $hero_data]
);

get_template_part(
    'template-parts/components/benefits',
    null,
    [
        'benefits' => $page_data['benefits'] ?? [],
    ]
);


// Тут підключатимуться інші секції головної сторінки.

get_footer();
