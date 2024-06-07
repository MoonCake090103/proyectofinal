<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Generador de CV</title>
    <link rel="stylesheet" href="css/stylecv.css">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jspdf/2.3.1/jspdf.umd.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/html2canvas/1.3.2/html2canvas.min.js"></script>

    <script src="css/script.js" defer></script>
    <script src="css/scriptvista.js" defer></script>

</head>
<body>
    <form method="POST" id="cv-form">
        <div>
            <center><h1>DATOS PERSONALES</h1></center>
            <label for="Foto">Sube tu Foto:</label>
            <input type="file" id="Foto" accept="image/*"><br>
            <label for="Nombre">Ingresa tu nombre:</label>
            <input type="text" id="Nombre" name="nombre" require><br>
            <label for="Carrera">Ingresa tu carrera:</label>
            <input type="text" id="Carrera" name="carrera" require><br>
        </div>

        <div>
            <center><h1>DATOS ESCOLARES</h1></center><br>
            <label for="Universidad">Nombre de la universidad:</label>
            <input type="text" id="Universidad" name="universidad" required><br>
            <label for="fechaInicio">Fecha de inicio de Carrera:</label>
            <input type="date" id="fechaInicio" name="fechaInicio" required>
            <label for="fechaEgreso">Fecha de egreso:</label>
            <input type="date" id="fechaEgreso" name="fechaEgreso" required><br>
        </div>

        <div id="experiencia-container">
            <center><h1>EXPERIENCIA</h1></center><br>
            <div class="experiencia">
                <label for="trabajo1">Nombre de la empresa donde trabajaste:</label><br>
                <input type="text" class="trabajo"><br>
                <label for="puesto1">Puesto:</label>
                <input type="text" class="puesto"><br>
                <label for="fechaInicio1">Fecha de inicio:</label>
                <input type="date" class="fechaInicio"><br>
                <label for="fechaFin1">Fecha de fin:</label>
                <input type="date" class="fechaFin"><br>
                <label for="numero1">Número telefónico:</label>
                <input type="tel" class="numero"><br><br>
            </div>
            <p>¿Deseas agregar un campo más?</p><br>
            <button type="button" class="agregar" onclick="agregarExperiencia()">Agregar</button>
        </div>

        <div id="cursos-container">
            <center><h1>CURSOS O CERTIFICADOS</h1></center><br>
            <div class="curso-item">
                <label for="C1">Curso o certificación:</label><br>
                <input type="text" class="curso"><br><br>
            </div>
            <p>¿Deseas agregar un campo más?</p><br>
            <button type="button" class="agregar" onclick="agregarCurso()">Agregar</button>
        </div>

        <div id="valores-container">
            <center><h1>VALORES PERSONALES</h1></center><br>
            <p>Ingresa tus valores personales que te definen:</p>
            <li class="valor-item"><input type="text" class="valor"></li>
            <li class="valor-item"><input type="text" class="valor"></li>
            <li class="valor-item"><input type="text" class="valor"></li>
            <li class="valor-item"><input type="text" class="valor"></li>
            <p>¿Deseas agregar un campo más?</p><br>
            <button type="button" class="agregar" onclick="agregarValor()">Agregar</button>
        </div>

        <div>
            <center><h1>DATOS DE CONTACTO</h1></center>
            <label for="numeroDeCel">Número de cel:</label>
            <input type="tel" id="numeroDeCel" name="numeroDeCel" required><br><br>
            <label for="numeroDeCasa">Número de casa:</label>
            <input type="tel" id="numeroDeCasa"name="numeroDeCasa"><br><br>
            <label for="correo">Correo electrónico:</label>
            <input type="email" id="correo" name="correo" required><br><br>

            <center>
                <input type="button" value="Vista Previa" onclick="generarCV()">
            </center>
            <center>
                <input type="button" value="Imprimir CV" onclick="generarCV()">
            </center>
            


            <center>
            <a id="linkedin" href="https://www.linkedin.com/oauth/v2/authorization?response_type=code&client_id=78vdpvqcy7xcd4&redirect_uri=http://localhost/practicas/proyectofinal/callBack.php&state=123456&scope=r_liteprofile%20r_emailaddress">
                iniciar sesion con linkedin</a>
            </center>
        </div>
    </form>
    <div id="cv-output" style="display:none;"></div>
</body>
</html>