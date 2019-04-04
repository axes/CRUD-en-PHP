$(document).ready(function() {
    $('#tablaDT').DataTable({
        responsive: true,
        
        "language": {
            "search": "Buscar",
            "lengthMenu":     "Mostrar _MENU_ registros",
            "info":           "Mostrando _START_ a _END_ de [_TOTAL_] registros",
            "infoEmpty":      "Mostrando 0 a 0 de 0 registros",
            "paginate": {
                "first":      "Primero",
                "last":       "Último",
                "next":       "Siguiente",
                "previous":   "Previo"
            },
          },
        
    });
    
});