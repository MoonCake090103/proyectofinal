<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>Lista de contactos</title>
    <link rel="stylesheet" href="../css/style3.css"> 
    <!-- Incluye Font Awesome para los iconos -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
    <style>
        .delete-icon {
            cursor: pointer;
            color: red;
        }
    </style>
</head>
<body>
    <?php
	// $conexion = pg_connect("host=localhost port=5432 user=nombreUsuario password=passwordUsuario dbname=nomBD", PGSQL_CONNECT_FORCE_NEW);
	// $conexion = pg_connect("host=localhost dbname=BASE_DE_DATOS user=USUARIO password=CONTRASEÑA");	
    $mysql = new mysqli("localhost", "root", "", "proyectofinalpw");

    $Query = "select * from datos";
    $Result = $mysql->query($Query);

    $numeroRegistros = $Result->num_rows;
    if ($numeroRegistros <= 0) {
        echo "<div align='center'>";
        echo "<h2>No se encontraron registros</h2>";
        echo "</div><hr> ";
    } else {
        ?>
        <table border="1">
            <tr>
                <th><strong>Nombre</strong></th>
                <th><strong>Apellidos</strong></th>
                <th><strong>N&uacutemero De Control</strong></th>
                <th><strong>Eliminar</strong></th>
            </tr>
            <?php
            while ($row = $Result->fetch_array()) {
                $nom = $row["nombre"];
                ?>
                <tr>
                    <td><?php echo $nom; ?></td>
                    <td><?php echo $row["apellidos"]; ?></td>
                    <td><?php echo $row["nocontrol"]; ?></td>
                    <td><i class="fas fa-trash delete-icon" onclick="eliminarRegistro('<?php echo $nom; ?>')"></i></td><!-- Icono de eliminar con función de JavaScript -->
                </tr>
                <?php
            }
        }
        ?>
    </table>
    <center><a href="../menuadministrador.php"><input type="button" value="Regresar"></a> </center>

    <script>
        function eliminarRegistro(nombre) {
            if (confirm("¿Estás seguro de que quieres eliminar este registro?")) {
                window.location.href = "eliminacionusuario.php?Nombre=" + nombre;
            }
        }
    </script>
</body>
</html>
