 
<!-- jQuery -->
<script src="View/library/js/foto.js"></script>
</div>
        <!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->

  <!-- Control Sidebar -->
  <aside class="control-sidebar control-sidebar-dark">
    <!-- Control sidebar content goes here -->
  </aside>
  <!-- /.control-sidebar -->
  <!-- Main Footer -->
  <footer class="main-footer sticky-bottom">
    <!-- To the right -->
    <div class="float-right d-none d-sm-inline">
    <?php echo $_SESSION['rol'] ?>
    </div>
    <!-- Default to the left -->
    <strong>Copyright &copy;2022</strong> All rights reserved.
  </footer>
</div>
<!-- ./wrapper -->
<!-- REQUIRED SCRIPTS -->
<!-- jQuery -->
<script src="View/library/plugins/jquery/jquery.min.js"></script>
<!-- Bootstrap 4 -->
<script src="View/library/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
<!-- SweetAlert2 -->
<script src="View/library/plugins/sweetalert2/sweetalert2.min.js"></script>
<!-- Select2 -->
<script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>
<script src="View/library/plugins/select2/js/select2.full.min.js"></script>
<!-- Bootstrap4 Duallistbox -->
<script src="View/library/plugins/bootstrap4-duallistbox/jquery.bootstrap-duallistbox.min.js"></script>
<!-- DataTables  & Plugins -->
<script src="View/library/plugins/datatables/jquery.dataTables.min.js"></script>
<script src="View/library/plugins/datatables-bs4/js/dataTables.bootstrap4.min.js"></script>
<script src="View/library/plugins/datatables-responsive/js/dataTables.responsive.min.js"></script>
<script src="View/library/plugins/datatables-responsive/js/responsive.bootstrap4.min.js"></script>
<script src="View/library/plugins/datatables-buttons/js/dataTables.buttons.min.js"></script>
<script src="View/library/plugins/datatables-buttons/js/buttons.bootstrap4.min.js"></script>
<script src="View/library/plugins/jszip/jszip.min.js"></script>
<script src="View/library/plugins/pdfmake/pdfmake.min.js"></script>
<script src="View/library/plugins/pdfmake/vfs_fonts.js"></script>
<script src="View/library/plugins/datatables-buttons/js/buttons.html5.min.js"></script>
<script src="View/library/plugins/datatables-buttons/js/buttons.print.min.js"></script>
<script src="View/library/plugins/datatables-buttons/js/buttons.colVis.min.js"></script>

<!-- AdminLTE App -->
<script src="View/library/dist/js/adminlte.min.js"></script>
<!-- AdminLTE for demo purposes 
<script src="View/library/dist/js/demo.js"></script>-->

<script>
$(document).ready(function(){
  $('[data-toggle="tooltip"]').tooltip();
});

$(document).ready(function(){
  $('[data-toggle="popover"]').popover();
});
</script>
<!-- Page specific script -->
<script>
  $(function () {
    $("#example1").DataTable({
      "responsive": true, "lengthChange": false, "autoWidth": false,
      "buttons": ["copy", "csv", "excel", "pdf", "print", "colvis"]
    }).buttons().container().appendTo('#example1_wrapper .col-md-6:eq(0)');
    $('#example2').DataTable({
      "paging": true,
      "lengthChange": false,
      "searching": false,
      "ordering": true,
      "info": true,
      "autoWidth": false,
      "responsive": true,
    });
  });

  // In your Javascript (external .js resource or <script> tag)
$(document).ready(function() {
    $('.js-example-basic-single').select2();
});

//Initialize Select2 Elements
$('.select2').select2()

//Initialize Select2 Elements
$('.select2bs4').select2({
  theme: 'bootstrap4'
});

$('.swalDefaultSuccess').click(function() {
      Toast.fire({
        icon: 'success',
        title: 'Lorem ipsum dolor sit amet, consetetur sadipscing elitr.'
      })
    });
    $('.swalDefaultInfo').click(function() {
      Toast.fire({
        icon: 'info',
        title: 'Lorem ipsum dolor sit amet, consetetur sadipscing elitr.'
      })
    });
    $('.swalDefaultError').click(function() {
      Toast.fire({
        icon: 'error',
        title: 'Lorem ipsum dolor sit amet, consetetur sadipscing elitr.'
      })
    });
    $('.swalDefaultWarning').click(function() {
      Toast.fire({
        icon: 'warning',
        title: 'Lorem ipsum dolor sit amet, consetetur sadipscing elitr.'
      })
    });
    $('.swalDefaultQuestion').click(function() {
      Toast.fire({
        icon: 'question',
        title: 'Lorem ipsum dolor sit amet, consetetur sadipscing elitr.'
      })
    });



</script>
</body>
</html>