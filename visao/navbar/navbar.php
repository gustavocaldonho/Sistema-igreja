<?php

echo "
    <nav>
        <div class='sticky-top box__navbar'>
            <ul id='ul-left'>
                <li>
                    <a class='link-dgapy' href=''>Dgapy</a>
                </li>
                <li>
                    <a href='../homepage/'>Página Inicial</a>
                </li>";


if ($codPerfil == 2) {
    echo "<li class='dropdown'>
                            <a href='../comunidades/'>Comunidades</a>
                         </li>";
}


if ($codPerfil == 1 || $codPerfil == 2) {
    echo "<li class='dropdown'>
                            <a href='../familias/'>Famílias</a>
                        </li>";
}


echo "<li>
                    <a href='../dizimo/'>Dízimo</a>
                </li>
                <li>
                    <a href='../caixa-mortuario/'>Caixa Mortuário</a>
                </li>

                <!---------------------------- campo teste --------------------------------->
                <li hidden>
                    <a href=''>
                        #$codPerfil - $arrayDadosMembro[1] - $arrayDadosMembro[2] - $arrayDadosMembro[3] - //$explodeNome[0]
                    </a>
                </li>
                <!-------------------------------------------------------------------------->

            </ul>

            <!-- Canto direito -> aba de notificações e de login -->
            <ul id='ul-right'>
                <li class='dropdown' hidden>
                    <a href='' >
                        <!-- Sininho das notificações -->
                        <i class='bi bi-bell-fill'></i>
                    </a>
                    <!-- O alinhamento a esquerda foi feito por meio da classe drop-notificacao, usando margin-left (negativo) -->
                    <div class='dropdown-menu drop-notificacao'>
                        <p><b>Title Lorem, ipsum.</b><br> Lorem ipsum dolor sit amet consectetur adipisicing.</p>
                        <div class='dropdown-divider'></div>
                        <p><b>Title Lorem, ipsum.</b><br>Lorem ipsum dolor sit amet consectetur adipisicing elit.
                            Laboriosam, eligendi!</p>
                        <div class='dropdown-divider'></div>
                        <p><b>Title Lorem, ipsum.</b><br>Lorem ipsum dolor sit, amet consectetur adipisicing elit.
                            Cumque aliquid voluptatibus nulla
                            nesciunt dolores porro! Neque magni incidunt facilis illum!</p>
                    </div>
                </li>

                <li>
                    <a href='../perfil-fml/'>
                    <i class='bi bi-person-fill'></i> $explodeNome[0] 
                    </a>
                </li>

                <li>
                    <a href='../login/sair.php' id='btn-sair'>Sair
                        <i class='bi bi-box-arrow-right' style='font-size:19px;'></i>
                    </a>
                </li>

            </ul>
        </div>
    </nav>";
