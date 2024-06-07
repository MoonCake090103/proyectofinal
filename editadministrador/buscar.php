<?php 
//Busca registro  a través del nombre elegido
$nombreBuscar=$_GET["Nombre"];
$oMysql = new mysqli("localhost", "root", "", "proyectofinalpw");
$Query="select * from datos WHERE nombre = '".$nombreBuscar."'";
$Result = $oMysql->query( $Query );

if($Result==null)
   	print("No se  encontra el registro");
else{
      $row =$Result->fetch_array();
  	  $nombre=$row["nombre"];
	  $apellidos=$row["apellidos"];
	  $nocontrol=$row["nocontrol"];
	}
?>
