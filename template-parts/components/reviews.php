<?php

$reviews = $args['reviews'] ?? [];

if (empty($reviews['items']) || !is_array($reviews['items'])) {
    return;
}

?>

<section class="section section--tint" id="reviews">
    <div class="container">

        <div class="section__head">
            <h2 class="section__title">
                <?php echo esc_html($reviews['title'] ?? 'Відгуки клієнтів'); ?>
            </h2>

            <?php if (!empty($reviews['lead'])) : ?>
                <p class="section__lead">
                    <?php echo esc_html($reviews['lead']); ?>
                </p>
            <?php endif; ?>
        </div>

        <div class="grid grid--3">

            <?php foreach ($reviews['items'] as $review) : ?>
                <?php
                $rating = max(1, min(5, (int) ($review['rating'] ?? 5)));
                ?>

                <figure class="card quote">

                    <div
                        class="quote__stars"
                        aria-label="<?php echo esc_attr(sprintf('Оцінка %d з 5', $rating)); ?>"
                    ><?php echo esc_html(str_repeat('★', $rating)); ?></div>

                    <blockquote class="quote__text">
                        <?php echo esc_html($review['text'] ?? ''); ?>
                    </blockquote>

                    <figcaption class="quote__author">

                        <span class="quote__avatar">
                            <?php echo esc_html($review['initials'] ?? ''); ?>
                        </span>

                        <span>
                            <div class="quote__name">
                                <?php echo esc_html($review['name'] ?? ''); ?>
                            </div>

                            <div class="quote__role">
                                <?php echo esc_html($review['role'] ?? ''); ?>
                            </div>
                        </span>

                    </figcaption>

                </figure>
            <?php endforeach; ?>

        </div>
    </div>
</section>