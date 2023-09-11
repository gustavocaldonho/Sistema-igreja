<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Homepage</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous">
    <link rel="stylesheet" href="../style/style-geral.css">
    <link rel="stylesheet" href="style-homepage.css">
    <link rel="stylesheet" href="../../visao/navbar/style-navbar.css">

    <!-- Se a página não estiver "pegando" o css, atualizar a página com 'ctrl + F5' (limpa o cache) -->
</head>

<body>
    <!--  _________________________________________________________________________________________________ -->

    <!-- Link do site onde peguei o código para linkar a função em js em arquivo separado -->
    <!-- https://www.guj.com.br/t/chamando-uma-funcao-javascript-em-outra-pagina/150406 -->

    <!-- Abaixo está o site de onde peguei o código para linkar a navbar nas páginas -->
    <!-- https://pt.stackoverflow.com/questions/215177/importar-header-e-footer-em-todas-as-p%C3%A1ginas -->

    <!--  _________________________________________________________________________________________________ -->

    <!-- Código para linkar a navbar, que se encontra em arquivo separado -->
    <!-- <header id="header" class="sticky-top"></header> -->

    <?php
    include("../login/inicia-sessao.php");
    ?>
    <div class="sticky-top">
        <?php
        include("../navbar/navbar.php");
        ?>
    </div>

    <div class="container" id="container">

        <div class="box__carrossel">
            <div id="carouselExampleCaptions" class="carousel slide" data-bs-ride="carousel">
                <div class="carousel-indicators">
                    <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="0" class="active"
                        aria-current="true" aria-label="Slide 1"></button>
                    <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="1"
                        aria-label="Slide 2"></button>
                </div>
                <div class="carousel-inner">
                    <div class="carousel-item active">
                        <img src="img/carrossel_inicial.png" class="d-block w-100" alt="...">
                        <div class="carousel-caption d-none d-md-block">
                            <!-- <h5>First slide label</h5> -->
                            <!-- <p>Some representative placeholder content for the first slide.</p> -->
                        </div>
                    </div>
                    <div class="carousel-item">
                        <img src="img/carrossel2.png" class="d-block w-100" alt="...">
                        <div class="carousel-caption d-none d-md-block">
                            <!-- <h5>Second slide label</h5> -->
                            <!-- <p>Some representative placeholder content for the second slide.</p> -->
                        </div>
                    </div>
                </div>
                <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleCaptions"
                    data-bs-slide="prev">
                    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                    <span class="visually-hidden">Previous</span>
                </button>
                <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleCaptions"
                    data-bs-slide="next">
                    <span class="carousel-control-next-icon" aria-hidden="true"></span>
                    <span class="visually-hidden">Next</span>
                </button>
            </div>
        </div>

        <div class="box__eventos">

            <div class="box__eventos-title">
                <h2 class="text-center">— Eventos —</h2>
            </div>

            <?php
            if ($codPerfil == 1 || $codPerfil == 2) {
                echo "<div class='box__button-avisos'>
                            <button type='button' id='btn-addEvento' name='btn-addEvento' class='btn btn-primary' data-bs-toggle='modal' data-bs-target='#modal-eventos' data-bs-whatever='@mdo' onclick='setarModalFormEventos()'>Adicionar
                            Evento</button>
                        </div>";
            }
            ?>

            <!-- ___________________________ modal de cadastro dos eventos _____________________________ -->
            <div class="modal fade" id="modal-eventos" tabindex="-1" aria-labelledby="exampleModalLabel"
                aria-hidden="true">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h1 class="modal-title fs-5" id="exampleModalLabel">Inserir novo Evento</h1>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <div class="modal-body">
                            <form id="form_eventos" name="form_eventos" action="../../controlador/cadEvento.php"
                                method="POST">
                                <div class="">
                                    <label for="tituloEvento" class="col-form-label">Título</label>
                                    <input type="text" class="form-control" id="tituloEvento" name="tituloEvento"
                                        maxlength="70" onkeyup="msgContagem('tituloEvento', 'spanTituloEvento', '70')">
                                    <div class="box__span">
                                        <span id="spanTituloEvento" name="spanTituloEvento">0/70</span>
                                    </div>
                                </div>
                                <div class="box__presidenteLocal">
                                    <div class="metade-box">
                                        <label for="presidenteEvento" class="col-form-label">Presidida por</label>
                                        <input type="text" class="form-control" id="presidenteEvento"
                                            name="presidenteEvento" maxlength="100">
                                    </div>
                                    <div class="metade-box">
                                        <label for="localEvento" class="col-form-label">Local</label>
                                        <input type="text" class="form-control" id="localEvento" name="localEvento">
                                    </div>
                                </div>
                                <div class="box__dataHora">
                                    <div class="metade-box">
                                        <label for="dataEvento" class="col-form-label">Data</label>
                                        <input type="date" class="form-control" id="dataEvento" name="dataEvento">
                                    </div>
                                    <div class="metade-box">
                                        <label for="horarioEvento" class="col-form-label">Horário</label>
                                        <input type="time" class="form-control" id="horarioEvento" name="horarioEvento">
                                    </div>
                                </div>
                                <div class="">
                                    <label for="descricaoEvento" class="col-form-label">Descrição</label>
                                    <textarea class="form-control" id="descricaoEvento" name="descricaoEvento" rows="2"
                                        maxlength="200"
                                        onkeyup="msgContagem('descricaoEvento', 'spanDescricaoEvento', '200')"></textarea>
                                    <div class="box__span">
                                        <span id="spanDescricaoEvento" name="spanDescricaoEvento">0/200</span>
                                    </div>
                                </div>

                                <!-------------------------- Desativado --------------------------->
                                <div class="form-check" hidden>
                                    <input class="form-check-input" type="radio" name="radioEvento" id="radioEventCom"
                                        value="0" checked>
                                    <label class="form-check-label" for="radioEventCom">
                                        Visível somente para a Comunidade
                                    </label>
                                </div>
                                <div class="form-check" hidden>
                                    <input class="form-check-input" type="radio" name="radioEvento" id="radioEventParoq"
                                        value="1">
                                    <label class="form-check-label" for="radioEventParoq">
                                        Visível para toda a Paróquia
                                    </label>
                                </div>
                                <!---------------------------------------------------------------->

                                <input type="text" id="id_evento" name="id_evento" value="" hidden>

                                <div class="modal-footer">
                                    <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Fechar</button>
                                    <button type="submit" class="btn btn-primary">Inserir</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>

            <!-- __________________________ modal confirmação exclusão evento  __________________________  -->
            <div class="modal fade" id="modalExclusaoEvento" data-bs-backdrop="static" data-bs-keyboard="false"
                tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h1 class="modal-title fs-5" id="staticBackdropLabel">Excluir Evento</h1>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <div class="modal-body">
                            Deseja excluir este evento?
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Cancelar</button>
                            <button type="button" class="btn btn-primary" id="btnDeleteEventoModal" value=""
                                onclick="deleteEvento(this.value)">Excluir</button>
                        </div>
                    </div>
                </div>
            </div>
            <!--  __________________________________________________________________________________  -->

            <div class="box__eventos-body">

                <?php
                include_once("../../controlador/buscarEventos.php");
                include_once("funcoesPHP.php");

                // Chamando o controlador para buscar os eventos inseridos no bd
                $result = buscarEventos();

                while ($user_data = mysqli_fetch_assoc($result)) {
                    $id_eventos = $user_data['id_eventos'];
                    $titulo = $user_data['titulo'];
                    $presidente = $user_data['presidente'];
                    $local = $user_data['local'];
                    $data = $user_data['data'];
                    $horario = $user_data['horario'];
                    $descricao = $user_data['descricao'];
                    $status = $user_data['status'];

                    // separando a data em dia, mes e ano
                    $novaData = explode("-", $data);
                    $ano = $novaData[0];
                    $mes = $novaData[1]; // está numérico
                    $dia = $novaData[2];

                    // pegando o mês do evento
                    $novoMes = getMes($mes); // está em string

                    // covertendo a data para string
                    $dataToString = $ano . "-" . $mes . "-" . $dia;

                    // chamando a função para fornecer o dia da semana
                    $diaSemana = getDiaSemana($dataToString);

                    // echo "$titulo, $presidente, $local, $data, $horario, $descricao, $id_eventos" . "<br>";
                    // echo "$dia, $mes, $ano <br>";
                    // echo "$id_eventos";

                    echo "<div class='item-evento'>";
                    echo "<div class='box__data'>";
                    echo "<div class='mes text-uppercase'>
                            <p>$novoMes</p>
                        </div>";
                    echo "<div class='num'>
                            <p>$dia</p>
                        </div>";
                    echo "<div class='dia_semana'>
                            <p>$diaSemana</p>
                        </div>";
                    echo "</div>";
                    echo "<div class='box__informacoes'>";
                    echo "<div class='superior'>";
                    echo "<div>
                                <h5><svg xmlns='http://www.w3.org/2000/svg' width='16' height='16' fill='#B36812' class='bi bi-circle-fill' viewBox='0 0 16 16'>
                                        <circle cx='6' cy='6' r='6' />
                                    </svg>$titulo</h5>
                            </div>";
                    echo "<div>";

                    //Não é visto pelos membros comuns
                    if ($codPerfil == 1 || $codPerfil == 2) {

                        // >>> tirar  "; e descomentar o texto

                        echo "<div class='buttonsEvento'>"; // ## esse ";
                        //             <small class='small-status";
                        // if ($status == 0) {
                        //     echo " comunidade'>Comunidade</small>";
                        // } else {
                        //     echo " paroquia'>Paróquia</small>";
                        // }

                        echo "<button class='btn btn-sm' data-bs-toggle='modal' data-bs-target='#modal-eventos' onclick='setarModalEventoUpdate(\"$titulo\", \"$presidente\", \"$local\", \"$data\", \"$horario\", \"$descricao\", $status, $id_eventos)'>
                                        <svg xmlns='http://www.w3.org/2000/svg' fill='blue' class='bi bi-pencil-fill' viewBox='0 0 16 16'>
                                            <path d='M12.854.146a.5.5 0 0 0-.707 0L10.5 1.793 14.207 5.5l1.647-1.646a.5.5 0 0 0 0-.708l-3-3zm.646 6.061L9.793 2.5 3.293 9H3.5a.5.5 0 0 1 .5.5v.5h.5a.5.5 0 0 1 .5.5v.5h.5a.5.5 0 0 1 .5.5v.5h.5a.5.5 0 0 1 .5.5v.207l6.5-6.5zm-7.468 7.468A.5.5 0 0 1 6 13.5V13h-.5a.5.5 0 0 1-.5-.5V12h-.5a.5.5 0 0 1-.5-.5V11h-.5a.5.5 0 0 1-.5-.5V10h-.5a.499.499 0 0 1-.175-.032l-.179.178a.5.5 0 0 0-.11.168l-2 5a.5.5 0 0 0 .65.65l5-2a.5.5 0 0 0 .168-.11l.178-.178z' />
                                        </svg>
                                    </button>

                                    <button class='btn btn-sm' data-bs-toggle='modal' data-bs-target='#modalExclusaoEvento' onclick='setarIdModalExclusaoEvento($id_eventos)'>
                                        <svg xmlns='http://www.w3.org/2000/svg' fill='red' class='bi bi-trash3-fill' viewBox='0 0 16 16'>
                                            <path d='M11 1.5v1h3.5a.5.5 0 0 1 0 1h-.538l-.853 10.66A2 2 0 0 1 11.115 16h-6.23a2 2 0 0 1-1.994-1.84L2.038 3.5H1.5a.5.5 0 0 1 0-1H5v-1A1.5 1.5 0 0 1 6.5 0h3A1.5 1.5 0 0 1 11 1.5Zm-5 0v1h4v-1a.5.5 0 0 0-.5-.5h-3a.5.5 0 0 0-.5.5ZM4.5 5.029l.5 8.5a.5.5 0 1 0 .998-.06l-.5-8.5a.5.5 0 1 0-.998.06Zm6.53-.528a.5.5 0 0 0-.528.47l-.5 8.5a.5.5 0 0 0 .998.058l.5-8.5a.5.5 0 0 0-.47-.528ZM8 4.5a.5.5 0 0 0-.5.5v8.5a.5.5 0 0 0 1 0V5a.5.5 0 0 0-.5-.5Z' />
                                        </svg>
                                    </button>
                                </div>";
                    }

                    echo "</div>";
                    echo "</div>";
                    echo "<div class='inferior'>
                            <div class='mb-1' id='descricaoEvento'>
                                <p>$descricao</p>
                            </div>
                            <p><b>Horário:</b> $horario &emsp; <b>Local:</b>
                                $local &emsp; <b>Presidida por:</b> $presidente </p>
                        </div>";
                    echo "</div>";
                    echo "</div>";
                }

                ?>
            </div>
        </div>


        <div class="box__avisos">

            <div class="box__avisos-title">
                <h2 class="text-center">— Notícias & Avisos —</h2>
            </div>

            <?php

            if ($codPerfil == 1 || $codPerfil == 2) {
                echo "<div class='box__button-avisos'>
                        <button type='button' id='btn-addAviso' name='btn-addAviso' onclick='setarModalFormAvisos()' class='btn btn-primary' data-bs-toggle='modal' data-bs-target='#modal-avisos' data-bs-whatever='@mdo'>Adicionar
                        Aviso</button>
                    </div>";
            }
            ?>

            <!-- _____________________ modal de cadastro dos avisos _____________________ -->
            <div class="modal fade" id="modal-avisos" tabindex="-1" aria-labelledby="exampleModalLabel"
                aria-hidden="true">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h1 class="modal-title fs-5" id="exampleModalLabel">Inserir novo Aviso</h1>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <div class="modal-body">
                            <form id="form_avisos" name="form_avisos" enctype='multipart/form-data'
                                action="../../controlador/cadAviso.php" method="POST" class="row g-3">
                                <div class="">
                                    <label for="tituloAviso" class="col-form-label">Título</label>
                                    <input type="text" class="form-control" id="tituloAviso" name="tituloAviso"
                                        maxlength="100" onkeyup="msgContagem('tituloAviso', 'spanAvisoTitulo', '100')">
                                    <div class="box__span">
                                        <span id="spanAvisoTitulo" name="spanAvisoTitulo">0/100</span>
                                    </div>
                                </div>
                                <div class="box__descricaoAvisos">
                                    <label for="descricaoAviso" class="col-form-label">Descrição</label>
                                    <textarea class="form-control" id="descricaoAviso" name="descricaoAviso" rows="6"
                                        maxlength="300"
                                        onkeyup="msgContagem('descricaoAviso', 'spanAvisoDescricao', '300')"></textarea>
                                    <div class="box__span">
                                        <span id="spanAvisoDescricao" name="spanAvisoDescricao">0/300</span>
                                    </div>
                                </div>
                                <div class="form-check">
                                    <input class="form-check-input" type="radio" name="radioAviso" id="radioAvisoCom"
                                        value="0" checked>
                                    <label class="form-check-label" for="radioAvisoCom">
                                        Visível somente para a Comunidade
                                    </label>
                                </div>
                                <div class="form-check">
                                    <input class="form-check-input" type="radio" name="radioAviso" id="radioAvisoParoq"
                                        value="1">
                                    <label class="form-check-label" for="radioAvisoParoq">
                                        Visível para toda a Paróquia
                                    </label>
                                </div>
                                <!-- Campo escondido para passar o id do aviso em caso de edição (setado o value ao clicar no botão de edição). No cadastro inicial, não existe o id_aviso -->
                                <input type="text" id="id_aviso" name="id_aviso" value="" hidden>

                                <!-- Campo escondido para passar o id da comunidade (se for inserção — id da comunidade de quem está logado; se for update — id da comunidade de quem já havia inserido o aviso -->
                                <input type="text" id="id_comunidade" name="id_comunidade" value="" hidden>

                                <div class="modal-footer">
                                    <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Fechar</button>
                                    <button type="submit" class="btn btn-primary">Inserir</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>

            <!-- _____________________ modal confirmação exclusão avisos  _____________________  -->
            <div class="modal fade" id="modalExclusaoAviso" data-bs-backdrop="static" data-bs-keyboard="false"
                tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h1 class="modal-title fs-5" id="staticBackdropLabel">Excluir Aviso</h1>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <div class="modal-body">
                            Deseja excluir este aviso?
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Cancelar</button>
                            <button type="button" class="btn btn-primary" id="btnDeleteAvisoModal" value=""
                                onclick="deleteAviso(this.value)">Excluir</button>
                        </div>
                    </div>
                </div>
            </div>
            <!--  __________________________________________________________________________________  -->

            <div class="box__avisos-body">
                <div class="list-group">

                    <?php
                    include_once "../../controlador/buscarAvisos.php";

                    // Chamando o controlador para fornecer os avisos a serem exibidos
                    $result = buscarAvisos();

                    while ($user_data = mysqli_fetch_assoc($result)) {
                        $id_aviso = $user_data['id_avisos'];
                        $status = $user_data['status'];
                        $titulo = $user_data['titulo'];
                        $descricao = $user_data['descricao'];
                        $id_comunidade = $user_data['id_comunidade'];

                        // Os avisos serão filtrados pelo status (0 - somente a comunidade verá, 1 - todos da paróquia) e pelo id da comunidade (somente verá se os avisos forem da comunidade do usuário, em caso de status == 0)

                        // status == 1 ou (status == 0 e comunidade de quem inseriu == comunidade de quem visualizou) {visto} 
                        if ($codPerfil == 2 || $status == 1 || ($status == 0 && $id_comunidade == $_SESSION['id_comunidade'])) {
                            // echo "Inserido por: " . $id_comunidade . " # Visualizado por: " . $_SESSION['id_comunidade'] . " # Status: " . $status;

                            echo "<a class='list-group-item' aria-current='true'>";
                            echo "<div class='d-flex w-100 justify-content-between'>";
                            echo "<h5 class='mb-1'><svg xmlns='http://www.w3.org/2000/svg' width='20' height='20' fill='currentColor' class='bi bi-arrow-right mb-1' viewBox='0 0 16 16'>";
                            echo "<path fill-rule='evenodd' d='M1 8a.5.5 0 0 1 .5-.5h11.793l-3.147-3.146a.5.5 0 0 1 .708-.708l4 4a.5.5 0 0 1 0 .708l-4 4a.5.5 0 0 1-.708-.708L13.293 8.5H1.5A.5.5 0 0 1 1 8z'/>";
                            echo "</svg>";
                            echo " " . $titulo;
                            echo "</h5>";

                            //Não é visto pelos membros comuns
                            if ($codPerfil == 1 || $codPerfil == 2) {

                                echo "<div class='buttonsAviso'>
                            <small class='small-status";
                                if ($status == 0) {
                                    echo " comunidade'>Comunidade</small>";
                                } else {
                                    echo " paroquia'>Paróquia</small>";
                                }
                                echo "<button class='btn btn-sm' data-bs-toggle='modal'                 data-bs-target='#modal-avisos' onclick='setarModalAvisoUpdate(\"$titulo\", \"$descricao\", $status, $id_aviso, $id_comunidade)'>
                                    <svg xmlns='http://www.w3.org/2000/svg' fill='blue' class='bi bi-pencil-fill' viewBox='0 0 16 16'>
                                        <path d='M12.854.146a.5.5 0 0 0-.707 0L10.5 1.793 14.207 5.5l1.647-1.646a.5.5 0 0 0 0-.708l-3-3zm.646 6.061L9.793 2.5 3.293 9H3.5a.5.5 0 0 1 .5.5v.5h.5a.5.5 0 0 1 .5.5v.5h.5a.5.5 0 0 1 .5.5v.5h.5a.5.5 0 0 1 .5.5v.207l6.5-6.5zm-7.468 7.468A.5.5 0 0 1 6 13.5V13h-.5a.5.5 0 0 1-.5-.5V12h-.5a.5.5 0 0 1-.5-.5V11h-.5a.5.5 0 0 1-.5-.5V10h-.5a.499.499 0 0 1-.175-.032l-.179.178a.5.5 0 0 0-.11.168l-2 5a.5.5 0 0 0 .65.65l5-2a.5.5 0 0 0 .168-.11l.178-.178z'/>
                                    </svg>
                                </button>
                            
                                <button class='btn btn-sm' data-bs-toggle='modal' data-bs-target='#modalExclusaoAviso' onclick=setarIdModalExclusaoAviso($id_aviso)>
                                    <svg xmlns='http://www.w3.org/2000/svg' fill='red' class='bi bi-trash3-fill' viewBox='0 0 16 16'>
                                        <path d='M11 1.5v1h3.5a.5.5 0 0 1 0 1h-.538l-.853 10.66A2 2 0 0 1 11.115 16h-6.23a2 2 0 0 1-1.994-1.84L2.038 3.5H1.5a.5.5 0 0 1 0-1H5v-1A1.5 1.5 0 0 1 6.5 0h3A1.5 1.5 0 0 1 11 1.5Zm-5 0v1h4v-1a.5.5 0 0 0-.5-.5h-3a.5.5 0 0 0-.5.5ZM4.5 5.029l.5 8.5a.5.5 0 1 0 .998-.06l-.5-8.5a.5.5 0 1 0-.998.06Zm6.53-.528a.5.5 0 0 0-.528.47l-.5 8.5a.5.5 0 0 0 .998.058l.5-8.5a.5.5 0 0 0-.47-.528ZM8 4.5a.5.5 0 0 0-.5.5v8.5a.5.5 0 0 0 1 0V5a.5.5 0 0 0-.5-.5Z' />
                                    </svg>
                                </button>
                            </div>";
                            }

                            echo "</div>";
                            echo "<p class='mb-1'> $descricao  </p>";
                            // echo "<small hidden>And some small print.</small>";
                            echo "</a>";
                        }
                    }
                    ?>

                    <!-- devolver o "active" -->
                    <a class="list-group-item" aria-current="true" hidden>
                        <div class="d-flex w-100 justify-content-between">
                            <h5 class="mb-1">
                                <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="currentColor"
                                    class="bi bi-arrow-right mb-1" viewBox="0 0 16 16">
                                    <path fill-rule="evenodd"
                                        d="M1 8a.5.5 0 0 1 .5-.5h11.793l-3.147-3.146a.5.5 0 0 1 .708-.708l4 4a.5.5 0 0 1 0 .708l-4 4a.5.5 0 0 1-.708-.708L13.293 8.5H1.5A.5.5 0 0 1 1 8z" />
                                </svg>
                                List group item heading
                            </h5>
                            <!-- <small class="text-secondary">3 days ago</small> -->

                            <div class="buttonsAviso">
                                <button class='btn btn-sm'>
                                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="blue"
                                        class="bi bi-pencil-fill" viewBox="0 0 16 16">
                                        <path
                                            d="M12.854.146a.5.5 0 0 0-.707 0L10.5 1.793 14.207 5.5l1.647-1.646a.5.5 0 0 0 0-.708l-3-3zm.646 6.061L9.793 2.5 3.293 9H3.5a.5.5 0 0 1 .5.5v.5h.5a.5.5 0 0 1 .5.5v.5h.5a.5.5 0 0 1 .5.5v.5h.5a.5.5 0 0 1 .5.5v.207l6.5-6.5zm-7.468 7.468A.5.5 0 0 1 6 13.5V13h-.5a.5.5 0 0 1-.5-.5V12h-.5a.5.5 0 0 1-.5-.5V11h-.5a.5.5 0 0 1-.5-.5V10h-.5a.499.499 0 0 1-.175-.032l-.179.178a.5.5 0 0 0-.11.168l-2 5a.5.5 0 0 0 .65.65l5-2a.5.5 0 0 0 .168-.11l.178-.178z" />
                                    </svg>
                                </button>

                                <button class='btn btn-sm'>
                                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="red"
                                        class="bi bi-trash3-fill" viewBox="0 0 16 16">
                                        <path
                                            d="M11 1.5v1h3.5a.5.5 0 0 1 0 1h-.538l-.853 10.66A2 2 0 0 1 11.115 16h-6.23a2 2 0 0 1-1.994-1.84L2.038 3.5H1.5a.5.5 0 0 1 0-1H5v-1A1.5 1.5 0 0 1 6.5 0h3A1.5 1.5 0 0 1 11 1.5Zm-5 0v1h4v-1a.5.5 0 0 0-.5-.5h-3a.5.5 0 0 0-.5.5ZM4.5 5.029l.5 8.5a.5.5 0 1 0 .998-.06l-.5-8.5a.5.5 0 1 0-.998.06Zm6.53-.528a.5.5 0 0 0-.528.47l-.5 8.5a.5.5 0 0 0 .998.058l.5-8.5a.5.5 0 0 0-.47-.528ZM8 4.5a.5.5 0 0 0-.5.5v8.5a.5.5 0 0 0 1 0V5a.5.5 0 0 0-.5-.5Z" />
                                    </svg>
                                </button>
                            </div>
                        </div>
                        <p class="mb-1">Lorem ipsum dolor sit amet consectetur adipisicing elit. A quibusdam
                            assumenda
                            officiis sed quis expedita, iure quidem voluptas optio sint tempore ipsum deleniti
                            accusantium repellendus exercitationem nulla. Reprehenderit, est totam.
                        </p>
                        <!-- <small>And some small print.</small> -->
                    </a>
                </div>
            </div>
        </div>
    </div>
    </div>

    <!-- Código para linkar o footer (rodape), caso ele seja colocado em arquivo separado -->
    <!-- <header id="mainfooter"></header> -->

    <div class="rodape">
        <div class="box__local-rodape">
            <header>Venha nos Visitar!</header>

            <!-- Localização -->
            <p><svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor"
                    class="bi bi-geo-alt-fill" viewBox="0 0 16 16">
                    <path d="M8 16s6-5.686 6-10A6 6 0 0 0 2 6c0 4.314 6 10 6 10zm0-7a3 3 0 1 1 0-6 3 3 0 0 1 0 6z" />
                </svg> R. Izautino Camata, 222 - Centro, Marilândia - ES, 29725-000, Brasil</p>

            <!-- Códifo para acrescentar o número de telefone -->
            <!-- <p><svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="green" 
                    class="bi bi-telephone-fill" viewBox="0 0 16 16">
                    <path fill-rule="evenodd"
                        d="M1.885.511a1.745 1.745 0 0 1 2.61.163L6.29 2.98c.329.423.445.974.315 1.494l-.547 2.19a.678.678 0 0 0 .178.643l2.457 2.457a.678.678 0 0 0 .644.178l2.189-.547a1.745 1.745 0 0 1 1.494.315l2.306 1.794c.829.645.905 1.87.163 2.611l-1.034 1.034c-.74.74-1.846 1.065-2.877.702a18.634 18.634 0 0 1-7.01-4.42 18.634 18.634 0 0 1-4.42-7.009c-.362-1.03-.037-2.137.703-2.877L1.885.511z" />
                </svg> (27) 3724-1330</p> -->

            <!-- Email -->
            <p><svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor"
                    class="bi bi-envelope-fill" viewBox="0 0 16 16">
                    <path
                        d="M.05 3.555A2 2 0 0 1 2 2h12a2 2 0 0 1 1.95 1.555L8 8.414.05 3.555ZM0 4.697v7.104l5.803-3.558L0 4.697ZM6.761 8.83l-6.57 4.027A2 2 0 0 0 2 14h12a2 2 0 0 0 1.808-1.144l-6.57-4.027L8 9.586l-1.239-.757Zm3.436-.586L16 11.801V4.697l-5.803 3.546Z" />
                </svg> paroquiamarilandia@hotmail.com</p>
        </div>
        <div class="box__horarios-rodape">
            <header>Horário de Funcionamento:</header>
            <table class="table table-borderless" cellspacing="1">
                <tr>
                    <td>Segunda a Sexta:</td>
                    <td>7h às 17h</td>
                </tr>
                <tr>
                    <td>Sábado:</td>
                    <td>Fechada</td>
                </tr>
                <tr>
                    <td>Domingo:</td>
                    <td>Fechada</td>
                </tr>
            </table>
        </div>

        <div class="box__redes-sociais-rodape">
            <header>Redes Sociais:</header>

            <!-- Instagram -->
            <a href="https://www.instagram.com/auxiliadoramarilandia/"><svg xmlns="http://www.w3.org/2000/svg"
                    width="16" height="16" fill="currentColor" class="bi bi-instagram" viewBox="0 0 16 16">
                    <path
                        d="M8 0C5.829 0 5.556.01 4.703.048 3.85.088 3.269.222 2.76.42a3.917 3.917 0 0 0-1.417.923A3.927 3.927 0 0 0 .42 2.76C.222 3.268.087 3.85.048 4.7.01 5.555 0 5.827 0 8.001c0 2.172.01 2.444.048 3.297.04.852.174 1.433.372 1.942.205.526.478.972.923 1.417.444.445.89.719 1.416.923.51.198 1.09.333 1.942.372C5.555 15.99 5.827 16 8 16s2.444-.01 3.298-.048c.851-.04 1.434-.174 1.943-.372a3.916 3.916 0 0 0 1.416-.923c.445-.445.718-.891.923-1.417.197-.509.332-1.09.372-1.942C15.99 10.445 16 10.173 16 8s-.01-2.445-.048-3.299c-.04-.851-.175-1.433-.372-1.941a3.926 3.926 0 0 0-.923-1.417A3.911 3.911 0 0 0 13.24.42c-.51-.198-1.092-.333-1.943-.372C10.443.01 10.172 0 7.998 0h.003zm-.717 1.442h.718c2.136 0 2.389.007 3.232.046.78.035 1.204.166 1.486.275.373.145.64.319.92.599.28.28.453.546.598.92.11.281.24.705.275 1.485.039.843.047 1.096.047 3.231s-.008 2.389-.047 3.232c-.035.78-.166 1.203-.275 1.485a2.47 2.47 0 0 1-.599.919c-.28.28-.546.453-.92.598-.28.11-.704.24-1.485.276-.843.038-1.096.047-3.232.047s-2.39-.009-3.233-.047c-.78-.036-1.203-.166-1.485-.276a2.478 2.478 0 0 1-.92-.598 2.48 2.48 0 0 1-.6-.92c-.109-.281-.24-.705-.275-1.485-.038-.843-.046-1.096-.046-3.233 0-2.136.008-2.388.046-3.231.036-.78.166-1.204.276-1.486.145-.373.319-.64.599-.92.28-.28.546-.453.92-.598.282-.11.705-.24 1.485-.276.738-.034 1.024-.044 2.515-.045v.002zm4.988 1.328a.96.96 0 1 0 0 1.92.96.96 0 0 0 0-1.92zm-4.27 1.122a4.109 4.109 0 1 0 0 8.217 4.109 4.109 0 0 0 0-8.217zm0 1.441a2.667 2.667 0 1 1 0 5.334 2.667 2.667 0 0 1 0-5.334z" />
                </svg> auxiliadoramarilandia <br>
            </a>

            <!-- Facebook -->
            <a href="https://www.facebook.com/NSAuxiliadoraES"><svg xmlns="http://www.w3.org/2000/svg" width="16"
                    height="16" fill="currentColor" class="bi bi-facebook" viewBox="0 0 16 16">
                    <path
                        d="M16 8.049c0-4.446-3.582-8.05-8-8.05C3.58 0-.002 3.603-.002 8.05c0 4.017 2.926 7.347 6.75 7.951v-5.625h-2.03V8.05H6.75V6.275c0-2.017 1.195-3.131 3.022-3.131.876 0 1.791.157 1.791.157v1.98h-1.009c-.993 0-1.303.621-1.303 1.258v1.51h2.218l-.354 2.326H9.25V16c3.824-.604 6.75-3.934 6.75-7.951z" />
                </svg> Nossa Senhora Auxiliadora - Marilândia <br>
            </a>

            <!-- Whatsapp -->
            <a href="https://api.whatsapp.com/send?phone=5527999634955"><svg xmlns="http://www.w3.org/2000/svg"
                    width="16" height="16" fill="currentColor" class="bi bi-whatsapp" viewBox="0 0 16 16">
                    <path
                        d="M13.601 2.326A7.854 7.854 0 0 0 7.994 0C3.627 0 .068 3.558.064 7.926c0 1.399.366 2.76 1.057 3.965L0 16l4.204-1.102a7.933 7.933 0 0 0 3.79.965h.004c4.368 0 7.926-3.558 7.93-7.93A7.898 7.898 0 0 0 13.6 2.326zM7.994 14.521a6.573 6.573 0 0 1-3.356-.92l-.24-.144-2.494.654.666-2.433-.156-.251a6.56 6.56 0 0 1-1.007-3.505c0-3.626 2.957-6.584 6.591-6.584a6.56 6.56 0 0 1 4.66 1.931 6.557 6.557 0 0 1 1.928 4.66c-.004 3.639-2.961 6.592-6.592 6.592zm3.615-4.934c-.197-.099-1.17-.578-1.353-.646-.182-.065-.315-.099-.445.099-.133.197-.513.646-.627.775-.114.133-.232.148-.43.05-.197-.1-.836-.308-1.592-.985-.59-.525-.985-1.175-1.103-1.372-.114-.198-.011-.304.088-.403.087-.088.197-.232.296-.346.1-.114.133-.198.198-.33.065-.134.034-.248-.015-.347-.05-.099-.445-1.076-.612-1.47-.16-.389-.323-.335-.445-.34-.114-.007-.247-.007-.38-.007a.729.729 0 0 0-.529.247c-.182.198-.691.677-.691 1.654 0 .977.71 1.916.81 2.049.098.133 1.394 2.132 3.383 2.992.47.205.84.326 1.129.418.475.152.904.129 1.246.08.38-.058 1.171-.48 1.338-.943.164-.464.164-.86.114-.943-.049-.084-.182-.133-.38-.232z" />
                </svg> (27) 99963-4955
            </a>
        </div>

        <!-- <div class="box__brasao-rodape">
            <img src="img/brasao-removebg-preview.png" height="100" width="100" alt="brasão">
        </div> -->
    </div>
</body>

<script src="https://code.jquery.com/jquery-3.4.1.slim.min.js"
    integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous">
</script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js"
    integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous">
</script>

<!-- Código de ativação do js (sem ele, o carrossel não funciona) -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js"
    integrity="sha384-ENjdO4Dr2bkBIFxQpeoTz1HIcje39Wm4jDKdf19U8gI4ddQ3GYNS7NTKfAdVQSZe" crossorigin="anonymous">
</script>

<script src='../funcoesJS/funcoes.js'></script>

<script>
// toda vez que o botão 'adicionar evento' for clicado, os campos são limpos
function setarModalFormEventos() {
    // document.form_eventos.action = "../../controlador/cadEvento.php";

    // Limpando os campos
    document.getElementById('tituloEvento').value = "";
    document.getElementById('presidenteEvento').value = "";
    document.getElementById('localEvento').value = "";
    document.getElementById('dataEvento').value = "";
    document.getElementById('horarioEvento').value = "";
    document.getElementById('descricaoEvento').value = "";
    document.getElementById('id_evento').value = "";
    const radioOpcao0 = document.querySelector('input[name="radioEvento"][value="0"]');
    radioOpcao0.checked = true;

    // resetando os contadores de caracteres
    msgContagem('tituloEvento', 'spanTituloEvento', '70');
    msgContagem('descricaoEvento', 'spanDescricaoEvento', '200');
}

function setarModalEventoUpdate(titulo, presidente, local, data, horario, descricao, status, id_eventos) {
    // document.form_eventos.action = "../../controlador/saveEditEvento.php";

    document.getElementById('tituloEvento').value = titulo;
    document.getElementById('presidenteEvento').value = presidente;
    document.getElementById('localEvento').value = local;
    document.getElementById('dataEvento').value = data;
    document.getElementById('horarioEvento').value = horario;
    document.getElementById('descricaoEvento').value = descricao;
    document.getElementById('id_evento').value = id_eventos;
    const radioOpcao0 = document.querySelector('input[name="radioEvento"][value="0"]');
    radioOpcao0.checked = true;

    if (status == 0) {
        const radioOpcao0 = document.querySelector('input[name="radioEvento"][value="0"]');
        radioOpcao0.checked = true;
    } else {
        const radioOpcao1 = document.querySelector('input[name="radioEvento"][value="1"]');
        radioOpcao1.checked = true;
    }

    // Ajustando os contadores de caracteres
    msgContagem('tituloEvento', 'spanTituloEvento', '70');
    msgContagem('descricaoEvento', 'spanDescricaoEvento', '200');
}

// toda vez que o botão 'adicionar aviso' for clicado, os campos são limpos
function setarModalFormAvisos() {
    // document.form_avisos.action = "../../controlador/cadAviso.php";

    // Limpando os campos
    document.getElementById('tituloAviso').value = "";
    document.getElementById('descricaoAviso').value = "";
    document.getElementById('id_aviso').value = "";
    document.getElementById('id_comunidade').value = "<?php echo $_SESSION['id_comunidade'] ?>";
    const radioOpcao0 = document.querySelector('input[name="radioAviso"][value="0"]');
    radioOpcao0.checked = true;

    // resetando os contadores de caracteres
    msgContagem('tituloAviso', 'spanAvisoTitulo', '100');
    msgContagem('descricaoAviso', 'spanAvisoDescricao', '300');
}

// Carregando as informações para o modal de edição (pega direto da página, já que a query ao banco já foi feita)
function setarModalAvisoUpdate(titulo, descricao, status, id_aviso, id_comunidade) {
    // document.form_avisos.action = "../../controlador/saveEditAviso.php";

    document.getElementById('tituloAviso').value = titulo;
    document.getElementById('descricaoAviso').value = descricao;
    document.getElementById('id_aviso').value = id_aviso;
    document.getElementById('id_comunidade').value = id_comunidade;

    if (status == 0) {
        const radioOpcao0 = document.querySelector('input[name="radioAviso"][value="0"]');
        radioOpcao0.checked = true;
    } else {
        const radioOpcao1 = document.querySelector('input[name="radioAviso"][value="1"]');
        radioOpcao1.checked = true;
    }

    // Ajustando a contagem dos caracteres (small)
    msgContagem('descricaoAviso', 'spanAvisoDescricao', '300');
    msgContagem('tituloAviso', 'spanAvisoTitulo', '100');
}

function setarIdModalExclusaoAviso(id) {
    document.getElementById('btnDeleteAvisoModal').value = id;
}

function setarIdModalExclusaoEvento(id) {
    document.getElementById('btnDeleteEventoModal').value = id;
}

function deleteAviso(id) {
    window.location.href = "../../controlador/deletarAviso.php?id=" + id;
}

function deleteEvento(id) {
    window.location.href = "../../controlador/deletarEvento.php?id=" + id;
}
</script>

</html>