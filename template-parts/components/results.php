<?php

$results = $args['results'] ?? [];

if (empty($results)) {
    return;
}

?>

<section class="section section--tint" id="results">
    <div class="container">

        <div class="section__head">
            <h2 class="section__title">
                <?php echo esc_html($results['title'] ?? ''); ?>
            </h2>

            <p class="section__lead">
                <?php echo esc_html($results['description'] ?? ''); ?>
            </p>
        </div>

        <div class="grid grid--4">

            <?php foreach (($results['items'] ?? []) as $item) : ?>

                <div class="kpi">
                    <div class="kpi__value">
                        <?php echo esc_html($item['value'] ?? ''); ?>
                    </div>

                    <div class="kpi__label">
                        <?php echo esc_html($item['label'] ?? ''); ?>
                    </div>
                </div>

            <?php endforeach; ?>

        </div>

    </div>
</section>