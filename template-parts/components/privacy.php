
<?php $privacy = $args['privacy'] ?? []; ?>

<section class="section">
    <div class="container container--narrow">
        <h1 class="page__title"><?php echo esc_html($privacy['title'] ?? ''); ?></h1>
        <p class="page__date"><?php echo esc_html($privacy['date'] ?? ''); ?></p>
        <p class="page__lead"><?php echo esc_html($privacy['lead'] ?? ''); ?></p>
        <hr class="page__rule">
        <div class="text">
            <?php foreach ($privacy['sections'] ?? [] as $section) : ?>
                <h2 class="text__h2"><?php echo esc_html($section['title'] ?? ''); ?></h2>
                <?php foreach ($section['paragraphs'] ?? [] as $paragraph) : ?>
                    <p><?php echo wp_kses_post($paragraph); ?></p>
                <?php endforeach; ?>
                <?php if (!empty($section['list'])) : ?>
                    <ul class="text__list">
                        <?php foreach ($section['list'] as $item) : ?>
                            <li><?php echo wp_kses_post($item); ?></li>
                        <?php endforeach; ?>
                    </ul>
                <?php endif; ?>
            <?php endforeach; ?>
        </div>
    </div>
</section>
