    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Nota Penjualan
      </h1>
      <ol class="breadcrumb">
        <li><a href="<?php echo base_url() ?>"><i class="fa fa-dashboard"></i> Home</a></li>
        <li class="active">Nota Penjualan</li>
      </ol>
    </section>

    <!-- Main content -->
    <section class="content">

      <!-- Default box -->
      <div class="box box-info box-solid">
        <div class="box-header with-border">
          <h3 class="box-title">Edit Nota Penjualan
          </h3>

          <div class="box-tools pull-right">
            <button type="button" class="btn btn-box-tool" data-widget="collapse" data-toggle="tooltip" title="" data-original-title="Collapse">
              <i class="fa fa-minus"></i></button>
          </div>
        </div>
        <div class="box-body">


          <form action="<?php echo site_url('penjualan/editAction'); ?>" method="post">

            <div class="row">
              <input type="hidden" class="form-control" name="id" placeholder="id" required="required" value="<?php echo $penjualan['id']; ?>" />
              <input type="hidden" class="form-control" name="titip_id" placeholder="Status pengambilan" required="required" value="<?php echo $penjualan['titip_id']; ?>" />

              <div class="col-md-3">
                <div class="form-group">

                  <label for="toko_id">Pilih Toko:</label>
                  <select id="toko_id" class="form-control" name="toko_id">
                    <?php foreach ($toko as $s) { ?>
                      <option value="<?php echo $s['id']; ?>" <?php if ($penjualan['toko_id'] == $s['id']) {echo "selected";}; ?>><?php echo $s['nama']; ?></option>
                    <?php } ?>
                  </select>

                </div>
              </div>
              <div class="col-md-3">
                <div class="form-group">

                  <label for="sales_id">Pilih Sales:</label>
                  <select id="sales_id" class="form-control" name="sales_id">
                    <?php foreach ($sales as $s) { ?>
                      <option value="<?php echo $s['id']; ?>" <?php if ($penjualan['sales_id'] == $s['id']) {
                                                                echo "selected";
                                                              }; ?>><?php echo $s['nama']; ?></option>
                    <?php } ?>
                  </select>

                </div>
              </div>
              <div class="col-md-3">
                <div class="form-group">

                  <!-- #PERLU_CHECK -->
                  <label for="tanggal">Tanggal:</label>
                  <input type="datetime-local" class="form-control" name="tanggal" placeholder="Tanggal" required="required" value="<?php echo $penjualan['tanggal']; ?>" />

                </div>
              </div>
              <div class="col-md-3">
               <label class="invisible" for="submit">Simpan</label>
               <div class="row">
                 <div class="col-sm-6">
                   <a href="<?php echo site_url('Penjualan'); ?>"><span class="btn btn-danger btn-block">Batal</span></a>
                 </div>
                 <div class="col-sm-6">
                   <button id="submit" type="submit" class="btn btn-success btn-block">Simpan</button>
                 </div>
               </div>
             </div>

                  <a href="<?php echo site_url('penjualan'); ?>"><span class="btn btn-danger">Batal</span></a>

                  <button type="submit" class="btn btn-success">Simpan</button>

                </div>
              </div>
            </div>
          </form>
        </div>
        <!-- /.box-body -->
      </div>
      <!-- /.box -->

    </section>
    <!-- /.content -->