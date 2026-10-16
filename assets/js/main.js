var nav = document.getElementById('nav'), burger = document.getElementById('burger');
burger.addEventListener('click', function () { var o = nav.classList.toggle('nav--open'); burger.setAttribute('aria-expanded', o) });
nav.addEventListener('click', function (e) { if (e.target.tagName === 'A') nav.classList.remove('nav--open') });
document.getElementById('lead-form').addEventListener('submit', function (e) {
    e.preventDefault();
    var s = document.getElementById('form-status'), ok = this.name.value.trim().length > 1 && /^\S+@\S+\.\S+$/.test(this.email.value);
    s.className = 'form__status ' + (ok ? 'form__status--ok' : 'form__status--err');
    s.textContent = ok ? 'Дякуємо! Ми зв\'яжемось з вами протягом робочого дня.' : 'Перевірте ім\'я та email і спробуйте ще раз.';
    if (ok) this.reset(); /* тут підключіть відправку на ваш бекенд */
});