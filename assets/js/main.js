
var nav = document.getElementById('nav');
var burger = document.getElementById('burger');

if (nav && burger) {
    burger.addEventListener('click', function () {
        var o = nav.classList.toggle('nav--open');
        burger.setAttribute('aria-expanded', o);
    });

    nav.addEventListener('click', function (e) {
        if (e.target.closest('a')) nav.classList.remove('nav--open');
    });
}

var leadForm = document.getElementById('lead-form');

if (leadForm) {
    leadForm.addEventListener('submit', function (e) {
        e.preventDefault();

        var s = document.getElementById('form-status');
        var ok = this.name.value.trim().length > 1 &&
            /^\S+@\S+\.\S+$/.test(this.email.value);

        if (s) {
            s.className = 'form__status ' + (ok ? 'form__status--ok' : 'form__status--err');
            s.textContent = ok
                ? 'Дякуємо! Ми зв’яжемось з вами протягом робочого дня.'
                : 'Перевірте ім’я та email і спробуйте ще раз.';
        }

        if (ok) this.reset();
    });
}

var chips = document.querySelectorAll('#filter .chip');
var cards = document.querySelectorAll('#list .service');
var filter = document.getElementById('filter');

if (filter) {
    filter.addEventListener('click', function (e) {
        var c = e.target.closest('.chip');
        if (!c) return;

        chips.forEach(function (x) {
            x.classList.remove('chip--on');
        });

        c.classList.add('chip--on');

        cards.forEach(function (s) {
            s.hidden = !(c.dataset.cat === 'all' || s.dataset.cat === c.dataset.cat);
        });
    });
}
