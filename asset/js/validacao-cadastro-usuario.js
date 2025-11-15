const form = document.getElementById('formCadastro');
const btnCadastrar = document.getElementById('btnCadastrar');

btnCadastrar.addEventListener("click", (event)=>{
    event.preventDefault(); 

    validarCamposCadastro()
});

function validarCamposCadastro(){
    const nome = document.getElementById('txtNomeCompleto');
    const email = document.getElementById('txtEmail');
    const senha = document.getElementById('txtSenha');
    const confirmar = document.getElementById('txtConfirmarSenha');
    const telefone = document.getElementById('txtTelefone');

    if(nome.value.trim() === '' || !possuiSobrenome(nome)){
        nome.classList.add('input-erro')
    }
    if(email.value.trim() === ''){
        email.classList.add('input-erro')
    }
    if(senha.value.trim() === ''){
        senha.classList.add('input-erro')
    }
    if(confirmar.value.trim() !== senha){
        confirmar.classList.add('input-erro')
    }
    if(telefone.value.trim() === ''){
        telefone.classList.add('input-erro')
    }
}

function possuiSobrenome(nomeUsuario){
    const partes = nomeUsuario.split(' ');
    return partes.length >= 2;
}

function listarErros(){
    const alertErro = document.querySelector('.alert-danger');
    const ul = document.getElementById('lista_erros');

    ul.innerHTML = ''; 

    listaErros.forEach(erro => {
        const li = document.createElement('li');
        li.textContent = erro;
        ul.appendChild(li);
    });

    alertErro.classList.remove('d-none');
}
