<?php

$cases = $args['cases'] ?? [];

if (empty($cases['items']) || !is_array($cases['items'])) {
    return;
}

$allowed_styles = ['sky', 'mint', 'lav'];

?>

<section class="section section--tint" id="cases">
    <div class="container">

        <div class="section__head">
            <h2 class="section__title">
                <?php echo esc_html($cases['title'] ?? 'Кейси'); ?>
            </h2>

            <?php if (!empty($cases['lead'])) : ?>
                <p class="section__lead">
                    <?php echo esc_html($cases['lead']); ?>
                </p>
            <?php endif; ?>
        </div>

        <div class="grid grid--3">

            <?php foreach ($cases['items'] as $case) : ?>
                <?php
                $style = $case['style'] ?? 'sky';

                if (!in_array($style, $allowed_styles, true)) {
                    $style = 'sky';
                }

                $chart = $case['chart'] ?? '';
                ?>

                <article class="card card--<?php echo esc_attr($style); ?> case">

                    <?php if (!empty($case['category'])) : ?>
                        <span class="tag case__tag">
                            <?php echo esc_html($case['category']); ?>
                        </span>
                    <?php endif; ?>

                    <h3 class="card__title">
                        <?php echo esc_html($case['title'] ?? ''); ?>
                    </h3>

                    <div class="case__value">
                        <?php echo esc_html($case['value'] ?? ''); ?>
                    </div>

                    <div class="case__label">
                        <?php echo esc_html($case['label'] ?? ''); ?>
                    </div>

                    <?php if ($chart !== '') : ?>
                        <svg
                            class="case__spark"
                            viewBox="0 0 300 80"
                            preserveAspectRatio="none"
                            aria-hidden="true"
                        >
                            <path
                                d="<?php echo esc_attr($chart . ' L294 80 L6 80 Z'); ?>"
                                fill="#6c5ce7"
                                fill-opacity=".12"
                            />

                            <path
                                d="<?php echo esc_attr($chart); ?>"
                                fill="none"
                                stroke="#6c5ce7"
                                stroke-width="3"
                                stroke-linecap="round"
                                stroke-linejoin="round"
                                vector-effect="non-scaling-stroke"
                            />
                        </svg>
                    <?php endif; ?>

                    <?php if (!empty($case['works']) && is_array($case['works'])) : ?>
                        <ul class="case__works">
                            <?php foreach ($case['works'] as $work) : ?>
                                <li class="case__work">
                                    <?php echo esc_html($work); ?>
                                </li>
                            <?php endforeach; ?>
                        </ul>
                    <?php endif; ?>

                </article>
            <?php endforeach; ?>

        </div>
    </div>
</section>