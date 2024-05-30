<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../assets/css/style.css">
    <script defer src="../assets/js/script.js"></script>
    <link rel="icon" href="../assets/img/logo.png" type="image/x-icon">
    <title>Crea tu equipo</title>
</head>
<body>
    <?php require("header.php") ?>

    <div>
    <?php
        require_once("BBDD.php");
        $conn = new Poke();

        $conn->mostrarPokemons();
    ?>
    </div>

    <?php require("footer.php") ?> 
</body>
</html>