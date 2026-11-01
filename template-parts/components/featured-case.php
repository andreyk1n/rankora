<?php
$featured = $args['featured'] ?? [];
?>

<section class="section">
    <div class="container">
        <div class="featured-case">
            <div class="featured-case__content">
                <div class="featured-case__top">
                    <span class="tag tag--lav"><?php echo esc_html($featured['tag'] ?? ''); ?></span>
                    <span class="tag tag--sky"><?php echo esc_html($featured['category'] ?? ''); ?></span>
                </div>

                <h2 class="featured-case__title"><?php echo esc_html($featured['title'] ?? ''); ?></h2>
                <p class="featured-case__text"><?php echo esc_html($featured['text'] ?? ''); ?></p>

                <div class="featured-case__stats">
                    <?php foreach ($featured['stats'] ?? [] as $stat) : ?>
                        <div class="featured-case__stat">
                            <div class="featured-case__value"><?php echo esc_html($stat['value'] ?? ''); ?></div>
                            <div class="featured-case__label"><?php echo esc_html($stat['label'] ?? ''); ?></div>
                        </div>
                    <?php endforeach; ?>
                </div>
            </div>

            <div class="featured-case__chart">
                <div class="featured-case__chart-heading">
                    <span><?php echo esc_html($featured['chart']['title'] ?? ''); ?></span>
                    <span><?php echo esc_html($featured['chart']['description'] ?? ''); ?></span>
                </div>

                <svg class="featured-case__spark" viewBox="0 0 300 120" preserveAspectRatio="none" aria-hidden="true">
                    <?php
                    $values = $featured['chart']['values'] ?? [];
                    $count = count($values);
                    $points = [];

                    foreach ($values as $index => $value) {
                        $x = $count > 1 ? 6 + ($index * 288 / ($count - 1)) : 150;
                        $y = 110 - ((float) $value / 100 * 100);
                        $points[] = round($x, 2) . ',' . round($y, 2);
                    }

                    $line = implode(' ', $points);
                    $area = $count ? '6,120 ' . $line . ' 294,120' : '';
                    ?>

                    <?php if ($count) : ?>
                        <polygon points="<?php echo esc_attr($area); ?>" fill="#6c5ce7" fill-opacity=".12"/>
                        <polyline points="<?php echo esc_attr($line); ?>" fill="none" stroke="#6c5ce7" stroke-width="3" stroke-linecap="round" stroke-linejoin="round" vector-effect="non-scaling-stroke"/>
                    <?php endif; ?>
                </svg>
            </div>
        </div>
    </div>
</section>