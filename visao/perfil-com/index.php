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

<body>
    <!-- Código para linkar a navbar, que se encontra em arquivo separado -->
    <header id="header"></header>

    <div class="container">
        <div class="box__superior">
            <div class="box__infos">
                <div class="info">
                    <h1>Comunidade São Geraldo Magela</h1>
                    <p>Distrito de Sapucaia - Marilândia (ES)</p>
                </div>
                <div class="box__membros-conselho">

                    <div class="header">
                        <p>Membros do Conselho:</p>
                    </div>

                    <div class="bory">
                        <div class="membro">
                            <img src="img/avatar.png" alt="membro">
                            <p>Amanda Santos</p>
                        </div>
                        <div class="membro">
                            <img src="img/avatar.png" alt="membro">
                            <p>Amanda Santos</p>
                        </div>
                        <div class="membro">
                            <img src="img/avatar.png" alt="membro">
                            <p>Amanda Santos</p>
                        </div>
                        <div class="membro">
                            <img src="img/avatar.png" alt="membro">
                            <p>Amanda Santos</p>
                        </div>
                    </div>

                </div>
            </div>
            <div class="box__img">
                <img src="img/igreja-placeholder.png" alt="igreja">
            </div>
        </div>

        <div class="box__inferior">
            <div class="bloco">
                <div>
                    <p class="number">237</p>
                </div>
                <div>
                    <p class="text">Famílias</p>
                </div>
            </div>
            <div class="bloco">
                <div>
                    <p class="number">198</p>
                </div>
                <div>
                    <p class="text">Pagantes</p>
                </div>
            </div>
            <div class="bloco">
                <div>
                    <p class="number">3.200,00</p>
                </div>
                <div>
                    <p class="text">Dízimo</p>
                </div>
            </div>
            <div class="bloco">
                <div>
                    <p class="number">1522</p>
                </div>
                <div>
                    <p class="text">Fiéis</p>
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