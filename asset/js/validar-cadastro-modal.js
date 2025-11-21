const formProfissional = document.getElementById('formCadastroProfissional');
const btnCadastrarProf = document.getElementById('btnCadastrarProfissional');
const btnFecharModal = document.getElementById('btnFecharModal')


const nomeProf = document.getElementById('txtNomeProfissional');
const cpfProf = document.getElementById('txtCpfProfissional');
const telProf = document.getElementById('txtTelefoneProfissional');
const espProf = document.getElementById('txtEspecialidadeProfissional');
const emailProf = document.getElementById('txtEmailProfissional');

const cpfMask = IMask(cpfProf, {
    mask: '000.000.000-00'
});

const telMask = IMask(telProf, {
    mask: [
        { mask: '(00) 0000-0000' },
        { mask: '(00) 00000-0000' }
    ]
});

btnCadastrarProf.addEventListener("click", (e) => {
    e.preventDefault();

    limparErros(formProfissional);

    const nomeValido = validarObrigatorio(nomeProf, "Informe o nome");
    const cpfValido = validarCPF(cpfProf);
    const telValido = validarTelefone(telProf);
    const espValida = validarObrigatorio(espProf, "Informe a especialidade");
    const emailValido = validarEmail(emailProf);

    const cpfLimpo = cpfMask.unmaskedValue;
    const telLimpo = telMask.unmaskedValue;


    if (nomeValido && cpfValido && telValido && espValida && emailValido) {
        formProfissional.submit();
    }
});

btnFecharModal.addEventListener('click', () => {
    limparErros(formProfissional)
    const vizualizar = document.querySelector('#preVizualizarImagem')
    formProfissional.reset()

    if (vizualizar) {
        vizualizar.remove()
    }
})

function validarObrigatorio(input, mensagem) {
    if (input.value.trim() === "") {
        mostrarErro(input, mensagem);
        return false;
    }
    return true;
}

function validarEmail(input) {
    const valor = input.value.trim();
    const regexEmail = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;

    if (valor === "" || !regexEmail.test(valor)) {
        mostrarErro(input, "E-mail inválido");
        return false;
    }
    return true;
}

function validarTelefone(input) {
    const valor = input.value.replace(/\D/g, "");
    if (valor.length < 10 || valor.length > 11) {
        mostrarErro(input, "Telefone inválido");
        return false;
    }
    return true;
}

function validarCPF(input) {
    const cpf = input.value.replace(/\D/g, "");

    if (cpf.length !== 11) {
        mostrarErro(input, "CPF inválido");
        return false;
    }

    return true;
}

function mostrarErro(input, mensagem) {
    input.classList.add("input-erro");

    const label = input.closest('.mb-3').querySelector("label");
    if (label) label.style.color = "#dc3545";

    const msg = input.parentElement.querySelector(".mensagem-erro");
    msg.textContent = mensagem;
    msg.classList.remove("d-none");
}

function limparErros(form) {
    form.querySelectorAll("label").forEach(label => {
        label.style.color = "";
    });

    form.querySelectorAll("input").forEach(input => {
        input.classList.remove("input-erro");
    });

    form.querySelectorAll(".mensagem-erro").forEach(msg => {
        msg.classList.add("d-none");
        msg.textContent = "";
    });
}

const fotoProfissional = document.querySelector('#arquivoFotoProfissional');
const previewImg = document.querySelector('#preVizualizarImagem');
const textoPreVizualizacao = document.querySelector('#textoPreVizualizacao');
const modal = document.getElementById('modalCadastro');

fotoProfissional.addEventListener('change', () => {

    const ler = new FileReader();

    ler.onload = e => {
        previewImg.src = e.target.result;
        previewImg.classList.remove('d-none');
        textoPreVizualizacao.classList.add('d-none');
    };

    ler.readAsDataURL(fotoProfissional.files[0]);
});

modal.addEventListener('hidden.bs.modal', () => {
    previewImg.src = '';
    previewImg.classList.add('d-none');

    textoPreVizualizacao.classList.remove('d-none');

    fotoProfissional.value = '';
});



function validarEspecialidade(select) {
    if (select.value === "" || select.value === null) {
        mostrarErro(select, "Selecione a especialidade");
        return false;
    }
    return true;
}

[nomeProf, cpfProf, telProf, espProf, emailProf].forEach(campo => {
    campo.addEventListener("input", () => {

        campo.classList.remove("input-erro");

        const msg = campo.parentElement.querySelector(".mensagem-erro");
        msg.classList.add("d-none");
        msg.textContent = "";

        const label = campo.closest(".mb-3").querySelector("label");
        if (label) label.style.color = "";
    });
});