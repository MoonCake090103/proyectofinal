<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Inicio de Sesión</title>
    <link rel="stylesheet" href="css/styleindex.css">
</head>
<body>
    
    <div class="login-container">
        <h1>INGRESAR</h1>
        
        <form method="post" action="loginprocess.php">
    <label for="usuario">Nombre De Usuario:</label>
    <input type="text" name="username" id="username" required>
    
    <label for="contraseña">Contraseña:</label>
    <input type="password" name="password" id="password" required>
    
    <button type="submit">Iniciar Sesi&oacuten</button>
</form>




        <button type="button" onclick="window.location.href='loginadmin.php'">Administrador</button>
        <p>¿No estás registrado? <a href="registrousuario.php">Crea una cuenta</a></p>
    </div>
</body>
</html>
