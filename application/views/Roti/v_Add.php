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

      <div class="box box-success box-solid">
        <!-- box-header -->
        <div class="box-header with-border">
          <h3 class="box-title">Tambah Roti</h3>

          <div class="box-tools pull-right">
            <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i>
          </div>
        </div>

        <!-- /.box-header -->
        <div class="box-body">
          <div class="row">

          <form action="<?php echo site_url('roti/addAction'); ?>" method="post">


              <div class="col-md-4">
                <div class="form-group">

                  <label for="titip_id">Nama:</label>
                  <input type="text" name="nama" class="form-control" placeholder="Nama" required="required" value="<?php ?>" maxlength="30" />


                </div>
              </div>
              <div class="col-md-4">
                <div class="form-group">


                  <label for="harga">Harga:</label>
                  <input type="number" name="harga" class="form-control" placeholder="Harga" required="required" value="<?php  ?>" min="0" />

                </div>
              </div>

              <div class="col-sm-4">
                <button id="submit" type="submit" class="btn btn-success btn-block form-control">Tambah</button>
              </div>

            </form>
          </div>
          <!-- /.row -->
        </div>
        <!-- /.box-body -->
      </div>


    </section>
    <!-- /.content -->