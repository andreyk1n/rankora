
<?php
$process = $args['process'] ?? [];
$steps = $process['steps'] ?? [];
?>

<?php if (! empty($steps)) : ?>
    <section class="section" id="process">
        <div class="container">

            <div class="section__head">
                <?php if (! empty($process['title'])) : ?>
                    <h2 class="section__title">
                        <?php echo esc_html($process['title']); ?>
                    </h2>
                <?php endif; ?>

                <?php if (! empty($process['lead'])) : ?>
                    <p class="section__lead">
                        <?php echo esc_html($process['lead']); ?>
                    </p>
                <?php endif; ?>
            </div>

            <ol class="process">
                <?php foreach ($steps as $step) : ?>
                    <li class="process__step">

                        <span class="process__num">
                            <?php echo esc_html($step['number'] ?? ''); ?>
                        </span>

                        <?php if (! empty($step['title'])) : ?>
                            <h3 class="process__title">
                                <?php echo esc_html($step['title']); ?>
                            </h3>
                        <?php endif; ?>

                        <?php if (! empty($step['text'])) : ?>
                            <p class="process__text">
                                <?php echo esc_html($step['text']); ?>
                            </p>
                        <?php endif; ?>

                    </li>
                <?php endforeach; ?>
            </ol>

        </div>
    </section>
<?php endif; ?>
