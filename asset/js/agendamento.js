const input = document.getElementById('input-servico');
const itens = document.querySelectorAll('.item-card');
const semResultado = document.getElementById('sem-resultado');

input.addEventListener('input', () => {
    const termoBusca = input.value.toLowerCase();
    let encontrou = false;

    itens.forEach((item) => {
        const h3 = item.querySelector('h3');
        const nomeServico = h3.textContent.toLowerCase();

        if (nomeServico.includes(termoBusca)) {
            item.style.display = "";
            encontrou = true;
        } else {
            item.style.display = "none";
        }
    });

    if (!encontrou) {
        semResultado.classList.remove('d-none');
    } else {
        semResultado.classList.add('d-none');
    }
});

const modal = document.getElementById('modal-agendamento');

modal.addEventListener('show.bs.modal', (e) => {
    const btn = event.relatedTarget;
    const servico = btn.getAttribute('data-servico');
    document.getElementById('titulo-modal').innerHTML = servico
});