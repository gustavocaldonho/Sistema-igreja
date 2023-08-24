<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Perfil Comunidade</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous">
    <link rel="stylesheet" href="../style/style-geral.css">
    <link rel="stylesheet" href="../../visao/navbar/style-navbar.css">
    <link rel="stylesheet" href="style-perfilCom.css">
</head>

<?php

session_start();

if ((!isset($_SESSION["cpf"]) == true) and ((!isset($_SESSION["senha"])) == true)) {

    unset($_SESSION["cpf"]);
    unset($_SESSION["senha"]);
    header("Location: ../login/index.php");
} else {

    include_once("../../dao/conexao.php");
    include_once("../../dao/familiaDAO.php");
    include_once("../../dao/comunidadeDAO.php");
    include_once("../../dao/loginDAO.php");
    include_once("../login/funcoesPHP.php");

    $conexao = conectar();

    // print_r($_SESSION["id_familia"]);
}

?>

<body>
    <!-- Código para linkar a navbar, que se encontra em arquivo separado -->
    <header id="header"></header>

    <div class="container">

        <div class="box__img">
            <div>
                <img src="img/desenho-igreja-sem-padding.avif" alt="foto-igreja">
            </div>
        </div>

        <div class="box__NomeComunidade">
            <h1>São Geraldo Magela</h1>
            <h5>Distrito de Sapucaia - Marilândia (ES)</h5>
        </div>

        <div class="box__estatisticas">
            <div class="bloco">
                <div>
                    <p class="number">0</p>
                </div>
                <div>
                    <p class="text"><i>Famílias</i></p>
                </div>
            </div>
            <div class="bloco">
                <div>
                    <p class="number">0</p>
                </div>
                <div>
                    <p class="text"><i>Fiéis</i></p>
                </div>
            </div>
            <div class="bloco">
                <div>
                    <p class="number">0</p>
                </div>
                <div>
                    <p class="text"><i>Pagantes</i></p>
                </div>
            </div>
            <div class="bloco">
                <div>
                    <p class="number">0,00</p>
                </div>
                <div>
                    <p class="text"><i>Dízimo</i></p>
                </div>
            </div>
        </div>

        <hr>

        <div class="box__membros-conselho">
            <div class="titulo">
                <h3>Membros do Conselho</h3>
            </div>

            <div class="body">

                <div class="card text-center">
                    <div class="card-body">
                        <h5 class="card-title">Pessoa Sobrenome Sobrenome</h5>
                        <p class="card-text text-secondary">cargo cargo cargo</p>
                    </div>
                </div>

                <div class="card text-center">
                    <div class="card-body">
                        <h5 class="card-title">Pessoa Sobrenome Sobrenome</h5>
                        <p class="card-text text-secondary">cargo cargo cargo</p>
                    </div>
                </div>

                <div class="card text-center">
                    <div class="card-body">
                        <h5 class="card-title">Pessoa Sobrenome Sobrenome</h5>
                        <p class="card-text text-secondary">cargo cargo cargo</p>
                    </div>
                </div>

                <div class="card text-center">
                    <div class="card-body">
                        <h5 class="card-title">Pessoa Sobrenome Sobrenome</h5>
                        <p class="card-text text-secondary">cargo cargo cargo</p>
                    </div>
                </div>
                <div class="card text-center">
                    <div class="card-body">
                        <h5 class="card-title">Pessoa Sobrenome Sobrenome</h5>
                        <p class="card-text text-secondary">cargo cargo cargo</p>
                    </div>
                </div>
                <div class="card text-center">
                    <div class="card-body">
                        <h5 class="card-title">Pessoa Sobrenome Sobrenome</h5>
                        <p class="card-text text-secondary">cargo cargo cargo</p>
                    </div>
                </div>

            </div>

            <div class="button">
                <button type="button" id="btn-editConselho" name="btn-editConselho" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#modal-avisos" data-bs-whatever="@mdo">
                    <svg xmlns="http://www.w3.org/2000/svg" width="21" height="21" fill="currentColor" class="bi bi-pencil-square mb-1" viewBox="0 0 16 16">
                        <path d="M15.502 1.94a.5.5 0 0 1 0 .706L14.459 3.69l-2-2L13.502.646a.5.5 0 0 1 .707 0l1.293 1.293zm-1.75 2.456-2-2L4.939 9.21a.5.5 0 0 0-.121.196l-.805 2.414a.25.25 0 0 0 .316.316l2.414-.805a.5.5 0 0 0 .196-.12l6.813-6.814z" />
                        <path fill-rule="evenodd" d="M1 13.5A1.5 1.5 0 0 0 2.5 15h11a1.5 1.5 0 0 0 1.5-1.5v-6a.5.5 0 0 0-1 0v6a.5.5 0 0 1-.5.5h-11a.5.5 0 0 1-.5-.5v-11a.5.5 0 0 1 .5-.5H9a.5.5 0 0 0 0-1H2.5A1.5 1.5 0 0 0 1 2.5v11z" />
                    </svg> Editar Conselho</button>
            </div>

        </div>
    </div>
</body>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ENjdO4Dr2bkBIFxQpeoTz1HIcje39Wm4jDKdf19U8gI4ddQ3GYNS7NTKfAdVQSZe" crossorigin="anonymous">
</script>

<script src='../funcoesJS/funcoes.js'></script>

<script type="text/javascript">
    // Código para linkar a navbar
    carregaDocumento("../navbar/navbar.php", "#header");

    // Código para linkar o footer (rodapé)
    // carregaDocumento("rodape.html", "#mainfooter");
</script>

</html>