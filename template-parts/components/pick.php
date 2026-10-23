
<?php
$pick = $args['pick'] ?? [];
$items = $pick['items'] ?? [];
?>

<section class="section section--tint" id="pick">
    <div class="container">
        <div class="section__head">
            <h2 class="section__title"><?php echo esc_html($pick['title'] ?? ''); ?></h2>
            <p class="section__lead"><?php echo esc_html($pick['lead'] ?? ''); ?></p>
        </div>
        <div class="grid grid--4">
            <?php foreach ($items as $item): ?>
                <a class="pick" href="<?php echo esc_url($item['url'] ?? '#'); ?>">
                    <span class="pick__q"><?php echo esc_html($item['question'] ?? ''); ?></span>
                    <h3 class="pick__title"><?php echo esc_html($item['title'] ?? ''); ?></h3>
                    <span class="pick__go"><?php echo esc_html($item['service'] ?? ''); ?> →</span>
                </a>
            <?php endforeach; ?>
        </div>
    </div>
</section>
