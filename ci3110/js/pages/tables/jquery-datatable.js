$(function () {
    $('.js-basic-example').DataTable({
        dom: 'Bfrtip',
        responsive: true,
        "order": [],
        buttons: [{
              extend: 'excelHtml5',
              customize: function(xlsx) {
                  var sheet = xlsx.xl.worksheets['sheet1.xml'];

                  // Loop over the cells in column `C`
                  $('row c[r^="C"]', sheet).each( function () {
                      // Get the value
                      if ( $('is t', this).text() == 'New York' ) {
                          $(this).attr( 's', '20' );
                      }
                  });
              }
          }]
    });

    //Exportable table
    $('.js-exportable').DataTable({
        dom: 'Bfrtip',
        responsive: true,
        buttons: [
            'copy', 'csv', 'excel', 'pdf', 'print'
        ]
    });
});
