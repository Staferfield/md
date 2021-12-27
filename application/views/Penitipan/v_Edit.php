   <!-- Content Header (Page header) -->
   <section class="content-header">
     <h1>
       Nota Penitipan
     </h1>
     <ol class="breadcrumb">
       <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
       <li><a href="#">Penitipan</a></li>
       <li class="active">Nota Penitipan</li>
     </ol>
   </section>

   <!-- Main content -->
   <section class="content">

     <!-- Default box -->
     <div class="box box-info box-solid">
       <div class="box-header with-border">
         <h3 class="box-title">Nota Penitipan</h3>

         <div class="box-tools pull-right">
           <button type="button" class="btn btn-box-tool" data-widget="collapse" data-toggle="tooltip" title="" data-original-title="Collapse">
             <i class="fa fa-minus"></i></button>
         </div>
       </div>
       <div class="box-body">


         <form action="<?php echo site_url('penitipan/editAction'); ?>" method="post">

           <input class="form-control" type="hidden" name="id" placeholder="id" required="required" value="<?php echo $penitipan['id']; ?>" hidden />
           <div class="col-md-4">
             <div class="form-group">

               <label for="toko_id">Pilih Toko:</label>
               <select class="form-control" id="toko_id" name="toko_id">
                 <?php foreach ($toko as $s) { ?>
                   <option value="<?php echo $s['id']; ?>" <?php if ($penitipan['toko_id'] == $s['id']) {
                                                              echo "selected";
                                                            }; ?>><?php echo $s['nama']; ?></option>
                 <?php } ?>
               </select>
             </div>
           </div>
           <div class="col-md-4">
             <div class="form-group">

               <label for="sales_id">Pilih Sales:</label>
               <select class="form-control" id="sales_id" name="sales_id">
                 <?php foreach ($sales as $s) {
                    echo '<option value="'.$s['id'].'" ';
                    if($penitipan['sales_id'] == $s['id']) {
                     echo "selected>";
                    };
                    echo $s['nama'].'</option>';
                 } ?>
               </select>
             </div>
           </div>
           <div class="col-md-4">
             <div class="form-group">

               <!-- #PERLU_CHECK -->
               <label for="tanggal">Waktu:</label>
               <input class="form-control" type="datetime-local" name="tanggal" placeholder="Tanggal" required="required" value="<?php echo date('Y-m-d\TH:i:s', strtotime($penitipan['tanggal'])); ?>" />
             </div>
           </div>
           <input class="form-control" type="hidden" name="status" placeholder="Status pengambilan" required="required" value="<?php echo $penitipan['status']; ?>" />

           <div class="col-md-4">
             <div class="form-group">
               <a href="<?php echo site_url('Penitipan'); ?>"><span class="btn btn-danger">Batal</span>
               </a>
               <button type="submit" class="btn btn-primary">Simpan</button>
             </div>
           </div>
         </form>
       </div>
       <!-- /.box-body -->
     </div>
     <!-- /.box -->

   </section>
   <!-- /.content -->