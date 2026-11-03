<?php

$mission = $args['mission'] ?? [];

if (empty($mission)) {
    return;
}

?>

<section class="section" id="story">
    <div class="container split">

        <div>
            <span class="tag tag--lav">
                <?php echo esc_html($mission['tag'] ?? ''); ?>
            </span>

            <h2 class="section__title" style="margin-top:14px">
                <?php echo esc_html($mission['title'] ?? ''); ?>
            </h2>

            <?php foreach (($mission['paragraphs'] ?? []) as $paragraph): ?>

                <p class="split__text">
                    <?php echo esc_html($paragraph); ?>
                </p>

            <?php endforeach; ?>
        </div>

        <div class="visual" aria-hidden="true">

            <?php foreach (($mission['visuals'] ?? []) as $visual): ?>

                <div class="visual__card visual__card--<?php echo esc_attr($visual['style'] ?? 'l'); ?>">

                    <div class="visual__label">
                        <?php echo esc_html($visual['label'] ?? ''); ?>
                    </div>

                    <div class="visual__value">
                        <?php echo esc_html($visual['value'] ?? ''); ?>
                    </div>

                    <?php if (!empty($visual['chart'])): ?>

                        <svg class="visual__svg" viewBox="0 0 300 50" width="100%" height="50">
                            <path d="M4 44 L50 40 L100 42 L150 28 L200 20 L250 10 L296 4" fill="none" stroke="#6c5ce7"
                                stroke-width="3.5" stroke-linecap="round" stroke-linejoin="round" />
                        </svg>

                    <?php endif; ?>

                </div>

            <?php endforeach; ?>

        </div>

    </div>
</section>