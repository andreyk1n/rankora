<!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
    <meta charset="<?php bloginfo('charset'); ?>">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>
<?php wp_body_open(); ?>

<?php
$header_data = rankora_get_global_data('header');

$logo = $header_data['logo'] ?? [];
$navigation = $header_data['navigation'] ?? [];
$cta = $header_data['cta'] ?? [];
$mobile_menu = $header_data['mobile_menu'] ?? [];
?>

<header class="header">
    <div class="container header__inner">

        <a
            class="logo"
            href="<?php echo esc_url(home_url('/')); ?>"
            aria-label="<?php echo esc_attr($logo['alt'] ?? 'Rankora — на головну'); ?>"
        >
            <?php if (! empty($logo['image'])) : ?>
                <img
                    class="logo__image"
                    src="<?php echo esc_url($logo['image']); ?>"
                    alt="<?php echo esc_attr($logo['alt'] ?? 'Rankora'); ?>"
                >
            <?php else : ?>
                <span class="logo__mark" aria-hidden="true">
                    <svg width="16" height="16" viewBox="0 0 16 16">
                        <path
                            d="M2 12l4-4 3 3 5-7"
                            fill="none"
                            stroke="currentColor"
                            stroke-width="2.2"
                            stroke-linecap="round"
                            stroke-linejoin="round"
                        />
                    </svg>
                </span>

                <?php echo esc_html($logo['text'] ?? 'Rankora'); ?>
            <?php endif; ?>
        </a>

        <nav
            class="nav"
            id="nav"
            aria-label="Головна навігація"
        >
            <ul class="nav__list">
                <?php foreach ($navigation as $item) : ?>
                    <li class="nav__item">
                        <a
                            class="nav__link"
                            href="<?php echo esc_url(home_url($item['url'] ?? '/')); ?>"
                        >
                            <?php echo esc_html($item['label'] ?? ''); ?>
                        </a>
                    </li>
                <?php endforeach; ?>
            </ul>
        </nav>

        <?php if (! empty($cta['label'])) : ?>
            <a
                class="btn btn--primary btn--sm header__cta"
                href="<?php echo esc_url(home_url($cta['url'] ?? '/contacts/')); ?>"
            >
                <?php echo esc_html($cta['label']); ?>
            </a>
        <?php endif; ?>

        <?php if (! empty($mobile_menu['enabled'])) : ?>
            <button
                class="header__burger"
                id="burger"
                type="button"
                aria-label="<?php echo esc_attr($mobile_menu['open_label'] ?? 'Відкрити меню'); ?>"
                aria-controls="nav"
                aria-expanded="false"
            >
                <span aria-hidden="true">☰</span>
            </button>
        <?php endif; ?>

    </div>
</header>
