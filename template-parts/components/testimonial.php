<?php

$testimonial = $args['testimonial'] ?? [];

if (empty($testimonial)) {
    return;
}

$rating = (int) ($testimonial['rating'] ?? 5);

?>

<section class="section" id="review">
    <div class="container">
        <figure class="quote">

            <div class="quote__ava">
                <?php echo esc_html($testimonial['avatar'] ?? ''); ?>
            </div>

            <div>
                <div
                    class="quote__stars"
                    aria-label="<?php echo esc_attr(sprintf('Оцінка %d з 5', $rating)); ?>"
                >
                    <?php echo esc_html(str_repeat('★', $rating)); ?>
                </div>

                <blockquote class="quote__text">
                    «<?php echo esc_html($testimonial['text'] ?? ''); ?>»
                </blockquote>

                <figcaption>
                    <div class="quote__name">
                        <?php echo esc_html($testimonial['author'] ?? ''); ?>
                    </div>

                    <div class="quote__role">
                        <?php echo esc_html($testimonial['position'] ?? ''); ?>
                    </div>
                </figcaption>
            </div>

        </figure>
    </div>
</section>