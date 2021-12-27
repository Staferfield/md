    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Roti
      </h1>
      <ol class="breadcrumb">
        <li><a href="<?php echo base_url() ?>"><i class="fa fa-dashboard"></i> Home</a></li>
        <li class="active">Roti</li>
      </ol>
    </section>

    <!-- Main content -->
    <section class="content">

      <div class="box box-success">
        <!-- box-header -->
        <div class="box-header with-border">
          <h3 class="box-title">Edit Data Roti</h3>

          <div class="box-tools pull-right">
            <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i>
          </div>
        </div>

        <!-- /.box-header -->
        <div class="box-body">
          <div class="row">

            <form action="<?php echo site_url('roti/editAction'); ?>" method="post">

              <input type="hidden" name="id" class="form-control" placeholder="id" required="required" value="<?php echo $roti['id']; ?>" />

              <div class="col-md-4">
                <div class="form-group">
                  <label for="nama">Nama:</label>
                  <input type="text" name="nama" class="form-control" placeholder="Nama" required="required" value="<?php echo $roti['nama']; ?>" />
                </div>
              </div>
              <div class="col-md-4">
                <div class="form-group">
                  <label for="nama">Nama:</label>
                  <input type="number" name="harga" class="form-control" placeholder="Harga" required="required" value="<?php echo $roti['harga']; ?>" min="0" />
                </div>
              </div>

              <div class="col-md-2">
              <label for="batal" class="invisible">Batal</label>
                  <a id="batal" href="<?php echo site_url('roti'); ?>"><span class="btn btn-block btn-danger">Batal</span></a>
              </div>
              <div class="col-md-2">
              <label for="submit" class="invisible">Simpan</label>
                  <button id="submit" type="submit" class="btn btn-block btn-success">Simpan</button>
              </div>

            </form>
          </div>
          <!-- /.row -->
        </div>
        <!-- /.box-body -->
      </div>


    </section>
    <!-- /.content -->