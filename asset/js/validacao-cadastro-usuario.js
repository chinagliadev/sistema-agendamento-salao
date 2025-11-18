const form = document.getElementById('formCadastro');
const btnCadastrar = document.getElementById('btnCadastrar');

const nome = document.getElementById('txtNomeCompleto');
const email = document.getElementById('txtEmail');
const senha = document.getElementById('txtSenha');
const confirmar = document.getElementById('txtConfirmarSenha');
const telefone = document.getElementById('txtTelefone');

IMask(telefone, {
  mask: '(00) 00000-0000'
});

const listaErros = document.getElementById('lista-erros');

const labelsFormularioCadastro = form.querySelectorAll('label');


nome.addEventListener("input", () => validarNome());
email.addEventListener("input", () => validarEmail());
telefone.addEventListener("input", () => validarTelefone());
senha.addEventListener("input", () => validarSenha());
confirmar.addEventListener("input", () => validarConfirmarSenha());


btnCadastrar.addEventListener("click", (e) => {
    e.preventDefault();

    const nomeValido = validarNome();
    const emailValido = validarEmail();
    const senhaValida = validarSenha();
    const confirmarValido = validarConfirmarSenha();
    const telefoneValido = validarTelefone();

    if (nomeValido && emailValido && senhaValida && confirmarValido && telefoneValido) {
        telefone.value = telefone.value.replace(/\D/g, '');
        form.submit();
    }
});

function validarNome() {
    const valor = nome.value.trim();
    const partes = valor.split(" ");

    if (valor === "" || partes.length < 2) {
        mostrarErro(nome, "Informe nome completo");
        return false;
    }

    removerErro(nome);
    return true;
}

function validarEmail() {
    const valor = email.value.trim();
    const regexEmail = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;

    if (!regexEmail.test(valor)) {
        mostrarErro(email, "E-mail inválido");
        return false;
    }

    removerErro(email);
    return true;
}

function validarTelefone() {
    const valor = telefone.value.trim();
    const somenteNumeros = valor.replace(/\D/g, "");

    if (somenteNumeros.length < 10) {
        mostrarErro(telefone, "Telefone inválido");
        return false;
    }

    removerErro(telefone);
    return true;
}

function validarSenha() {
    const valor = senha.value.trim();

    const temNumero = /\d/.test(valor);
    const temMaiuscula = /[A-Z]/.test(valor);
    const temMinuscula = /[a-z]/.test(valor);
    const temEspecial = /[\W_]/.test(valor);

    listaErros.classList.remove("d-none");

    atualizarItemErro(".erro-numero", temNumero);
    atualizarItemErro(".erro-maiuscula", temMaiuscula);
    atualizarItemErro(".erro-minuscula", temMinuscula);
    atualizarItemErro(".erro-especial", temEspecial);

    const senhaValida = temNumero && temMaiuscula && temMinuscula && temEspecial && valor.length >= 6;

    if (!senhaValida) {
        mostrarErro(senha, "A senha não atende aos requisitos");
        return false;
    }

    listaErros.classList.add("d-none");
    removerErro(senha);
    return true;
}

function atualizarItemErro(selector, condicaoValida) {
    const li = listaErros.querySelector(selector);
    if (!li) return;

    if (condicaoValida) {
        li.classList.add("d-none");
    } else {
        li.classList.remove("d-none");
    }
}

function validarConfirmarSenha() {
    if (confirmar.value.trim() === "" || confirmar.value.trim() !== senha.value.trim()) {
        mostrarErro(confirmar, "As senhas não coincidem");
        return false;
    }

    removerErro(confirmar);
    return true;
}


function mostrarErro(input, mensagem) {
    input.classList.add("input-erro");

    const label = form.querySelector(`label[for="${input.id}"]`);
    if (label) label.style.color = "#dc3545";

    const msg = input.parentElement.querySelector(".mensagem-erro");
    if (msg) {
        msg.textContent = mensagem;
        msg.classList.remove("d-none");
    }
}

function removerErro(input) {
    input.classList.remove("input-erro");

    const label = form.querySelector(`label[for="${input.id}"]`);
    if (label) label.style.color = "";

    const msg = input.parentElement.querySelector(".mensagem-erro");
    if (msg) {
        msg.classList.add("d-none");
        msg.textContent = "";
    }
}

function limparErros() {
    labelsFormularioCadastro.forEach(label => label.style.color = "");

    form.querySelectorAll("input").forEach(input => {
        input.classList.remove("input-erro");
    });

    const mensagens = form.querySelectorAll(".mensagem-erro");
    mensagens.forEach(msg => {
        msg.classList.add("d-none");
        msg.textContent = "";
    });

    if (listaErros) listaErros.classList.add("d-none");
}


function possuiSobrenome(nomeUsuario) {
    const partes = nomeUsuario.trim().split(' ');
    return partes.length >= 2;
}
