<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cadastro de Famílias</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous">
    <link rel="stylesheet" href="../style/style-geral.css">
    <link rel="stylesheet" href="style-cadfml.css">
    <link rel="stylesheet" href="../navbar/style-navbar.css">
</head>

<body>

    <header id="header"></header>

    <div class="titulo">
        <h2 class="text-center">Cadastro Família</h2>
    </div>

    <!-- Informar aos usuários que um mesmo login será usado por todos os membros da família. O representante da família não tem caráter de chefe, mas só de um membro comum. -->

    <div class="container">
        <!-- Para os feedbacks abaixo dos campos: https://getbootstrap.com.br/docs/4.1/components/forms/-->
        <form id="formulario" name="formulario" action="../../controlador/cadFamilia.php" method="POST" class="row g-3 form-cadastro">
            <div class="col-md-12">
                <label for="inputNome" class="form-label required">Nome da Família</label>
                <input type="text" class="form-control" id="inputNome" name="inputNome" onblur="verifText(this)" placeholder="" value="<?php if (isset($_GET['nomeFamilia'])) echo $_GET['nomeFamilia'] ?>">
            </div>

            <div class="col-md-6">
                <label for="inputEmail" class="form-label required">E-mail</label>
                <input type="email" class="form-control" id="inputEmail" name="inputEmail" placeholder="nome@gmail.com" onblur="verifEmail(this)" value="<?php if (isset($_GET['email'])) echo $_GET['email'] ?>">
            </div>

            <div class="col-md-6">
                <label for="inputComunidade" class="form-label required ">Comunidade</label>
                <select class="form-select" id="listaComunidades" name="listaComunidades" onblur="verifComunidade(this)">
                    <option value="0" selected>Selecione a sua Comunidade</option>

                    <?php
                    require_once '../../dao/comunidadeDAO.php';
                    require_once '../../dao/conexao.php';

                    // código para a edição da família
                    if (isset($_GET['id_comunidade'])) {
                        $id_comunidade = $_GET['id_comunidade'];
                    } else {
                        $id_comunidade = 0;
                    }

                    $conexao = conectar();
                    $itens = carregarComboComunidades($conexao, $id_comunidade);
                    echo $itens;
                    ?>
                </select>
            </div>


            <div class="box__cadMembros form-group">

                <div class="box__labels">
                    <div class="box__titulos">
                        <input type="text" class="form-control nome label" id="label-nome" placeholder="Nomes dos Membros" disabled>
                        <input type="text" class="form-control cpf label" id="label-cpf" placeholder="CPFs" disabled>
                        <input type="text" class="form-control dn label" id="label-dn" placeholder="Datas de Nascimento" disabled>
                        <input type="text" class="form-control label-cel label" id="label-cel" placeholder="Celulares" disabled>
                    </div>

                    <div class="box__buttonsMembros">
                        <button type="button" onclick="adicionarCampos()" id="add"> <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="currentColor" class="bi bi-plus-circle-fill" viewBox="0 0 16 16">
                                <path d="M16 8A8 8 0 1 1 0 8a8 8 0 0 1 16 0zM8.5 4.5a.5.5 0 0 0-1 0v3h-3a.5.5 0 0 0 0 1h3v3a.5.5 0 0 0 1 0v-3h3a.5.5 0 0 0 0-1h-3v-3z" />
                            </svg> </button>

                        <button type="button" onclick="removerCampos()" id="rem"> <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="currentColor" class="bi bi-dash-circle-fill" viewBox="0 0 16 16">
                                <path d="M16 8A8 8 0 1 1 0 8a8 8 0 0 1 16 0zM4.5 7.5a.5.5 0 0 0 0 1h7a.5.5 0 0 0 0-1h-7z" />
                            </svg> </button>
                    </div>
                </div>

                <div class="box__inputs" id="formulario-membros">
                    <div class="inputs-membro" id="membro1">
                        <input type="text" class="form-control nome" id="inputNomeMb1" name="inputNomeMb1" placeholder="1º Membro" onblur="verifText(this)">
                        <input type="text" class="form-control cpf" id="inputCpfMb1" name="inputCpfMb1" placeholder="000.000.000-00" onfocus="getMaskCpf(id)" onblur="verifCpf(this)">
                        <input type="text" class="form-control dn" id="inputDNMb1" name="inputDNMb1" placeholder="00/00/0000" onfocus="getMaskDN(id)" onblur="verifDN(this)">
                        <input type="text" class="form-control cel" id="inputCelMb1" name="inputCelMb1" placeholder="(00) 00000-0000" onfocus="getMaskCel(id)" onblur="verifCel(this)">
                    </div>
                </div>

                <input type="number" id="controleCampos" name="controleCampos" value="1" hidden>

            </div>

            <div class="col-md-12 box__buttons">
                <a name="btn-cancelar" id="btn-cancelar" class="btn btn-danger" href="../familias/index.php">Cancelar</a>

                <button type="button" name="btn-limpar" id="btn-limpar" class="btn btn-secondary" onclick="limparFormulario('formulario')">Limpar</button>

                <button type="submit" name="submit" id="btn-cadastrar" class="btn btn-primary">Cadastrar</button>
            </div>

        </form>
    </div>

    <!-- Campos Inválidos -->
    <div>
        <?php
        if (isset($_GET["msg"])) {
            $msg = $_GET["msg"];
            echo "<font color=red>$msg</font>";
        }
        ?>
    </div>
</body>

<script src='../funcoesJS/funcoes.js'></script>

<script type="text/javascript">
    carregaDocumento("../navbar/navbar.php", "#header");
    // carregaDocumento("rodape.html", "#mainfooter");
</script>

<script src="https://unpkg.com/imask"></script>
<script src="https://code.jquery.com/jquery-3.1.1.min.js"></script>

<!-- Código de ativação do js (sem ele, o modal não funciona) -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ENjdO4Dr2bkBIFxQpeoTz1HIcje39Wm4jDKdf19U8gI4ddQ3GYNS7NTKfAdVQSZe" crossorigin="anonymous"></script>

<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>

<script src="../funcoesJS/funcoes.js"></script>

<script>
    var controleCampos = 1;

    function adicionarCampos() {
        // Limite de 5 membros por família
        if (controleCampos < 5) {
            controleCampos++;
            document.getElementById('formulario-membros').insertAdjacentHTML('beforeend', '<div class="inputs-membro" id="membro' + controleCampos + '" ><input type="text" class="form-control nome" id="inputNomeMb' + controleCampos + '" name="inputNomeMb' + controleCampos + '" placeholder="' + controleCampos + 'º Membro" onblur="verifText(this)"><input type="text" class="form-control cpf" id="inputCpfMb' + controleCampos + '" name="inputCpfMb' + controleCampos + '" placeholder="000.000.000-00" onfocus="getMaskCpf(id)" onblur="verifCpf(this)"><input type="text" class="form-control dn" id="inputDNMb' + controleCampos + '" name="inputDNMb' + controleCampos + '" placeholder="00/00/0000" onfocus="getMaskDN(id)" onblur="verifDN(this)"> <input type = "text" class = "form-control cel" id = "inputCelMb' + controleCampos + '" name = "inputCelMb' + controleCampos + '" placeholder = "(00) 00000-0000" onfocus="getMaskCel(id)" onblur="verifCel(this)"></div>');

            document.getElementById("controleCampos").value = controleCampos;
        }
    }

    function removerCampos() {
        // Não remove o primeiro campo (é obrigatório ter pelo menos um membro na família)
        if (controleCampos > 1) {
            document.getElementById('membro' + controleCampos).remove();
            controleCampos--;

            document.getElementById("controleCampos").value = controleCampos;
        }
    }
</script>

</html>