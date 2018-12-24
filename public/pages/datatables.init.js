/*
 Template Name: Admiry - Bootstrap 4 Admin Dashboard
 Author: Themesdesign
 Website: www.themesdesign.in
 File: Datatable js
 */

$(document).ready(function() {
    $('#datatable').DataTable({
        responsive: true
    });

    $('#datatableword').DataTable({
        responsive: true
    });

    $('#datatablepdf').DataTable({
        responsive: true
    });

    $('#datatable_other_file').DataTable({
        responsive: true
    });

    $('#datatable_abstract').DataTable({
        responsive: true
    });

    $('#partner-payment').DataTable({
        responsive: true,
        "columnDefs": [
            {
                "targets": [ 0 ],
                "visible": false,
                "searchable": false
            }
        ]
    });

    //Buttons examples
    var table = $('#datatable-buttons').DataTable({
        lengthChange: false,
        buttons: ['copy', 'excel', 'pdf', 'colvis']
    });

    table.buttons().container()
        .appendTo('#datatable-buttons_wrapper .col-md-6:eq(0)');
} );
