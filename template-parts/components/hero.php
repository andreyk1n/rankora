
<?php
$hero = $args['hero'] ?? [];

$actions = $hero['actions'] ?? [];
$stats = $hero['stats'] ?? [];
$chart = $hero['chart'] ?? [];

$slug = is_front_page() ? 'home' : (get_post_field('post_name', get_queried_object_id()) ?: 'default');
?>

<section class="hero hero--<?php echo esc_attr($slug); ?>">
    <div class="container hero__inner">
        <div class="hero__content">
            <?php if (! empty($hero['tag'])) : ?>
                <span class="tag"><?php echo esc_html($hero['tag']); ?></span>
            <?php endif; ?>

            <?php if (! empty($hero['title'])) : ?>
                <h1 class="hero__title"><?php echo esc_html($hero['title']); ?></h1>
            <?php endif; ?>

            <?php if (! empty($hero['text'])) : ?>
                <p class="hero__text"><?php echo esc_html($hero['text']); ?></p>
            <?php endif; ?>

            <?php if (! empty($actions)) : ?>
                <div class="hero__actions">
                    <?php foreach ($actions as $action) :
                        $style = $action['style'] ?? 'primary';
                        $allowed_styles = ['primary', 'ghost'];

                        if (! in_array($style, $allowed_styles, true)) {
                            $style = 'primary';
                        }
                    ?>
                        <a
                            class="btn btn--<?php echo esc_attr($style); ?>"
                            href="<?php echo esc_url(home_url($action['url'] ?? '/')); ?>"
                        ><?php echo esc_html($action['label'] ?? ''); ?></a>
                    <?php endforeach; ?>
                </div>
            <?php endif; ?>

            <?php if ($slug === 'home' && ! empty($stats)) : ?>
                <div class="hero__stats">
                    <?php foreach ($stats as $stat) : ?>
                        <div class="hero__stat">
                            <div class="hero__stat-value"><?php echo esc_html($stat['value'] ?? ''); ?></div>
                            <div class="hero__stat-label"><?php echo esc_html($stat['label'] ?? ''); ?></div>
                        </div>
                    <?php endforeach; ?>
                </div>
            <?php endif; ?>
        </div>

        <?php if ($slug !== 'home' && ! empty($stats)) : ?>
                <div class="hero__stats">
                    <?php foreach ($stats as $stat) : ?>
                        <div class="hero__stat">
                            <div class="hero__stat-value"><?php echo esc_html($stat['value'] ?? ''); ?></div>
                            <div class="hero__stat-label"><?php echo esc_html($stat['label'] ?? ''); ?></div>
                        </div>
                    <?php endforeach; ?>
                </div>
            <?php endif; ?>

        <?php if ($slug === 'home' && ! empty($chart)) : ?>
            <div class="chart">
                <div class="chart__head">
                    <div>
                        <div class="chart__title"><?php echo esc_html($chart['title'] ?? ''); ?></div>
                        <div class="chart__sub"><?php echo esc_html($chart['subtitle'] ?? ''); ?></div>
                    </div>
                    <?php if (! empty($chart['badge'])) : ?>
                        <span class="chart__badge"><?php echo esc_html($chart['badge']); ?></span>
                    <?php endif; ?>
                </div>

                <svg class="chart__svg" viewBox="0 0 520 300" role="img" aria-label="<?php echo esc_attr($chart['title'] ?? 'Графік зростання органічного трафіку'); ?>">
                    <defs>
                        <linearGradient id="hero-chart-area" x1="0" y1="0" x2="0" y2="1">
                            <stop offset="0" stop-color="#6c5ce7" stop-opacity=".28"/>
                            <stop offset="1" stop-color="#6c5ce7" stop-opacity="0"/>
                        </linearGradient>
                        <linearGradient id="hero-chart-line" x1="0" x2="1">
                            <stop offset="0" stop-color="#7fb7ee"/>
                            <stop offset="1" stop-color="#6c5ce7"/>
                        </linearGradient>
                    </defs>
                    <g stroke="#e3e5ea" stroke-dasharray="4 6">
                        <line x1="0" x2="520" y1="60" y2="60"/>
                        <line x1="0" x2="520" y1="120" y2="120"/>
                        <line x1="0" x2="520" y1="180" y2="180"/>
                        <line x1="0" x2="520" y1="240" y2="240"/>
                    </g>
                    <path d="M16 268.8 L60.4 262.5 L104.7 265.7 L149.1 249.9 L193.5 230.9 L237.8 211.9 L282.2 186.7 L326.5 158.2 L370.9 123.5 L415.3 98.2 L459.6 57.1 L504 16 L504 300 L16 300 Z" fill="url(#hero-chart-area)"/>
                    <path d="M16 268.8 L60.4 262.5 L104.7 265.7 L149.1 249.9 L193.5 230.9 L237.8 211.9 L282.2 186.7 L326.5 158.2 L370.9 123.5 L415.3 98.2 L459.6 57.1 L504 16" fill="none" stroke="url(#hero-chart-line)" stroke-width="4" stroke-linecap="round" stroke-linejoin="round"/>
                    <circle cx="504" cy="16" r="7" fill="#fff" stroke="#6c5ce7" stroke-width="3"/>
                </svg>

                <div class="chart__float">
                    <div class="chart__float-value"><?php echo esc_html($chart['highlight_value'] ?? ''); ?></div>
                    <div class="chart__float-label"><?php echo esc_html($chart['highlight_label'] ?? ''); ?></div>
                </div>
            </div>
        <?php endif; ?>
    </div>
</section>
