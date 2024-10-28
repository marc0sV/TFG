<?php
session_start();

// Verificar si el usuario ha iniciado sesión y si hay información de usuario en la sesión
if(isset($_SESSION['username'])) {
    $username = $_SESSION['username'];

    // Aquí puedes usar $username y $user_info como desees
    require("headerSesion.php");
} else {
   require("header.php");
}
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../assets/css/style.css">
    <script defer src="../assets/js/script.js"></script>
    <link rel="icon" href="../assets/img/logo.png" type="image/x-icon">
    <title>Tabla de tipos</title>
</head>
<body>

    

    <?php require("footer.php") ?> 
</body>
</html>