<?php
require_once("functions.php");

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if(empty($_POST['username']) || empty($_POST['email']) || empty($_POST['password'])){
        echo "Error: Alguno de los campos está vacío.";
    } else {
        $username = limpiar($_POST['username']);
        $email = limpiar($_POST['email']);
        $password = limpiar($_POST['password']);

        if(!filter_var($email, FILTER_VALIDATE_EMAIL)){
            echo "Error: El correo electrónico ingresado no es válido.";
        } else {
            require_once("BBDD.php");
            $conn = new Poke();
            try {
                $conn->registro($username, $email, $password);
                echo "<p>¡Registro completado con éxito!</p>";

                // Almacenar la información del usuario en la sesión
                session_start();
                $_SESSION['username'] = $username;

                // Redirigir al usuario a la página de inicio
                header('Location: index.php');
                exit();
            } catch (PDOException $e) {
                if ($e->errorInfo[1] == 1062) {
                    echo "Error: El nombre de usuario o el correo electrónico ya están en uso.";
                } else {
                    echo "Error: " . $e->getMessage();
                }
            }
        }
    }
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
    <title>Iniciar Sesion</title>
</head>
<body>
    <center>
        <div class="sesion">
            <form action="<?= htmlspecialchars($_SERVER["PHP_SELF"]);?>" class="inicioSesion" method="POST">
                <div class="input-field">
                    <input type="text" name="username">
                    <label for="username">User name:</label>
                </div>
                <br>
                <div class="input-field">
                    <input type="email" name="email">
                    <label for="email">Email:</label>
                </div>
                <br>
                <div class="input-field">
                    <input type="password" name="password">
                    <label for="password">Password:</label>
                </div>
                <br>   
                <div class="buttons">
                    <button type="submit">Enviar</button>
                    <button type="button" onclick="redirect_index()">Volver</button>
                </div>
            </form>
        </div>
    </center>
    <?php require("footer.php") ?>
</body>
</html>