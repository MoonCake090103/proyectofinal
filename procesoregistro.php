<?php
session_start();
header('Content-Type: text/html; charset=UTF-8');

// Datos de conexión
$host = 'localhost';
$dbname = 'proyectofinalpw';
$username = 'root';
$password = '';

try {
    // Conexión a la base de datos
    $oConexion = new PDO("mysql:host=$host;dbname=$dbname;charset=utf8", $username, $password);
    $oConexion->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    // Datos del formulario de registro
    $nombre = $_POST['nombre'];
    $apellidos = $_POST['apellidos'];
    $nocontrol = $_POST['nocontrol'];
    $username = $_POST['username'];
    $password = $_POST['password'];

    // Validación del número de control
    $prefix = substr($nocontrol, 0, 2); // Obtener los primeros dos caracteres

    if ($prefix > 21) {
        echo "<div style='text-align: center;'>";
        echo "Lo sentimos, no puedes registrarte porque aún no estás en el momento para hacerlo.";
        echo "<br><a href='index.php'><input type='button' value='Regresar'></a>";
        echo "</div>";
        exit(); // Salir del script si la validación falla
    }

    // Hash de la contraseña
    $hashedPassword = password_hash($password, PASSWORD_DEFAULT);

    // Inserción de datos en la tabla 'datos'
    $sql1 = "INSERT INTO datos (nombre, apellidos, nocontrol) VALUES (?, ?, ?)";
    $stmt1 = $oConexion->prepare($sql1);
    $stmt1->execute([$nombre, $apellidos, $nocontrol]);

    // Inserción de usuario en la tabla 'usuarios'
    $sql2 = "INSERT INTO usuarios (username, password) VALUES (?, ?)";
    $stmt2 = $oConexion->prepare($sql2);
    $stmt2->execute([$username, $hashedPassword]);

    echo "<div style='text-align: center;'>";
    echo "Usuario registrado correctamente.";
    echo "<br><a href='index.php'><input type='button' value='Regresar'></a>";
    echo "</div>";
} catch(PDOException $e) {
    echo "Error de conexión: " . $e->getMessage();
}

// Cerrar la conexión
$oConexion = null;
?>
<html>
<center><a href="index.php"><input type="button" value="Regresar"></a></center>
</html>
