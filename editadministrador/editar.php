<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<title>Documento sin t&iacute;tulo</title>
<style>
input[type="text"] {
    width: 100%;
    padding: 8px;
    box-sizing: border-box;
}
input[type="submit"], input[type="button"] {
    padding: 10px 20px;
    background-color: #4CAF50;
    border: none;
    color: white;
    text-align: center;
    text-decoration: none;
    display: inline-block;
    font-size: 16px;
    margin: 4px 2px;
    cursor: pointer;
    border-radius: 4px;
}
input[type="submit"]:hover, input[type="button"]:hover {
    background-color: #45a049;
}
.message {
    padding: 10px;
    border-radius: 5px;
    font-size: 200%;
    font-family: Arial;
    font-weight: bold;
    text-align: center;
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
</head>
<body>

<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "proyectofinalpw";

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Conexión fallida: " . $conn->connect_error);
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $nombreBuscar = $_POST["NombreBuscar"];
    $nombreNuevo = $_POST["NombreNuevo"];
    $apellidos = $_POST["Apellidos"];
    $nocontrol = $_POST["NoControl"];
    
    $stmt = $conn->prepare("UPDATE datos SET nombre=?, apellidos=?, nocontrol=? WHERE nombre=?");
    $stmt->bind_param("ssss", $nombreNuevo, $apellidos, $nocontrol, $nombreBuscar);
    
    if ($stmt->execute()) {
        $mensaje = "<div class='message success'>Se modificó correctamente.</div>";
    } else {
        $mensaje = "<div class='message error'>No se pudo modificar.</div>";
    }
    
    $stmt->close();
}

$conn->close();
?>

<?php echo $mensaje; ?>

<center><a href="actualizarusuario.php"><input type="button" value="Regresar"></a></center>
</body>
</html>
