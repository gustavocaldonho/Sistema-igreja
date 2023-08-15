<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Perfil Família</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous">
    <link rel="stylesheet" href="../style/style-geral.css">
    <link rel="stylesheet" href="../../visao/navbar/style-navbar.css">
    <link rel="stylesheet" href="style-perfilFml.css">
</head>

<body class="body">
    <!-- Código para linkar a navbar, que se encontra em arquivo separado -->
    <header id="header"></header>

    <div class="container">
        <div class="box__foto">
            <img src="imgs/retrato-familia.avif" alt="retrato-familia">
        </div>

        <div class="box__infos">
            <div class="box__membros">
                <!-- ######## COLOCAR O EMAIL E A COMUNIDADE DA FAMÍLIA ######## -->
                <table class="table-membros table-sm col-12">
                    <thead>
                        <th scope="col" class="col-4">Membros da Família</th>
                        <th scope="col" class="col-2">CPF</th>
                        <th scope="col" class="col-3">Data De Nascimento</th>
                        <th scope="col" class="col-3">Celular</th>
                    </thead>
                    <tbody>
                        <tr>
                            <td>Ramon Soares</td>
                            <td>000.000.000-00</td>
                            <td>00/00/0000</td>
                            <td>(00) 00000-0000</td>
                        </tr>
                        <tr>
                            <td>Ramon Soares Dias Gomes</td>
                            <td>000.000.000-00</td>
                            <td>00/00/0000</td>
                            <td>(00) 00000-0000</td>
                        </tr>
                        <tr>
                            <td>Delma Gomes Dias</td>
                            <td>000.000.000-00</td>
                            <td>00/00/0000</td>
                            <td>(00) 00000-0000</td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>

        <div class="box__pagamentos">
                <div class="dizimo">
                    <table>
                        <thead>
                            <th scope="col" class="col-12">Pagamentos Dízimo</th>
                        </thead>
                        <tbody>
                            <tr>
                                <td>
                                    <div class="btn-group" role="group" aria-label="Basic checkbox toggle button group">
                                        <input type="checkbox" class="btn-check" id="btncheck1" autocomplete="off" checked disabled>
                                        <label class="btn btn-outline-success" for="btncheck1">JAN</label>

                                        <input type="checkbox" class="btn-check" id="btncheck2" autocomplete="off" checked disabled>
                                        <label class="btn btn-outline-success" for="btncheck2">FEV</label>

                                        <input type="checkbox" class="btn-check" id="btncheck3" autocomplete="off" checked disabled>
                                        <label class="btn btn-outline-success" for="btncheck3">MAR</label>

                                        <input type="checkbox" class="btn-check" id="btncheck4" autocomplete="off" checked disabled>
                                        <label class="btn btn-outline-success" for="btncheck4">ABR</label>

                                        <input type="checkbox" class="btn-check" id="btncheck5" autocomplete="off" checked disabled>
                                        <label class="btn btn-outline-success" for="btncheck5">MAI</label>

                                        <input type="checkbox" class="btn-check" id="btncheck6" autocomplete="off" disabled>
                                        <label class="btn btn-outline-success" for="btncheck6">JUN</label>

                                        <input type="checkbox" class="btn-check" id="btncheck7" autocomplete="off" disabled>
                                        <label class="btn btn-outline-success" for="btncheck7">JUL</label>

                                        <input type="checkbox" class="btn-check" id="btncheck8" autocomplete="off" disabled>
                                        <label class="btn btn-outline-success" for="btncheck8">AGO</label>

                                        <input type="checkbox" class="btn-check" id="btncheck9" autocomplete="off" disabled>
                                        <label class="btn btn-outline-success" for="btncheck9">SET</label>

                                        <input type="checkbox" class="btn-check" id="btncheck10" autocomplete="off" disabled>
                                        <label class="btn btn-outline-success" for="btncheck10">OUT</label>

                                        <input type="checkbox" class="btn-check" id="btncheck11" autocomplete="off" disabled>
                                        <label class="btn btn-outline-success" for="btncheck11">NOV</label>

                                        <input type="checkbox" class="btn-check" id="btncheck12" autocomplete="off" disabled>
                                        <label class="btn btn-outline-success" for="btncheck12">DEZ</label>
                                    </div>
                                </td>
                            </tr>
                        </tbody>
                    </table>
                </div>

                <div class="caixaMortuario">
                    <table>
                        <thead>
                            <th scope="col" class="col-12">Pagamentos Caixa Mortuário</th>
                        </thead>
                        <tbody>
                            <tr>
                                <td>
                                    <div class="btn-group" role="group" aria-label="Basic checkbox toggle button group">
                                        <input type="checkbox" class="btn-check" id="btncheck23" autocomplete="off" checked disabled>
                                        <label class="btn btn-outline-success" for="btncheck23">2023</label>

                                        <input type="checkbox" class="btn-check" id="btncheck24" autocomplete="off" disabled>
                                        <label class="btn btn-outline-success" for="btncheck24">2024</label>

                                    </div>
                                </td>
                            </tr>
                        </tbody>
                    </table>
                </div>

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