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
        <li class="header">MAIN NAVIGATION</li>
        <!-- Dashboard -->
        <li class="<?php if($this->router->fetch_class()=="Dashboard"){echo "active";}?>">
          <a href="<?php echo site_url('Dashboard');?>"><i class="fa fa-dashboard"></i> <span>Dashboard</span></a>
        </li>
                <!-- Roti -->
        <li class="treeview <?php if($this->router->fetch_class()=="Roti"){echo "menu-open active";} ?>">
          <a href="#">
            <i class="fa fa-cubes"></i> <span>Roti</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
            <li><a href="<?php echo site_url('Roti'); ?>"><i class="fa fa-circle-o"></i> Data Roti</a></li>
            <li><a href="<?php echo site_url('Roti/Performa'); ?>"><i class="fa fa-circle-o text-aqua"></i> Performa Roti</a></li>
          </ul>
        </li>
        <!-- Karyawan -->
        <li class="treeview <?php if($this->router->fetch_class()=="User"){echo "menu-open active";} ?>">
          <a href="#">
            <i class="fa fa-users"></i> <span>Karyawan</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
            <li <?php 
            if($this->router->fetch_class()=="User" && $this->router->fetch_method()=="index"){echo 'class="active"';} 
            ?>><a href="<?php echo site_url('User'); ?>"><i class="fa fa-circle-o"></i> Data Karyawan</a></li>
            <li><a href="<?php echo site_url('User/Performa'); ?>"><i class="fa fa-circle-o text-aqua"></i> Performa Sales</a></li>
          </ul>
        </li>
        <!-- Toko -->
        <li class="treeview <?php if($this->router->fetch_class()=="Toko"){echo "menu-open active";} ?>">
          <a href="#">
            <i class="fa fa-users"></i> <span>Toko</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
            <li><a href="<?php echo site_url('Toko'); ?>"><i class="fa fa-circle-o"></i> Data Toko</a></li>
            <li><a href="<?php echo site_url('Toko/Performa'); ?>"><i class="fa fa-circle-o text-aqua"></i> Performa Toko</a></li>
          </ul>
        </li>
        <!-- Jadwal -->
        <li class="<?php if($this->router->fetch_class()=='Fitur' && $this->router->fetch_method()=='Jadwal'){echo 'active';}?>">
          <a href="<?php echo site_url('Fitur/Jadwal');?>">
            <i class="fa fa-calendar"></i> <span>Jadwal Pengambilan</span>
          </a>
        </li>
        <!-- Peta -->
        <li  <?php 
            if($this->router->fetch_class()=="Fitur" && $this->router->fetch_method()=="Peta"){echo 'class="active"';} 
            ?>>
          <a href="<?php echo site_url('Fitur/Peta');?>"><i class="fa fa-map"></i> <span>Peta Toko</span></a></li>
        <!-- Penitipan -->
        <li class="treeview <?php if($this->router->fetch_class()=="Penitipan"){echo "menu-open active";} ?>">
          <a href="#">
            <i class="fa fa-history"></i> <span>Nota Penitipan</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
            <li><a href="<?php echo site_url('Penitipan'); ?>"><i class="fa fa-circle-o"></i> Nota Penitipan</a></li>
            <li><a href="<?php echo site_url('Penitipan/Add'); ?>"><i class="fa fa-circle-o text-aqua"></i> Buat Nota Baru</a></li>
          </ul>
        </li>
        <!-- Penjualan -->
        <li class="treeview <?php if($this->router->fetch_class()=="Penjualan"){echo "menu-open active";} ?>">
          <a href="#">
            <i class="fa fa-credit-card"></i> <span>Nota Penjualan</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
            <li><a href="<?php echo site_url('Penjualan'); ?>"><i class="fa fa-circle-o"></i> Nota Penjualan</a></li>
            <li><a href="<?php echo site_url('Penjualan/Add'); ?>"><i class="fa fa-circle-o text-aqua"></i> Buat Nota Baru</a></li>
          </ul>
        </li>
        
        <!-- Item Penitipan -->
        <li class="treeview <?php if($this->router->fetch_class()=="Item_Penjualan"){echo "menu-open active";} ?>">
          <a href="#">
            <i class="fa fa-angle-right"></i> <span>Item Penjualan</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
            <li><a href="<?php echo site_url('Item_Penjualan'); ?>"><i class="fa fa-circle-o"></i> Item Penjualan</a></li>
            <li><a href="<?php echo site_url('Item_Penjualan/Add'); ?>"><i class="fa fa-circle-o text-aqua"></i> Buat Item Baru</a></li>
          </ul>
        </li>


        <li><a href="#"><i class="fa fa-book"></i> <span>Doc</span></a></li>
      </ul>
    </section>
    <!-- /.sidebar -->
  </aside>

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">