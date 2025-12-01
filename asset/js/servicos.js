function configurarModalServicos() {
    const modalServico = document.getElementById('modalCadastrarServico')

    modalServico.addEventListener('show.bs.modal', event => {
        const button = event.relatedTarget
    })
}

configurarModalServicos();

const formCadastrarServico = document.getElementById('formCadastrarServico');
const btnCadastrarServico = document.getElementById('btnCadastrarServico');
const modalCadastrarServico = document.getElementById('modalCadastrarServico');
const nomeServico = document.getElementById('txtNomeServico');
const precoServico = document.getElementById('txtPrecoServico');
const duracaoServico = document.getElementById('txtDuracaoServico');
const descricaoServico = document.getElementById('descricaoServico');
const inputFotoServico = document.getElementById('arquivoFotoServico');

const previewImgServico = document.querySelector('#preVizualizarImagem');
const textoPreviewServico = document.querySelector('#textoPreVizualizacao');



const precoMask = IMask(precoServico, {
    mask: 'R$ num',
    lazy: false,
    blocks: {
        num: {
            mask: Number,
            thousandsSeparator: '.',
            radix: ',',
            mapToRadix: ['.'],
            scale: 2,
            min: 0
        }
    }
});

const duracaoMask = IMask(duracaoServico, {
    mask: '00:00'
});


btnCadastrarServico.addEventListener("click", (e) => {
    e.preventDefault();

    limparErros(formCadastrarServico);

    const nomeValido = validarObrigatorio(nomeServico, "Informe o nome do serviço");
    const precoValido = validarPreco(precoServico);
    const duracaoValida = validarDuracao(duracaoServico);

    if (nomeValido && precoValido && duracaoValida) {
        formCadastrarServico.submit();
    }
});

[nomeServico, precoServico, duracaoServico, descricaoServico].forEach(campo => {
    campo.addEventListener("input", () => {
        campo.classList.remove("input-erro");
        const msg = campo.parentElement.querySelector(".mensagem-erro");
        if (msg) {
            msg.classList.add("d-none");
            msg.textContent = "";
        }
        const labelContainer = campo.closest(".mb-3") || campo.closest(".row");
        const label = labelContainer ? labelContainer.querySelector("label") : null;
        if (label) label.style.color = "";
    });
});

inputFotoServico.addEventListener('change', () => {
    const arquivo = inputFotoServico.files[0];
    if (!arquivo) return;

    const ler = new FileReader();

    ler.onload = e => {
        previewImgServico.src = e.target.result;
        previewImgServico.classList.remove('d-none');
        textoPreviewServico.classList.add('d-none');
    };

    ler.readAsDataURL(arquivo);
});


modalCadastrarServico.addEventListener('hidden.bs.modal', () => {
    limparErros(formCadastrarServico);
    formCadastrarServico.reset();

    precoMask.value = '';
    duracaoMask.value = '';

    if (previewImgServico && textoPreviewServico && inputFotoServico) {
        previewImgServico.src = '';
        previewImgServico.classList.add('d-none');
        textoPreviewServico.classList.remove('d-none');
        inputFotoServico.value = '';
    }
});




function validarPreco(input) {

    const valorNumerico = input.value
        .replace('R$', '')
        .replace(/\./g, '')
        .replace(',', '.')
        .trim();

    if (isNaN(parseFloat(valorNumerico)) || parseFloat(valorNumerico) <= 0) {
        mostrarErro(input, "Preço inválido ou igual a zero");
        return false;
    }
    return true;
}

function validarDuracao(input) {
    const valor = input.value;
    const regexDuracao = /^([0-9]{2}):([0-5][0-9])$/;

    if (!regexDuracao.test(valor)) {
        mostrarErro(input, "Duração inválida (formato HH:MM)");
        return false;
    }

    const [horas, minutos] = valor.split(':').map(Number);

    if (horas === 0 && minutos < 5) {
        mostrarErro(input, "Duração mínima de 5 minutos");
        return false;
    }
    return true;
}


function validarObrigatorio(input, mensagem) {
    if (input.value.trim() === "") {
        mostrarErro(input, mensagem);
        return false;
    }
    return true;
}

function mostrarErro(input, mensagem) {
    input.classList.add("input-erro");

    const labelContainer = input.closest('.mb-3') || input.closest('.row');
    const label = labelContainer ? labelContainer.querySelector("label") : null;
    if (label) label.style.color = "#dc3545";

    const msg = input.parentElement.querySelector(".mensagem-erro");
    if (msg) {
        msg.textContent = mensagem;
        msg.classList.remove("d-none");
    }
}

function limparErros(form) {
    form.querySelectorAll("label").forEach(label => {
        label.style.color = "";
    });

    form.querySelectorAll("input, textarea, select").forEach(input => {
        input.classList.remove("input-erro");
    });

    form.querySelectorAll(".mensagem-erro").forEach(msg => {
        msg.classList.add("d-none");
        msg.textContent = "";
    });
}

function configurarModalDesativar() {
    const modalDesativar = document.getElementById('modalDesativarServico')

    modalDesativar.addEventListener('show.bs.modal', event => {
        const btn = event.relatedTarget

        const idInputHidden = document.getElementById('inputIdServico')
        const acaoInputHidden = document.getElementById('acaoServico')

        const id = btn.getAttribute('data-id')

        idInputHidden.value = id
        acaoInputHidden.value = 'desativarServico'

    })
}

function configurarModalAtivarServico() {
    const modal = document.getElementById('modalAtivarServico')

    if (modal === null) {
        console.error("Erro: O elemento com ID 'modalAtivarServico' não foi encontrado.");
        return;
    }

    modal.addEventListener('show.bs.modal', event => {
        const btn = event.relatedTarget

        const idServico = btn.getAttribute('data-id')

        const idInputHidden = document.getElementById('inputIdServicoAtivar')
        const acaoInputHidden = document.getElementById('acaoServicoAtivar')
        
        idInputHidden.value = idServico
        acaoInputHidden.value = 'ativarServico'
    })
}

function configurarModalEditarServico() {
    const modalEditar = document.getElementById('modalEditarServico');
    const form = modalEditar ? modalEditar.querySelector('form') : null;
    const btnEditar = document.getElementById('btnEditarServico'); 

    modalEditar.addEventListener('show.bs.modal', event => {
        const btn = event.relatedTarget; 

        const id = btn.getAttribute('data-id');
        
        const nome = btn.getAttribute('data-nome');
        const preco = btn.getAttribute('data-preco');
        const duracao = btn.getAttribute('data-duracao');
        const descricao = btn.getAttribute('data-descricao');
        const fotoUrl = btn.getAttribute('data-foto'); 

        document.getElementById('txtNomeServicoEditar').value = nome;
        document.getElementById('txtPrecoServicoEditar').value = preco;
        document.getElementById('txtDuracaoServicoEditar').value = duracao;
        document.getElementById('descricaoServicoEditar').value = descricao;
        
        const imgElement = document.getElementById('preVizualizarImagem');
        const textElement = document.getElementById('textoPreVizualizacao');

        if (fotoUrl) {
            imgElement.src = fotoUrl;
            imgElement.classList.remove('d-none');
            textElement.classList.add('d-none');
        } else {
            imgElement.src = '';
            imgElement.classList.add('d-none');
            textElement.classList.remove('d-none');
        }
    });

    btnEditar.addEventListener('click', function() {
        if (validarFormularioEdicao()) {
            form.submit(); 
        }
    });
}

function validarFormularioEdicao() {
    let isValido = true;
    
    const nomeInput = document.getElementById('txtNomeServico');
    const precoInput = document.getElementById('txtPrecoServico');
    const duracaoInput = document.getElementById('txtDuracaoServico');
    const descricaoInput = document.getElementById('descricaoServico');
    
    

    return isValido;
}


configurarModalEditarServico();

configurarModalAtivarServico()
configurarModalDesativar()