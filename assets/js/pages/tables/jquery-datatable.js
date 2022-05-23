$(function () {
    $('.js-basic-example').DataTable({
        responsive: true,
        scrollX: true,
    });

    //Exportable table
    $('.js-exportable').DataTable({
        dom: 'Bfrtip',
        buttons: [
            'copy', 'csv', 'excel', 'pdf', 'print'
        ]
    });
});