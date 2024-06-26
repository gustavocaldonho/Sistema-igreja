<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Perfil Comunidade</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
    <link rel="stylesheet" href="../style/style-geral.css">
    <link rel="stylesheet" href="../../visao/navbar/style-navbar.css">
    <link rel="stylesheet" href="style-perfilCom.css">
</head>

<?php

include("../login/inicia-sessao.php");

if ((!isset($_SESSION["cpf"]) == true) and ((!isset($_SESSION["senha"])) == true)) {

    unset($_SESSION["cpf"]);
    unset($_SESSION["senha"]);
    header("Location: ../login/index.php");
} else {

    include_once("../../dao/conexao.php");
    include_once("../../dao/familiaDAO.php");
    include_once("../../dao/membroFamiliaDAO.php");
    include_once("../../dao/membroConselhoDAO.php");
    include_once("../../dao/comunidadeDAO.php");
    include_once("../../dao/loginDAO.php");
    include_once("../login/funcoesPHP.php");

    $conexao = conectar();

    // se houver o id_comunidade na url e se estiver logado um administrador -> acesso a todas as comunidades (aba 'Comunidades')
    if (isset($_GET['id_comunidade']) && $_SESSION['codPerfil'] == 2) {
        $id_comunidade = $_GET['id_comunidade'];
    } else {
        // quando o usuário ou o conselheiro clica para ver o perfil da sua comunidade
        $id_comunidade = $_SESSION['id_comunidade'];
    }

    // Buscando os dados da comunidade (com base no id_comunidade passado na url)
    $resComunidade = getDadosComunidade($conexao, $id_comunidade); // comunidadeDAO
    $arrayDadosComunidade = getDadosComunidadePerfil($resComunidade); // login/funcoesPHP
    $padroeiro = $arrayDadosComunidade[0];
    $localizacao = $arrayDadosComunidade[1];
    // print_r($arrayDadosComunidade[0] . " " . $arrayDadosComunidade[1] . " " . $arrayDadosComunidade[2]);

    // Buscando a quatidade de famílias que pertencem a comunidade
    $resQtdFamilias = getQtdFamiliasComunidade($conexao, $id_comunidade);
    while ($user_data = mysqli_fetch_assoc($resQtdFamilias)) {
        $qtdFamilias = $user_data['qtd'];
    }

    // Buscando a quatidade de membros que pertencem a comunidade
    $resQtdMembros = getQtdMembrosComunidade($conexao, $id_comunidade);
    while ($user_data = mysqli_fetch_assoc($resQtdMembros)) {
        $qtdMembros = $user_data['qtd'];
    }
}

?>

<body>
    <div class="sticky-top">
        <?php
        include("../navbar/navbar.php");
        ?>
    </div>

    <!-- ___________________________________ modal de cadastro dos avisos _________________________________ -->
    <div class="modal fade" id="modal-conselho" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h1 class="modal-title fs-5" id="exampleModalLabel">Inserir novo Membro do Conselho</h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form id="form_conselho" name="form_conselho" enctype='multipart/form-data' action="../../controlador/cadMembroConselho.php" method="POST" class="row g-3">
                        <div>
                            <label for="listaMembros" class="form-label required ">Membro</label>
                            <select class="form-select" id="listaMembros" name="listaMembros">
                                <option value="0" selected>Selecione o Novo Membro</option>

                                <?php
                                if (isset($_GET['id_comunidade'])) {
                                    $id_comunidade = $_GET['id_comunidade'];
                                }

                                $conexao = conectar();
                                $itens = carregarComboMembros($conexao, $id_comunidade);
                                echo $itens;
                                ?>
                            </select>
                        </div>
                        <div>
                            <label for="inputCargo" class="col-form-label">Cargo</label>
                            <input type="text" class="form-control" id="inputCargo" name="inputCargo" maxlength="100">
                        </div>


                        <!-- Campo escondido para passar o id da comunidade (se for inserção — id da comunidade de quem está logado; se for update — id da comunidade de quem já havia inserido o aviso -->
                        <input type="text" id="id_comunidade" name="id_comunidade" value="<?php echo $_GET['id_comunidade'] ?>" hidden>

                        <div class="modal-footer">
                            <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Fechar</button>
                            <button type="submit" class="btn btn-primary">Inserir</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <!-- ______________________________________________________________________________________________________ -->

    <!-- __________________________ modal confirmação exclusão membro  __________________________  -->
    <div class="modal fade" id="modalExclusaoMembroConselho" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h1 class="modal-title fs-5" id="staticBackdropLabel">Excluir Membro do Conselho</h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    Deseja excluir este Membro do Conselho?
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Cancelar</button>
                    <button type="button" class="btn btn-primary" id="btnDeleteMembroConselhoModal" value="" onclick="deleteMembroConselho(this.value, <?php echo $id_comunidade ?>)">Excluir</button>
                </div>
            </div>
        </div>
    </div>
    <!--  __________________________________________________________________________________  -->

    <div class="container">

        <div class="box__img">
            <div>
                <?php
                $result = getDadosComunidade($conexao, $id_comunidade);
                while ($user_data = mysqli_fetch_assoc($result)) {
                    $foto = $user_data["foto"];
                }

                if (isset($foto)) {
                    echo '<img src="data:image/jpeg;base64,' . base64_encode($foto) . '"/>';
                } else {
                    echo '<img src="img/desenho-igreja-sem-padding.avif" alt="foto-igreja">';
                }
                ?>
            </div>
        </div>

        <div class="box__NomeComunidade">
            <h1><?php echo $padroeiro; ?></h1>
            <h5><?php echo $localizacao; ?></h5>
        </div>

        <div class="box__estatisticas">
            <div class="bloco">
                <div>
                    <p class="number"><?php echo $qtdFamilias; ?></p>
                </div>
                <div>
                    <p class="text"><i>Famílias</i></p>
                </div>
            </div>
            <div class="bloco">
                <div>
                    <p class="number"><?php echo $qtdMembros; ?></p>
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

                <?php
                $result = getMembrosConselho($conexao);

                while ($user_data = mysqli_fetch_assoc($result)) {
                    $cargo = $user_data["cargo"];
                    $cpf = $user_data["membro_familia_cpf"];

                    $resultNome = getNomeMembroConselho($conexao, $cpf, $id_comunidade);

                    if ($resultNome != "") {
                        echo "
                            <div class='card text-center'>";

                        if ($codPerfil == 1 || $codPerfil == 2) {
                            echo
                            "<button class='btn-deleteMbConselho btn btn-sm' data-bs-toggle='modal'     data-bs-target='#modalExclusaoMembroConselho' onclick=setarIdModalExclusaoMembroConselho($cpf)>
                                <i class='bi bi-trash3-fill'></i>
                            </button>";
                        }
                        echo
                        "<div class='card-body'>
                                <h5 class='card-title'>$resultNome</h5>
                                <p class='card-text text-secondary'>$cargo</p>
                            </div>
                        </div>";
                    }
                }
                ?>
            </div>

            <?php
            if ($codPerfil == 1 || $codPerfil == 2) {
                echo " 
                <div class='button'>
                    <button type='button' id='btn-editConselho' name='btn-editConselho' class='btn btn-primary'
                        data-bs-toggle='modal' data-bs-target='#modal-conselho' data-bs-whatever='@mdo'
                        onclick='setarModalConselho()'>

                        <i class='bi bi-plus-circle mb-1' style='font-size: 21px;'></i>
                            Adicionar Membro
                    </button>
                </div>";
            }
            ?>
        </div>
    </div>
</body>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ENjdO4Dr2bkBIFxQpeoTz1HIcje39Wm4jDKdf19U8gI4ddQ3GYNS7NTKfAdVQSZe" crossorigin="anonymous">
</script>

<script src='../funcoesJS/funcoes.js'></script>

<script>
    function setarModalConselho() {
        document.getElementById("funcaoConselho").value = "";
        document.getElementById("listaMembros").value = 0;
    }

    function setarIdModalExclusaoMembroConselho(id) {
        document.getElementById('btnDeleteMembroConselhoModal').value = id;
    }

    function deleteMembroConselho(id, id_comunidade) {
        window.location.href = "../../controlador/deletarMembroConselho.php?id=" + id + "&id_comunidade=" + id_comunidade;
    }
</script>

</html>