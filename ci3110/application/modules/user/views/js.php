<!-- BEGIN: Page Vendor JS-->
    <script src="<?= base_url()?>assets/vendors/js/tables/datatable/vfs_fonts.js"></script>
    <script src="<?= base_url()?>assets/vendors/js/tables/datatable/datatables.min.js"></script>
    <script src="<?= base_url()?>assets/vendors/js/tables/datatable/datatables.buttons.min.js"></script>
    <script src="<?= base_url()?>assets/vendors/js/tables/datatable/datatables.bootstrap4.min.js"></script>
    <!-- END: Page Vendor JS-->
    <script src="<?= base_url()?>assets/js/scripts/datatables/datatable.min.js"></script>
    <script type="text/javascript">
      $(document).ready(function(){
        $('.crudtable').DataTable();
      });
    </script>
    <script type="text/javascript">
      $(document).ready(function(){
        $(".crudtable").on("click", ".modalDelete", function(){//event khusus untuk table datatables setelah pagination suka error
          var id=$(this).attr('value');
          $("#modalMsg").html("Apakah Anda Yakin Ingin Menghapus? "+id);
          $("#modalHref").attr("href", "<?php echo base_url().$module?>/<?php echo $controller; ?>/delete/"+id);
        });
      });
    </script>