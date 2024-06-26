<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Famílias</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous">
    <link rel="stylesheet" href="../style/style-geral.css">
    <link rel="stylesheet" href="style-fml.css">
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
        if ($_SESSION["codPerfil"] != 1 and $_SESSION["codPerfil"] != 2) {
            header("location: ../homepage/index.php");
        }

        $codPerfil = $_SESSION["codPerfil"];
        $id_familiaLogado = $_SESSION["id_familia"];
        $id_comunidadeLogado = $_SESSION["id_comunidade"];
    }

    ?>

    <div class="sticky-top">
        <?php
        include("../navbar/navbar.php");
        ?>
    </div>

    <!-- _____________________ modal confirmação exclusão famílias  _____________________  -->
    <div class="modal fade" id="modalExclusaoFamilia" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h1 class="modal-title fs-5" id="staticBackdropLabel">Excluir Família</h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    Deseja excluir esta Família?
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Cancelar</button>
                    <button type="button" class="btn btn-primary" id="btnDeleteFamiliaModal" value="" onclick="deleteFamilia(this.value)">Excluir</button>
                </div>
            </div>
        </div>
    </div>
    <!--  __________________________________________________________________________________  -->

    <div class="box__search">
        <input type="search" class="form-control w-25" placeholder="Pesquisar família" id="pesquisar">
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
                            <th scope="col" class="col-4">Nome</th>
                            <th scope="col" class="col-4">Comunidade</th>
                            <th scope="col" class="col-2">Email</th>
                            <th scope="col" class="col-2">...</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        include_once "../../controlador/buscarFamilias.php";
                        include_once "../../controlador/buscarComunidades.php";

                        // Chamando o controlador para fornecer as famílias a serem exibidas
                        $result = buscarFamilias();

                        while ($user_data = mysqli_fetch_assoc($result)) {
                            $id_familia = $user_data['id_familia'];
                            $ativo = $user_data['ativo'];

                            // Se for administrador (codPerfil == 2), vê todas as famílias; 
                            // Se for conselheiro (codPerfil == 1), verá somente as famílias da sua comunidade (id_comunidadeLogado == id_comunidade).

                            if ($codPerfil == 2 || ($codPerfil == 1 && $id_comunidadeLogado == $user_data['id_comunidade'])) {

                                echo "<tr id='item-familia-$id_familia' class='nome-familia";
                                if ($ativo == 0) {
                                    echo " esmaecer";
                                }
                                echo "'>";

                                // echo "<td onclick='redirecionarPerfilFamilia(" . $id_familia . ")'>" . $id_familia. "</td>";
                                echo "<td onclick='redirecionarPerfilFamilia(" . $id_familia . ")'>" . $user_data['nome'] . "</td>";
                                echo "<td onclick='redirecionarPerfilFamilia(" . $id_familia . ")'>" . buscarDadosComunidade($user_data['id_comunidade']) . "</td>";
                                echo "<td onclick='redirecionarPerfilFamilia(" . $id_familia . ")'>" . $user_data['email'] . "</td>";
                                echo "<td>
                                        <div class='buttonsFamilia'>
                                            <a class='btn btn-sm btn-primary' href='../../controlador/editarFamilia.php?id_familia=$id_familia'>
                                                <i class='bi bi-pencil' style='font-size:16px;'></i>
                                            </a>

                                            <a class='btn btn-sm btn-danger btn-exclusaoFamilia' data-bs-toggle='modal' data-bs-target='#modalExclusaoFamilia' onclick='setarModalExclusao($id_familia)'>
                                                <i class='bi bi-trash3-fill' style='font-size:16px;'></i>
                                            </a>
                                            
                                            <div class='form-check form-switch'>
                                                <input class='form-check-input' type='checkbox' role='switch' style='font-size:18px'";

                                if ($ativo == 1) {
                                    echo " checked ";
                                }

                                echo "id='radioStatusFamilia-$id_familia' onclick='mudarStatus(\"item-familia-$id_familia\"); ativarDesativarFamilia($id_familia, this.checked)'>
                                            </div>    
                                        </div>      
                                    </td>";

                                echo "</tr>";
                            }
                        }
                        ?>
                    </tbody>
                </table>
            </div>
        </div>
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
        document.getElementById('btnDeleteFamiliaModal').value = id;
    }

    function deleteFamilia(id) {
        window.location.href = "../../controlador/deletarFamilia.php?id_familia=" + id;
    }

    function redirecionarPerfilFamilia(id) {
        window.location.href = "../perfil-fml/index.php?id_familia=" + id;
    }
</script>

</html>