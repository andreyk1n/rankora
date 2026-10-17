<?php

$faq = $args['faq'] ?? [];

if (empty($faq['items']) || !is_array($faq['items'])) {
    return;
}

?>

<section class="section section--tint" id="faq">
    <div class="container">

        <div class="section__head">
            <h2 class="section__title">
                <?php echo esc_html($faq['title'] ?? 'Часті запитання'); ?>
            </h2>

            <?php if (!empty($faq['lead'])): ?>
                <p class="section__lead">
                    <?php echo esc_html($faq['lead']); ?>
                </p>
            <?php endif; ?>
        </div>

        <div class="faq">

            <?php foreach ($faq['items'] as $item): ?>
                <details class="faq__item" <?php echo !empty($item['open']) ? 'open' : ''; ?>>
                    <summary class="faq__q">
                        <?php echo esc_html($item['question'] ?? ''); ?>
                    </summary>

                    <p class="faq__a">
                        <?php echo esc_html($item['answer'] ?? ''); ?>
                    </p>
                </details>
            <?php endforeach; ?>

        </div>
    </div>
</section>