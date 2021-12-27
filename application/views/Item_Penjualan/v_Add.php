    <!-- Content Header (Page header) -->
    <section class="content-header">
        <h1>
            Roti
        </h1>
        <ol class="breadcrumb">
            <li><a href="<?php echo base_url() ?>"><i class="fa fa-dashboard"></i> Home</a></li>
            <li><a href="<?php echo base_url('$this->router->fetch_class()'); ?>"> <?php echo $this->router->fetch_class(); ?></a></li>
            <li class="active">Roti</li>
        </ol>
    </section>

    <!-- Main content -->
    <section class="content">


    <div class="box box-success collapsed-box">
    <!-- box-header -->
    <div class="box-header with-border">
        <h3 class="box-title">Tambah </h3>

        <div class="box-tools pull-right">
            <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-plus"></i>
        </div>
    </div>

    <!-- /.box-header -->
    <div class="box-body">
        <div class="row">
        <form action="<?php echo site_url('roti/addAction'); ?>" method="post">


        <div class="col-md-3">
                    <div class="form-group">

                        <label for="nota_id">Nota Jual:</label>
                        <input type="text" name="nota_id" class="form-control" placeholder="No Nota" required="required" value="<?php  ?>" />


                    </div>
                </div>
                <div class="col-md-3">
                    <div class="form-group">

      <input type="text" name="roti_id" class="form-control" placeholder="Harga" required="required" value="<?php  ?>" />

      </div>
                </div>
                <div class="col-md-3">
                    <div class="form-group">
                    <label for="jml_titip">Jumlah Titip:</label>

      <input type="number" name="jml_titip" class="form-control" placeholder="Jumlah Titip" required="required" value="<?php  ?>" />

      </div>
                </div>
                <div class="col-md-3">
                    <div class="form-group">
                    <label for="jml_laku">Jumlah Laku:</label>

                    <input type="number" name="jml_laku" class="form-control" placeholder="Jumlah Laku" required="required" value="<?php  ?>" />

                  </div>
                </div>
                <div class="col-md-3">
                    <div class="form-group">


                    <label for="harga">Harge:</label>
      <input type="number" name="harga" class="form-control" placeholder="Harga" required="required" value="<?php  ?>" />

      </div>
                </div>
    </form>

    <div class="col-sm-3">

    <label class="invisible" for="submit">Tambah</label>
    <a href="<?php echo site_url('Item_Penjualan/byNotaID'); ?>"><span class="btn btn-danger">Batal</span></a>
                    <button id="submit" type="submit" class="btn btn-success btn-block">Simpan</button>
                </div>

            </form>
        </div>
        <!-- /.row -->
    </div>
    <!-- /.box-body -->
</div>
    