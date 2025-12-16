<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-sRIl4kxILFvY47J16cr9ZwB07vP4J8+LH7qKQnuqkuIAvNWLzeN8tE5YBujZqJLB" crossorigin="anonymous">
    <title>Salao Agendamentos</title>
    <link rel="stylesheet" href="./asset/css/formulario-usuario.css">
</head>

<body class="bg-light">

    <div class="container">

        <main class="min-vh-100 d-flex align-items-center justify-content-center formulario-cadastro">

            <div class="formulario shadow p-5 bg-white rounded w-100" style="max-width: 600px;">
                <h1 class="fs-2 fw-bold text-center">CRIAR CONTA</h1>
                <p class="fs-5 text-secondary text-center mensagem-erro">Crie sua conta e comece a agendar seus serviços.</p>
                <form action="./controller/UsuarioController.php" method="post" id="formCadastro">

                    <div class="mb-3">
                        <label for="txtNomeCompleto" class="form-label">Nome Completo</label>
                        <input type="text" name="txtNomeCompleto" id="txtNomeCompleto" class="form-control">
                        <p class="fw-semibold p-1 text-danger rounded d-none mensagem-erro">Por favor informe nome completo</p>
                    </div>
                    <div class="mb-3">
                        <label for="txtEmail" class="form-label">Email</label>
                        <input type="email" name="txtEmail" id="txtEmail" class="form-control">
                        <p class="fw-semibold p-1 text-danger rounded d-none mensagem-erro">Por favor informe o email corretamente</p>
                    </div>

                    <div class="mb-3">
                        <label for="txtSenha" class="form-label">Senha</label>
                        <input type="password" name="txtSenha" id="txtSenha" class="form-control">
                        <p class="fw-semibold p-1 text-danger rounded d-none mensagem-erro">Por favor insira uma senha conforme os itens abaixo</p>
                        <ul id="lista-erros" class="text-danger d-none">
                            <li class="erro-especial">Insira um caractere especial</li>
                            <li class="erro-maiuscula">Insira uma letra MAIÚSCULA</li>
                            <li class="erro-minuscula">Insira uma letra minúscula</li>
                            <li class="erro-numero">Insira um número</li>
                        </ul>
                    </div>

                    <div class="mb-3">
                        <label for="txtConfirmarSenha" class="form-label">Confirmar Senha</label>
                        <input type="password" name="txtConfirmarSenha" id="txtConfirmarSenha" class="form-control">
                        <p class="fw-semibold p-1 text-danger rounded d-none mensagem-erro">Senhas não coincidem</p>
                    </div>

                    <div class="mb-3">
                        <label for="txtTelefone" class="form-label">Telefone</label>
                        <input class="form-control" type="text" name="txtTelefone" id="txtTelefone">
                        <p class="fw-semibold p-1 text-danger rounded d-none mensagem-erro">Por favor insisra um telefone valido</p>
                    </div>

                    <div class="mb-3 text-center">
                        <span class=" fs-6 text-secondary">Já possui uma conta? Entrar <a class="text-decoration-none" href="./login.php">aqui</a>.</span>
                    </div>

                    <button type="button" class="w-100 btn btn-dark fw-bold" id="btnCadastrar">CADASTRAR</button>
                </form>
            </div>

        </main>

    </div>

    <script src="https://unpkg.com/imask@6.4.3/dist/imask.min.js"></script>
    <script src="./asset/js/validacao-cadastro-usuario.js"></script>

</body>

</html>