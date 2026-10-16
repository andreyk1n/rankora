
<?php

return [
    'logo' => [
        'text' => 'Rankora',
        'url' => '/',
        'image' => '', // Шлях до логотипа, якщо буде зображення
        'alt' => 'Rankora — SEO-агенція',
    ],

    'navigation' => [
        [
            'label' => 'Послуги',
            'url' => '/services/',
        ],
        [
            'label' => 'Кейси',
            'url' => '/cases/',
        ],
        [
            'label' => 'Про нас',
            'url' => '/about/',
        ],
        [
            'label' => 'Блог',
            'url' => '/blog/',
        ],
        [
            'label' => 'Контакти',
            'url' => '/contacts/',
        ],
    ],

    'cta' => [
        'label' => 'Обговорити проєкт',
        'url' => '/contacts/',
        'style' => 'primary',
    ],

    'mobile_menu' => [
        'enabled' => true,
        'open_label' => 'Відкрити меню',
        'close_label' => 'Закрити меню',
    ],

    'settings' => [
        'sticky' => true,
        'transparent' => false,
    ],
];
