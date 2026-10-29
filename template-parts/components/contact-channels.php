<?php $channels = $args['channels'] ?? []; ?>

<section class="section" style="padding-top:24px">
    <div class="container">
        <div class="grid grid--4">
            <?php foreach ($channels as $channel): ?>
                <a class="channel" href="<?php echo esc_url($channel['url'] ?? '#'); ?>">
                    <span class="channel__icon<?php echo !empty($channel['style']) ? ' channel__icon--' . esc_attr($channel['style']) : ''; ?>"><?php echo esc_html($channel['icon'] ?? ''); ?></span>
                    <span class="channel__label"><?php echo esc_html($channel['label'] ?? ''); ?></span>
                    <span class="channel__value"><?php echo esc_html($channel['value'] ?? ''); ?></span>
                    <span class="channel__hint"><?php echo esc_html($channel['hint'] ?? ''); ?></span>
                    <span class="channel__go"><?php echo esc_html($channel['action'] ?? ''); ?> →</span>
                </a>
            <?php endforeach; ?>
        </div>
    </div>
</section>
