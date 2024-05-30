<?php
session_start();

// Verificar si el usuario ha iniciado sesión y si hay información de usuario en la sesión
if(isset($_SESSION['username']) && isset($_SESSION['user_info'])) {
    $username = $_SESSION['username'];
    $user_info = $_SESSION['user_info'];

    // Aquí puedes usar $username y $user_info como desees
    echo "Bienvenido, $username!";
    echo "Información del usuario: ";
    print_r($user_info);
} //else {
//     header('Location: inicioSesion.php');
//     exit();
// }
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../assets/css/style.css">
    <script defer src="../assets/js/script.js"></script>
    <link rel="icon" href="../assets/img/logo.png" type="image/x-icon">
    <title>Inicio</title>
</head>
<body>
    <?php require("header.php") ?>



    <?php require("footer.php") ?> 
</body>
</html>