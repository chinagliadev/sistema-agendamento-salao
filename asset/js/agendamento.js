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

let cronometroAlerta;

function mostrarErro(mensagem) {
    const alerta = document.getElementById('alerta-erro');
    const texto = alerta.querySelector('.msg-texto');
    
    if (cronometroAlerta) {
        clearTimeout(cronometroAlerta);
    }

    texto.textContent = mensagem;
    alerta.classList.remove('d-none');

    cronometroAlerta = setTimeout(() => {
        esconderErro();
    }, 5000); 
}

function esconderErro() {
    const alerta = document.getElementById('alerta-erro');
    alerta.classList.add('d-none');
    
    cronometroAlerta = null;
}

const btnConfirmar = document.querySelector('button[type="submit"]');

btnConfirmar.addEventListener('click', (e) => {
    e.preventDefault(); 
    
    const selectHora = document.querySelector('select[name="hora"]');
    const inputData = document.querySelector('input[name="data"]');
    const selectProf = document.querySelector('select[name="profissional_id"]');

    if (selectHora.value === "" || inputData.value === "" ||selectProf.value === "" ) {
        mostrarErro("Por favor, preencha a data, horário e o profissional antes de continuar.");
    } else {
        esconderErro();
        
        const modalForm = bootstrap.Modal.getInstance(document.getElementById('modal-agendamento'));
        const modalSucesso = new bootstrap.Modal(document.getElementById('modal-sucesso'));

        modalForm.hide();

        modalSucesso.show();

        selectHora.value = "";
        inputData.value = "";
        
    }
});