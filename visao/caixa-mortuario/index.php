<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous">
    <link rel="stylesheet" href="../style/style-geral.css">
    <link rel="stylesheet" href="style-cm.css">
    <link rel="stylesheet" href="../navbar/style-navbar.css">
    <title>Caixa Mortuário</title>
</head>

<body>

    <header id="header"></header>

    <div class="container">
        <h1>Caixa Mortuário</h1>

        <div class="box__btn-group">
            <div class="box__h4">
                <h4>Relatório de</h4>
            </div>
            <div class="box__select">
            <select class="form-select select-ano" aria-label="Default select example">
                <option value="2023" selected>2023</option>
                <option value="2024">2024</option>
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