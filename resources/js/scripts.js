/*!
* Start Bootstrap - Simple Sidebar v6.0.6 (https://startbootstrap.com/template/simple-sidebar)
* Copyright 2013-2023 Start Bootstrap
* Licensed under MIT (https://github.com/StartBootstrap/startbootstrap-simple-sidebar/blob/master/LICENSE)
*/
// 
// Scripts
// 

window.addEventListener('DOMContentLoaded', event => {

    // Toggle the side navigation
    const sidebarToggle = document.body.querySelector('#sidebarToggle');
    if (sidebarToggle) {
        // Uncomment Below to persist sidebar toggle between refreshes
        // if (localStorage.getItem('sb|sidebar-toggle') === 'true') {
        //     document.body.classList.toggle('sb-sidenav-toggled');
        // }
        sidebarToggle.addEventListener('click', event => {
            event.preventDefault();
            document.body.classList.toggle('sb-sidenav-toggled');
            localStorage.setItem('sb|sidebar-toggle', document.body.classList.contains('sb-sidenav-toggled'));
        });
    }

});

$.extend( true, $.fn.dataTable.defaults, {
    dom: "<'row'<'col-sm-3'l><'col-sm-6 text-center'B><'col-sm-3'f>>" +
                "<'row'<'col-sm-12'tr>>" +
                "<'row'<'col-sm-4'i><'col-sm-8'p>>",
    "language": {
        "sProcessing":     "Procesando...",
        "sLengthMenu":     "Mostrar _MENU_ registros",
        "sZeroRecords":    "No se encontraron resultados",
        "sEmptyTable":     "Ningún dato disponible en esta tabla",
        "sInfo":           "Mostrando registros del _START_ al _END_ de un total de _TOTAL_ registros",
        "sInfoEmpty":      "Mostrando registros del 0 al 0 de un total de 0 registros",
        "sInfoFiltered":   "(filtrado de un total de _MAX_ registros)",
        "sInfoPostFix":    "",
        "sSearch":         "Buscar:",
        "sUrl":            "",
        "sInfoThousands":  ",",
        "sLoadingRecords": "Cargando...",
        "oPaginate": {
            "sNext": '<i class="fa fa-forward"></i>',
            "sPrevious": '<i class="fa fa-backward"></i>',
            "sFirst": '<i class="fa fa-step-backward"></i>',
            "sLast": '<i class="fa fa-step-forward"></i>' 
        },
        "oAria": {
        "sSortAscending":  ": Activar para ordenar la columna de manera ascendente",
        "sSortDescending": ": Activar para ordenar la columna de manera descendente"
        },
    },
    /* "buttons": [
            {   extend: 'copyHtml5',
                text:'<i class="fa fa-copy fa-lg"></i><span>&nbsp;  Copiar<span>',
                className:'btn btn-primary btn-sm',
            },
            {   extend: 'excelHtml5',
                text:'<i class="fa fa-file-excel-o fa-lg"></i><span>&nbsp;  Excel<span>',
                className:'btn btn-primary btn-sm',
            },
            {   extend: 'pdfHtml5',
                text:'<i class="fa fa-file-pdf-o fa-lg"></i><span>&nbsp;  PDF<span>',
                orientation: 'landscape',
                pageSize: 'LETTER',
                className:'btn btn-primary btn-sm',
            },
            {   extend: 'csvHtml5',
                text:'<i class="fa fa-database fa-lg"></i><span>&nbsp;  CSV<span>',
                className:'btn btn-primary btn-sm',
            },
            {   extend: 'print',
                text:'<i class="fa fa-print fa-lg"></i><span>&nbsp;  Imprimir<span>',
                className:'btn btn-primary btn-sm',
            },
        ], */
});