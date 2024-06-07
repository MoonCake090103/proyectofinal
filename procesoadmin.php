<?php
session_start();
header('Content-Type: text/html; charset=UTF-8');

try {
    $oConexion = new PDO("mysql:host=localhost;dbname=proyectofinalpw", "root", "", array(PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES 'UTF8'"));
    $oConexion->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch(PDOException $e) {
    echo "Error de conexión: " . $e->getMessage();
    exit(); // Terminar el script si hay un error de conexión
}

// Verificar que los datos del formulario se hayan enviado
if (isset($_POST['username']) && isset($_POST['password'])) {
    // Obtener datos del formulario
    $username = $_POST['username']; 
    $password = $_POST['password'];

    // Buscar el usuario en la base de datos
    $Query = "SELECT * FROM administradores WHERE username = :username";
    $stmt = $oConexion->prepare($Query);
    $stmt->bindParam(':username', $username);
    $stmt->execute();
    $row = $stmt->fetch(PDO::FETCH_ASSOC);

    if ($stmt->rowCount() > 0) {
        // Verificar la contraseña
        if (password_verify($password, $row["password"])) {
            // Contraseña correcta: Iniciar sesión y establecer variables de sesión
            $_SESSION['username'] = $username;
            header("Location: menuadministrador.php"); // Redirigir a la página principal después de iniciar sesión
            exit; // Finalizar el script después de redirigir
        } else {
            // Contraseña incorrecta
            echo "<div style='text-align: center;'>";
            echo "Contraseña incorrecta.";
            echo "<br> <a href='index.php'>Regresar al inicio</a>"; 
            echo "</div>";
            exit;
        }
    } else {
        // Usuario no encontrado
        echo "<div style='text-align: center;'>";
        echo "Usuario no encontrado.";
        echo "<br> <a href='index.php'>Regresar al inicio</a>"; 
        echo "<br> ¿Deseas registrarte?";
        echo "</div>";
        echo "<center>";
        echo "<form action='register.php'>";
        echo "<input type='submit' value='Registrar'>";
        echo "</form>";
        echo "</center>";
        exit;
    }
} else {
    // Manejar el caso en que no se hayan enviado los datos del formulario
    echo "Por favor, complete el formulario de inicio de sesión.";
    exit;
}

// No es necesario cerrar la conexión PDO
?>
