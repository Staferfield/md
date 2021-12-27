<!-- DataTables -->
<script src="<?php echo base_url().'bower_components/datatables.net/js/jquery.dataTables.min.js';?>"></script>
<script src="<?php echo base_url().'bower_components/datatables.net-bs/js/dataTables.bootstrap.min.js';?>"></script>
<script>
  $(function () {
    $('#dataTable').DataTable({
      'paging'      : true,
      'lengthChange': true,
      'searching'   : true,
      'ordering'    : true,
      'info'        : true,
      'autoWidth'   : false
    });
    $('#dataTable2').DataTable({
      'paging'      : true,
      'lengthChange': true,
      'searching'   : true,
      'ordering'    : true,
      'info'        : true,
      'autoWidth'   : false
    })
  })
</script>