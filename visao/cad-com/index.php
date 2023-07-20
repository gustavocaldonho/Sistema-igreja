<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cadastro Comunidade</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous">
    <link rel="stylesheet" href="../style/style-geral.css">
    <link rel="stylesheet" href="style-cadcom.css">
    <link rel="stylesheet" href="../navbar/style-navbar.css">
</head>

<?php

if (isset($_GET["padroeiro"]) && isset($_GET["localizacao"]) && isset($_GET["email"])) {
    $padroeiro = $_GET["padroeiro"];
    $localizacao = $_GET["localizacao"];
    $email = $_GET["email"];
}

?>

<body>

    <header id="header"></header>

    <h2 class="text-center">Cadastro Comunidade</h2>
    <div class="container">
        <form id="formulario" name="formulario" action="../../controlador/cadComunidade.php" method="POST" class="row g-3 form-cadastro">
            <div class="col-md-12">
                <label for="inputPadroeiro" class="form-label required">Padroeiro da Comunidade</label>
                <input type="text" class="form-control" id="inputPadroeiro" name="inputPadroeiro" placeholder="ex.: São Geraldo Magela" onblur="verifText(this), duplicacaoPadroeiro(this)" required value="<?php if (isset($padroeiro)) echo $padroeiro ?>">
            </div>

            <div class="col-md-6">
                <label for="inputLocalizacao" class="form-label required">Localização</label>
                <input type="text" class="form-control" id="inputLocalizacao" name="inputLocalizacao" placeholder="ex.: Sapucaia" onblur="verifText(this)" required value="<?php if (isset($localizacao)) echo $localizacao ?>">
            </div>

            <div class="col-md-6">
                <label for="inputEmail" class="form-label required">E-mail</label>
                <input type="email" class="form-control" id="inputEmail" name="inputEmail" placeholder="ex.: saogeraldo@gmail.com" onblur="verifEmail(this)" required value="<?php if (isset($email)) echo $email ?>">
            </div>

            <div class="col-md-12 box__buttons">
                <a name="btnCancelar" id="btn-cancelar" name="btn-cancelar" class="btn btn-danger" href="../comunidades/index.php">Cancelar</a>

                <button type="button" id="btn-cadastrar" name="btn-cadastrar" class="btn btn-secondary" onclick="limparCampos()">Limpar</button>

                <button type="submit" id="btn-cadastrar" name="btn-cadastrar" class="btn btn-primary">Cadastrar</button>
            </div>
        </form>
    </div>

    <!-- Campos Inválidos -->
    <div>
        <?php
        if (isset($_GET["msg"])) {
            $msg = $_GET["msg"];
            // echo "<font color=red>$msg</font>";

            echo  "<script>alert('$msg');</script>";
        }

        // if (isset($_GET["padroeiro"]) && isset($_GET["localizacao"]) && isset($_GET["email"])) {
        //     $padroeiro = $_GET["padroeiro"];
        //     $localizacao = $_GET["localizacao"];
        //     $email = $_GET["email"];

        //     echo "<font color=green><br>$padroeiro</font>";
        //     echo "<font color=green><br>$localizacao</font>";
        //     echo "<font color=green><br>$email</font>";
        // }

        ?>
    </div>
</body>

<script src='../funcoesJS/funcoes.js'></script>

<script type="text/javascript">
    carregaDocumento("../navbar/navbar.php", "#header");
    // carregaDocumento("rodape.html", "#mainfooter");
</script>

<script src="https://code.jquery.com/jquery-3.1.1.min.js"></script>

<!-- Código de ativação do js (sem ele, o modal não funciona) -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ENjdO4Dr2bkBIFxQpeoTz1HIcje39Wm4jDKdf19U8gI4ddQ3GYNS7NTKfAdVQSZe" crossorigin="anonymous"></script>

<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>

<script>
    // Se algum campo conter dados incorretos não será feito a submissão do formulário
    $("#formulario").submit(function() {
        // campos
        var campoPadroeiro = document.getElementById("inputPadroeiro");
        var campoLocalizacao = document.getElementById("inputLocalizacao");
        var campoEmail = document.getElementById("inputEmail");

        // NÃO PEGA O ERRO "PADROEIRO JÁ CADASTRADO"
        if (campoPadroeiro.classList.contains("is-invalid") || campoLocalizacao.classList.contains("is-invalid") || campoEmail.classList.contains("is-invalid")) {
            alert('Campos Inválidos!');
            return false;
        }
    });
</script>

<script>
    function limparCampos() {
        document.getElementById("inputPadroeiro").value = "";
        document.getElementById("inputLocalizacao").value = "";
        document.getElementById("inputEmail").value = "";
    }
</script>

</html>