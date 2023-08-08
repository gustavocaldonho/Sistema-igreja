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
                <input type="text" class="form-control" id="inputNome" name="inputNome" onblur="verifNome()" placeholder="">
                <!-- is-valid, is-invalid-->
                <!-- <div class="valid-feedback">
                    Tudo certo!
                </div>
                <div class="invalid-feedback">
                    Atenção!
                </div> -->
            </div>

            <div class="col-md-6">
                <label for="inputEmail" class="form-label required">E-mail</label>
                <input type="email" class="form-control" id="inputEmail" name="inputEmail" placeholder="nome@gmail.com" onblur="verifEmail()">
            </div>

            <div class="col-md-6">
                <label for="inputComunidade" class="form-label required">Comunidade</label>
                <select class="form-select" id="listaComunidades" name="listaComunidades" onblur="verifComunidade()">
                    <option value="" selected>Selecione a sua Comunidade</option>

                    <?php
                    require_once '../../dao/comunidadeDAO.php';
                    require_once '../../dao/conexao.php';

                    $conexao = conectar();
                    $itens = carregarComboComunidades($conexao);
                    echo $itens;
                    ?>
                </select>
            </div>


            <div class="box__cadMembros form-group">

                <div class="box__labels">
                    <input type="text" class="form-control nome label" id="label-nome" placeholder="Nomes dos Membros da Família" disabled>
                    <input type="text" class="form-control cpf label" id="label-cpf" placeholder="CPFs" disabled>
                    <input type="text" class="form-control dn label" id="label-dn" placeholder="Datas de Nascimento" disabled>
                    <input type="text" class="form-control label-cel label" id="label-cel" placeholder="Celulares" disabled>

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
                        <input type="text" class="form-control nome" id="inputNomeMb1" name="inputNomeMb1" placeholder="1º Membro">
                        <input type="text" class="form-control cpf" id="inputCpfMb1" name="inputCpfMb1" placeholder="000.000.000-00" onfocus="getMaskCpf(id)">
                        <input type="text" class="form-control dn" id="inputDNMb1" name="inputDNMb1" placeholder="00/00/0000" onfocus="getMaskDN(id)">
                        <input type="text" class="form-control cel" id="inputCelMb1" name="inputCelMb1" placeholder="(00) 00000-0000" onfocus="getMaskCel(id)">
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
        $msg = $_GET["msg"];
        echo "<font color=red>$msg</font>";
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
            document.getElementById('formulario-membros').insertAdjacentHTML('beforeend', '<div class="inputs-membro" id="membro' + controleCampos + '" ><input type="text" class="form-control nome" id="inputNomeMb' + controleCampos + '" name="inputNomeMb' + controleCampos + '" placeholder="' + controleCampos + 'º Membro"><input type="text" class="form-control cpf" id="inputCpfMb' + controleCampos + '" name="inputCpfMb' + controleCampos + '" placeholder="000.000.000-00" onfocus="getMaskCpf(id)"><input type="text" class="form-control dn" id="inputDNMb' + controleCampos + '" name="inputDNMb' + controleCampos + '" placeholder="00/00/0000" onfocus="getMaskDN(id)"> <input type = "text" class = "form-control cel" id = "inputCelMb' + controleCampos + '" name = "inputCelMb' + controleCampos + '" placeholder = "(00) 00000-0000" onfocus="getMaskCel(id)"></div>');

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

<!-- Máscaras -->
<script>
    // CPF
    function getMaskCpf(id) {
        var phoneMask = IMask(
            document.getElementById(id), {
                mask: '000.000.000-00'
            });
    }
    // Data de Nascimento
    function getMaskDN(id) {
        var phoneMask = IMask(
            document.getElementById(id), {
                mask: '00/00/0000'
            });
    }
    // Celular
    function getMaskCel(id) {
        var phoneMask = IMask(
            document.getElementById(id), {
                mask: '(00) 00000-0000'
            });
    }
</script>

<!-- Verificações -->
<script>
    function verifNome() {
        var nome = document.getElementById("inputNome");
        if (nome.value == "") {
            nome.classList.remove("is-valid");
            nome.classList.add("is-invalid");
            // nome.focus();
        } else {
            nome.classList.remove("is-invalid");
            nome.classList.add("is-valid");
        }
    }

    function verifCpf() {
        var campoCpf = document.getElementById("inputCpf");
        var cpf = document.getElementById("inputCpf").value;
        if (cpf.length < 14) {
            campoCpf.classList.remove("is-valid");
            campoCpf.classList.add("is-invalid");
            // campoCpf.focus();
        } else {
            campoCpf.classList.remove("is-invalid");
            campoCpf.classList.add("is-valid");
        }
    }

    function verifEmail() {
        var campoEmail = document.getElementById("inputEmail");
        var email = document.getElementById("inputEmail").value;

        // Se o usuário clicar no campo, não digitar nada e sair do mesmo, nenhuma verificação e nenhum 
        // alerta será dado.
        if (email.length >= 1) {
            if (!email.includes("@") || !email.includes(".com")) {
                campoEmail.classList.remove("is-valid");
                campoEmail.classList.add("is-invalid");
                // campoEmail.focus();
            } else {
                campoEmail.classList.remove("is-invalid");
                campoEmail.classList.add("is-valid");
            }
        } else {}
    }

    // Se o usuário clicar no campo, não digitar nada e sair do mesmo, nenhuma verificação e nenhum 
    // alerta será dado.
    function verifCel() {
        var campoCelular1 = document.getElementById("inputCelular1");
        var celular1 = document.getElementById("inputCelular1").value;
        // var celular2 = document.getElementById("inputCelular2").value;

        if (celular1.length >= 1) {
            if (celular1.length < 15) {
                campoCelular1.classList.remove("is-valid");
                campoCelular1.classList.add("is-invalid");
                // campoCelular1.focus();
            } else {
                campoCelular1.classList.remove("is-invalid");
                campoCelular1.classList.add("is-valid");
            }
        } else {}
    }

    function verifComunidade() {
        var comunidade = document.getElementById("inputComunidade");

        if (comunidade.value == "Escolha...") {
            comunidade.classList.remove("is-valid");
            comunidade.classList.add("is-invalid");
            // comunidade.focus();
        } else {
            comunidade.classList.remove("is-invalid");
            comunidade.classList.add("is-valid");
        }
    }
</script>

</html>