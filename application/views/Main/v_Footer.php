</div>
  <!-- /.content-wrapper -->


<footer class="main-footer">
    <!-- <div class="pull-right hidden-xs">
      <b>Version</b> 2.4.18
    </div> -->
    <strong>Copyright &copy; 2021 <a href="<?php echo base_url('Dashboard'); ?>">Motherland</a>.</strong> All rights
    reserved.<br>
    <!-- <small class="muted">Made by <a href="https://github.com/staferfield">Stevi Saputro</a>. Design by <a href="https://adminlte.io">AdminLTE</a></small> -->
  </footer>


</div>
<!-- ./wrapper -->

<!-- jQuery 3 -->
<script src="<?php echo base_url().'bower_components/jquery/dist/jquery.min.js';?>"></script>
<!-- Bootstrap 3.3.7 -->
<script src="<?php echo base_url().'bower_components/bootstrap/dist/js/bootstrap.min.js';?>"></script>
<!-- FastClick
<script src="<?php //echo base_url().'bower_components/fastclick/lib/fastclick.js';?>"></script> -->

<!-- AdminLTE App -->
<script src="<?php echo base_url().'dist/js/adminlte.min.js';?>"></script>

<!-- Sparkline -->
<!-- <script src="<?php //echo base_url().'bower_components/jquery-sparkline/dist/jquery.sparkline.min.js';?>"></script> -->
<!-- jvectormap  -->
<!-- <script src="<?php //echo base_url().'plugins/jvectormap/jquery-jvectormap-1.2.2.min.js';?>"></script>
<script src="<?php //echo base_url().'plugins/jvectormap/jquery-jvectormap-world-mill-en.js';?>"></script> -->

<!-- Select2 -->
<script src="<?php echo base_url().'bower_components/select2/dist/js/select2.full.min.js';?>"></script>

<!-- InputMask -->
<script src="<?php echo base_url().'plugins/input-mask/jquery.inputmask.js';?>"></script>
<script src="<?php echo base_url().'plugins/input-mask/jquery.inputmask.date.extensions.js';?>"></script>
<script src="<?php echo base_url().'plugins/input-mask/jquery.inputmask.extensions.js';?>"></script>

<!-- date-range-picker -->
<!-- <script src="<?php //echo base_url().'bower_components/moment/min/moment.min.js';?>"></script> -->
<!-- <script src="<?php //echo base_url().'bower_components/bootstrap-daterangepicker/daterangepicker.js';?>"></script> -->

<!-- bootstrap datepicker -->
<script src="<?php echo base_url().'bower_components/bootstrap-datepicker/dist/js/bootstrap-datepicker.min.js';?>"></script>
<!-- bootstrap time picker -->
<script src="<?php echo base_url().'plugins/timepicker/bootstrap-timepicker.min.js';?>"></script>


<!-- bootstrap color picker -->
<!-- <script src="<?php //echo base_url().'bower_components/bootstrap-colorpicker/dist/js/bootstrap-colorpicker.min.js';?>"></script> -->
<!-- SlimScroll -->
<script src="<?php echo base_url().'bower_components/jquery-slimscroll/jquery.slimscroll.min.js';?>"></script>
<!-- iCheck 1.0.1 -->
<script src="<?php echo base_url().'plugins/iCheck/icheck.min.js';?>"></script>


<!-- Js tambahan untuk halaman tertentu -->
<?php 
    // if($this->router->fetch_class()=="Dashboard"){
  // if($this->router->fetch_method()=="index" || $this->router->fetch_method()=="Performa"){
    $this->load->view('Script/dataTable');
// }
    if($this->router->fetch_class()=="Dashboard"){
      $this->load->view('Script/chartJS');
    };
?>

<!-- AdminLTE dashboard demo (This is only for demo purposes) -->
<!-- <script src="<?php //echo base_url().'dist/js/pages/dashboard2.js';?>"></script> -->
<!-- AdminLTE for demo purposes -->
<!-- <script src="<?php //echo base_url().'dist/js/demo.js';?>"></script> -->
</body>
</html>