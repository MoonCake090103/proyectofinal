<!-- login.php -->
<style>
    .message {
        padding: 10px;
        border-radius: 5px;
		font-size: 200%;
		font-family: Arial;
        font-weight: bold;
		text-align: center;
		/*Aqui se agregan las modificaciones para el texto */
    }
    .success {
        background-color: #dff0d8;
        color: #3c763d;
        border: 1px solid #d6e9c6;
    }
    .error {
        background-color: #f2dede;
        color: #a94442;
        border: 1px solid #ebccd1;
    }
</style>

<?php
session_start();

// Verificar si el usuario ha iniciado sesión
if (!isset($_SESSION['username'])) {
    header("Location: index.php"); // Redirigir a la página de inicio de sesión
    exit;
}

// Resto del código aquí
echo "Bienvenido, " . $_SESSION['username'];
//<div class='message success'>Bienvenido,  . $_SESSION['username']</div>

?>
       <br> <a href="menuusuario.php">Ir al menu</a> 

