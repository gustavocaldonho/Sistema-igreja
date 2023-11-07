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
                <li class='dropdown'>
                    <a href=''>
                        <!-- Sininho das notificações -->
                        <svg xmlns='http://www.w3.org/2000/svg' width='16' height='16' fill='white' class='bi bi-bell-fill' viewBox='0 0 16 16'>
                            <path d='M8 16a2 2 0 0 0 2-2H6a2 2 0 0 0 2 2zm.995-14.901a1 1 0 1 0-1.99 0A5.002 5.002 0 0 0 3 6c0 1.098-.5 6-2 7h14c-1.5-1-2-5.902-2-7 0-2.42-1.72-4.44-4.005-4.901z' />
                        </svg>
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
                        <svg xmlns='http://www.w3.org/2000/svg' width='16' height='16' fill='currentColor' class='bi bi-person-fill mb-1' viewBox='0 0 16 16'>
                            <path d='M3 14s-1 0-1-1 1-4 6-4 6 3 6 4-1 1-1 1H3Zm5-6a3 3 0 1 0 0-6 3 3 0 0 0 0 6Z' />
                        </svg> $explodeNome[0]
                    </a>
                </li>

                <li>
                    <a href='../login/sair.php' id='btn-sair'>Sair
                        <svg xmlns='http://www.w3.org/2000/svg' width='20' height='20' fill='currentColor' class='bi bi-box-arrow-right' viewBox='0 0 16 16'>
                            <path fill-rule='evenodd' d='M10 12.5a.5.5 0 0 1-.5.5h-8a.5.5 0 0 1-.5-.5v-9a.5.5 0 0 1 .5-.5h8a.5.5 0 0 1 .5.5v2a.5.5 0 0 0 1 0v-2A1.5 1.5 0 0 0 9.5 2h-8A1.5 1.5 0 0 0 0 3.5v9A1.5 1.5 0 0 0 1.5 14h8a1.5 1.5 0 0 0 1.5-1.5v-2a.5.5 0 0 0-1 0v2z' />
                            <path fill-rule='evenodd' d='M15.854 8.354a.5.5 0 0 0 0-.708l-3-3a.5.5 0 0 0-.708.708L14.293 7.5H5.5a.5.5 0 0 0 0 1h8.793l-2.147 2.146a.5.5 0 0 0 .708.708l3-3z' />
                        </svg>
                    </a>
                </li>

            </ul>
        </div>
    </nav>";
