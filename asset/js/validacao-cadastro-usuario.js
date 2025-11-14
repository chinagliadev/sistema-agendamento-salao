const form = document.getElementById('formCadastro');
const btnCadastrar = document.getElementById('btnCadastrar');

btnCadastrar.addEventListener("click", function(event){
    event.preventDefault(); 

    listaErros = []; 

    validarCamposCadastro(); 

    if(listaErros.length > 0){
        listarErros();
    } else {
        form.submit(); 
    }
});

function validarCamposCadastro(){
    const nome = document.getElementById('txtNomeCompleto');
    const email = document.getElementById('txtEmail');
    const senha = document.getElementById('txtSenha');
    const confirmar = document.getElementById('txtConfirmarSenha');
    const telefone = document.getElementById('txtTelefone');

    if(nome.value.trim() === '' || !possuiSobrenome(nome)){
        listaErros.push('Digite o nome completo.');
        nome.classList.add('input-erro')
    }
    if(email === ''){
        listaErros.push('Digite o email.');
    }
    if(senha === ''){
        listaErros.push('Digite a senha.');
    }
    if(confirmar !== senha){
        listaErros.push('As senhas não coincidem.');
    }
    if(telefone === ''){
        listaErros.push('Digite o telefone.');
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
