
<?php
$catalog = $args['catalog'] ?? [];
$filters = $catalog['filters'] ?? [];
$services = $catalog['services'] ?? [];
?>
<section class="section" id="catalog">
    <div class="container">
        <div class="section__head">
            <h2 class="section__title"><?php echo esc_html($catalog['title'] ?? ''); ?></h2>
            <p class="section__lead"><?php echo esc_html($catalog['text'] ?? ''); ?></p>
        </div>
        <?php if (!empty($filters)): ?>
            <div class="filter" id="filter" role="group" aria-label="Фільтр послуг">
                <?php foreach ($filters as $filter): ?>
                    <button class="chip<?php echo !empty($filter['active']) ? ' chip--on' : ''; ?>" data-cat="<?php echo esc_attr($filter['slug'] ?? ''); ?>"><?php echo esc_html($filter['label'] ?? ''); ?></button>
                <?php endforeach; ?>
            </div>
        <?php endif; ?>
        <?php if (!empty($services)): ?>
            <div class="grid grid--3" id="list">
                <?php foreach ($services as $service): ?>
                    <article class="card service" data-cat="<?php echo esc_attr($service['category'] ?? ''); ?>">
                        <div class="service__top">
                            <?php if (!empty($service['icon'])): ?>
                                <div class="card__icon<?php echo in_array($service['icon_style'] ?? '', ['lav', 'mint'], true) ? ' card__icon--' . esc_attr($service['icon_style']) : ''; ?>"><?php echo esc_html($service['icon']); ?></div>
                            <?php endif; ?>
                            <?php if (!empty($service['tag'])): ?>
                                <span class="tag<?php echo in_array($service['tag_style'] ?? '', ['sky', 'lav'], true) ? ' tag--' . esc_attr($service['tag_style']) : ''; ?>"><?php echo esc_html($service['tag']); ?></span>
                            <?php endif; ?>
                        </div>
                        <h3 class="card__title"><?php echo esc_html($service['title'] ?? ''); ?></h3>
                        <p class="card__text"><?php echo esc_html($service['text'] ?? ''); ?></p>
                        <?php if (!empty($service['items'])): ?>
                            <ul class="service__list">
                                <?php foreach ($service['items'] as $item): ?>
                                    <li class="service__item"><?php echo esc_html($item); ?></li>
                                <?php endforeach; ?>
                            </ul>
                        <?php endif; ?>
                        <div class="service__foot">
                            <div class="service__price"><?php echo esc_html($service['price_label'] ?? 'від'); ?><strong><?php echo esc_html($service['price'] ?? ''); ?></strong></div>
                            <?php if (!empty($service['url'])): ?>
                                <a class="service__link" href="<?php echo esc_url($service['url']); ?>"><?php echo esc_html($service['link_text'] ?? 'Детальніше →'); ?></a>
                            <?php endif; ?>
                        </div>
                    </article>
                <?php endforeach; ?>
            </div>
        <?php endif; ?>
    </div>
</section>