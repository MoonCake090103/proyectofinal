<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>Lista de contactos</title>
    <link rel="stylesheet" href="../css/style3.css"> 
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
    <style>
        .update-icon {
            cursor: pointer;
            color: blue;
        }
    </style>
</head>
<body>
    <?php
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
        <table>
            <tr>
                <th>Nombre</th>
                <th>Apellidos</th>
                <th>N&uacutemero De Control</th>
                <th>Actualizar</th>
            </tr>
            <?php
            while ($row = $Result->fetch_array()) {
                $nom = $row["nombre"];
                ?>
                <tr>
                    <td><?php echo htmlspecialchars($nom); ?></td>
                    <td><?php echo htmlspecialchars($row["apellidos"]); ?></td>
                    <td><?php echo htmlspecialchars($row["nocontrol"]); ?></td>
                    <td><i class="fas fa-edit update-icon" onclick="actualizarRegistro('<?php echo htmlspecialchars($nom); ?>')"></i></td>
                </tr>
                <?php
            }
        }
        ?>
    </table>

    <div class="center-button">
        <a href="../menuadministrador.php"><input type="button" value="Regresar"></a>
    </div>

    <script>
        function actualizarRegistro(nombre) {
            if (confirm("¿Estás seguro de que quieres actualizar este registro?")) {
                window.location.href = "capturarUsuario.php?Nombre=" + nombre;
            }
        }
    </script>
</body>
</html>
