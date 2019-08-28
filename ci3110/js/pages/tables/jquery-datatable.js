$(function () {

    $('.js-basic-example').DataTable({
        responsive: true,
        "order": []
    });



    //Exportable table
    $('.js-exportable').DataTable({
        dom: 'Bfrtip',
        responsive: true,
        buttons: [
            {
                extend: 'excelHtml5',
                messageTop: 'Worksheet Dokumen',
            }
        ]
    });
});
