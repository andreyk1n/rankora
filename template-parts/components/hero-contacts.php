
<?php
$hero = $args['hero'] ?? [];
?>

<section class="hero">
    <div class="container">
        <nav class="crumbs" aria-label="Хлібні крихти">
            <a class="crumbs__item" href="<?php echo esc_url(home_url('/')); ?>">Головна</a> /
            <span class="crumbs__item crumbs__item--cur"><?php echo esc_html($hero['current'] ?? ''); ?></span>
        </nav>
        <h1 class="hero__title"><?php echo esc_html($hero['title'] ?? ''); ?></h1>
        <p class="hero__text"><?php echo esc_html($hero['text'] ?? ''); ?></p>
        <?php if (!empty($hero['status'])): ?>
            <span class="hero__status"><span class="hero__dot"></span><?php echo esc_html($hero['status']); ?></span>
        <?php endif; ?>
    </div>
</section>
