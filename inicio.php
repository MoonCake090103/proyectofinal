
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="description" content="PQG">
    <meta name="keywords" content="">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Formulario Responsivo</title>
    <link rel="stylesheet" href="css/style.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Madimi+One&display=swap" rel="stylesheet">

</head>
<body>
    <div class="header">
        <h1>Menu Responsivo</h1>
    </div>
    <fieldset>
        <legend>Datos personales</legend>
        <div class="container">
            <form action="/action_page.php" >
              <div class="row">
                <div class="col-25">
                  <label for="fname">Nombre</label>
                </div>
                <div class="col-75">
                  <input type="text" id="fname" name="firstname" placeholder="Tu nombre..">
                </div>
              </div>
              <div class="row">
                <div class="col-25">
                  <label for="lname">Apellidos</label>
                </div>
                <div class="col-75">
                  <input type="text" id="lname" name="lastname" placeholder="Tu apellido..">
                </div>
              </div>
            <!-- Aqui empieza-->
              <div class="row">
                <div class="col-25">
                  <label for="telefono">Telefono</label>
                </div>
                <div class="col-75">
                  <input type="text" id="telefono" name="telefono" placeholder="Tu telefono..">
                </div>
              </div>
              <div class="row">
                <div class="col-25">
                  <label for="fechanac">Fecha De Nacimiento</label>
                </div>
                <div class="col-75">
                    <input type="date" name="fecha" value=""> <br>
                </div>
              </div>

              <div class="row">
                <div class="col-25">
                  <label for="correo-electronico">Correo Electronico</label>
                </div>
                <div class="col-75">
                  <input type="text" id="correo-electronico" name="correo" placeholder="tucorreo@dominio.com">
                </div>
              </div>
              
              <!-- Aqui empieza-->
              <div class="row">
                <div class="col-25">
                  <label for="country">Pais</label>
                </div>
                <div class="col-75">
                  <select id="country" name="country">
                    <option value="australia">M&eacute;xico</option>
                    <option value="canada">Canada</option>
                    <option value="usa">USA</option>
                  </select>
                </div>
              </div>
              <!-- Aqui termina-->
              <div class="row">
                <div class="col-25">
                  <label for="country">Estado Civil</label>
                </div>
                <div class="col-75">
                  <select id="country" name="country">
                    <option value="soltero (a)"> Soltero(a)</option>
                    <option value="casado (a)"> Casado (a) </option>
                    <option value="viudo (a)"> Viudo (a)</option>
                    <option value="separado (a)"> Separado (a)</option>
                    <option value="divorciado (a)"> Divorciado (a)</option>
                  </select>
                </div>
              </div>

            </form>
          </div>
          
      </fieldset> 
      
      <fieldset>
        <legend>Datos Escolares</legend>
        <div class="container">
        <div class="row">
            <div class="col-25">
              <label for="subject">Semestre</label>
            </div>
            <div class="col-75">
                <input type="text" id="fname" name="firstname" placeholder="El semestre que actualmente cursas..">  
            </div>
          </div>
          <div class="row">
            <div class="col-25">
              <label for="subject">Numero De Control</label>
            </div>
            <div class="col-75">
                <input type="text" id="fname" name="firstname" placeholder="Tu numero de control...">  
            </div>
          </div>
          <div class="row">
            <div class="col-25">
              <label for="subject">Promedio General</label>
            </div>
            <div class="col-75">
                <input type="text" id="fname" name="firstname" placeholder="Tu promedio general...">  
            </div>
          </div>
          <div class="row">
            <div class="col-25">
              <label for="country">Carrera</label>
            </div>
            <div class="col-75">
              <select id="country" name="country">
                <option value="sistemas"> Ing. en Sistemas Computacionales </option>
                <option value="industrial"> Ing. Industrial</option>
                <option value="electrica"> Ing. Electrica</option>
                <option value="informatica"> Ing. Informatica</option>
                <option value="electronica"> Ing. Electronica</option>
                <option value="quimica"> Ing. Quimica</option>
                <option value="mecanica"> Ing. Mecanica</option>
                <option value="gestion empresarial"> Ing. en Gestion Empresarial</option>
              </select>
            </div>
          </div>
        </div>
      </fieldset>
      
      <fieldset>
        <legend>Experiencia</legend>
        <div class="container">
        <div class="row">
            <div class="col-25">
              <label for="subject">Proyectos en los que has trabajado</label>
            </div>
            <div class="col-75">
              <textarea id="subject" name="subject" placeholder="Escribe algo.." style="height:200px"></textarea>
            </div>
        </div>

          <div class="container">
          <div class="row">
              <div class="col-25">
                <label for="subject">Area de desarrollo profesional </label>
              </div>
              <div class="col-75">
                <textarea id="subject" name="subject" placeholder="Escribe algo.." style="height:200px"></textarea>
              </div>
            </div>
          </div>
          
          <div class="container">
            <div class="row">
                <div class="col-25">
                  <label for="subject">Lugares de trabajo </label>
                </div>
                <div class="col-75">
                  <textarea id="subject" name="subject" placeholder="Escribe algo.." style="height:200px"></textarea>
                </div>
              </div>
            </div>

          
        <form action="/upload" method="post" enctype="multipart/form-data">
          <label class="custom-file-input">
              <input type="file" name="archivo" accept=".pdf">
              <button type="button">Seleccionar Archivo</button>
          </label>
          <div class="row">
            <input type="submit" value="Guardar Archivo">
          </div>
      </form>

      <!--Subir Video-->

      <form action="/upload" method="post" enctype="multipart/form-data">
        <label class="custom-file-input">
            <input type="file" name="video" accept="video/*">
            <button type="button">Seleccionar Video</button>
        </label>
        <div class="row">
          <input type="submit" value="Guardar Video">
        </div>
      </form>
      </fieldset>
        </div>

        <!--Subir archivos pdf-->
      <div class="row">
        <input type="submit" value="Guardar">
      </div>
</body>
</html>