<?php 
$class=$this->router->fetch_class();
$method=$this->router->fetch_method();
 ?>
        <!-- Jadwal Pemngambilan -->
        <li class="<?php if($this->router->fetch_class()=='Fitur' && $this->router->fetch_method()=='Jadwal'){echo 'active';}?>">
          <a href="<?php echo site_url('Fitur/Jadwal');?>">
            <i class="fa fa-calendar"></i> <span>Jadwal Pengambilan</span>
          </a>
        </li>
        <!-- Toko -->
        <li class="<?php if($this->router->fetch_class()=="Toko"){echo 'active';} ?>">
          <a href="<?php echo site_url('Toko'); ?>">
            <i class="fa fa-home"></i> Toko
          </a>
        </li>
        <!-- Peta -->
        <li <?php if($this->router->fetch_class()=="Fitur" && $this->router->fetch_method()=="Peta"){echo 'class="active"';} 
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