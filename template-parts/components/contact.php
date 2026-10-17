<?php

$contact = $args['contact'] ?? [];

if (empty($contact)) {
    return;
}

$fields = $contact['fields'] ?? [];

?>

<section class="section" id="contact">
    <div class="container">
        <div class="cta">

            <div>
                <h2 class="cta__title">
                    <?php echo esc_html($contact['title'] ?? ''); ?>
                </h2>

                <p class="cta__text">
                    <?php echo esc_html($contact['text'] ?? ''); ?>
                </p>
            </div>

            <form class="form" id="lead-form" novalidate>

                <div class="form__field">
                    <label class="form__label" for="f-name">
                        <?php echo esc_html($fields['name']['label'] ?? "Ім'я *"); ?>
                    </label>

                    <input class="form__input" id="f-name" name="name" type="text"
                        placeholder="<?php echo esc_attr($fields['name']['placeholder'] ?? ''); ?>" autocomplete="name"
                        required>
                </div>

                <div class="form__field">
                    <label class="form__label" for="f-email">
                        <?php echo esc_html($fields['email']['label'] ?? 'Email *'); ?>
                    </label>

                    <input class="form__input" id="f-email" name="email" type="email"
                        placeholder="<?php echo esc_attr($fields['email']['placeholder'] ?? ''); ?>"
                        autocomplete="email" required>
                </div>

                <div class="form__field">
                    <label class="form__label" for="f-site">
                        <?php echo esc_html($fields['site']['label'] ?? 'Сайт'); ?>
                    </label>

                    <input class="form__input" id="f-site" name="site" type="url"
                        placeholder="<?php echo esc_attr($fields['site']['placeholder'] ?? 'https://'); ?>">
                </div>

                <div class="form__field">
                    <label class="form__label" for="f-message">
                        <?php echo esc_html($fields['message']['label'] ?? 'Коротко про задачу'); ?>
                    </label>

                    <textarea class="form__input form__input--area" id="f-message" name="message"
                        placeholder="<?php echo esc_attr($fields['message']['placeholder'] ?? ''); ?>"></textarea>
                </div>

                <button class="btn btn--primary btn--block" type="submit">
                    <?php echo esc_html($contact['submit_label'] ?? 'Надіслати заявку'); ?>
                </button>

                <div class="form__status" id="form-status" role="status" aria-live="polite"></div>

                <p class="form__note">
                    <?php echo esc_html($contact['note'] ?? ''); ?>
                    <a href="<?php echo esc_url(home_url($contact['privacy_url'] ?? '/privacy-policy/')); ?>">
                        Політика конфіденційності
                    </a>
                </p>

            </form>

        </div>
    </div>
</section>