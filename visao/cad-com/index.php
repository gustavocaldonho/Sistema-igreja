<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cadastro Comunidade</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous">
    <link rel="stylesheet" href="../style/style-geral.css">
    <link rel="stylesheet" href="style-cadcom.css">
    <link rel="stylesheet" href="../navbar/style-navbar.css">
</head>

<body>

    <header id="header"></header>

    <h2 class="text-center">Cadastro Comunidade</h2>
    <div class="container">
        <!-- Para os feedbacks abaixo dos campos: https://getbootstrap.com.br/docs/4.1/components/forms/-->
        <form action="../../controlador/control_comunidade.php" method="POST" class="row g-3 form-cadastro">
            <div class="col-md-9">
                <label for="inputNomeChefe" class="form-label required">Chefe do Conselho</label>
                <input type="text" class="form-control" id="inputNomeChefe" name="inputNomeChefe" onblur="verifNome()" placeholder="Insira seu Nome Completo">
                <!-- is-valid, is-invalid-->
                <!-- <div class="valid-feedback">
                    Tudo certo!
                </div>
                <div class="invalid-feedback">
                    Atenção!
                </div> -->
            </div>
            <div class="col-md-3">
                <label for="inputCpfChefe" class="form-label required">CPF</label>
                <input type="text" class="form-control" id="inputCpfChefe" name="inputCpfChefe" placeholder="000.000.000-00" onblur="verifCpf()">
            </div>

            <div class="col-md-9">
                <label for="inputEmail" class="form-label required">E-mail</label>
                <input type="text" class="form-control" id="inputEmail" name="inputEmail" placeholder="nome@gmail.com" onblur="verifEmail()">
            </div>
            <div class="col-md-3">
                <label for="inputCelChefe" class="form-label required">Celular</label>
                <input type="text" class="form-control" id="inputCelChefe" name="inputCelChefe" placeholder="(00) 00000-0000" onblur="verifCel()">
            </div>

            <div class="col-md-8">
                <label for="inputPadroeiro" class="form-label required">Padroeiro da Comunidade</label>
                <input type="text" class="form-control" id="inputPadroeiro" name="inputPadroeiro" onblur="verifNome()" placeholder="ex.: São Geraldo Magela">
            </div>

            <div class="col-md-4">
                <label for="inputLocalização" class="form-label required">Localização</label>
                <input type="text" class="form-control" id="inputLocalização" name="inputLocalização" onblur="verifNome()" placeholder="ex.: Sapucaia">
            </div>

            <div class="col-md-6">
                <label for="input-group" class="form-label required">Membros do Conselho</label>
                <div class="box__nomeMembros">
                    <input type="text" class="form-control" id="inputNomeMb1" name="inputNomeMb1" onblur="verifNome()" placeholder="1º Membro">
                    <input type="text" class="form-control" id="inputNomeMb2" name="inputNomeMb2" onblur="verifNome()" placeholder="2º Membro">
                    <input type="text" class="form-control" id="inputNomeMb3" name="inputNomeMb3" onblur="verifNome()" placeholder="3º Membro">
                </div>
            </div>

            <div class="col-md-3">
                <label for="inputCpf" class="form-label required">CPF</label>
                <input type="text" class="form-control" id="inputCpfMb1" name="inputCpfMb1" placeholder="000.000.000-00" onblur="verifCpf()">
                <input type="text" class="form-control" id="inputCpfMb2" name="inputCpfMb2" placeholder="000.000.000-00" onblur="verifCpf()">
                <input type="text" class="form-control" id="inputCpfMb3" name="inputCpfMb3" placeholder="000.000.000-00" onblur="verifCpf()">
            </div>

            <div class="col-md-3">
                <label for="input-group" class="form-label required">Celular dos Membros</label>
                <div class="box__cpfMembros">
                    <input type="tel" class="form-control" id="inputCelMb1" name="inputCelMb1" placeholder="(00) 00000-0000 (1º Membro)" onblur="verifCel()">
                    <input type="tel" class="form-control" id="inputCelMb2" name="inputCelMb2" placeholder="(00) 00000-0000 (2º Membro)" onblur="verifCel()">
                    <input type="tel" class="form-control" id="inputCelMb3" name="inputCelMb3" placeholder="(00) 00000-0000 (3º Membro)" onblur="verifCel()">
                </div>
            </div>

            <div class="col-12 box__buttons">
                <button type="submit" name="submit" id="btn-cadastrar" class="btn btn-primary">Cadastrar</button>
            </div>
        </form>
    </div>

    <!-- Campos Inválidos -->
    <div>
        <?php
            $msg = $_GET["msg"];
            echo "$msg";
        ?>
    </div>
</body>

<script src='../funcoesJS/funcoes.js'></script>

<script type="text/javascript">
    carregaDocumento("../navbar/navbar.html", "#header");
    // carregaDocumento("rodape.html", "#mainfooter");
</script>

<script src="https://code.jquery.com/jquery-3.1.1.min.js"></script>
<script src="../js/dist/jquery.mask.min.js"></script>

<!-- Código de ativação do js (sem ele, o modal não funciona) -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ENjdO4Dr2bkBIFxQpeoTz1HIcje39Wm4jDKdf19U8gI4ddQ3GYNS7NTKfAdVQSZe" crossorigin="anonymous"></script>

<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>

<!-- Máscara -->
<script>
    // CPF
    $("#inputCpfChefe").mask("000.000.000-00");
    $("#inputCpfMb1").mask("000.000.000-00");
    $("#inputCpfMb2").mask("000.000.000-00");
    $("#inputCpfMb3").mask("000.000.000-00");

    // CELULAR
    $("#inputCelChefe").mask("(00) 00000-0000");
    $("#inputCelMb1").mask("(00) 00000-0000");
    $("#inputCelMb2").mask("(00) 00000-0000");
    $("#inputCelMb3").mask("(00) 00000-0000");
</script>

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