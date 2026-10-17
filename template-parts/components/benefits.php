<?php
$benefits = $args['benefits'] ?? [];

$items = $benefits['items'] ?? [];

$allowed_styles = ['sky', 'lav', 'mint'];
?>

<?php if (!empty($items)): ?>
    <section class="section" id="benefits">
        <div class="container">

            <div class="section__head">
                <?php if (!empty($benefits['title'])): ?>
                    <h2 class="section__title">
                        <?php echo esc_html($benefits['title']); ?>
                    </h2>
                <?php endif; ?>

                <?php if (!empty($benefits['lead'])): ?>
                    <p class="section__lead">
                        <?php echo esc_html($benefits['lead']); ?>
                    </p>
                <?php endif; ?>
            </div>

            <div class="grid grid--4">
                <?php foreach ($items as $item): ?>
                    <?php
                    $style = $item['style'] ?? 'sky';

                    if (!in_array($style, $allowed_styles, true)) {
                        $style = 'sky';
                    }
                    ?>

                    <article class="card card--<?php echo esc_attr($style); ?>">

                        <?php if (!empty($item['icon'])): ?>
                            <div class="card__icon" aria-hidden="true">
                                <?php echo esc_html($item['icon']); ?>
                            </div>
                        <?php endif; ?>

                        <?php if (!empty($item['title'])): ?>
                            <h3 class="card__title">
                                <?php echo esc_html($item['title']); ?>
                            </h3>
                        <?php endif; ?>

                        <?php if (!empty($item['text'])): ?>
                            <p class="card__text">
                                <?php echo esc_html($item['text']); ?>
                            </p>
                        <?php endif; ?>

                    </article>
                <?php endforeach; ?>
            </div>

        </div>
    </section>
<?php endif; ?>