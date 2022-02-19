        <!-- Performa Roti -->
        <li class="<?php if($this->router->fetch_class()=="Roti"){echo "active";}?>">
          <a href="<?php echo site_url('Roti/Performa'); ?>"><i class="fa fa-cubes text-aqua"></i> Performa Roti</a>
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

        <!-- Performa Toko -->
        <li class="<?php if($this->router->fetch_class()=="Toko"){echo "active";}?>">
          <a href="<?php echo site_url('Toko/Performa'); ?>"><i class="fa fa-home text-aqua"></i> Performa Toko</a>
        </li>
