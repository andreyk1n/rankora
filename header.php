<!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
    <meta charset="<?php bloginfo('charset'); ?>">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>
<?php wp_body_open(); ?>

<header class="header">
    <div class="container header__inner">
        <a class="logo" href="#top"><span class="logo__mark"><svg width="16" height="16" viewBox="0 0 16 16"
                    aria-hidden="true">
                    <path d="M2 12l4-4 3 3 5-7" fill="none" stroke="#23262b" stroke-width="2.2" stroke-linecap="round"
                        stroke-linejoin="round" />
                </svg></span>Rankora</a>
        <nav class="nav" id="nav" aria-label="Головна навігація">
            <ul class="nav__list">
                <li class="nav__item"><a class="nav__link" href="#services">Послуги</a></li>
                <li class="nav__item"><a class="nav__link" href="#cases">Кейси</a></li>
                <li class="nav__item"><a class="nav__link" href="#blog">Блог</a></li>
                <li class="nav__item"><a class="nav__link" href="#about">Про нас</a></li>
                <li class="nav__item"><a class="nav__link" href="#contact">Контакти</a></li>
            </ul>
        </nav>
        <a class="btn btn--primary btn--sm header__cta" href="#contact">Обговорити проєкт</a>
        <button class="header__burger" id="burger" aria-label="Відкрити меню" aria-expanded="false">☰</button>
    </div>
</header>