// Inicialización de DataTable
$('#example').DataTable({
    lengthMenu: [5, 10, 20, 50, 100],
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
        }
    }
});

// Guardar nuevo profesor
$('#formNuevoProfesor').on('submit', function(e) {
    e.preventDefault();
    $.ajax({
        url: 'bd/guardar_profesor.php',
        type: 'POST',
        data: $(this).serialize(),
        dataType: 'json',
        success: function(resp) {
            if (resp.success) {
                $('#modalNuevoProfesor').modal('hide');
                Swal.fire('¡Éxito!', 'Profesor guardado correctamente.', 'success').then(() => {
                    location.reload();
                });
            } else {
                Swal.fire('Error', 'No se pudo guardar el profesor.', 'error');
            }
        },
        error: function() {
            Swal.fire('Error', 'Ocurrió un error en el servidor.', 'error');
        }
    });
});

// Cargar datos en el modal de editar profesor
$(document).on('click', '.editar-profesor', function() {
    var id = $(this).data('id');
    $.ajax({
        url: 'bd/recibir_profesor.php',
        type: 'POST',
        data: { id: id },
        dataType: 'json',
        success: function(data) {
            console.log(data); // Para depuración
            if(data && !data.error){
                $('#idProfesorEditar').val(data.id);
                $('#nombreProfesorEditar').val(data.nombre);
                $('#materiaProfesorEditar').val(data.materia || "");
                $('#claveProfesorEditar').val(data.clave);
                $('#informacionProfesorEditar').val(data.informacion);
                $('#estadoProfesorEditar').val(data.estado);
                $('#editarProfesorModal').modal('show');
            } else {
                Swal.fire({
                    icon: 'error',
                    title: 'Error',
                    text: 'No se encontraron datos del profesor.'
                });
            }
        },
        error: function(xhr, status, error) {
            Swal.fire({
                icon: 'error',
                title: 'Error',
                text: 'Error en la petición AJAX: ' + error
            });
        }
    });
});

// Actualizar datos del profesor
$('#formEditarProfesor').on('submit', function(e){
    e.preventDefault();
    $.ajax({
        url: 'bd/editar_profesor.php',
        type: 'POST',
        data: $(this).serialize(),
        dataType: 'json',
        success: function(resp){
            console.log(resp); // Para depuración
            if(resp.success){
                Swal.fire({
                    icon: 'success',
                    title: '¡Actualizado!',
                    text: 'Profesor actualizado correctamente',
                    timer: 1800,
                    showConfirmButton: false
                });
                $('#editarProfesorModal').modal('hide');
                setTimeout(function(){
                    location.reload();
                }, 1800);
            } else {
                Swal.fire({
                    icon: 'error',
                    title: 'Error',
                    text: 'No se pudo actualizar el profesor'
                });
            }
        },
        error: function(xhr, status, error) {
            Swal.fire({
                icon: 'error',
                title: 'Error',
                text: 'Error en la petición AJAX: ' + error
            });
        }
    });
});

// Eliminar profesor con SweetAlert2
$(document).on('click', '.eliminar-profesor', function(){
    var id = $(this).data('id');
    Swal.fire({
        title: '¿Estás seguro?',
        text: "¡Esta acción no se puede deshacer!",
        icon: 'warning',
        showCancelButton: true,
        confirmButtonColor: '#d33',
        cancelButtonColor: '#3085d6',
        confirmButtonText: 'Eliminar',
        cancelButtonText: 'Cancelar'
    }).then((result) => {
        if (result.isConfirmed) {
            $.ajax({
                url: 'bd/eliminar_profesor.php',
                type: 'POST',
                data: { id: id },
                dataType: 'json',
                success: function(resp){
                    if(resp.success){
                        Swal.fire(
                            '¡Eliminado!',
                            'El profesor ha sido eliminado.',
                            'success'
                        );
                        setTimeout(function(){
                            location.reload();
                        }, 1200);
                    } else {
                        Swal.fire(
                            'Error',
                            'No se pudo eliminar el profesor',
                            'error'
                        );
                    }
                },
                error: function(){
                    Swal.fire(
                        'Error',
                        'Error en la petición AJAX',
                        'error'
                    );
                }
            });
        }
    });
});
$('#añoProfesor').on('change', function() {
    var año = $(this).val();
    var $seccion = $('#seccionProfesor');
    $seccion.empty(); // Limpia las opciones

    if(año === '5to') {
        $seccion.append('<option value="">Seleccione una Sección</option>');
        $seccion.append('<option value="A">A</option>');
        $seccion.append('<option value="B">B</option>');
    } else if(año) {
        $seccion.append('<option value="">Seleccione una Sección</option>');
        $seccion.append('<option value="A">A</option>');
        $seccion.append('<option value="B">B</option>');
        $seccion.append('<option value="C">C</option>');
    } else {
        $seccion.append('<option value="">Seleccione una Sección</option>');
    }
});