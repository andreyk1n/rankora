<?php

$about = $args['about'] ?? [];

if (empty($about)) {
    return;
}

$allowed_styles = ['default', 'lav', 'mint'];

?>

<section class="section" id="about">
    <div class="container about">

        <div>
            <h2 class="section__title">
                <?php echo esc_html($about['title'] ?? ''); ?>
            </h2>

            <?php if (!empty($about['lead'])): ?>
                <p class="section__lead">
                    <?php echo esc_html($about['lead']); ?>
                </p>
            <?php endif; ?>

            <?php if (!empty($about['principles'])): ?>
                <div class="about__principles">

                    <?php foreach ($about['principles'] as $principle): ?>
                        <div class="principle">

                            <span class="principle__dot"></span>

                            <div>
                                <div class="principle__title">
                                    <?php echo esc_html($principle['title'] ?? ''); ?>
                                </div>

                                <div class="principle__text">
                                    <?php echo esc_html($principle['text'] ?? ''); ?>
                                </div>
                            </div>

                        </div>
                    <?php endforeach; ?>

                </div>
            <?php endif; ?>
        </div>

        <?php if (!empty($about['team'])): ?>
            <div class="team">

                <?php foreach ($about['team'] as $member): ?>
                    <?php
                    $style = $member['style'] ?? 'default';

                    if (!in_array($style, $allowed_styles, true)) {
                        $style = 'default';
                    }

                    $avatar_class = 'team__avatar';

                    if ($style !== 'default') {
                        $avatar_class .= ' team__avatar--' . $style;
                    }
                    ?>

                    <div class="team__member">

                        <div class="<?php echo esc_attr($avatar_class); ?>">
                            <?php echo esc_html($member['initials'] ?? ''); ?>
                        </div>

                        <div class="team__name">
                            <?php echo esc_html($member['name'] ?? ''); ?>
                        </div>

                        <div class="team__role">
                            <?php echo esc_html($member['role'] ?? ''); ?>
                        </div>

                    </div>

                <?php endforeach; ?>

            </div>
        <?php endif; ?>

    </div>
</section>