const formEditarProf = document.getElementById('formEditarProfissional');
const btnEditarProf = document.getElementById('btnEditarProfissional');
const btnFecharModalEditar = document.getElementById('btnFecharModalEditar');

const nomeProfEditar = document.getElementById('txtNomeProfissionalEditar');
const cpfProfEditar = document.getElementById('txtCpfProfissionalEditar');
const telProfEditar = document.getElementById('txtTelefoneProfissionalEditar');
const espProfEditar = document.getElementById('txtEspecialidadeProfissionalEditar');
const emailProfEditar = document.getElementById('txtEmailProfissionalEditar');

const cpfMaskEditar = IMask(cpfProfEditar, { mask: '000.000.000-00' });

const telMaskEditar = IMask(telProfEditar, {
    mask: [
        { mask: '(00) 0000-0000' },
        { mask: '(00) 00000-0000' }
    ]
});


const fotoProfissionalEditar = document.querySelector('#arquivoFotoProfissionalEditar');
const previewImgEditar = document.querySelector('#preVizualizarImagemEditar');
const textoPreVizualizacaoEditar = document.querySelector('#textoPreVizualizacaoEditar');
const modalEditar = document.getElementById('modalEditarProfissional');

fotoProfissionalEditar.addEventListener('change', () => {
    const ler = new FileReader();

    ler.onload = e => {
        previewImgEditar.src = e.target.result;
        previewImgEditar.classList.remove('d-none');
        textoPreVizualizacaoEditar.classList.add('d-none');
    };

    ler.readAsDataURL(fotoProfissionalEditar.files[0]);
});

modalEditar.addEventListener('hidden.bs.modal', () => {
    previewImgEditar.src = '';
    previewImgEditar.classList.add('d-none');

    textoPreVizualizacaoEditar.classList.remove('d-none');

    fotoProfissionalEditar.value = '';

    formEditarProf.reset();
    limparErros(formEditarProf);
});



btnEditarProf.addEventListener("click", (e) => {
    e.preventDefault();

    limparErros(formEditarProf);

    const nomeValido = validarObrigatorio(nomeProfEditar, "Informe o nome");
    const cpfValido = validarCPF(cpfProfEditar);
    const telValido = validarTelefone(telProfEditar);
    const espValida = validarEspecialidade(espProfEditar);
    const emailValido = validarEmail(emailProfEditar);

    if (nomeValido && cpfValido && telValido && espValida && emailValido) {
        formEditarProf.submit();
    }
});



[nomeProfEditar, cpfProfEditar, telProfEditar, espProfEditar, emailProfEditar].forEach(campo => {
    campo.addEventListener("input", () => {
        
        campo.classList.remove("input-erro");

        const msg = campo.parentElement.querySelector(".mensagem-erro");
        if (msg) {
            msg.classList.add("d-none");
            msg.textContent = "";
        }

        const label = campo.closest(".mb-3").querySelector("label");
        if (label) label.style.color = "";
    });
});


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

function validarEspecialidade(select) {
    if (select.value === "" || select.value === null) {
        mostrarErro(select, "Selecione a especialidade");
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

    form.querySelectorAll("input, select").forEach(input => {
        input.classList.remove("input-erro");
    });

    form.querySelectorAll(".mensagem-erro").forEach(msg => {
        msg.classList.add("d-none");
        msg.textContent = "";
    });
}

