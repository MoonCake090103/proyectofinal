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
    const cursos = Array.from(document.querySelectorAll('#cursos-container .curso')).map(input => input.value);

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

    // Abrir una nueva pestaña con el CV cargado
    window.open(url, '_blank');
}
