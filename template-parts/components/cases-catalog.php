<?php
$catalog = $args['catalog'] ?? [];
?>

<section class="section" id="catalog">
    <div class="container">
        <div class="filter" id="filter" role="group" aria-label="Фільтр кейсів">
            <?php foreach ($catalog['filters'] ?? [] as $filter) : ?>
                <button class="chip <?php echo !empty($filter['active']) ? 'chip--on' : ''; ?>" data-cat="<?php echo esc_attr($filter['slug'] ?? ''); ?>">
                    <?php echo esc_html($filter['label'] ?? ''); ?>
                </button>
            <?php endforeach; ?>
        </div>

        <div class="grid grid--3" id="list">
            <?php foreach ($catalog['cases'] ?? [] as $case) : ?>
                <article class="card case case--<?php echo esc_attr($case['style'] ?? 'sky'); ?>" data-cat="<?php echo esc_attr($case['category'] ?? ''); ?>">
                    <div class="case__top">
                        <span class="tag <?php echo ($case['style'] ?? '') === 'sky' ? 'tag--sky' : (($case['style'] ?? '') === 'lav' ? 'tag--lav' : ''); ?>">
                            <?php echo esc_html($case['tag'] ?? ''); ?>
                        </span>
                        <span class="case__period"><?php echo esc_html($case['period'] ?? ''); ?></span>
                    </div>

                    <h3 class="case__title"><?php echo esc_html($case['title'] ?? ''); ?></h3>
                    <p class="case__sub"><?php echo esc_html($case['subtitle'] ?? ''); ?></p>

                    <div class="case__value"><?php echo esc_html($case['value'] ?? ''); ?></div>
                    <div class="case__label"><?php echo esc_html($case['label'] ?? ''); ?></div>

                    <?php
                    $values = $case['chart'] ?? [];
                    $count = count($values);
                    $points = [];

                    foreach ($values as $index => $value) {
                        $x = $count > 1 ? 6 + ($index * 288 / ($count - 1)) : 150;
                        $y = 74 - ((float) $value / 100 * 68);
                        $points[] = round($x, 2) . ',' . round($y, 2);
                    }

                    $line = implode(' ', $points);
                    $area = $count ? '6,80 ' . $line . ' 294,80' : '';
                    ?>

                    <?php if ($count) : ?>
                        <svg class="case__spark" viewBox="0 0 300 80" preserveAspectRatio="none" aria-hidden="true">
                            <polygon points="<?php echo esc_attr($area); ?>" fill="#6c5ce7" fill-opacity=".12"/>
                            <polyline points="<?php echo esc_attr($line); ?>" fill="none" stroke="#6c5ce7" stroke-width="3" stroke-linecap="round" stroke-linejoin="round" vector-effect="non-scaling-stroke"/>
                        </svg>
                    <?php endif; ?>

                    <p class="case__text"><?php echo esc_html($case['text'] ?? ''); ?></p>

                    <?php if (!empty($case['works'])) : ?>
                        <ul class="case__works">
                            <?php foreach ($case['works'] as $work) : ?>
                                <li class="case__work"><?php echo esc_html($work); ?></li>
                            <?php endforeach; ?>
                        </ul>
                    <?php endif; ?>
                </article>
            <?php endforeach; ?>
        </div>
    </div>
</section>