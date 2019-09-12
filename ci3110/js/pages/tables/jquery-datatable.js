$(function () {

    $('.js-basic-example').DataTable({
        responsive: true,
        "order": []
    });

    //Exportable table
     $('.js-exportable').DataTable({
         dom: 'Bfrtip',
         responsive: true,
         "order": [],
         buttons: [
            {
                extend: 'excelHtml5',
                messageTop: 'Bukti Penyerahan Dokumen',
                //autoFilter: true,
                sheetName: 'Exported data',
                customize: function(xlsx) {
                    var sheet = xlsx.xl.worksheets['sheet1.xml'];

                    $('row c[r="A3"]', sheet).attr('s', '47');
                    $('row c[r="B3"]', sheet).attr('s', '47');
                    $('row c[r="C3"]', sheet).attr('s', '47');
                    $('row c[r="D3"]', sheet).attr('s', '47');
                    $('row c[r="E3"]', sheet).attr('s', '47');
                    $('row c[r="F3"]', sheet).attr('s', '47');
                    $('row c[r="G3"]', sheet).attr('s', '47');
                    $('row c[r="H3"]', sheet).attr('s', '47');

                },

                text: 'Export to Excel',
                exportOptions: {
                  columns: ':visible',
                  modifier: {
                    page: 'all'
                  }
                }
            }
        ]
     });

    //Exportable table
    // $('.js-exportable').DataTable({
    //     dom: 'Bfrtip',
    //     responsive: true,
    //     "order": [],
    //     buttons: [
    //         {
    //             extend: 'excelHtml5',
    //             messageTop: 'Bukti Penyerahan Dokumen',
    //             customize: function ( xlsx ){
    //             var sheet = xlsx.xl.worksheets['sheet1.xml'];
    //
    //             // jQuery selector to add a border
    //             // $('row c[r*="10"]', sheet).attr( 's', '25' );
    //           }
    //         }
    //     ]
    // });
});
