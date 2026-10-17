
<?php
$services = $args['services'] ?? [];
$items = $services['items'] ?? [];
?>

<?php if (! empty($items)) : ?>
    <section class="section section--tint" id="services">
        <div class="container">

            <div class="section__head">
                <?php if (! empty($services['title'])) : ?>
                    <h2 class="section__title">
                        <?php echo esc_html($services['title']); ?>
                    </h2>
                <?php endif; ?>

                <?php if (! empty($services['lead'])) : ?>
                    <p class="section__lead">
                        <?php echo esc_html($services['lead']); ?>
                    </p>
                <?php endif; ?>
            </div>

            <div class="grid grid--3">
                <?php foreach ($items as $service) : ?>
                    <article class="card service">

                        <?php if (! empty($service['title'])) : ?>
                            <h3 class="card__title">
                                <?php echo esc_html($service['title']); ?>
                            </h3>
                        <?php endif; ?>

                        <?php if (! empty($service['text'])) : ?>
                            <p class="card__text">
                                <?php echo esc_html($service['text']); ?>
                            </p>
                        <?php endif; ?>

                        <?php if (! empty($service['features'])) : ?>
                            <ul class="service__list">
                                <?php foreach ($service['features'] as $feature) : ?>
                                    <li class="service__item">
                                        <?php echo esc_html($feature); ?>
                                    </li>
                                <?php endforeach; ?>
                            </ul>
                        <?php endif; ?>

                        <?php if (! empty($service['link_label'])) : ?>
                            <a
                                class="service__link"
                                href="<?php echo esc_url(home_url($service['url'] ?? '/contacts/')); ?>"
                            >
                                <?php echo esc_html($service['link_label']); ?>
                            </a>
                        <?php endif; ?>

                    </article>
                <?php endforeach; ?>
            </div>

        </div>
    </section>
<?php endif; ?>
