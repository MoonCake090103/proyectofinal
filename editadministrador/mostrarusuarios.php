<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<title>Documento sin t&iacute;tulo</title>
<link rel="stylesheet" href="../css/style3.css"> 
</head>

<body>




<?php 
// $conexion = pg_connect("host=localhost port=5432 user=nombreUsuario password=passwordUsuario dbname=nomBD", PGSQL_CONNECT_FORCE_NEW);
// $conexion = pg_connect("host=localhost dbname=BASE_DE_DATOS user=USUARIO password=CONTRASEÑA");		

$mysql = new mysqli("localhost", "root", "", "proyectofinalpw");
$Query = "select * from datos";
$Result = $mysql->query( $Query );


$numeroRegistros=$Result->num_rows;
if($numeroRegistros<=0) 
   { 
     echo "<div align='center'>"; 
     echo "<h2>No se encontraron resultados</h2>"; 
     echo "</div><hr> "; 
   }else{
   ?>
       <table border=1>
        <tr>
		<th><strong> Nombre</strong></th>
		<th><strong> Apellidos</strong></th>
		<th><strong> N&uacutemero De Control</strong></th>
		</tr>
		<?php
		 // fetch_array() Obtiene una fila de resultado como un array asociativo
        while($row =$Result->fetch_array()) {	    
           ?>
		   <tr>
		   <td> <?php printf($row["nombre"]); ?>   </td>
		  
		   <td> <?php printf($row["apellidos"]); ?>   </td>
		  
		   <td> <?php printf($row["nocontrol"]); ?>   </td>
           </tr>
<?php	}
}
?>
</table>
<center><a href="../menuadministrador.php"><input type="button" value="Regresar"></a> </center>
</body>
</html>
