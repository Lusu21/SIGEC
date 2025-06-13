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
$('#formNuevaMateria').on('submit', function(e) {
    e.preventDefault();
    $.ajax({
        url: 'bd/guardar_materia.php',
        type: 'POST',
        data: $(this).serialize(),
        dataType: 'json',
        success: function(resp) {
            if (resp.success) {
                $('#modalNuevaMateria').modal('hide');
                Swal.fire('¡Éxito!', 'Materia guardada correctamente.', 'success').then(() => {
                    location.reload(); // Recarga la tabla
                });
            } else {
                Swal.fire('Error', 'No se pudo guardar la materia.', 'error');
            }
        },
        error: function() {
            Swal.fire('Error', 'Ocurrió un error en el servidor.', 'error');
        }
    });
});
// Cargar datos en el modal de editar materia
$(document).on('click', '.editar-materia', function() {
    var id = $(this).data('id');
    $.ajax({
        url: 'bd/recibir_materia.php',
        type: 'POST',
        data: { id: id },
        dataType: 'json',
        success: function(data) {
            if(data && !data.error){
                $('#modalEditarMateria').modal('show');
                $('#editarnombreMateria').val(data.nombre_materia);
                $('#editarEstadoMateria').val(data.estado);
                $('#editarIdMateria').val(data.id);
                
            } else {
                Swal.fire('Error', 'No se encontraron datos de la materia.', 'error');
            }
        },
        error: function(xhr, status, error) {
            Swal.fire('Error', 'Error en la petición AJAX: ' + error, 'error');
        }
    });
});
$('#formEditarMateria').on('submit', function(e){
    e.preventDefault();
    var id = $('#editarIdMateria').val();
    var nombre_materia = $('#editarnombreMateria').val();
    var estado = $('#editarEstadoMateria').val();

    $.ajax({
        url: 'bd/editar_materia.php',
        type: 'POST',
        data: { id: id, nombre_materia: nombre_materia, estado: estado },
        dataType: 'json',
        success: function(resp){
            if(resp.success){
                Swal.fire({
                    icon: 'success',
                    title: '¡Actualizado!',
                    text: 'Materia actualizada correctamente',
                    timer: 1800,
                    showConfirmButton: false
                });
                $('#modalEditarMateria').modal('hide');
                setTimeout(function(){
                    location.reload();
                }, 1800);
            } else {
                Swal.fire('Error', 'No se pudo actualizar la materia', 'error');
            }
        },
        error: function(xhr, status, error) {
            Swal.fire('Error', 'Error en la petición AJAX: ' + error, 'error');
        }
    });
});
// Eliminar materia con SweetAlert2
$(document).on('click', '.eliminar-materia', function() {
    var id = $(this).data('id');
    Swal.fire({
        title: '¿Estás seguro?',
        text: "¡Esta acción no se puede deshacer!",
        icon: 'warning',
        showCancelButton: true,
        confirmButtonColor: '#d33',
        cancelButtonColor: '#3085d6',
        confirmButtonText: 'Sí, eliminar',
        cancelButtonText: 'Cancelar'
    }).then((result) => {
        if (result.isConfirmed) {
            $.ajax({
                url: 'bd/eliminar_materia.php',
                type: 'POST',
                data: { id: id },
                dataType: 'json',
                success: function(resp) {
                    if (resp.success) {
                        Swal.fire(
                            '¡Eliminado!',
                            'La materia ha sido eliminada.',
                            'success'
                        );
                        setTimeout(function(){
                            location.reload();
                        }, 1200);
                    } else {
                        Swal.fire('Error', 'No se pudo eliminar la materia.', 'error');
                    }
                },
                error: function(xhr, status, error) {
                    Swal.fire('Error', 'Ocurrió un error en el servidor.', 'error');
                }
            });
        }
    });
});