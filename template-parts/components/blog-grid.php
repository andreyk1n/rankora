<?php

$blog = $args['blog'] ?? [];

if (empty($blog['items']) || !is_array($blog['items'])) {
    return;
}

$allowed_cover_styles = ['default', 'mint', 'lav'];

?>

<section class="section" id="blog">
    <div class="container">

        <div class="section__head">
            <h2 class="section__title">
                <?php echo esc_html($blog['title'] ?? 'Блог'); ?>
            </h2>

            <?php if (!empty($blog['lead'])): ?>
                <p class="section__lead">
                    <?php echo esc_html($blog['lead']); ?>
                </p>
            <?php endif; ?>
        </div>

        <div class="grid grid--3">

            <?php foreach ($blog['items'] as $post): ?>
                <?php
                $cover_style = $post['cover_style'] ?? 'default';

                if (!in_array($cover_style, $allowed_cover_styles, true)) {
                    $cover_style = 'default';
                }

                $cover_class = 'post__cover';

                if ($cover_style !== 'default') {
                    $cover_class .= ' post__cover--' . $cover_style;
                }

                $category_style = $post['category_style'] ?? 'lav';
                ?>

                <a class="card post" href="<?php echo esc_url(home_url($post['url'] ?? '/blog/')); ?>">
                    <div class="<?php echo esc_attr($cover_class); ?>">
                        <?php echo esc_html($post['icon'] ?? '📝'); ?>
                    </div>

                    <div class="post__body">

                        <?php if (!empty($post['category'])): ?>
                            <span class="tag tag--<?php echo esc_attr($category_style); ?>">
                                <?php echo esc_html($post['category']); ?>
                            </span>
                        <?php endif; ?>

                        <h3 class="post__title">
                            <?php echo esc_html($post['title'] ?? ''); ?>
                        </h3>

                        <div class="post__meta">
                            <?php
                            $meta = array_filter([
                                $post['date'] ?? '',
                                $post['reading_time'] ?? '',
                            ]);

                            echo esc_html(implode(' · ', $meta));
                            ?>
                        </div>

                    </div>
                </a>
            <?php endforeach; ?>

        </div>

        <?php if (!empty($blog['more']['label'])): ?>
            <div class="blog__more">
                <a class="btn btn--ghost" href="<?php echo esc_url(home_url($blog['more']['url'] ?? '/blog/')); ?>">
                    <?php echo esc_html($blog['more']['label']); ?>
                </a>
            </div>
        <?php endif; ?>

    </div>
</section>