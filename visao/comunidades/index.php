<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Comunidades</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous">
    <link rel="stylesheet" href="../style/style-geral.css">
    <link rel="stylesheet" href="../navbar/style-navbar.css">
    <link rel="stylesheet" href="../../visao/comunidades/style-com.css">
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
        if ($_SESSION["codPerfil"] != 2) {
            header("location: ../homepage/index.php");
        }
    }

    ?>

    <div class="sticky-top">
        <?php
        include("../navbar/navbar.php");
        ?>
    </div>

    <!-- _____________________ modal confirmação exclusão comunidades  _____________________  -->
    <div class="modal fade" id="modalExclusaoComunidade" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h1 class="modal-title fs-5" id="staticBackdropLabel">Excluir Comunidade</h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    Deseja excluir esta comunidade?
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Cancelar</button>
                    <button type="button" class="btn btn-primary" id="btnDeleteComunidadeModal" value="" onclick="deleteComunidade(this.value)">Excluir</button>
                </div>
            </div>
        </div>
    </div>
    <!--  __________________________________________________________________________________  -->

    <div class="box__search">
        <input type="search" class="form-control w-25" placeholder="Pesquisar comunidade" id="pesquisar" name="pesquisar">
        <button onclick="searchData()" class="btn btn-primary">
            <i class="bi bi-search"></i>
        </button>
    </div>
    <div class="box__content-table">
        <div class="box__principal" data-bs-spy="scroll" data-bs-root-margin="0px 0px -40%" data-bs-smooth-scroll="true" class="scrollspy-example bg-light p-3 rounded-2" tabindex="0">
            <div>
                <table class="table table-bg table-hover">
                    <thead>
                        <tr class="sticky-top titulo-table">
                            <!-- <th scope="col" class="col-1">#</th> -->
                            <th scope="col" class="col-6">Comunidade</th>
                            <th scope="col" class="col-2">Total Arrecadado</th>
                            <th scope="col" class="col-2">Total da Paróquia</th>
                            <th scope="col" class="col-2">...</th>
                        </tr>
                    </thead>
                    <tbody>
                    <tbody>
                        <?php
                        include_once "../../controlador/buscarComunidades.php";

                        // Chamando o controlador para fornecer as comunidades a serem exibidas
                        $result = buscarComunidades();

                        // 
                        while ($user_data = mysqli_fetch_assoc($result)) {
                            $id_comunidade = $user_data['id_comunidade'];
                            $ativo = $user_data['ativo'];
                            $localizacao = $user_data['localizacao'];
                            $padroeiro = $user_data['padroeiro'];

                            echo "<tr id='item-comunidade-$id_comunidade' class='nome-comunidade";
                            if ($ativo == 0) {
                                echo " esmaecer";
                            }
                            echo "'>";
                            // echo "<td onclick='redirecionarPerfilComunidade(" . $user_data['id_comunidade'] . ")'>" . $user_data['id_comunidade'] . "</td>";
                            echo "<td onclick='redirecionarPerfilComunidade(" . $id_comunidade . ")'>"  . $padroeiro . " - " . $localizacao . "</td>";
                            echo "<td onclick='redirecionarPerfilComunidade(" . $id_comunidade . ")'>" . "R$: 0,00" . "</td>";
                            echo "<td onclick='redirecionarPerfilComunidade(" . $id_comunidade . ")'>" . "R$: 0,00" . "</td>";
                            // echo "<td>" . $user_data['R$: 0,00'] . "</td>";
                            // echo "<td>" . $user_data['R$: 0,00'] . "</td>";
                            echo "<td>
                                <div class='buttonsComunidade'>
                                    <a class='btn btn-sm btn-primary' href='../../controlador/editarComunidade.php?id=$id_comunidade'>
                                        <i class='bi bi-pencil' style='font-size:16px;'></i>
                                    </a>

                                    <a class='btn btn-sm btn-danger' data-bs-toggle='modal' data-bs-target='#modalExclusaoComunidade' onclick='setarModalExclusao($id_comunidade)'>
                                        <i class='bi bi-trash3-fill' style='font-size:16px;'></i>
                                    </a>

                                    <div class='form-check form-switch'>
                                        <input class='form-check-input' type='checkbox' role='switch' style='font-size:18px'";

                            if ($ativo == 1) {
                                echo " checked ";
                            }

                            echo "id='radioStatusComunidade-$id_comunidade' onclick='mudarStatus(\"item-comunidade-$id_comunidade\"); ativarDesativarComunidade($id_comunidade, this.checked)'>
                                    </div>                 
                                </div>
                            </td>";

                            echo "</tr>";
                        }
                        ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
    <div class="box_button">
        <a id="btn-cadComunidade" name="btn-cadComunidade" href="../cad-com/" class="btn btn-primary">Adicionar
            Comunidade</a>
    </div>

</body>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ENjdO4Dr2bkBIFxQpeoTz1HIcje39Wm4jDKdf19U8gI4ddQ3GYNS7NTKfAdVQSZe" crossorigin="anonymous">
</script>

<script src="../funcoesJS/funcoes.js"></script>
<script src="../funcoesJS/funcoesAjax.js"></script>

<script>
    var search = document.getElementById('pesquisar');

    search.addEventListener("keydown", function(event) {
        if (event.key === "Enter") {
            searchData();
        }
    });

    function searchData() {
        window.location = 'index.php?search=' + search.value;
    }

    function setarModalExclusao(id) {
        document.getElementById('btnDeleteComunidadeModal').value = id;
    }

    function deleteComunidade(id) {
        window.location.href = "../../controlador/deletarComunidade.php?id_comunidade=" + id;
    }

    function redirecionarPerfilComunidade(id) {
        window.location.href = "../perfil-com/index.php?id_comunidade=" + id;
    }
</script>

</html>