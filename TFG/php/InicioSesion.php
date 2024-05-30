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
                    <input type="text" name="username_or_email"> <!-- Cambiado a name="username_or_email" -->
                    <label for="username_or_email">User or email</label>
                </div>
                <br>
                <div class="input-field">
                    <input type="password" name="password">
                    <label for="password">Password</label>
                </div>
                <br>

                <div class="buttons">
                    <button type="submit">Enviar</button>
                    <button type="button" onclick="redirect_index()">Volver</button>
                </div>
                <br>
                <div class="boton-registro"> 
                    <button type="button" name="registrar" onclick="redirect_register()">
                    Registrate</button>
                </div>
            </form>
        </div>
    </center>
    <?php //require("footer.php");?>
    <?php
        require_once("functions.php");
        if ($_SERVER["REQUEST_METHOD"] == "POST") {
            if(empty($_POST['username_or_email']) || empty($_POST['password'])){
                echo "Error, alguno de los valores no es correcto o está vacío";
            } else {
                $username_or_email = limpiar($_POST['username_or_email']);
                $password = limpiar($_POST['password']);

                require_once("BBDD.php");
                $conn = new Poke();
                $inicioValido = $conn->iniciarSesion($username_or_email, $username_or_email, $password); // Pasando el mismo valor para username y email
                
                if($inicioValido){
                    session_start();
                    $_SESSION[]
                    header('Location: index.php');
                    exit();
                } else {
                    echo "Error: Usuario o contraseña no válidos";
                }
                
            }
        }
    ?>
</body>
</html>
