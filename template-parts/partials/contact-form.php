
<?php $form = $args['form'] ?? []; ?>

<section class="section" id="form" style="padding-top:0">
    <div class="container contact">
        <div class="panel">
            <h2 class="panel__title"><?php echo esc_html($form['title'] ?? ''); ?></h2>
            <p class="panel__text"><?php echo esc_html($form['text'] ?? ''); ?></p>
            <form class="form" id="lead-form" method="post" novalidate>
                <?php wp_nonce_field('rankora_lead_form', 'rankora_nonce'); ?>
                <div class="form__field">
                    <label class="form__label" for="f-name">Ім'я *</label>
                    <input class="form__input" id="f-name" name="name" placeholder="Як до вас звертатись" required>
                </div>
                <div class="form__field">
                    <label class="form__label" for="f-email">Email *</label>
                    <input class="form__input" id="f-email" name="email" type="email" placeholder="name@company.com" required>
                </div>
                <div class="form__field">
                    <label class="form__label" for="f-site">Сайт</label>
                    <input class="form__input" id="f-site" name="site" type="url" placeholder="https://">
                </div>
                <div class="form__field">
                    <label class="form__label" for="f-phone">Телефон</label>
                    <input class="form__input" id="f-phone" name="phone" type="tel" placeholder="+380 00 000 00 00">
                </div>
                <div class="form__field form__field--full">
                    <span class="form__label">Що вас цікавить</span>
                    <div class="form__chips" id="topics">
                        <?php foreach ($form['topics'] ?? [] as $i => $topic): ?>
                            <button class="chip<?php echo $i === 0 ? ' chip--on' : ''; ?>" type="button" data-topic="<?php echo esc_attr($topic); ?>"><?php echo esc_html($topic); ?></button>
                        <?php endforeach; ?>
                    </div>
                    <input type="hidden" name="topic" id="f-topic" value="<?php echo esc_attr($form['topics'][0] ?? ''); ?>">
                </div>
                <div class="form__field form__field--full">
                    <label class="form__label" for="f-msg">Коротко про задачу</label>
                    <textarea class="form__input form__input--area" id="f-msg" name="message" placeholder="Що хочете покращити?"></textarea>
                </div>
                <label class="check form__field--full">
                    <input class="check__input" type="checkbox" name="consent" id="f-agree" required>
                    Погоджуюсь з <a href="<?php echo esc_url($form['privacy_url'] ?? '#'); ?>">політикою конфіденційності</a>
                </label>
                <button class="btn btn--primary form__btn" type="submit"><?php echo esc_html($form['button'] ?? 'Надіслати заявку'); ?></button>
                <div class="form__status" id="form-status" role="status"></div>
                <p class="form__note"><?php echo esc_html($form['note'] ?? ''); ?></p>
            </form>
        </div>
        <?php get_template_part('template-parts/partials/contact-aside', null, ['contact' => $args['contact'] ?? []]); ?>
    </div>
</section>
