<?php

$principles = $args['principles'] ?? [];

if (empty($principles)) {
    return;
}

?>

<section class="section" id="principles">
    <div class="container">

        <div class="section__head">
            <h2 class="section__title">
                <?php echo esc_html($principles['title'] ?? ''); ?>
            </h2>

            <p class="section__lead">
                <?php echo esc_html($principles['description'] ?? ''); ?>
            </p>
        </div>

        <div class="grid grid--4">

            <?php foreach (($principles['items'] ?? []) as $item): ?>

                <article class="card card--<?php echo esc_attr($item['style'] ?? 'sky'); ?>">
                    <span class="card__num">
                        <?php echo esc_html($item['number'] ?? ''); ?>
                    </span>

                    <h3 class="card__title">
                        <?php echo esc_html($item['title'] ?? ''); ?>
                    </h3>

                    <p class="card__text">
                        <?php echo esc_html($item['text'] ?? ''); ?>
                    </p>
                </article>

            <?php endforeach; ?>

        </div>

    </div>
</section>