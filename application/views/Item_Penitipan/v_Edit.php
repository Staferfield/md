   <!-- Content Header (Page header) -->
   <section class="content-header">
     <h1>
       Item Penitipan
     </h1>
     <ol class="breadcrumb">
       <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
       <li><a href="#">Penitipan</a></li>
       <li class="active">Item Penitipan</li>
     </ol>
   </section>

   <!-- Main content -->
   <section class="content">
     <!-- Tabel Item Penitipan untuk Nota -->
     <!-- Default box -->
     <div class="box box-info box-solid">
       <div class="box-header with-border">
         <h3 class="box-title">Item Penitipan</h3>

         <div class="box-tools pull-right">
           <button type="button" class="btn btn-box-tool" data-widget="collapse" data-toggle="tooltip" title="" data-original-title="Collapse">
             <i class="fa fa-minus"></i></button>
         </div>
       </div>
       <div class="box-body">

         <form action="<?php echo site_url('Item_Penitipan/editAction'); ?>" method="post">
           <input type="hidden" name="id" placeholder="id" required="required" value="<?php echo $item_penitipan['id']; ?>" />

           <input type="hidden" name="nota_id" placeholder="id" required="required" value="<?php echo $item_penitipan['nota_id']; ?>" />
           <div class="col-md-4">
             <div class="form-group">

               <label for="roti_id">Pilih Roti:</label>
               <select id="roti_id" class="form-control" name="roti_id">
                 <?php
                  $i = 1;
                  foreach ($roti as $item) {
                    echo '<option value="' . $item['id'] . '" ';
                    if ($item_penitipan['roti_id'] == $item['id']) {
                      echo 'selected';
                    };
                    echo ' >' . $i . '. ' . $item['nama'] . '</option>';
                    $i++;
                  } ?>
               </select>

             </div>
           </div>
           <div class="col-md-4">
             <div class="form-group">

               <label for="jml_titip">Jumlah Titip:</label>
               <input type="jml_titip" class="form-control" name="jml_titip" placeholder="Jumlah Titip" required="required" value="<?php echo $item_penitipan['jml_titip']; ?>" />
             </div>
           </div>
           <div class="col-md-4">
             <div class="form-group">

               <a href="<?php echo site_url('Item_Penitipan/byNotaID/' . $item_penitipan['nota_id']); ?>"><span class="btn btn-danger">Batal</span>
               </a>
               <button type="submit" class="btn btn-success">Simpan</button>
             </div>
           </div>
         </form>


       </div>
       <!-- /.box-body -->


     </div>
     <!-- /.box -->



   </section>
   <!-- /.content -->