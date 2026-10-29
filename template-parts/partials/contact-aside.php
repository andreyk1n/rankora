
<?php $contact = $args['contact'] ?? []; ?>

<aside class="aside">
    <div class="panel">
        <h2 class="panel__title" style="font-size:20px"><?php echo esc_html($contact['title'] ?? 'Контактна інформація'); ?></h2>
        <div class="info" style="margin-top:18px">
            <?php foreach ($contact['items'] ?? [] as $item): ?>
                <div class="info__row">
                    <span class="info__ico"><?php echo esc_html($item['icon'] ?? ''); ?></span>
                    <div>
                        <div class="info__label"><?php echo esc_html($item['label'] ?? ''); ?></div>
                        <div class="info__value"><?php echo esc_html($item['value'] ?? ''); ?></div>
                    </div>
                </div>
            <?php endforeach; ?>
        </div>
        <div class="hours">
            <?php foreach ($contact['hours'] ?? [] as $hour): ?>
                <div class="hours__row<?php echo !empty($hour['off']) ? ' hours__row--off' : ''; ?>">
                    <span><?php echo esc_html($hour['day'] ?? ''); ?></span>
                    <span><?php echo esc_html($hour['time'] ?? ''); ?></span>
                </div>
            <?php endforeach; ?>
        </div>
    </div>
    <div class="map" id="map" role="img" aria-label="<?php echo esc_attr($contact['map_label'] ?? 'Карта офісу'); ?>">
        <span class="map__pin"></span>
        <span class="map__label"><?php echo esc_html($contact['map_title'] ?? ''); ?></span>
    </div>
    <div class="social">
        <?php foreach ($contact['socials'] ?? [] as $social): ?>
            <a class="social__link" href="<?php echo esc_url($social['url'] ?? '#'); ?>"><?php echo esc_html($social['label'] ?? ''); ?></a>
        <?php endforeach; ?>
    </div>
</aside>
