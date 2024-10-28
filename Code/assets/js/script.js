function redirect_index(){
    window.location.href = "../php/index.php";
}

function redirect_sesion(){
    window.location.href = "../php/inicioSesion.php";
}

function redirect_info(){
    window.location.href = "../php/info.php";
}

function redirect_crearEquipo(){
    window.location.href = "../php/crearEquipo.php";
}

function redirect_Pokedex(){
    window.location.href = "../php/Pokedex.php";
}

function redirect_tablaTipos(){
    window.location.href = "../php/tablaTipos.php";
}

function redirect_register(){
    window.location.href = "../php/registro.php";
}

function redirect_logOut(){
    window.location.href = "../php/logout.php";
}

function showSidebar(){
    const sidebar = document.querySelector('.sidebar');

    sidebar.style.display = 'flex';
}
function closeSidebar(){
    const sidebar = document.querySelector('.sidebar');

    sidebar.style.display = 'none';
}