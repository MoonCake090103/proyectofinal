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
            <h1>Registrar Nuevo Usuario</h1>
            
    <form method="post" action="procesoregistro.php">
        <label for="nombre">Nombre:</label>
        <input type="text" id="nombre" name="nombre" required>
        
        <label for="apellidos">Apellidos:</label>
        <input type="text" id="apellidos" name="apellidos" required>
        
        <label for="nocontrol">No. Control:</label>
        <input type="text" id="nocontrol" name="nocontrol" required>
        
        <label for="username">Username:</label>
        <input type="text" id="username" name="username" required>
        
        <label for="password">Password:</label>
        <input type="password" id="password" name="password" required>
        
        <button type="submit">Registrar</button>
    </form>




        <button type="button" onclick="window.location.href='index.php'">Regresar</button>
        
    </div>
</body>
</html>
