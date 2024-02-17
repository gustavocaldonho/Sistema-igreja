<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous">
    <link rel="stylesheet" href="style-login.css">
    <title>Tela de Login</title>
</head>

<body>

    <div id="container">

        <div id="box__img">
            <img src="img/cartao-login.jpeg" alt="info-dgapy">
        </div>

        <main id="box__login">
            <form id="formLogin" name="formLogin" action="../../controlador/testLogin.php" method="POST">

                <div id="box__titulo">
                    <h2>Login</h2>
                </div>

                <div id="box__camposForm">
                    <div id="box__inputCpf">
                        <label for="inputCpf" class="form-label">CPF</label>
                        <input type="text" class="form-control" id="inputCpf" name="inputCpf" placeholder="000.000.000-00" required>
                        <!-- <p id="msgErroCpf">CPF não cadastrado</p> -->
                    </div>

                    <div id="box__inputSenha">
                        <label for="inputSenha" class="form-label">Senha</label>
                        <input type="password" class="form-control" id="inputSenha" name="inputSenha" placeholder="Digite sua senha" required>
                        <!-- <p id="msgErroSenha">Senha incorreta</p> -->
                    </div>

                    <div id="box__obs">
                        <div>
                            <input class="form-check-input" type="checkbox" id="checkboxLembrarDeMim">
                            <label class="form-check-label" for="checkboxLembrarDeMim">Lembrar de mim</label>
                        </div>
                        <div>
                            <a href="#">Esqueceu a senha?</a>
                        </div>
                    </div>
                </div>

                <div id="box__btn">
                    <button type="submit" id="submit" name="submit" class="btn btn-primary">Entrar</button>
                    <a type="button" class="btn btn-outline-primary" href="../cad-fml/">Cadastrar Família</a>
                </div>
            </form>
        </main>
    </div>

    <!-- campo escondido -->
    <input id="msgErro" name="msgErro" value="<?php echo $_GET['msg'] ?>" hidden></input>


</body>

<script src="https://unpkg.com/imask"></script>
<script src="./main.js"></script>

</html>