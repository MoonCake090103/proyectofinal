<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Inicio de Administrador</title>
    <link rel="stylesheet" href="css/styleindex.css">
</head>
<body>
    <div class="login-container">
        <h1>Bienvenido Administrador</h1>
        <form action="procesoadmin.php" method="post">
            <label for="username">Nombre de Usuario:</label>
            <input type="text" id="username" name="username" required>
            <br>
            <label for="password">Contraseña:</label>
            <input type="password" id="password" name="password" required>
            <br>
            <button type="submit">Iniciar sesión</button>
        </form>
        <button type="button" onclick="window.location.href='index.php'">Regresar</button>
    </div>
</body>
</html>
