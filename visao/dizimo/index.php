<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous">
    <link rel="stylesheet" href="../style/style-geral.css">
    <link rel="stylesheet" href="style-dizimo.css">
    <link rel="stylesheet" href="../navbar/style-navbar.css">
    <title>Dízimo</title>
</head>

<body>

    <?php

    session_start();

    if ((!isset($_SESSION["cpf"]) == true) and (!isset($_SESSION["senha"]) == true)) {
        unset($_SESSION["cpf"]);
        unset($_SESSION["senha"]);
        header("Location: ../login/index.php");
    } else {

    }

    ?>

    <header id="header"></header>

    <div class="container">
        <h1>Dízimo</h1>

        <div class="box__btn-group">
            <div class="box__h4">
                <h4>Relatório de</h4>
            </div>
            <div class="box__select">
                <select class="form-select select-mes" aria-label="Default select example">
                    <option value="0" selected>Mês</option>
                    <option value="1">Janeiro</option>
                    <option value="2">Fevereiro</option>
                    <option value="3">Março</option>
                    <option value="4">Abril</option>
                    <option value="5">Maio</option>
                    <option value="6">Junho</option>
                    <option value="7">Julho</option>
                    <option value="8">Agosto</option>
                    <option value="9">Setembro</option>
                    <option value="10">Outubro</option>
                    <option value="11">Novembro</option>
                    <option value="12">Dezembro</option>
                </select>
            </div>
        </div>

        <div class="relatorio-mes">

            <div class="rel-paroquia">
                <table class="table table-striped">
                    <thead align="center">
                        <tr>
                            <th scope="col" colspan="2">PARÓQUIA</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <th scope="row">Total arrecadado:</th>
                            <td>0,00</td>
                        </tr>
                        <tr>
                            <th scope="row">Total de cadastrados:</th>
                            <td>0</td>
                        </tr>
                        <tr>
                            <th scope="row">Total de pagantes:</th>
                            <td>0</td>
                        </tr>
                    </tbody>
                </table>
            </div>

            <div class="rel-pessoa">
                <table class="table table-striped">
                    <thead align="center">
                        <tr>
                            <th scope="col" colspan="2">PESSOAL</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <th scope="row">Status do pagamento:</th>
                            <td>Não Pago</td>
                        </tr>
                        <tr>
                            <th scope="row">Data do pagamento:</th>
                            <td>xx/xx/xxxx</td>
                        </tr>
                        <tr>
                            <th scope="row">Valor pago:</th>
                            <td>0,00</td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>

        <div class="box__button">
            <button type="button" class="btn btn-success">Fazer Pagamento</button>
        </div>

    </div>

</body>

<script src='../funcoesJS/funcoes.js'></script>

<script type="text/javascript">
    carregaDocumento("../navbar/navbar.php", "#header");
    // carregaDocumento("rodape.html", "#mainfooter");
</script>

</html>