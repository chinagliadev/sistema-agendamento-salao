const links = document.querySelectorAll('.lista_opcoes .nav-link');

links.forEach(link => {
    link.addEventListener('click', function () {

        links.forEach(l => l.classList.remove('bg-active-item', 'active'));

        this.classList.add('bg-active-item', 'active');
    });
});
