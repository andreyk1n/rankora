
<?php
/*
Template Name: Blog page
*/

get_header();

$paged = max(
    1,
    (int) get_query_var('paged'),
    (int) get_query_var('page')
);

$archive_query = new WP_Query([
    'post_type'           => 'post',
    'post_status'         => 'publish',
    'posts_per_page'      => 6,
    'paged'               => $paged,
    'ignore_sticky_posts' => true,
]);

$emojis = ['📝', '🔎', '📈', '🧩', '💡'];
?>

<main>
    <section class="section" id="blog">
        <div class="container">
            <div class="section__head" style="text-align: center;">
                <h1 class="section__title">Блог</h1>
            </div>

            <?php if ($archive_query->have_posts()): ?>
                <div class="grid grid--3">
                    <?php while ($archive_query->have_posts()): ?>
                        <?php
                        $archive_query->the_post();

                        $categories = get_the_category();
                        $category = !empty($categories)
                            ? $categories[0]->name
                            : '';

                        $random_emoji = $emojis[array_rand($emojis)];
                        ?>

                        <a class="card post" href="<?php the_permalink(); ?>">
                            <div class="post__cover">
                                <?php if (has_post_thumbnail()): ?>
                                    <?php the_post_thumbnail('medium_large', [
                                        'class'   => 'post__image',
                                        'loading' => 'lazy',
                                        'alt'     => esc_attr(get_the_title()),
                                    ]); ?>
                                <?php else: ?>
                                    <span aria-hidden="true">
                                        <?php echo esc_html($random_emoji); ?>
                                    </span>
                                <?php endif; ?>
                            </div>

                            <div class="post__body">
                                <?php if ($category): ?>
                                    <span class="tag tag--lav">
                                        <?php echo esc_html($category); ?>
                                    </span>
                                <?php endif; ?>

                                <h2 class="post__title">
                                    <?php the_title(); ?>
                                </h2>

                                <div class="post__meta">
                                    <?php echo esc_html(get_the_date('d.m.Y')); ?>
                                </div>
                            </div>
                        </a>
                    <?php endwhile; ?>
                </div>

                <?php if ($archive_query->max_num_pages > 1): ?>
                    <nav class="blog__pagination" aria-label="Пагінація">
                        <?php
                        echo wp_kses_post(paginate_links([
                            'total'     => $archive_query->max_num_pages,
                            'current'   => $paged,
                            'type'      => 'list',
                            'prev_text' => '← Назад',
                            'next_text' => 'Далі →',
                        ]));
                        ?>
                    </nav>
                <?php endif; ?>

            <?php else: ?>
                <p class="section__lead" style="text-align: center;">
                    Публікацій поки немає.
                </p>
            <?php endif; ?>

        </div>
    </section>
</main>

<?php
wp_reset_postdata();
get_footer();
