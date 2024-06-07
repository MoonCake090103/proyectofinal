function agregarExperiencia() {
    const container = document.getElementById('experiencia-container');
    const newDiv = document.createElement('div');
    newDiv.classList.add('experiencia'); 
    newDiv.innerHTML = `
        <label for="trabajo">Nombre de la empresa donde trabajaste:</label><br>
        <input type="text" class="trabajo"><br>
        <label for="puesto">Puesto:</label>
        <input type="text" class="puesto"><br>
        <label for="fechaInicio">Fecha de inicio:</label>
        <input type="date" class="fechaInicio"><br>
        <label for="fechaFin">Fecha de fin:</label>
        <input type="date" class="fechaFin"><br>
        <label for="numero">Número telefónico:</label>
        <input type="tel" class="numero"><br><br>`;
    container.insertBefore(newDiv, container.lastElementChild); 
}

function agregarCurso() {
    const container = document.getElementById('cursos-container');
    const newDiv = document.createElement('div');
    newDiv.innerHTML = `<label for="curso">Curso o certificación:</label><br>
                        <input type="text" class="curso"><br><br>`;
    container.insertBefore(newDiv, container.lastElementChild); 
}

function agregarValor() {
    const container = document.getElementById('valores-container');
    const newLi = document.createElement('li');
    newLi.innerHTML = `<input type="text" class="valor"><br><br>`;
    container.insertBefore(newLi, container.lastElementChild); 
}
//FUNCIONES PARA AGREGAR MAS CELDAS.
function generarCV() {
    const nombre = document.getElementById('Nombre').value;
    const carrera = document.getElementById('Carrera').value;
    const universidad = document.getElementById('Universidad').value;
    const fechaInicio = document.getElementById('fechaInicio').value;
    const fechaEgreso = document.getElementById('fechaEgreso').value;
    const numeroDeCel = document.getElementById('numeroDeCel').value;
    const correo = document.getElementById('correo').value;

    const valores = Array.from(document.querySelectorAll('#valores-container input[type="text"]')).map(input => input.value);
    const experiencias = Array.from(document.querySelectorAll('#experiencia-container .experiencia')).map(exp => ({
        trabajo: exp.querySelector('.trabajo').value,
        puesto: exp.querySelector('.puesto').value,
        fechaInicio: exp.querySelector('.fechaInicio').value,
        fechaFin: exp.querySelector('.fechaFin').value,
        numero: exp.querySelector('.numero').value,
    }));
    const cursos = Array.from(document.querySelectorAll('#cursos-container .curso-item input[type="text"]')).map(input => input.value);

    // Obtener la imagen seleccionada
    const fotoInput = document.getElementById('Foto');
    let fotoUrl = '';
    if (fotoInput.files.length > 0) {
        const file = fotoInput.files[0];
        fotoUrl = URL.createObjectURL(file);
    }

    const cvHtml = `
    <!DOCTYPE html>
    <html lang="es">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>CV de ${nombre}</title>
        <style>
            body {
                font-family: Arial, sans-serif;
                margin: 0;
                padding: 0;
                background-color: #f4f4f9;
            }
            .container {
                display: flex;
                max-width: 900px;
                margin: 0 auto;
                padding: 20px;
                width: 100%;
                border: 1px solid #ddd;
                background-color: #fff;
                box-shadow: 0 0 10px rgba(0,0,0,0.1);
            }
            .sidebar {
                width: 30%;
                background-color: #2c3e50;
                color: #ecf0f1;
                padding: 20px;
                text-align: center;
            }
            .profile-pic {
                width: auto;
                max-width: 100%;
                max-height: 200px;
                border-radius: 50%;
                object-fit: cover;
                margin-bottom: 20px;
            }
            .contact-info, .section {
                margin-bottom: 20px;
            }
            .main-content {
                width: 70%;
                padding: 20px;
            }
            h1 {
                color: #2c3e50;
                margin-bottom: 10px;
            }
            h2 {
                color: #2980b9;
                border-bottom: 2px solid #2980b9;
                padding-bottom: 5px;
                margin-bottom: 10px;
            }
            section {
                margin-bottom: 20px;
            }
            .job h3 {
                margin: 0;
                color: #2980b9;
            }
            .job p {
                margin: 0;
                color: #7f8c8d;
            }
            ul {
                list-style: none;
                padding: 0;
            }
            li {
                margin-bottom: 5px;
            }
            @page {
                size: A4;
                margin: 0;
            }
            @media print {
                body, html {
                    width: 210mm;
                    height: 297mm;
                }
                .container {
                    width: 100%;
                    height: 100%;
                }
                .sidebar, .main-content {
                    width: auto;
                    padding: 10mm;
                }
            }
        </style>
    </head>
    <body>
        <div class="container">
            <div class="sidebar">
                <img src="${fotoUrl}" alt="Foto de ${nombre}" class="profile-pic">
                <div class="contact-info">
                    <h2>Contacto</h2>
                    <p>${numeroDeCel}</p>
                    <p>${correo}</p>
                </div>
                <div class="section">
                    <h2>Valores Personales</h2>
                    <ul>
                        ${valores.map(valor => `<li>${valor}</li>`).join('')}
                    </ul>
                </div>
            </div>
            <div class="main-content">
                <h1>${nombre}</h1>
                <section>
                    <h2>Datos Escolares</h2>
                    <p>${carrera}</p>
                    <p>${universidad}</p>
                    <p>Fecha de inicio: ${fechaInicio}</p>
                    <p>Fecha de egreso: ${fechaEgreso}</p>
                </section>
                <section>
                    <h2>Experiencia</h2>
                    ${experiencias.map(exp => `
                    <div class="job">
                        <h3>${exp.trabajo}</h3>
                        <p>${exp.puesto} (${exp.fechaInicio} - ${exp.fechaFin})</p>
                        <p>Teléfono: ${exp.numero}</p>
                    </div>
                    `).join('')}
                </section>
                <section>
                    <h2>Cursos o Certificados</h2>
                    <ul>
                        ${cursos.map(curso => `<li>${curso}</li>`).join('')}
                    </ul>
                </section>
            </div>
        </div>
    </body>
    </html>
    `;

    // Crear un Blob con el HTML generado
    const blob = new Blob([cvHtml], { type: 'text/html' });

    // Crear una URL para el Blob
    const url = URL.createObjectURL(blob);

    // Abrir un nuevo cuadro de diálogo de impresión con el CV cargado
    const ventanaImpresion = window.open(url, '_blank');

    // Esperar a que el contenido del cuadro de diálogo de impresión se cargue completamente
    ventanaImpresion.onload = function() {
        // Imprimir automáticamente el contenido
        ventanaImpresion.print();

        // Liberar la URL del Blob después de imprimir
        URL.revokeObjectURL(url);
    };
}
