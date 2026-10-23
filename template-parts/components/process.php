
<?php
$process = $args['process'] ?? [];
$steps = $process['steps'] ?? [];
?>

<section class="section section--tint" id="process">
    <div class="container">
        <div class="section__head">
            <h2 class="section__title"><?php echo esc_html($process['title'] ?? ''); ?></h2>
            <p class="section__lead"><?php echo esc_html($process['lead'] ?? ''); ?></p>
        </div>
        <ol class="steps">
            <?php foreach ($steps as $i => $step): ?>
                <li class="step">
                    <span class="step__num"><?php echo esc_html($i + 1); ?></span>
                    <h3 class="step__title"><?php echo esc_html($step['title'] ?? ''); ?></h3>
                    <p class="step__text"><?php echo esc_html($step['text'] ?? ''); ?></p>
                </li>
            <?php endforeach; ?>
        </ol>
    </div>
</section>
