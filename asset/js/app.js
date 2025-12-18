
const myObserver = new IntersectionObserver((entries) => {
    entries.forEach((entry) => {
        if (entry.isIntersecting) {
            entry.target.classList.add('show');
        } else {
            entry.target.classList.remove('show');
        }
    });
});

const elementos = document.querySelectorAll('.hidden');

elementos.forEach((elemento) => {
    myObserver.observe(elemento);
});

const cards = document.querySelectorAll('.reveal-card');

const observer = new IntersectionObserver((entries) => {
    entries.forEach((entry) => {
        const index = [...cards].indexOf(entry.target);

        if (entry.isIntersecting) {
            setTimeout(() => {
                entry.target.classList.add('show');
            }, index * 150);
        } else {
            entry.target.classList.remove('show');
        }
    });
}, {
    threshold: 0.15
});

cards.forEach(card => observer.observe(card));

