<header>
    <div class="menu">
        <nav class="logo" onclick="redirect_index()">
            <img src="../assets/img/logo.png" alt="logo" class="imagen-logo">
            <h1>Pokemon Team Builder</h1>
        </nav>
        <nav class="lista">
            <ul>
                <li class="hideOnMobile" onclick="redirect_info()">Info</li>
                <li class="hideOnMobile" onclick="redirect_Pokedex()">Pokedex</li>
                <li class="hideOnMobile" onclick="redirect_crearEquipo()">Crear Equipo</li>
                <li class="hideOnMobile" onclick="redirect_tablaTipos()">Tabla Tipos</li>
                <li class="hideOnMobile" id="user">
                    <?php
                        $username = $_SESSION['username'];
                        echo $username;
                    ?>
                    <ul class="lista-usuario">
                        <li class="hideOnMobile">Perfil</li>
                        <li class="hideOnMobile" onclick="redirect_logOut()">Cerrar Sesion</li>
                    </ul>
                </li>
                <li class="button-sidebar"onclick="showSidebar()">
                    <svg xmlns="http://www.w3.org/2000/svg" height="28px" viewBox="0 -960 960 960" width="28px" fill="#black">
                    <path d="M120-240v-80h720v80H120Zm0-200v-80h720v80H120Zm0-200v-80h720v80H120Z"/></svg>
                </li>
            </ul>
        </nav>
    </div>
    <div class="menu sidebar">
        <nav class="lista">
            <ul>
                <li onclick="closeSidebar()">
                    <svg xmlns="http://www.w3.org/2000/svg" height="26px" viewBox="0 -960 960 960" width="26px" fill="#black">
                    <path d="m256-200-56-56 224-224-224-224 56-56 224 224 224-224 56 56-224 224 224 224-56 56-224-224-224 224Z"/></svg>
                </li>
                <li onclick="redirect_info()">Info</li>
                <li onclick="redirect_Pokedex()">Pokedex</li>
                <li onclick="redirect_crearEquipo()">Crear Equipo</li>
                <li onclick="redirect_tablaTipos()">Tabla Tipos</li>
                <li>
                    <?php
                        $username = $_SESSION['username'];
                        echo $username;
                    ?>
                </li>
                <li class="hideOnMobile" onclick="redirect_logOut()">Cerrar Sesion</li>
            </ul>
        </nav>
    </div>
</header>
<script src="../assets/js/script.js"></script>