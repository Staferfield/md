<!-- Left side column. contains the logo and sidebar -->
  <aside class="main-sidebar">
    <!-- sidebar: style can be found in sidebar.less -->
    <section class="sidebar">
      <!-- Sidebar user panel -->
      <div class="user-panel">
        <div class="pull-left image">
          <img src="<?php echo base_url().'dist/img/avatar5.png'; ?>" class="img-circle" alt="User Image">
        </div>
        <div class="pull-left info">
          <p><?php echo $this->session->userdata("nama"); ?></p>
          <a href="#"><i class="fa fa-circle text-success"></i> <?php 
              if($this->session->userdata("level")==0){
                echo "Root";
              } elseif($this->session->userdata("level")==1){
                echo "Owner";
              }elseif($this->session->userdata("level")==2){
                echo "Manajer";
              }elseif($this->session->userdata("level")==4){
                echo "Sales";
              }; ?></a>
        </div>
      </div>
      <!-- sidebar menu: : style can be found in sidebar.less -->
      <ul class="sidebar-menu" data-widget="tree">
        <li class="header">NAVIGASI</li>

        <!-- Dashboard -->
        <li class="<?php if($this->router->fetch_class()=="Dashboard"){echo "active";}?>">
          <a href="<?php echo site_url('Dashboard');?>"><i class="fa fa-dashboard"></i> <span>Dashboard</span></a>
        </li>

        <!-- Menu Sidebar sesuai dengan pekerjaan -->
          <?php 
              if($this->session->userdata("level")==0){
                $this->load->view('component/v_menu_all');
              } elseif($this->session->userdata("level")==1){
                $this->load->view('component/v_menu_owner');
              }elseif($this->session->userdata("level")==2){
                $this->load->view('component/v_menu_manajer');
              }elseif($this->session->userdata("level")==4){
                $this->load->view('component/v_menu_sales');
              }; 
          ?>

        <li><a href="#"><i class="fa fa-book"></i> <span>Dokumentasi</span></a></li>
      </ul>
    </section>
    <!-- /.sidebar -->
  </aside>

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">