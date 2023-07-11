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
        <form action="../../controlador/cadFamilia.php" method="POST" class="row g-3 form-cadastro">
            <div class="col-md-12">
                <label for="inputNome" class="form-label required">Nome da Família</label>
                <input type="text" class="form-control" id="inputNome" name="inputNome" required onblur="verifNome()" placeholder="">
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

            <div class="col-md-6">
                <label for="input-group" class="form-label required">Membros da Família</label>
                <div class="box__nomeMembros">
                    <input type="text" class="form-control" id="inputNomeMb1" name="inputNomeMb1" required onblur="verifNome()" placeholder="1º Membro">
                    <input type="text" class="form-control" id="inputNomeMb2" name="inputNomeMb2" required onblur="verifNome()" placeholder="2º Membro">
                    <input type="text" class="form-control" id="inputNomeMb3" name="inputNomeMb3" required onblur="verifNome()" placeholder="3º Membro">
                    <input type="text" class="form-control" id="inputNomeMb4" name="inputNomeMb4" required onblur="verifNome()" placeholder="4º Membro">
                    <input type="text" class="form-control" id="inputNomeMb5" name="inputNomeMb5" required onblur="verifNome()" placeholder="5º Membro">
                </div>
            </div>

            <div class="col-md-2">
                <label for="input-group" class="form-label required">CPFs dos Membros</label>
                <div class="box__cpfMembros">
                    <input type="text" class="form-control" id="inputCpfMb1" name="inputCpfMb1" required placeholder="000.000.000-00" onblur="verifCpf()">
                    <input type="text" class="form-control" id="inputCpfMb2" name="inputCpfMb2" required placeholder="000.000.000-00" onblur="verifCpf()">
                    <input type="text" class="form-control" id="inputCpfMb3" name="inputCpfMb3" required placeholder="000.000.000-00" onblur="verifCpf()">
                    <input type="text" class="form-control" id="inputCpfMb4" name="inputCpfMb4" required placeholder="000.000.000-00" onblur="verifCpf()">
                    <input type="text" class="form-control" id="inputCpfMb5" name="inputCpfMb5" required placeholder="000.000.000-00" onblur="verifCpf()">
                </div>
            </div>

            <div class="col-md-2">
            <label for="input-group" class="form-label required">Datas de Nacimento</label>
            <div class="box__DNMembros">
                    <input type="text" class="form-control" id="inputDNMb1" name="inputDNMb1" required placeholder="00/00/0000" onblur="verifCpf()">
                    <input type="text" class="form-control" id="inputDNMb2" name="inputDNMb2" required placeholder="00/00/0000" onblur="verifCpf()">
                    <input type="text" class="form-control" id="inputDNMb3" name="inputDNMb3" required placeholder="00/00/0000" onblur="verifCpf()">
                    <input type="text" class="form-control" id="inputDNMb4" name="inputDNMb4" required placeholder="00/00/0000" onblur="verifCpf()">
                    <input type="text" class="form-control" id="inputDNMb5" name="inputDNMb5" required placeholder="00/00/0000" onblur="verifCpf()">
                </div>
            </div>

            <div class="col-md-2">
            <label for="input-group" class="form-label required">Celulares</label>
            <div class="box__CelMembros">
                    <input type="text" class="form-control" id="inputCelMb1" name="inputCelMb1" required placeholder="(00) 00000-0000" onblur="verifCpf()">
                    <input type="text" class="form-control" id="inputCelMb2" name="inputCelMb2" required placeholder="(00) 00000-0000" onblur="verifCpf()">
                    <input type="text" class="form-control" id="inputCelMb3" name="inputCelMb3" required placeholder="(00) 00000-0000" onblur="verifCpf()">
                    <input type="text" class="form-control" id="inputCelMb4" name="inputCelMb4" required placeholder="(00) 00000-0000" onblur="verifCpf()">
                    <input type="text" class="form-control" id="inputCelMb5" name="inputCelMb5" required placeholder="(00) 00000-0000" onblur="verifCpf()">
                </div>
            </div>

            <div class="col-md-12 box__buttons">
                <button type="submit" name="submit" id="btn-cadastrar" class="btn btn-primary">Cadastrar</button>
            </div>

        </form>
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

<!-- Máscaras -->
<script>
    // Celular
    var phoneMask = IMask(
        document.getElementById("inputCelMb1"), {
            mask: '(00) 00000-0000'
        });
    var phoneMask = IMask(
        document.getElementById("inputCelMb2"), {
            mask: '(00) 00000-0000'
        });
    var phoneMask = IMask(
        document.getElementById("inputCelMb3"), {
            mask: '(00) 00000-0000'
        });
    var phoneMask = IMask(
        document.getElementById("inputCelMb4"), {
            mask: '(00) 00000-0000'
        });
    var phoneMask = IMask(
        document.getElementById("inputCelMb5"), {
            mask: '(00) 00000-0000'
        });

    // CPF
    var phoneMask = IMask(
        document.getElementById("inputCpfMb1"), {
            mask: '000.000.000-00'
        });
    var phoneMask = IMask(
        document.getElementById("inputCpfMb2"), {
            mask: '000.000.000-00'
        });
    var phoneMask = IMask(
        document.getElementById("inputCpfMb3"), {
            mask: '000.000.000-00'
        });
    var phoneMask = IMask(
        document.getElementById("inputCpfMb4"), {
            mask: '000.000.000-00'
        });
    var phoneMask = IMask(
        document.getElementById("inputCpfMb5"), {
            mask: '000.000.000-00'
        });

    // Data de Nascimento
    var phoneMask = IMask(
        document.getElementById("inputDNMb1"), {
            mask: '00/00/0000'
        });
    var phoneMask = IMask(
        document.getElementById("inputDNMb2"), {
            mask: '00/00/0000'
        });
    var phoneMask = IMask(
        document.getElementById("inputDNMb3"), {
            mask: '00/00/0000'
        });
    var phoneMask = IMask(
        document.getElementById("inputDNMb4"), {
            mask: '00/00/0000'
        });
    var phoneMask = IMask(
        document.getElementById("inputDNMb5"), {
            mask: '00/00/0000'
        });
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