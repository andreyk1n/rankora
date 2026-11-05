<?php
$included = $args['included'] ?? [];
?>

<section class="section" id="included">
    <div class="container">

        <div class="section__head">
            <h2 class="section__title"><?php echo esc_html($included['title'] ?? ''); ?></h2>
            <p class="section__lead"><?php echo esc_html($included['description'] ?? ''); ?></p>
        </div>

        <div class="grid grid--3">

            <?php foreach ($included['items'] ?? [] as $item) : ?>

                <article class="card card--<?php echo esc_attr($item['style'] ?? 'sky'); ?>">
                    <span class="card__check">✓</span>
                    <h3 class="card__title"><?php echo esc_html($item['title'] ?? ''); ?></h3>
                    <p class="card__text"><?php echo esc_html($item['text'] ?? ''); ?></p>
                </article>

            <?php endforeach; ?>

        </div>
    </div>
</section>