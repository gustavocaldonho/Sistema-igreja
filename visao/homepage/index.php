<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Homepage</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous">
    <link rel="stylesheet" href="../style/style-geral.css">
    <link rel="stylesheet" href="style-homepage.css">
    <link rel="stylesheet" href="../../visao/navbar/style-navbar.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">

    <!-- Se a página não estiver "pegando" o css, atualizar a página com 'ctrl + F5' (limpa o cache) -->
</head>

<body>
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
                    <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="0" class="active" aria-current="true" aria-label="Slide 1"></button>
                    <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="1" aria-label="Slide 2"></button>
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
                <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide="prev">
                    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                    <span class="visually-hidden">Previous</span>
                </button>
                <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide="next">
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
            <div class="modal fade" id="modal-eventos" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h1 class="modal-title fs-5" id="exampleModalLabel">Inserir novo Evento</h1>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <div class="modal-body">
                            <form id="form_eventos" name="form_eventos" action="../../controlador/cadEvento.php" method="POST">
                                <div class="">
                                    <label for="tituloEvento" class="col-form-label">Título</label>
                                    <input type="text" class="form-control" id="tituloEvento" name="tituloEvento" maxlength="70" onkeyup="msgContagem(' tituloEvento', 'spanTituloEvento' , '70' )">
                                    <div class="box__span">
                                        <span id="spanTituloEvento" name="spanTituloEvento">0/70</span>
                                    </div>
                                </div>
                                <div class="box__presidenteLocal">
                                    <div class="metade-box">
                                        <label for="presidenteEvento" class="col-form-label">Presidida por</label>
                                        <input type="text" class="form-control" id="presidenteEvento" name="presidenteEvento" maxlength="100">
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
                                    <textarea class="form-control" id="descricaoEvento" name="descricaoEvento" rows="2" maxlength="200" onkeyup="msgContagem('descricaoEvento', 'spanDescricaoEvento', '200')"></textarea>
                                    <div class="box__span">
                                        <span id="spanDescricaoEvento" name="spanDescricaoEvento">0/200</span>
                                    </div>
                                </div>

                                <!-------------------------- Desativado --------------------------->
                                <div class="form-check" hidden>
                                    <input class="form-check-input" type="radio" name="radioEvento" id="radioEventCom" value="0" checked>
                                    <label class="form-check-label" for="radioEventCom">
                                        Visível somente para a Comunidade
                                    </label>
                                </div>
                                <div class="form-check" hidden>
                                    <input class="form-check-input" type="radio" name="radioEvento" id="radioEventParoq" value="1">
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
            <div class="modal fade" id="modalExclusaoEvento" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
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
                            <button type="button" class="btn btn-primary" id="btnDeleteEventoModal" value="" onclick="deleteEvento(this.value)">Excluir</button>
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
                    $abrangencia = $user_data['abrangencia'];
                    $ativo = $user_data['ativo'];

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

                    // codPerfil == 2 -> vê tudo (ativos e inativos)
                    // codPerfil == 1 -> vê tudo (ativos e inativos)
                    // codPerfil == 0 -> vê somente os ativos

                    if (($codPerfil == 2 || $codPerfil == 1) || ($ativo == 1)) {
                        echo "<div id='item-evento-$id_eventos' class='item-evento";
                        if ($ativo == 0) {
                            echo " esmaecer";
                        }
                        echo "'>";


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
                                    <h5>
                                    <svg xmlns='http://www.w3.org/2000/svg' width='16' height='16' fill='#B36812' class='bi bi-circle-fill' viewBox='0 0 16 16'>
                                            <circle cx='6' cy='6' r='6' />
                                        </svg> $titulo
                                    </h5>
                                </div>";
                        echo "<div>";

                        // Não é visto pelos membros comuns
                        if ($codPerfil == 1 || $codPerfil == 2) {

                            echo "<div class='buttonsEvento'>";
                            //             <small class='small-status";
                            // if ($abrangencia == 0) {
                            //     echo " comunidade'>Comunidade</small>";
                            // } else {
                            //     echo " paroquia'>Paróquia</small>";
                            // }

                            echo "<button class='btn btn-sm' data-bs-toggle='modal' data-bs-target='#modal-eventos' onclick='setarModalEventoUpdate(\"$titulo\", \"$presidente\", \"$local\", \"$data\", \"$horario\", \"$descricao\", $abrangencia, $id_eventos)'>
                                            <i class='bi bi-pencil-fill' style='color:blue;'></i>
                                        </button>


                                        <button class='btn btn-sm' data-bs-toggle='modal' data-bs-target='#modalExclusaoEvento' onclick='setarIdModalExclusaoEvento($id_eventos)'>
                                            <i class='bi bi-trash3-fill' style='color:red;'></i>
                                        </button>
                                        
                                        <div class='form-check form-switch'>
                                            <input class='form-check-input' type='checkbox' role='switch'";
                            if ($ativo == 1) {
                                echo " checked ";
                            }
                            echo "id='radioStatusEvento-$id_eventos' onclick='ativarDesativarEvento($id_eventos, this.checked); mudarStatus(\"item-evento-$id_eventos\")'>
                                        </div>
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
            <div class="modal fade" id="modal-avisos" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h1 class="modal-title fs-5" id="exampleModalLabel">Inserir novo Aviso</h1>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <div class="modal-body">
                            <form id="form_avisos" name="form_avisos" enctype=' multipart/form-data' action="../../controlador/cadAviso.php" method="POST" class="row g-3">
                                <div class="">
                                    <label for="tituloAviso" class="col-form-label">Título</label>
                                    <input type="text" class="form-control" id="tituloAviso" name="tituloAviso" maxlength="100" onkeyup="msgContagem('tituloAviso', 'spanAvisoTitulo', '100')">
                                    <div class="box__span">
                                        <span id="spanAvisoTitulo" name="spanAvisoTitulo">0/100</span>
                                    </div>
                                </div>
                                <div class="box__descricaoAvisos">
                                    <label for="descricaoAviso" class="col-form-label">Descrição</label>
                                    <textarea class="form-control" id="descricaoAviso" name="descricaoAviso" rows="6" maxlength="300" onkeyup="msgContagem('descricaoAviso', 'spanAvisoDescricao', '300')"></textarea>
                                    <div class="box__span">
                                        <span id="spanAvisoDescricao" name="spanAvisoDescricao">0/300</span>
                                    </div>
                                </div>
                                <div class="form-check">
                                    <input class="form-check-input" type="radio" name="radioAviso" id="radioAvisoCom" value="0" checked>
                                    <label class="form-check-label" for="radioAvisoCom">
                                        Visível somente para a Comunidade
                                    </label>
                                </div>
                                <div class="form-check">
                                    <input class="form-check-input" type="radio" name="radioAviso" id="radioAvisoParoq" value="1">
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
            <div class="modal fade" id="modalExclusaoAviso" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
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
                            <button type="button" class="btn btn-primary" id="btnDeleteAvisoModal" value="" onclick="deleteAviso(this.value)">Excluir</button>
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
                        $ativo = $user_data['ativo'];
                        $abrangencia = $user_data['abrangencia'];
                        $titulo = $user_data['titulo'];
                        $descricao = $user_data['descricao'];
                        $id_comunidade = $user_data['id_comunidade'];

                        // Os avisos serão filtrados pelo abrangencia (0 - somente a comunidade verá, 1 - todos da paróquia) e pelo id da comunidade (somente verá se os avisos forem da comunidade do usuário, em caso de abrangencia == 0)

                        // abrangencia == 1 ou (abrangencia == 0 e comunidade de quem inseriu == comunidade de quem visualizou) {visto} 

                        // codPerfil == 2 -> vê tudo (ativos e inativos)
                        // codPerfil == 1 -> vê tudo o que é da sua comunidade (ativos e inativos)
                        // codPerfil == 0 -> vê somente os ativos da sua comunidade

                        if (($codPerfil == 2) || ($codPerfil == 1 && ($id_comunidade == $_SESSION['id_comunidade'] || $abrangencia == 1)) || ($ativo == 1 && ($abrangencia == 1 || $id_comunidade == $_SESSION['id_comunidade']))) {
                            // echo "Inserido por: " . $id_comunidade . " # Visualizado por: " . $_SESSION['id_comunidade'] . " # abrangencia: " . $abrangencia;

                            echo "<a id='item-aviso-$id_aviso' class='list-group-item";
                            if ($ativo == 0) {
                                echo " esmaecer";
                            }
                            echo "' aria-current='true'>";

                            echo "<div class='d-flex w-100 justify-content-between'>";
                            echo "<h5 class='mb-1'>";
                            echo "<i class='bi bi-arrow-right' style='font-size:20px;'></i>";
                            echo " " . $titulo;
                            echo "</h5>";

                            //Não é visto pelos membros comuns
                            if ($codPerfil == 1 || $codPerfil == 2) {

                                echo "<div class='buttonsAviso'>
                            <small class='small-abrangencia";
                                if ($abrangencia == 0) {
                                    echo " comunidade'>Comunidade</small>";
                                } else {
                                    echo " paroquia'>Paróquia</small>";
                                }
                                echo "<button class='btn btn-sm' data-bs-toggle='modal'                 data-bs-target='#modal-avisos' onclick='setarModalAvisoUpdate(\"$titulo\", \"$descricao\", $abrangencia, $id_aviso, $id_comunidade)'>
                                    <i class='bi bi-pencil-fill' style='color:blue;'></i>
                                </button>
                            
                                <button class='btn btn-sm' data-bs-toggle='modal' data-bs-target='#modalExclusaoAviso' onclick=setarIdModalExclusaoAviso($id_aviso)>
                                    <i class='bi bi-trash3-fill' style='color:red;'></i>
                                </button>

                                <div class='form-check form-switch'>
                                    <input class='form-check-input' type='checkbox' role='switch'";
                                if ($ativo == 1) {
                                    echo " checked ";
                                }
                                echo "id='radioStatusAviso-$id_aviso' onclick='ativarDesativarAviso($id_aviso, this.checked); mudarStatus(\"item-aviso-$id_aviso\")'>
                                </div>
                            </div>";
                            }

                            echo "</div>";
                            echo "<p class='mb-1'> $descricao  </p>";
                            // echo "<small hidden>And some small print.</small>";
                            echo "</a>";
                        }
                    }
                    ?>

                    <!-- backup (devolver o "active") -->
                    <a class="list-group-item" aria-current="true" hidden>
                        <div class="d-flex w-100 justify-content-between">
                            <h5 class="mb-1">
                                <i class="bi bi-arrow-right mb-1"></i>
                                List group item heading
                            </h5>
                            <!-- <small class="text-secondary">3 days ago</small> -->

                            <div class="buttonsAviso">
                                <button class='btn btn-sm'>
                                    <i class="bi bi-pencil-fill" style="color:blue"></i>
                                </button>

                                <button class='btn btn-sm'>
                                    <i class="bi bi-trash3-fill" style="color:red"></i>
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

    <div class="rodape">
        <div class="box__local-rodape">
            <header>Venha nos Visitar!</header>

            <!-- Localização -->
            <p>
                <i class="bi bi-geo-alt-fill"></i>
                R. Izautino Camata, 222 - Centro, Marilândia - ES, 29725-000, Brasil
            </p>

            <!-- Email -->
            <p>
                <i class="bi bi-envelope-fill"></i>
                paroquiamarilandia@hotmail.com
            </p>
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
            <a href="https://www.instagram.com/auxiliadoramarilandia/">
                <i class="bi bi-instagram"></i>
                auxiliadoramarilandia <br>
            </a>

            <!-- Facebook -->
            <a href="https://www.facebook.com/NSAuxiliadoraES">
                <i class="bi bi-facebook"></i>
                Nossa Senhora Auxiliadora - Marilândia <br>
            </a>

            <!-- Whatsapp -->
            <a href="https://api.whatsapp.com/send?phone=5527999634955">
                <i class="bi bi-whatsapp"></i>
                (27) 99963-4955
            </a>
        </div>

        <!-- <div class="box__brasao-rodape">
            <img src="img/brasao-removebg-preview.png" height="100" width="100" alt="brasão">
        </div> -->
    </div>
</body>

<script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous">
</script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous">
</script>

<!-- Código de ativação do js (sem ele, o carrossel não funciona) -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ENjdO4Dr2bkBIFxQpeoTz1HIcje39Wm4jDKdf19U8gI4ddQ3GYNS7NTKfAdVQSZe" crossorigin="anonymous">
</script>

<script src='../funcoesJS/funcoes.js'></script>
<script src='../funcoesJS/funcoesAjax.js'></script>

<script>
    // toda vez que o botão 'adicionar evento' for clicado, os campos são limpos
    function setarModalFormEventos() {
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

    function setarModalEventoUpdate(titulo, presidente, local, data, horario, descricao, abrangencia, id_eventos) {
        document.getElementById('tituloEvento').value = titulo;
        document.getElementById('presidenteEvento').value = presidente;
        document.getElementById('localEvento').value = local;
        document.getElementById('dataEvento').value = data;
        document.getElementById('horarioEvento').value = horario;
        document.getElementById('descricaoEvento').value = descricao;
        document.getElementById('id_evento').value = id_eventos;
        const radioOpcao0 = document.querySelector('input[name="radioEvento"][value="0"]');
        radioOpcao0.checked = true;

        if (abrangencia == 0) {
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
    function setarModalAvisoUpdate(titulo, descricao, abrangencia, id_aviso, id_comunidade) {
        document.getElementById('tituloAviso').value = titulo;
        document.getElementById('descricaoAviso').value = descricao;
        document.getElementById('id_aviso').value = id_aviso;
        document.getElementById('id_comunidade').value = id_comunidade;

        if (abrangencia == 0) {
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