<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous">
    <link rel="stylesheet" href="../style/style-geral.css">
    <link rel="stylesheet" href="style-fml.css">
    <link rel="stylesheet" href="../navbar/style-navbar.css">
    <title>Famílias</title>
</head>

<body>

    <?php

    session_start();

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

    // print_r($codPerfil);

    ?>

    <header id="header"></header>

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
            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-search" viewBox="0 0 16 16">
                <path d="M11.742 10.344a6.5 6.5 0 1 0-1.397 1.398h-.001c.03.04.062.078.098.115l3.85 3.85a1 1 0 0 0 1.415-1.414l-3.85-3.85a1.007 1.007 0 0 0-.115-.1zM12 6.5a5.5 5.5 0 1 1-11 0 5.5 5.5 0 0 1 11 0z" />
            </svg>
        </button>
    </div>
    <div class="box__content-table">
        <div class="box__principal" data-bs-spy="scroll" data-bs-root-margin="0px 0px -40%" data-bs-smooth-scroll="true" class="scrollspy-example bg-light p-3 rounded-2" tabindex="0">
            <div>
                <table class="table table-bg table-hover">
                    <thead>
                        <tr class="sticky-top titulo-table">
                            <th scope="col" class="col-1">#</th>
                            <th scope="col" class="col-4">Nome</th>
                            <th scope="col" class="col-3">Comunidade</th>
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

                        // href='../../controlador/deletarFamilia.php?id=$user_data[id_familia]'

                        // echo "<u>Famílias observadas:</u> ";


                        while ($user_data = mysqli_fetch_assoc($result)) {
                            $id_familia = $user_data['id_familia'];

                            // Se for administrador (codPerfil == 2), vê todas as famílias; 
                            // Se for conselheiro (codPerfil == 1), verá somente as famílias da sua comunidade (id_comunidadeLogado == id_comunidade).

                            if ($codPerfil == 2 || ($codPerfil == 1 && $id_comunidadeLogado == $user_data['id_comunidade'])) {
                                // echo "[" . $user_data['nome'] . "] ";
                                // }

                                echo "<tr>";
                                echo "<td>" . $user_data['id_familia'] . "</td>";
                                echo "<td> <a class='btn nome-familia' href='../perfil-fml/index.php?id_familia=" . $id_familia . "'>" . $user_data['nome'] . "</a></td>";
                                echo "<td>" . buscarDadosComunidade($user_data['id_comunidade']) . "</td>";
                                echo "<td>" . $user_data['email'] . "</td>";
                                echo "<td>
                                        <a class='btn btn-sm btn-primary' href='../../controlador/editarFamilia.php?id_familia=$user_data[id_familia]'>
                                            <svg xmlns='http://www.w3.org/2000/svg' width='16' height='16' fill='currentColor' class='bi bi-pencil' viewBox='0 0 16 16'>
                                                <path d='M12.146.146a.5.5 0 0 1 .708 0l3 3a.5.5 0 0 1 0 .708l-10 10a.5.5 0 0 1-.168.11l-5 2a.5.5 0 0 1-.65-.65l2-5a.5.5 0 0 1 .11-.168l10-10zM11.207 2.5 13.5 4.793 14.793 3.5 12.5 1.207 11.207 2.5zm1.586 3L10.5 3.207 4 9.707V10h.5a.5.5 0 0 1 .5.5v.5h.5a.5.5 0 0 1 .5.5v.5h.293l6.5-6.5zm-9.761 5.175-.106.106-1.528 3.821 3.821-1.528.106-.106A.5.5 0 0 1 5 12.5V12h-.5a.5.5 0 0 1-.5-.5V11h-.5a.5.5 0 0 1-.468-.325z'/>
                                            </svg>
                                        </a>

                                        <a class='btn btn-sm btn-danger' data-bs-toggle='modal' data-bs-target='#modalExclusaoFamilia' onclick='setarModalExclusao($id_familia)'>
                                        <svg xmlns=1http://www.w3.org/2000/svg1 width='16' height='16' fill='currentColor' class='bi bi-trash3-fill' viewBox='0 0 16 16'>
                                            <path d='M11 1.5v1h3.5a.5.5 0 0 1 0 1h-.538l-.853 10.66A2 2 0 0 1 11.115 16h-6.23a2 2 0 0 1-1.994-1.84L2.038 3.5H1.5a.5.5 0 0 1 0-1H5v-1A1.5 1.5 0 0 1 6.5 0h3A1.5 1.5 0 0 1 11 1.5Zm-5 0v1h4v-1a.5.5 0 0 0-.5-.5h-3a.5.5 0 0 0-.5.5ZM4.5 5.029l.5 8.5a.5.5 0 1 0 .998-.06l-.5-8.5a.5.5 0 1 0-.998.06Zm6.53-.528a.5.5 0 0 0-.528.47l-.5 8.5a.5.5 0 0 0 .998.058l.5-8.5a.5.5 0 0 0-.47-.528ZM8 4.5a.5.5 0 0 0-.5.5v8.5a.5.5 0 0 0 1 0V5a.5.5 0 0 0-.5-.5Z' />
                                        </svg>
                                        </a>
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

    <!-- __________________________________ DESATIVADO __________________________________ -->

    <!-- Devolver classe 'collapse' -->
    <div class="collapse box__tableMembros" id="collapseExample" hidden>

        <div class="sub-box__left">
            <table class="table-membros table-sm col-12">
                <thead>
                    <th scope="col" class="col-8">Membros da Família</th>
                    <th scope="col" class="col-4">CPF</th>
                </thead>
                <tbody>
                    <tr>
                        <td>Ramon Soares</td>
                        <td>000.000.000-00</td>
                    </tr>
                    <tr>
                        <td>Ramon Soares Dias Gomes</td>
                        <td>000.000.000-00</td>
                    </tr>
                    <tr>
                        <td>Delma Gomes Dias</td>
                        <td>000.000.000-00</td>
                    </tr>
                </tbody>
            </table>
        </div>

        <div class="sub-box__right">
            <div class="sub-box__right-top">
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
            <div class="sub-box__right-down">
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
</body>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ENjdO4Dr2bkBIFxQpeoTz1HIcje39Wm4jDKdf19U8gI4ddQ3GYNS7NTKfAdVQSZe" crossorigin="anonymous"></script>

<script src='../funcoesJS/funcoes.js'></script>

<script type="text/javascript">
    carregaDocumento("../navbar/navbar.php", "#header");
    // carregaDocumento("rodape.html", "#mainfooter");
</script>

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
</script>

<script>
    function setarModalExclusao(id) {
        document.getElementById('btnDeleteFamiliaModal').value = id;
    }

    function deleteFamilia(id) {
        window.location.href = "../../controlador/deletarFamilia.php?id_familia=" + id;
        // alert(id);
    }
</script>

</html>