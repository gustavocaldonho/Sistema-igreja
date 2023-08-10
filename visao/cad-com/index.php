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

if (isset($_GET["action"])) {
    $action = "../../controlador/saveEditComunidade.php";
} else {
    $action = "../../controlador/cadComunidade.php";
}


?>

<body>

    <header id="header"></header>

    <h2 class="text-center">Cadastro Comunidade</h2>
    <div class="container">
        <form id="formulario" name="formulario" action="<?php echo $action ?>" method="POST" class="row g-3 form-cadastro">
            <div class="col-md-12">
                <label for="inputPadroeiro" class="form-label required">Padroeiro da Comunidade</label>
                <input type="text" class="form-control" id="inputPadroeiro" name="inputPadroeiro" placeholder="ex.: São Geraldo Magela" onblur="verifText(this)" required value="<?php if (isset($padroeiro)) echo $padroeiro ?>">
            </div>

            <div class="col-md-6">
                <label for="inputLocalizacao" class="form-label required">Localização</label>
                <input type="text" class="form-control" id="inputLocalizacao" name="inputLocalizacao" placeholder="ex.: Sapucaia" onblur="verifText(this)" required value="<?php if (isset($localizacao)) echo $localizacao ?>">
            </div>

            <div class="col-md-6">
                <label for="inputEmail" class="form-label required">E-mail</label>
                <input type="email" class="form-control" id="inputEmail" name="inputEmail" placeholder="ex.: saogeraldo@gmail.com" onblur="verifEmail(this)" required value="<?php if (isset($email)) echo $email ?>">
            </div>

            <!-- campo escondido -->
            <input type="text" id="inputIdComunidade" name="inputIdComunidade" value="<?php if (isset($_GET["id_comunidade"])) echo $_GET["id_comunidade"] ?>" hidden>

            <div class="col-md-12 box__buttons">
                <a name="btnCancelar" id="btn-cancelar" name="btn-cancelar" class="btn btn-danger" href="../comunidades/index.php">Cancelar</a>

                <button type="button" id="btn-cadastrar" name="btn-cadastrar" class="btn btn-secondary" onclick="limparFormulario('formulario')">Limpar</button>

                <button type="submit" id="btn-cadastrar" name="btn-cadastrar" class="btn btn-primary">Cadastrar</button>
            </div>
        </form>

    </div>

    <!-- Exibe a msg de retorno de cadComunidade  -->
    <?php
    if (isset($_GET["cod"])) {
        // cod -> 0 = erro, 1 = sucesso
        $cod = $_GET["cod"];
        $msg = $_GET["msg"];

        if ($cod == "1") {
            // Exibe a mensagem de sucesso
            $titulo = "Cadastro Concluído!";
            $cor = "success";
        } else {
            $titulo = "Falha no Cadastro!";
            $cor = "danger";
        }

        echo "<div id='msgResposta' name='msgResposta' class='alert alert-$cor box__msgResposta' role='alert'>
                <p id='titulo' name='titulo'><b>$titulo</b></p>
                <p id='msg' name='msg'>$msg</p>
        </div>";
    }
    ?>



    <!-- Mensagens de erro ou sucesso no canto inferior direito -->
    <div class='alert alert-danger msg-erro fadeInOut' role='alert' id="msg-erro">
        <p id="mensagem-erro"><svg xmlns="http://www.w3.org/2000/svg" width="22" height="22" fill="currentColor" class="bi bi-exclamation-circle-fill" viewBox="0 0 16 16">
                <path d="M16 8A8 8 0 1 1 0 8a8 8 0 0 1 16 0zM8 4a.905.905 0 0 0-.9.995l.35 3.507a.552.552 0 0 0 1.1 0l.35-3.507A.905.905 0 0 0 8 4zm.002 6a1 1 0 1 0 0 2 1 1 0 0 0 0-2z" />
            </svg></p>
    </div>

    <div class='alert alert-success msg-sucesso fadeInOut' role='alert' id="msg-sucesso">
        <p id="mensagem-sucesso"><svg xmlns="http://www.w3.org/2000/svg" width="22" height="22" fill="currentColor" class="bi bi-check-circle-fill" viewBox="0 0 16 16">
                <path d="M16 8A8 8 0 1 1 0 8a8 8 0 0 1 16 0zm-3.97-3.03a.75.75 0 0 0-1.08.022L7.477 9.417 5.384 7.323a.75.75 0 0 0-1.06 1.06L6.97 11.03a.75.75 0 0 0 1.079-.02l3.992-4.99a.75.75 0 0 0-.01-1.05z" />
            </svg></p>
    </div>
</body>

<script src='../funcoesJS/funcoes.js'></script>
<script src='../../dao/conexao.php'></script>
<script src='../../dao/comunidadeDAO.php'></script>

<script type="text/javascript">
    carregaDocumento("../navbar/navbar.php", "#header");
    // carregaDocumento("rodape.html", "#mainfooter");
</script>

<script src="https://code.jquery.com/jquery-3.1.1.min.js"></script>

<!-- Código de ativação do js (sem ele, o modal não funciona) -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ENjdO4Dr2bkBIFxQpeoTz1HIcje39Wm4jDKdf19U8gI4ddQ3GYNS7NTKfAdVQSZe" crossorigin="anonymous">
</script>

<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>

<script>
    // Função para mostrar a div e depois escondê-la devagar
    var mensagemOriginal = '';

    function mostrarDivPorTempo(divId, pId, tempo, mensagem) {
        var div = document.getElementById(divId);
        var mensagemElement = document.getElementById(pId);

        // Se a mensagem original ainda não foi definida, armazena o conteúdo atual do parágrafo
        if (!mensagemOriginal) {
            mensagemOriginal = mensagemElement.innerHTML.trim();
        }

        // Atualiza o conteúdo do parágrafo com a mensagem original e a nova mensagem
        mensagemElement.innerHTML = mensagemOriginal + ' ' + mensagem;

        div.style.display = 'block';
        div.classList.add('fadeIn');

        setTimeout(function() {
            div.classList.remove('fadeIn');
            div.classList.add('fadeOut');
            setTimeout(function() {
                div.style.display = 'none';
                div.classList.remove('fadeOut');
                // Limpa o texto da mensagem após a animação de fadeOut
                mensagemElement.innerHTML = mensagemOriginal;
            }, 1000); // Tempo da animação de fadeOut
        }, tempo);
    }

    // Aguarde até que o DOM esteja carregado
    document.addEventListener("DOMContentLoaded", function() {
        // Coloque o código de submit aqui

        $("#formulario").submit(function() {
            // campos
            var campoPadroeiro = document.getElementById("inputPadroeiro");
            var campoLocalizacao = document.getElementById("inputLocalizacao");
            var campoEmail = document.getElementById("inputEmail");

            // Verifique se os campos têm dados incorretos
            if (campoPadroeiro.classList.contains("is-invalid") || campoLocalizacao.classList.contains(
                    "is-invalid") ||
                campoEmail.classList.contains("is-invalid")) {
                mostrarDivPorTempo('msg-erro', 'mensagem-erro', 4000, 'Campos Inválidos');
                return false;
            }
        });

    });
</script>

</html>