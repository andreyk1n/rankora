<?php

$blog = $args['blog'] ?? [];

$blog_query = new WP_Query([
    'post_type' => 'post',
    'post_status' => 'publish',
    'posts_per_page' => 3,
    'orderby' => 'date',
    'order' => 'DESC',
    'ignore_sticky_posts' => true,
]);

if (!$blog_query->have_posts()) {
    return;
}

$emojis = ['📝', '🔎', '📈', '🧩', '💡'];

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

            <?php while ($blog_query->have_posts()): ?>
                <?php
                $blog_query->the_post();

                $categories = get_the_category();
                $category = !empty($categories) ? $categories[0]->name : '';
                $category_style = 'lav';

                $cover_class = 'post__cover';
                $random_emoji = $emojis[array_rand($emojis)];
                ?>

                <a class="card post" href="<?php the_permalink(); ?>">

                    <div class="<?php echo esc_attr($cover_class); ?>">
                        <?php if (has_post_thumbnail()): ?>
                            <?php
                            the_post_thumbnail('medium_large', [
                                'class' => 'post__image',
                                'loading' => 'lazy',
                                'alt' => esc_attr(get_the_title()),
                            ]);
                            ?>
                        <?php else: ?>
                            <span aria-hidden="true">
                                <?php echo esc_html($random_emoji); ?>
                            </span>
                        <?php endif; ?>
                    </div>

                    <div class="post__body">

                        <?php if ($category): ?>
                            <span class="tag tag--<?php echo esc_attr($category_style); ?>">
                                <?php echo esc_html($category); ?>
                            </span>
                        <?php endif; ?>

                        <h3 class="post__title">
                            <?php the_title(); ?>
                        </h3>

                        <div class="post__meta">
                            <?php echo esc_html(get_the_date('d.m.Y')); ?>
                        </div>

                    </div>

                </a>

            <?php endwhile; ?>

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

<?php wp_reset_postdata(); ?>