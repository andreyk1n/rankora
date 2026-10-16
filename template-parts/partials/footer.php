
<?php
$footer_data = rankora_get_global_data('footer');

$site_name = get_bloginfo('name') ?: 'Rankora';
$logo = rankora_get_global_data('header')['logo'] ?? [];
?>

<footer class="footer">
    <div class="container">

        <div class="footer__grid">

            <!-- Про агенцію -->
            <div>
                <a class="logo" href="<?php echo esc_url(home_url('/')); ?>">
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

                    <?php echo esc_html($logo['text'] ?? $site_name); ?>
                </a>

                <?php if (! empty($footer_data['about'])) : ?>
                    <p class="footer__about">
                        <?php echo esc_html($footer_data['about']); ?>
                    </p>
                <?php endif; ?>

                <?php if (! empty($footer_data['socials'])) : ?>
                    <div class="footer__social">
                        <?php foreach ($footer_data['socials'] as $social) : ?>
                            <?php if (! empty($social['url'])) : ?>
                                <a
                                    class="footer__social-link"
                                    href="<?php echo esc_url($social['url']); ?>"
                                    aria-label="<?php echo esc_attr($social['label']); ?>"
                                    target="_blank"
                                    rel="noopener noreferrer"
                                >
                                    <?php echo esc_html($social['text']); ?>
                                </a>
                            <?php endif; ?>
                        <?php endforeach; ?>
                    </div>
                <?php endif; ?>
            </div>

            <!-- Навігація -->
            <div>
                <h3 class="footer__title">Навігація</h3>

                <ul class="footer__list">
                    <?php foreach (($footer_data['navigation'] ?? []) as $item) : ?>
                        <li>
                            <a
                                class="footer__link"
                                href="<?php echo esc_url(home_url($item['url'] ?? '/')); ?>"
                            >
                                <?php echo esc_html($item['label'] ?? ''); ?>
                            </a>
                        </li>
                    <?php endforeach; ?>
                </ul>
            </div>

            <!-- Послуги -->
            <div>
                <h3 class="footer__title">Послуги</h3>

                <ul class="footer__list">
                    <?php foreach (($footer_data['services'] ?? []) as $service) : ?>
                        <li>
                            <a
                                class="footer__link"
                                href="<?php echo esc_url(home_url($service['url'] ?? '/')); ?>"
                            >
                                <?php echo esc_html($service['label'] ?? ''); ?>
                            </a>
                        </li>
                    <?php endforeach; ?>
                </ul>
            </div>

            <!-- Контакти -->
            <div>
                <h3 class="footer__title">Контакти</h3>

                <ul class="footer__list">
                    <?php if (! empty($footer_data['contacts']['email'])) : ?>
                        <li>
                            <a
                                class="footer__link"
                                href="<?php echo esc_url($footer_data['contacts']['email']['url']); ?>"
                            >
                                <?php echo esc_html($footer_data['contacts']['email']['label']); ?>
                            </a>
                        </li>
                    <?php endif; ?>

                    <?php if (! empty($footer_data['contacts']['phone'])) : ?>
                        <li>
                            <a
                                class="footer__link"
                                href="<?php echo esc_url($footer_data['contacts']['phone']['url']); ?>"
                            >
                                <?php echo esc_html($footer_data['contacts']['phone']['label']); ?>
                            </a>
                        </li>
                    <?php endif; ?>

                    <?php if (! empty($footer_data['contacts']['address'])) : ?>
                        <li>
                            <?php echo esc_html($footer_data['contacts']['address']); ?>
                        </li>
                    <?php endif; ?>
                </ul>
            </div>

        </div>

        <!-- Нижня частина -->
        <div class="footer__bottom">
            <span>
                © <?php echo esc_html(wp_date('Y')); ?>
                <?php echo esc_html($site_name); ?>.
                <?php echo esc_html($footer_data['copyright'] ?? 'Усі права захищено.'); ?>
            </span>

            <div class="footer__legal">
                <?php foreach (($footer_data['legal'] ?? []) as $item) : ?>
                    <a
                        class="footer__link"
                        href="<?php echo esc_url(home_url($item['url'] ?? '/')); ?>"
                    >
                        <?php echo esc_html($item['label'] ?? ''); ?>
                    </a>
                <?php endforeach; ?>
            </div>
        </div>

    </div>
</footer>
