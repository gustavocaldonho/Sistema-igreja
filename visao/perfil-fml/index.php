<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Perfil Família</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous">
    <link rel="stylesheet" href="../style/style-geral.css">
    <link rel="stylesheet" href="../../visao/navbar/style-navbar.css">
    <link rel="stylesheet" href="style-perfilFml.css">
</head>

<?php

include("../login/inicia-sessao.php");

if ((!isset($_SESSION["cpf"]) == true) and (!isset($_SESSION["senha"]) == true)) {

    unset($_SESSION["cpf"]);
    unset($_SESSION["senha"]);
    header("Location: ../login/index.php");
} else {

    include_once("../../dao/conexao.php");
    include_once("../../dao/familiaDAO.php");
    include_once("../../dao/membroFamiliaDAO.php");
    include_once("../../dao/comunidadeDAO.php");
    include_once("../../dao/loginDAO.php");
    include_once("../../dao/dizimoDAO.php");
    include_once("../login/funcoesPHP.php");

    $conexao = conectar();

    // ao clicar numa família na aba 'famílias' (somente o conselheiro (1) e o administrador(2) podem visualizar os perfis de outras famílias, além das suas próprias)
    if (isset($_GET['id_familia']) && ($_SESSION['codPerfil'] == 1 || $_SESSION['codPerfil'] == 2)) {
        $id_familia = $_GET['id_familia'];
    } else {
        // quando o usuário clica para ver o perfil da sua família
        $id_familia = $_SESSION['id_familia'];
    }

    // Buscando os dados da família (com base no id_familia passado na url)
    $resFamilia = getDadosFamilia($conexao, $id_familia); // familiaDAO
    $arrayDadosFamilia = getDadosFamiliaPerfil($resFamilia); // login/funcoesPHP
    $nomeFamilia = $arrayDadosFamilia[0];
    $id_comunidade = $arrayDadosFamilia[2];
    // print_r($arrayDadosFamilia[0] . " " . $arrayDadosFamilia[1] . " " . $arrayDadosFamilia[2]);

    // Buscando os dados da comunidade
    $resComunidade = getDadosComunidade($conexao, $id_comunidade); // comunidadeDAO
    $arrayDadosComunidade = getDadosComunidadePerfil($resComunidade); // login/funcoesPHP
    $padroeiro = $arrayDadosComunidade[0];
    $localizacao = $arrayDadosComunidade[1];
    // print_r($arrayDadosComunidade[0] . " " . $arrayDadosComunidade[1] . " " . $arrayDadosComunidade[2]);

}

?>

<body>
    <div class="sticky-top">
        <?php
        include("../navbar/navbar.php");
        ?>
    </div>

    <!-- __________________________ modal confirmação exclusão membro  __________________________  -->
    <div class="modal fade" id="modalExclusaoMembro" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1"
        aria-labelledby="staticBackdropLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h1 class="modal-title fs-5" id="staticBackdropLabel">Excluir Membro</h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    Deseja excluir este membro?
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Cancelar</button>
                    <button type="button" class="btn btn-primary" id="btnDeleteMembroModal" value=""
                        onclick="deleteMembro(this.value)">Excluir</button>
                </div>
            </div>
        </div>
    </div>
    <!--  __________________________________________________________________________________  -->

    <!-- _____________________ modal de alteração da senha _____________________ -->
    <div class="modal fade" id="modal-alterarSenha" tabindex="-1" aria-labelledby="exampleModalLabel"
        aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h1 class="modal-title fs-5" id="exampleModalLabel">Alterar Senha</h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form id="form_alterarSenha" name="form_alterarSenha" enctype='multipart/form-data'
                        action="../../controlador/alterarSenha.php" method="POST" class="row g-3">
                        <div>
                            <label for="senhaAtual" class="col-form-label">Senha Atual</label>
                            <input type="password" class="form-control" id="senhaAtual" name="senhaAtual"
                                maxlength="45">
                        </div>
                        <div>
                            <label for="novaSenha" class="col-form-label">Nova Senha</label>
                            <input type="password" class="form-control" id="novaSenha" name="novaSenha" maxlength="45">
                        </div>
                        <div>
                            <label for="novaSenhaConfirmacao" class="col-form-label">Confirme sua nova senha</label>
                            <input type="password" class="form-control" id="novaSenhaConfirmacao"
                                name="novaSenhaConfirmacao" maxlength="45">
                        </div>

                        <!-- Campos escondido para passar o cpf do membro -->
                        <input type="text" id="cpf_membro" name="cpf_membro" value="<?php echo $_SESSION["cpf"] ?>"
                            hidden>

                        <div class="modal-footer">
                            <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Fechar</button>
                            <button type="submit" class="btn btn-primary">Alterar</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <!-- _____________________ modal confirmação alteração senha  _____________________  -->
    <div class="modal fade" id="modalConfirmacaoAlterarSenha" data-bs-backdrop="static" data-bs-keyboard="false"
        tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h1 class="modal-title fs-5" id="staticBackdropLabel">Aviso</h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <?php echo $_GET["msg"] ?>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-success" data-bs-dismiss="modal">OK</button>
                </div>
            </div>
        </div>
    </div>
    <!--  __________________________________________________________________________________  -->


    <div class="container">
        <div class="box__img">
            <div>
                <?php
                $result = getDadosFamilia($conexao, $id_familia);
                while ($user_data = mysqli_fetch_assoc($result)) {
                    $foto = $user_data["foto"];
                }

                if (isset($foto)) {
                    echo '<img src="data:image/jpeg;base64,' . base64_encode($foto) . '"/>';
                } else {
                    echo '<img src="img/retrato-familia.avif" alt="foto da família">';
                }
                ?>
            </div>
        </div>

        <div class="box__NomeFamilia">
            <h1> <?php echo $nomeFamilia; ?> </h1>
            <h5><a href="../perfil-com/index.php?id_comunidade=<?php echo $id_comunidade ?>">
                    <?php echo "$padroeiro - $localizacao"; ?> </a></h5>
        </div>

        <!-- <hr> -->

        <div class="box__membros-familia">
            <div class="titulo">
                <h3>Membros da Família</h3>
            </div>

            <div class="body">

                <?php

                // Buscando os dados dos membros da família
                $resMembros = getDadosMembrosFamilia($conexao, $id_familia);

                // Passa uma linha por vez
                while ($user_data = mysqli_fetch_assoc($resMembros)) {
                    $cpf = $user_data["cpf"];
                    $nome = $user_data["nome"];

                    echo "
                        <div class='card text-center'>
                            <button class='btn-deleteMb btn btn-sm' data-bs-toggle='modal' data-bs-target='#modalExclusaoMembro' onclick=setarIdModalExclusaoMembro($cpf)>
                                <svg xmlns='http://www.w3.org/2000/svg' width='16' height='16' fill='currentColor'
                                    class='bi bi-trash3-fill' viewBox='0 0 16 16'>
                                    <path
                                        d='M11 1.5v1h3.5a.5.5 0 0 1 0 1h-.538l-.853 10.66A2 2 0 0 1 11.115 16h-6.23a2 2 0 0 1-1.994-1.84L2.038 3.5H1.5a.5.5 0 0 1 0-1H5v-1A1.5 1.5 0 0 1 6.5 0h3A1.5 1.5 0 0 1 11 1.5Zm-5 0v1h4v-1a.5.5 0 0 0-.5-.5h-3a.5.5 0 0 0-.5.5ZM4.5 5.029l.5 8.5a.5.5 0 1 0 .998-.06l-.5-8.5a.5.5 0 1 0-.998.06Zm6.53-.528a.5.5 0 0 0-.528.47l-.5 8.5a.5.5 0 0 0 .998.058l.5-8.5a.5.5 0 0 0-.47-.528ZM8 4.5a.5.5 0 0 0-.5.5v8.5a.5.5 0 0 0 1 0V5a.5.5 0 0 0-.5-.5Z' />
                                </svg>
                            </button>
                            <div class='card-body'>
                                <p class='card-title'>$nome</p>
                            </div>
                        </div>
                        ";
                }

                ?>

                <!-------------- Modelo padrão (Código de backup) ------------>
                <div class="card text-center" hidden>
                    <div class="card-body">
                        <p class="card-title">Pessoa Sobrenome Sobrenome Sobrenome Sobrenome</p>
                    </div>
                </div>
                <!------------------------------------------------------------>

            </div>

            <div class="button">
                <a id="btn-editFamilia" name="btn-editFamilia" class="btn btn-primary"
                    href="../../controlador/editarFamilia.php?id_familia=<?php echo $id_familia; ?>">
                    <svg xmlns="http://www.w3.org/2000/svg" width="21" height="21" fill="currentColor"
                        class="bi bi-pencil-square mb-1" viewBox="0 0 16 16">
                        <path
                            d="M15.502 1.94a.5.5 0 0 1 0 .706L14.459 3.69l-2-2L13.502.646a.5.5 0 0 1 .707 0l1.293 1.293zm-1.75 2.456-2-2L4.939 9.21a.5.5 0 0 0-.121.196l-.805 2.414a.25.25 0 0 0 .316.316l2.414-.805a.5.5 0 0 0 .196-.12l6.813-6.814z" />
                        <path fill-rule="evenodd"
                            d="M1 13.5A1.5 1.5 0 0 0 2.5 15h11a1.5 1.5 0 0 0 1.5-1.5v-6a.5.5 0 0 0-1 0v6a.5.5 0 0 1-.5.5h-11a.5.5 0 0 1-.5-.5v-11a.5.5 0 0 1 .5-.5H9a.5.5 0 0 0 0-1H2.5A1.5 1.5 0 0 0 1 2.5v11z" />
                    </svg> Editar Família</a>

                <!-- Botão teste -->
                <a id="btn-alterarSenha" class="btn btn-sm btn-primary" data-bs-toggle="modal"
                    data-bs-target="#modal-alterarSenha">
                    Alterar Minha Senha</a>
            </div>

        </div>

        <hr>

        <div class="box__pagamentos">
            <div class="titulo">
                <h3>Colaborações</h3>
            </div>

            <div class="body">
                <div class="dizimo">
                    <table>
                        <thead>
                            <th scope="col" class="col-12 mb-3">Dízimo</th>
                        </thead>
                        <tbody>
                            <tr>
                                <td>
                                    <div class="btn-group" role="group" aria-label="Basic checkbox toggle button group">

                                        <?php
                                        function getStatusMes($result)
                                        {
                                            while ($user_data = mysqli_fetch_assoc($result)) {
                                                $status = $user_data["status"];

                                                // echo "mês " . $c . ": " . $status . " ";
                                                if (empty($status)) {
                                                    return null;
                                                } else {
                                                    return $status;
                                                }
                                            }
                                        }

                                        function renderizarMes($checked, $cor, $contador, $mes)
                                        {
                                            $bloco = "
                                            <input type='checkbox' class='btn-check' id='btncheck$contador' autocomplete='off'
                                            $checked disabled>
                                            <label class='btn btn-outline-$cor' for='btncheck$contador'>$mes</label>
                                            ";

                                            return $bloco;
                                        }

                                        $meses = ["0", "JAN", "FEV", "MAR", "ABR", "MAI", "JUN", "JUL", "AGO", "SET", "OUT", "NOV", "DEZ"];

                                        $c = 1; //contador
                                        foreach ($meses as $mes) {
                                            if ($mes != 0) {
                                                $conexao = conectar();
                                                $resultStatus = selectPagamento($conexao, $id_familia, $c);
                                                $status = getStatusMes($resultStatus);

                                                // if (empty($status)) {
                                                //     echo "null ";
                                                // } else {
                                                //     echo $status . " ";
                                                // }

                                                // status == null, significa que não houve pagamento naquele mês, logo, será contemplado no case default;
                                                if (empty($status)) {
                                                    $status = 3;
                                                }

                                                switch ($status) {
                                                        // case 0:
                                                        // echo renderizarMes("checked", "danger", $c, $mes);
                                                        // break;
                                                    case 1:
                                                        echo renderizarMes("checked", "success", $c, $mes);
                                                        break;
                                                    case 2:
                                                        echo renderizarMes("checked", "warning", $c, $mes);
                                                        break;
                                                    default:
                                                        echo renderizarMes("", "success", $c, $mes);
                                                        break;
                                                }

                                                $c++;
                                            }
                                        }



                                        ?>
                                    </div>
                                </td>
                            </tr>
                        </tbody>
                    </table>
                </div>

                <div class="caixaMortuario">
                    <table>
                        <thead>
                            <th scope="col" class="col-12">Caixa Mortuário</th>
                        </thead>
                        <tbody>
                            <tr>
                                <td>
                                    <div class="btn-group" role="group" aria-label="Basic checkbox toggle button group">
                                        <input type="checkbox" class="btn-check" id="btncheck23" autocomplete="off"
                                            checked disabled>
                                        <label class="btn btn-outline-success" for="btncheck23">2023</label>

                                        <input type="checkbox" class="btn-check" id="btncheck24" autocomplete="off"
                                            disabled>
                                        <label class="btn btn-outline-success" for="btncheck24">2024</label>

                                        <input type="checkbox" class="btn-check" id="btncheck24" autocomplete="off"
                                            disabled>
                                        <label class="btn btn-outline-success" for="btncheck24">2025</label>

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

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js"
    integrity="sha384-ENjdO4Dr2bkBIFxQpeoTz1HIcje39Wm4jDKdf19U8gI4ddQ3GYNS7NTKfAdVQSZe" crossorigin="anonymous">
</script>

<script src='../funcoesJS/funcoes.js'></script>

<script>
function setarIdModalExclusaoMembro(id) {
    document.getElementById('btnDeleteMembroModal').value = id;
}

function deleteMembro(id) {
    window.location.href = "../../controlador/deletarMembro.php?id=" + id;
}
</script>


</html>