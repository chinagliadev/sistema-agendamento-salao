<?php
$mensagem_sucesso = (isset($_GET['cadastrado']) && $_GET['cadastrado'] === 'true') 
                    ? 'd-block' 
                    : 'd-none';

$erro_login = (isset($_GET['error']) && $_GET['error'] === 'true') 
                      ? 'd-block'
                      : 'd-none';
?>

<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-sRIl4kxILFvY47J16cr9ZwB07vP4J8+LH7qKQnuqkuIAvNWLzeN8tE5YBujZqJLB" crossorigin="anonymous">
    <link rel="stylesheet" href="./asset/css/formulario-usuario.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.13.1/font/bootstrap-icons.min.css">
    <title>Salao Agendamentos</title>
</head>

<body class="bg-light">

    <div class="container">

        <main class="min-vh-100 d-flex align-items-center justify-content-center">

            <div class="w-100 formulario shadow p-5 bg-white rounded" style="max-width:600px;">
                <form action="./controller/LoginController.php" method="post" id="form_login">
                    <h1 class="fs-2 fw-bold text-center">LOGIN</h1>
                    <p class="fs-5 text-secondary text-center">Seja bem vindo ao sistema de Agendamentos</p>

                    <div class="mb-3">
                        <label for="txtEmail" class="form-label">Email</label>
                        <input type="email" name="txtEmail" id="txtEmail" class="form-control">
                         <p class="mensagem-erro fw-semibold p-1 text-danger rounded d-none"></p>
                    </div>
                    <div class="mb-3">
                        <label for="txtSenha" class="form-label">Senha</label>
                        <input type="password" name="txtSenha" id="txtSenha" class="form-control">
                         <p class="mensagem-erro fw-semibold p-1 text-danger rounded d-none"></p>
                    </div>

                    <div id="mensagem-sucesso-cadastro" class="alert alert-success <?= $mensagem_sucesso ?>" role="alert">
                       Cadastro realizado com sucesso
                    </div>

                    <div id="mensagem-error-login" class="alert alert-danger <?= $erro_login ?>" role="alert">
                       <i class="bi bi-exclamation-triangle-fill"></i> Email do usuario ou senha incorretos. Tente novamente
                    </div>

                    <div class="mb-3 text-center">
                        <span class=" fs-6 text-secondary">Não possui uma conta? Cadastre-se <a class="text-decoration-none" href="./cadastros-login.php">aqui</a>.</span>
                    </div>

                    <button class="w-100 btn btn-dark fw-bold" id="btnLogin">ENTRAR</button>
                </form>
            </div>

        </main>

    </div>
<script src="./asset/js/validacao-login-usuario.js"></script>
</body>

</html>