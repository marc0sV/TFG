<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Iniciar Sesion</title>
</head>
<body>
    <div class="contenedor">
        <form action="<?= htmlspecialchars($_SERVER["PHP_SELF"]);?>">
            <label for="username">User name:</label>
            <input type="text" id="username"><br>
            <label for="password">Password:</label>
            <input type="password"><br>
            <button type="submit">Enviar</button>
        </form>
    </div>
</body>
</html>