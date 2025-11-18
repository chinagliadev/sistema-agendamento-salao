const formLogin = document.getElementById('form_login');
const btnLogin = document.getElementById('btnLogin');
const mesnagemSucesso = document.getElementById('mensagem-sucesso-cadastro')
const mesnagemErroLogin = document.getElementById('mensagem-error-login')

setTimeout(removerMensagem ,3000)

function removerMensagem(){
    mesnagemSucesso.classList.remove('d-block')
    mesnagemSucesso.classList.add('d-none')
}

const emailLogin = document.getElementById('txtEmail');
const senhaLogin = document.getElementById('txtSenha');

btnLogin.addEventListener("click", (e) => {
    e.preventDefault();

    limparErrosLogin();

    removerMensagem()
    mesnagemSucesso.classList.remove('d-block')
    mesnagemSucesso.classList.add('d-none')

    const emailValido = validarEmailLogin();
    const senhaValida = validarSenhaLogin();

    if (emailValido && senhaValida) {
        formLogin.submit();
    }
});

function validarEmailLogin() {
    const valor = emailLogin.value.trim();
    const regexEmail = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;

    if (valor === "" || !regexEmail.test(valor)) {
        mostrarErroLogin(emailLogin, "E-mail inválido");
        return false;
    }

    return true;
}

function validarSenhaLogin() {
    const valor = senhaLogin.value.trim();

    if (valor === "") {
        mostrarErroLogin(senhaLogin, "Informe a senha");
        return false;
    }

    return true;
}

function mostrarErroLogin(input, mensagem) {
    input.classList.add("input-erro");

    const label = formLogin.querySelector(`label[for="${input.id}"]`);
    if (label) label.style.color = "#dc3545";

    const msg = input.parentElement.querySelector(".mensagem-erro");
    msg.textContent = mensagem;
    msg.classList.remove("d-none");
}

function limparErrosLogin() {
    formLogin.querySelectorAll("label").forEach(label => label.style.color = "");

    formLogin.querySelectorAll("input").forEach(input => {
        input.classList.remove("input-erro");
    });

    formLogin.querySelectorAll(".mensagem-erro").forEach(msg => {
        msg.classList.add("d-none");
        msg.textContent = "";
    });
}
