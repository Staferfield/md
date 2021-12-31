        <!-- Performa Roti -->
        <li class="<?php if($this->router->fetch_class()=="Roti"){echo "active";}?>">
          <a href="<?php echo site_url('Roti/Performa'); ?>"><i class="fa fa-cubes text-aqua"></i> Performa Roti</a>
        </li>
          
        <!-- Performa Karyawan -->
        <li class="<?php if($this->router->fetch_class()=="User"){echo "active";}?>">
          <a href="<?php echo site_url('User/Performa'); ?>"><i class="fa fa-users text-aqua"></i> Performa Sales</a>
        </li>

        <!-- Performa Toko -->
        <li class="<?php if($this->router->fetch_class()=="Toko"){echo "active";}?>">
          <a href="<?php echo site_url('Toko/Performa'); ?>"><i class="fa fa-home text-aqua"></i> Performa Toko</a>
        </li>
