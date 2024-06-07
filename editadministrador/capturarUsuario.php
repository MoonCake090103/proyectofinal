<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<title>Documento sin t&iacute;tulo</title>
<link rel="stylesheet" href="../css/style3.css"> 
</head>
<body>

<?php
// Inicializar variables para evitar el error "Undefined variable"
$nombreBuscar = '';
$apellidos = '';
$nocontrol = '';

// Incluir archivo de búsqueda
require ("buscar.php");
?>

<form action="editar.php" method="POST">
    <input style="display:none;" type="text" size="40" name="NombreBuscar" value="<?php echo htmlspecialchars($nombreBuscar); ?>">
    <table border="1" align="center">
        <tr>
            <td><strong>Nombre</strong></td>
            <td><input type="text" size="40" name="NombreNuevo" value="<?php echo htmlspecialchars($nombreBuscar); ?>"></td>
        </tr>
        <tr>
            <td><strong>Apellidos</strong></td>
            <td><input type="text" size="40" name="Apellidos" value="<?php echo htmlspecialchars($apellidos); ?>"></td>
        </tr>
        <tr>
            <td><strong>Numero De Control</strong></td>
            <td><input type="text" size="40" name="NoControl" value="<?php echo htmlspecialchars($nocontrol); ?>"></td>
        </tr>
    </table>
    <br><br>
    <center><input type="submit" value="Modificar registro BD"></center>
    <center><a href="actualizarusuario.php"><input type="button" value="Regresar"></a></center>
</form>

</body>
</html>
