<?php
/**
 * Template for displaying 404 pages (not found).
 *
 * @package Rankora
 */

get_header();
?>

<main class="error">
  <div class="container">
    <div class="error__inner">
      <span class="tag">Помилка 404</span>
      <div class="error__visual" aria-hidden="true">
        <div class="error__code">404</div>
        <svg class="error__chart" viewBox="0 0 400 80"><path d="M4 66 L60 56 L110 60 L170 38 L230 30" fill="none" stroke="#23262b" stroke-width="4" stroke-linecap="round" stroke-linejoin="round"/><path d="M230 30 L262 52" fill="none" stroke="#23262b" stroke-width="4" stroke-linecap="round" stroke-dasharray="2 9"/><path d="M290 44 L340 20 L396 8" fill="none" stroke="#23262b" stroke-width="4" stroke-linecap="round" stroke-linejoin="round" stroke-dasharray="2 9"/></svg>
        <span class="error__badge">🔎 Сторінка зникла з індексу</span>
        <span class="error__badge error__badge--b">↩ Є вихід</span>
      </div>
      <h1 class="error__title">Цієї сторінки немає, але ваше зростання на місці</h1>
      <p class="error__text">Можливо, адресу змінили, сторінку видалили або в посиланні є помилка. Скористайтесь пошуком або поверніться на головну.</p>
 
      <div class="error__actions">
        <a class="btn btn--primary" href="/">← На головну</a>
        <button class="btn btn--ghost" type="button" onclick="history.back()">Повернутись назад</button>
      </div>
 
      <div class="links">
        <h2 class="links__title">Можливо, ви шукали</h2>
        <div class="links__grid">
          <a class="link-card" href="#"><span class="link-card__icon">📊</span><span class="link-card__title">Послуги</span><span class="link-card__text">SEO-аудит, технічне SEO, просування.</span><span class="link-card__go">Перейти →</span></a>
          <a class="link-card" href="#"><span class="link-card__icon link-card__icon--mint">📈</span><span class="link-card__title">Кейси</span><span class="link-card__text">Проєкти з цифрами та результатами.</span><span class="link-card__go">Перейти →</span></a>
          <a class="link-card" href="#"><span class="link-card__icon link-card__icon--lav">📰</span><span class="link-card__title">Блог</span><span class="link-card__text">Статті про SEO та аналітику.</span><span class="link-card__go">Перейти →</span></a>
          <a class="link-card" href="#"><span class="link-card__icon">✉️</span><span class="link-card__title">Контакти</span><span class="link-card__text">Напишіть нам, і ми допоможемо.</span><span class="link-card__go">Перейти →</span></a>
        </div>
      </div>
      <p class="error__help">Вважаєте, що це помилка на сайті? <a href="mailto:hello@rankora.com">Повідомте нам</a></p>
    </div>
  </div>
</main>

<?php get_footer(); ?>
