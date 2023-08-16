<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous">
    <link rel="stylesheet" href="style-login.css">
    <title>Tela de Login</title>
</head>

<body>

    <div class="container">

        <div class="box__img">
            <img src="img/cartao-login.jpeg" alt="info-dgapy">
        </div>

        <div class="box__login-ext">
            <div class="box__login-int">
                <form action="testLogin.php" method="POST">

                    <div class="box__titulo">
                        <h2>Login</h2>
                    </div>

                    <div class="mb-3">
                        <label for="inputCpf" class="form-label">CPF: </label>
                        <input type="text" class="form-control" id="inputCpf" name="inputCpf" placeholder="000.000.000-00">
                    </div>

                    <div class="mb-1">
                        <label for="inputSenha" class="form-label">Senha: </label>
                        <input type="password" class="form-control" id="inputSenha" name="inputSenha" placeholder="Digite sua senha">
                    </div>

                    <!-- Desativado -->
                    <div class="box__obs" hidden>
                        <div>
                            <input class="form-check-input" type="checkbox" value="" id="flexCheckChecked">
                            <label class="form-check-label" for="flexCheckChecked">Lembrar de mim</label>
                        </div>
                        <div>
                            <a href="#">Esqueceu a senha?</a>
                        </div>
                    </div>

                    <div class="box__btn">
                        <button type="submit" name="submit" class="btn btn-primary">Entrar</button>
                        <button type="button" class="btn btn-outline-primary">Cadastrar Família</button>
                    </div>
                </form>
            </div>

        </div>

    </div>

</body>

<script src="https://unpkg.com/imask"></script>

<script>

    var phoneMask = IMask(document.getElementById("inputCpf"), { mask: '000.000.000-00' });

</script>

</html>