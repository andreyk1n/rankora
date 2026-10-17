<?php
get_header();

if (have_posts()):
    while (have_posts()):
        the_post();

        $categories = get_the_category();
        $category = !empty($categories) ? $categories[0] : null;

        $author_name = get_the_author();
        $author_words = preg_split('/\s+/u', trim($author_name));
        $author_initials = '';

        foreach (array_slice($author_words, 0, 2) as $word) {
            $author_initials .= mb_substr($word, 0, 1);
        }

        $content = get_the_content();
        $word_count = str_word_count(wp_strip_all_tags(strip_shortcodes($content)));
        $reading_time = max(1, (int) ceil($word_count / 200));

        $blog_url = home_url('/blog/');
        $post_url = get_permalink();
        $post_title = get_the_title();

        $emojis = ['📝', '🔎', '📈', '🧩', '💡'];
        $fallback_emoji = $emojis[absint(get_the_ID()) % count($emojis)];
        ?>

        <main id="top">

            <article <?php post_class(); ?>>

                <header class="post-hero">
                    <div class="container container--narrow">

                        <nav class="crumbs" aria-label="Хлібні крихти">
                            <a class="crumbs__item" href="<?php echo esc_url(home_url('/')); ?>">
                                Головна
                            </a>

                            <a class="crumbs__item" href="<?php echo esc_url($blog_url); ?>">
                                Блог
                            </a>

                            <span class="crumbs__item crumbs__item--cur" aria-current="page">
                                <?php echo esc_html($post_title); ?>
                            </span>
                        </nav>

                        <?php if ($category): ?>
                            <a class="tag tag--lav post-hero__category"
                                href="<?php echo esc_url(get_category_link($category->term_id)); ?>">
                                <?php echo esc_html($category->name); ?>
                            </a>
                        <?php endif; ?>

                        <h1 class="post-hero__title">
                            <?php the_title(); ?>
                        </h1>

                        <?php if (has_excerpt()): ?>
                            <p class="post-hero__lead">
                                <?php echo esc_html(get_the_excerpt()); ?>
                            </p>
                        <?php endif; ?>

                        <div class="meta">

                            <span class="meta__author">
                                <span class="meta__ava" aria-hidden="true">
                                    <?php echo esc_html($author_initials); ?>
                                </span>
                                <?php echo esc_html($author_name); ?>
                            </span>

                            <span class="meta__item">
                                <time datetime="<?php echo esc_attr(get_the_date('c')); ?>">
                                    <?php echo esc_html(get_the_date('j F Y')); ?>
                                </time>
                            </span>

                            <span class="meta__item">
                                <?php echo esc_html($reading_time); ?> хв читання
                            </span>

                        </div>

                    </div>

                    <div class="container">

                        <figure class="cover">

                            <?php if (has_post_thumbnail()): ?>

                                <?php
                                the_post_thumbnail('large', [
                                    'class' => 'cover__image',
                                    'loading' => 'eager',
                                    'fetchpriority' => 'high',
                                    'alt' => esc_attr(
                                        get_post_meta(
                                            get_post_thumbnail_id(),
                                            '_wp_attachment_image_alt',
                                            true
                                        ) ?: $post_title
                                    ),
                                ]);
                                ?>

                            <?php else: ?>

                                <div class="cover__img">
                                    <span class="cover__fallback" aria-hidden="true">
                                        <?php echo esc_html($fallback_emoji); ?>
                                    </span>
                                </div>

                            <?php endif; ?>

                            <?php
                            $thumbnail_id = get_post_thumbnail_id();
                            $thumbnail = $thumbnail_id ? get_post($thumbnail_id) : null;
                            ?>

                            <?php if (has_post_thumbnail() && $thumbnail && $thumbnail->post_excerpt): ?>
                                <figcaption class="cover__caption">
                                    <?php echo esc_html($thumbnail->post_excerpt); ?>
                                </figcaption>
                            <?php endif; ?>

                        </figure>

                    </div>
                </header>

                <div class="container container--narrow article">

                    <div class="article__body">
                        <?php
                        the_content();

                        wp_link_pages([
                            'before' => '<nav class="page-links"><span>Сторінки:</span>',
                            'after' => '</nav>',
                        ]);
                        ?>
                    </div>

                    <?php
                    $tags = get_the_tags();
                    ?>

                    <div class="share">

                        <?php if ($tags): ?>
                            <div class="share__tags">
                                <?php foreach ($tags as $tag): ?>
                                    <a class="tag tag--sky" href="<?php echo esc_url(get_tag_link($tag->term_id)); ?>">
                                        <?php echo esc_html($tag->name); ?>
                                    </a>
                                <?php endforeach; ?>
                            </div>
                        <?php endif; ?>

                        <div class="share__links">
                            <span>Поділитись:</span>

                            <a class="share__btn"
                                href="<?php echo esc_url('https://www.linkedin.com/sharing/share-offsite/?url=' . rawurlencode($post_url)); ?>"
                                target="_blank" rel="noopener noreferrer" aria-label="Поділитись у LinkedIn">in</a>

                            <a class="share__btn"
                                href="<?php echo esc_url('https://www.facebook.com/sharer/sharer.php?u=' . rawurlencode($post_url)); ?>"
                                target="_blank" rel="noopener noreferrer" aria-label="Поділитись у Facebook">fb</a>

                            <a class="share__btn"
                                href="<?php echo esc_url('https://t.me/share/url?url=' . rawurlencode($post_url) . '&text=' . rawurlencode($post_title)); ?>"
                                target="_blank" rel="noopener noreferrer" aria-label="Поділитись у Telegram">tg</a>

                            <button class="share__btn" type="button" id="copy-post-link"
                                data-url="<?php echo esc_url($post_url); ?>" aria-label="Копіювати посилання">🔗</button>
                        </div>

                    </div>

                </div>

            </article>

            <?php
            $latest_posts = new WP_Query([
                'post_type' => 'post',
                'post_status' => 'publish',
                'posts_per_page' => 3,
                'post__not_in' => [get_the_ID()],
                'orderby' => 'date',
                'order' => 'DESC',
                'ignore_sticky_posts' => true,
            ]);

            if ($latest_posts->have_posts()):
                ?>

                <section class="section section--tint" id="latest">
                    <div class="container">

                        <div class="section__head">
                            <h2 class="section__title">Останні матеріали</h2>

                            <a class="btn btn--ghost btn--sm" href="<?php echo esc_url($blog_url); ?>">
                                Усі статті
                            </a>
                        </div>

                        <div class="grid grid--3">

                            <?php while ($latest_posts->have_posts()): ?>
                                <?php
                                $latest_posts->the_post();

                                $latest_categories = get_the_category();
                                $latest_category = !empty($latest_categories)
                                    ? $latest_categories[0]->name
                                    : '';

                                $latest_emoji = $emojis[absint(get_the_ID()) % count($emojis)];
                                ?>

                                <a class="card post" href="<?php the_permalink(); ?>">

                                    <div class="post__cover">

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
                                                <?php echo esc_html($latest_emoji); ?>
                                            </span>

                                        <?php endif; ?>

                                    </div>

                                    <div class="post__body">

                                        <?php if ($latest_category): ?>
                                            <span class="tag tag--lav post__category">
                                                <?php echo esc_html($latest_category); ?>
                                            </span>
                                        <?php endif; ?>

                                        <h3 class="post__title">
                                            <?php the_title(); ?>
                                        </h3>

                                        <p class="post__text">
                                            <?php echo esc_html(wp_trim_words(get_the_excerpt() ?: get_the_content(), 18)); ?>
                                        </p>

                                        <div class="post__meta">
                                            <?php echo esc_html(get_the_date('d.m.Y')); ?>
                                        </div>

                                    </div>

                                </a>

                            <?php endwhile; ?>

                        </div>

                    </div>
                </section>

                <?php
            endif;
            wp_reset_postdata();
            ?>

        </main>

        <script>
            document.addEventListener('DOMContentLoaded', function () {
                const copyButton = document.getElementById('copy-post-link');

                if (!copyButton) {
                    return;
                }

                copyButton.addEventListener('click', async function () {
                    const url = copyButton.dataset.url;

                    try {
                        await navigator.clipboard.writeText(url);
                        copyButton.textContent = '✓';

                        setTimeout(function () {
                            copyButton.textContent = '🔗';
                        }, 1500);
                    } catch (error) {
                        window.prompt('Скопіюйте посилання на статтю:', url);
                    }
                });
            });
        </script>

        <?php
    endwhile;
endif;

get_footer();
?>