   <!-- Content Header (Page header) -->
   <section class="content-header">
     <h1>
       Nota Penitipan
     </h1>
     <ol class="breadcrumb">
       <li><a href="<?php echo base_url(); ?>"><i class="fa fa-dashboard"></i> Home</a></li>
       <li><a href="<?php echo site_url('Penitipan'); ?>">Nota Penitipan</a></li>
       <li class="active">Buat</li>
     </ol>
   </section>

   <!-- Main content -->
   <section class="content">

     <!-- Default box -->
     <div class="box box-success box-solid">
       <!-- box-header -->
       <div class="box-header with-border">
         <h3 class="box-title">Buat Nota Penitipan</h3>

         <div class="box-tools pull-right">
           <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i>
         </div>
       </div>

       <!-- /.box-header -->
       <div class="box-body">
         <div class="row">
           <form action="<?php echo site_url('Penitipan/addAction'); ?>" method="post">

             <div class="col-md-3">
               <div class="form-group">
                 <label for="toko_id">Pilih Toko:</label>
                 <select class="form-control" id="toko_id" name="toko_id" required="required">
                   <?php $i = 1;
                    foreach ($toko as $tk) {
                      echo '<option value="' . $tk['id'] . '">' . $i . ". " . $tk['nama'] . '</option>';
                      $i++;
                    } ?>
                 </select>
               </div>
             </div>
             <div class="col-md-3">
               <div class="form-group">
                 <label for="sales_id">Pilih Sales:</label>
                 <select class="form-control" id="sales_id" name="sales_id" <?php if ($this->session->userdata('level') == 4) {
                                                                              echo 'readonly';
                                                                            } ?>>
                   <?php
                    // Apabila user adalah sales, pilih dia
                    if ($this->session->userdata('level') == 4) {
                      echo '<option value="' . $this->session->userdata('id') . '">' . $this->session->userdata('nama') . '</option>';
                    } else {
                      // Reset nomer
                      $i = 1;
                      foreach ($sales as $s) {
                        echo '<option value="' .    $s['id'] . '">' . $i .     ". " . $s['nama'] . '</ option>';
                        $i++;
                      }
                    }
                    ?>

                 </select>
               </div>
             </div>
             <div class="col-md-3">
               <div class="form-group">
                 <!-- #PERLU_CHECK rubah format waktu -->
                 <label for="tanggal">Tanggal:</label>
                 <input id="tanggal" class="form-control" type="datetime-local" name="tanggal" placeholder="Tanggal" required="required" value="<?php date_default_timezone_set("Asia/Jakarta");;
                                                                                                                                                echo date('Y-m-d\TH:i:s'); ?>" />
               </div>
             </div>

             <!-- <div class="col-md-3">
                <div class="form-group"> -->
             <!-- #PERLU_CHECK rubah format waktu -->
             <!-- <label for="tanggal">Banyak Jenis Roti:</label>
              <input class="form-control" type="number" name="jumlah" placeholder="Jumlah Barang" value="<?php ?>" />
                </div>
              </div> -->

             <div class="col-sm-3">
               <label class="invisible" for="submit">Simpan</label>
               <button id="submit" type="submit" class="btn btn-success btn-block">Simpan</button>
             </div>

           </form>
         </div>
         <!-- /.row -->
       </div>
       <!-- /.box-body -->
     </div>
     <!-- /.box -->

   </section>
   <!-- /.content -->