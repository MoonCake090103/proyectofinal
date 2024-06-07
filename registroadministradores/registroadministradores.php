<?php
session_start();
header('Content-Type: text/html; charset=UTF-8');

// Datos de conexión
$host = 'localhost';
$dbname = 'proyectofinalpw';
$dbusername = 'root';
$dbpassword = '';

try {
    // Conexión a la base de datos
    $oConexion = new PDO("mysql:host=$host;dbname=$dbname;charset=utf8", $dbusername, $dbpassword);
    $oConexion->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    // Verificar que los datos del formulario se hayan enviado
    if (isset($_POST['username']) && isset($_POST['password'])) {
        // Datos del formulario de registro
        $username = $_POST['username'];
        $password = $_POST['password'];

        // Hash de la contraseña
        $hashedPassword = password_hash($password, PASSWORD_DEFAULT);

        // Inserción de usuario en la tabla 'administradores'
        $sql2 = "INSERT INTO administradores (username, password) VALUES (?, ?)";
        $stmt2 = $oConexion->prepare($sql2);
        $stmt2->execute([$username, $hashedPassword]);

        echo "<div style='text-align: center;'>";
        echo "Usuario registrado correctamente.";
        echo "<br><a href='index.php'><input type='button' value='Regresar'></a>";
        echo "</div>";
    } else {
        echo "Por favor, complete el formulario de registro.";
    }
} catch(PDOException $e) {
    echo "Error de conexión: " . $e->getMessage();
}

// Cerrar la conexión
$oConexion = null;
?>
