<?php
$team = $args['team'] ?? [];
?>

<section class="section section--tint" id="team">
    <div class="container">

        <div class="section__head">
            <h2 class="section__title"><?php echo esc_html($team['title'] ?? ''); ?></h2>
            <p class="section__lead"><?php echo esc_html($team['description'] ?? ''); ?></p>
        </div>

        <div class="grid grid--3">

            <?php foreach ($team['members'] ?? [] as $member) : ?>

                <article class="card person">
                    <div class="person__ava <?php echo !empty($member['style']) ? 'person__ava--' . esc_attr($member['style']) : ''; ?>">
                        <?php echo esc_html($member['initials'] ?? ''); ?>
                    </div>

                    <h3 class="person__name"><?php echo esc_html($member['name'] ?? ''); ?></h3>
                    <div class="person__role"><?php echo esc_html($member['role'] ?? ''); ?></div>
                    <p class="person__text"><?php echo esc_html($member['text'] ?? ''); ?></p>
                </article>

            <?php endforeach; ?>

        </div>
    </div>
</section>