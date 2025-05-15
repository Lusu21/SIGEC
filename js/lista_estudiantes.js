new DataTable('#example', {
    dom :  "<'row'<'col-sm-6 d-flex align-items-center'lB><'col-sm-6 mt-2 mb-3'f>>" + // Selector de registros y búsqueda
    "<'row'<'col-sm-12'tr>>" +                                               // Tabla en la segunda fila
    "<'row'<'col-sm-6'i><'col-sm-6 text-end'p>>",
    
    buttons: [
        {
            extend: "excelHtml5",
            text: '<ion-icon name="receipt-sharp"></ion-icon>', // Icono de Excel
            titleAttr: "Exportar a Excel", // Texto al pasar el mouse
            className: "btn btn-success", // Clase de Bootstrap
        },
        {
            extend: "pdfHtml5",
            text: '<ion-icon name="document"></ion-icon>', // Icono de PDF
            titleAttr: "Exportar a PDF", // Texto al pasar el mouse
            className: "btn btn-danger", // Clase de Bootstrap
        },
        {
            extend: "print",
            text: '<ion-icon name="print"></ion-icon>', // Icono de imprimir
            titleAttr: "Imprimir", // Texto al pasar el mouse
            className: "btn btn-info", // Clase de Bootstrap
        },
        {
            extend: "collection",
            text: '<ion-icon name="person-add"></ion-icon>', // Icono de imprimir
            titleAttr: "Agregar Estudiante", // Texto al pasar el mouse
            className: "btn btn-primary", // Clase de Bootstrap
            action: function (e, dt, node, config){
                const modal = new bootstrap.Modal(document.getElementById('agregar_estudiante'));
                modal.show(); 
            }
        },
       

    ], 
    lengthMenu: [5, 10, 20, 50, 100,], // Opciones de cantidad de registros a mostrar
    columnDefs: [
       // { orderable: false, targets: [] }, // Columnas no ordenables
       // { searchable: false, targets: [] }, // Columnas no buscables
       // {width: "10%", targets: []}, // Ancho de las columnas
    ],
    //pageLength: 5, // Cantidad de registros por página
    language: {
        search: "Buscar:",
        info: "Mostrando _START_ a _END_ de _TOTAL_ registros",
        infoEmpty: "Mostrando 0 a 0 de 0 registros",
        lengthMenu: "Mostrar _MENU_",
        paginate: {
            first: "Primero",
            last: "Último",
            next: "Siguiente",
            previous: "Anterior"
        },
    }, // Lenguaje de la tabla
       
});

// Validación del campo "nombreEstudiante"
document.getElementById('nombreEstudiante').addEventListener('input', function (event) {
    const input = event.target;
    input.value = input.value.replace(/[^a-zA-ZáéíóúÁÉÍÓÚñÑ\s]/g, ''); // Permite solo letras y espacios
});

// Validación del campo "apellidoEstudiante"
document.getElementById('apellidoEstudiante').addEventListener('input', function (event) {
    const input = event.target;
    input.value = input.value.replace(/[^a-zA-ZáéíóúÁÉÍÓÚñÑ\s]/g, ''); // Permite solo letras y espacios
});

document.addEventListener('DOMContentLoaded', function () {
    const cedulaInput = document.getElementById('cedulaEstudiante');

    // Validar que solo se ingresen números y limitar a 8 caracteres
    cedulaInput.addEventListener('input', function (event) {
        const input = event.target;
        input.value = input.value.replace(/[^0-9]/g, ''); // Permite solo números
        if (input.value.length > 8) {
            input.value = input.value.slice(0, 8); // Limita a 8 caracteres
        }
    });
});

document.addEventListener('DOMContentLoaded', function () {
    const form = document.getElementById('formAgregarEstudiante');
    const inputs = form.querySelectorAll('input');

    inputs.forEach((input, index) => {
        input.addEventListener('keydown', function (event) {
            if (event.key === 'Enter') {
                event.preventDefault(); // Evita que el formulario se envíe
                const nextInput = inputs[index + 1]; // Obtiene el siguiente campo
                if (nextInput) {
                    nextInput.focus(); // Mueve el foco al siguiente campo
                } else {
                    form.querySelector('button[type="submit"]').focus(); // Si no hay más campos, enfoca el botón "Guardar"
                }
            }
        });
    });
})