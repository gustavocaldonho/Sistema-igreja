<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Caixa Mortuário</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous">
    <link rel="stylesheet" href="../style/style-geral.css">
    <link rel="stylesheet" href="style-cm.css">
    <link rel="stylesheet" href="../navbar/style-navbar.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">

</head>

<body>

    <?php

    include("../login/inicia-sessao.php");

    if ((!isset($_SESSION["cpf"]) == true) and (!isset($_SESSION["senha"]) == true)) {
        unset($_SESSION["cpf"]);
        unset($_SESSION["senha"]);
        header("Location: ../login/index.php");
    } else {
    }

    ?>

    <div class="sticky-top">
        <?php
        include("../navbar/navbar.php");
        ?>
    </div>

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
            <button type="button" class="btn btn-success" data-bs-toggle="modal" data-bs-target="#exampleModal" onclick="resetarModalPagamento()">Fazer
                Pagamento</button>
        </div>

        <!-- Modal -->
        <div class="modal fade " id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h1 class="modal-title fs-5" id="exampleModalLabel">Pagamento Caixa Mortuário</h1>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <div id="box__infosPagamento">
                            <label id="labelValor" for="valorPagamento" class="mb-2 fs-5">Neste ano, o valor de
                                recebimento será de R$: 50,00.</label>
                            <div class="input-group mb-3" hidden>
                                <span class="input-group-text">R$:</span>
                                <input id="valorPagamento" class="form-control form-control-lg" type="number" step="0.01" placeholder="ex.: 10.00 (dez reais)">
                            </div>
                            <button id="btn-gerarPix" type="button" class="btn btn-success mt-3" onclick="visualizarQRcode()">Gerar
                                Pix</button>
                        </div>

                        <label id="tituloCodigoPix" for="botaoCopia" class="mb-2">Código Pix:</label>
                        <div id="box__codigoPix">
                            <img id="img-QRcode" src="../dizimo/qrcode.jpg" alt="QR Code pix" class="img-thumbnail mb-2">
                            <div class="input-group mb-3">
                                <input id="codigoCampo" class="form-control fs-6" type="text" value="f00020101021226520014BR.GOV.BCB.PIX0114{chave_pix}520400005303986540511.005802BR5913{nome_recebedor}6007{cidade_recebedor}62070503{valor:.2f}6304{descricao}" readonly>
                                <button id="botaoCopia" class="btn btn-secondary fs-6" onclick="copiarCodigo()" style="color: white; border: none">Copiar</button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

</body>

<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js" integrity="sha384-I7E8VVD/ismYTF4hNIPjVp/Zjvgyol6VFvRkX/vR+Vc4jQkC+hVqc2pM8ODewa9r" crossorigin="anonymous">
</script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.min.js" integrity="sha384-BBtl+eGJRgqQAUMxJ7pMwbEyER4l1g+O15P+16Ep7Q9Q+zqX6gSbd85u4mG4QzX+" crossorigin="anonymous">
</script>

<script src="../funcoesJS/funcoesPagamento.js"></script>

</html>