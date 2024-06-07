<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<title>Documento sin t&iacute;tulo</title>

</head>
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
	/*Este es el estilo para los textos */
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

<body>




<?php 
// $conexion = pg_connect("host=localhost port=5432 user=nombreUsuario password=passwordUsuario dbname=nomBD", PGSQL_CONNECT_FORCE_NEW);
// $conexion = pg_connect("host=localhost dbname=BASE_DE_DATOS user=USUARIO password=CONTRASEÑA");		

$nom=$_GET['Nombre'];
$mysql = new mysqli("localhost", "root", "", "proyectofinalpw");
$Query = "delete from datos where nombre='".$nom."'";
$Result = $mysql->query( $Query );

if($Result!=null)
   	//print("Se elimino con éxito el registro.");
$mensaje = "<div class='message success'>Se elimino con exito el registro.</div>";
	

else
  	//print("No se pudo eliminar");
	  $mensaje = "<div class='message success'>No se pudo eliminar el registro.</div>";

$mysql->close();
?>

<?php echo $mensaje;?>
</table>
<center><a href="../menuadministrador.php"><input type="button" value="Regresar"></a> </center>
</body>
</html>
