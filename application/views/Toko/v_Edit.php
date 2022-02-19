    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Edit Data Toko
      </h1>
    </section>

    <!-- Main content -->
    <section class="content">

      <div class="box box-success">
        <!-- box-header -->
        <div class="box-header with-border">
          <h3 class="box-title">Edit Toko</h3>

          <div class="box-tools pull-right">
            <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i></button>
          </div>
        </div>
        <!-- /.box-header -->
        <div class="box-body">
          <div class="row">
            <form action="<?php echo site_url('toko/editAction'); ?>" method="post">

              <input type="id" name="id" placeholder="ID Toko" value="<?php echo $toko['id']; ?>" hidden required />

              <div class="col-md-6">
                <div class="form-group">
                  <label for="nama">Nama Toko</label>
                  <input type="text" class="form-control" name="nama" placeholder="Nama Toko" value="<?php echo $toko['nama']; ?>" maxlength="30" required />
                </div>
              </div>

              <div class="col-md-6">
                <div class="form-group">
                  <label for="pemilik">Nama Pemilik</label>
                  <input type="text" class="form-control" name="pemilik" placeholder="Pemilik" required="required" value="<?php echo $toko['pemilik']; ?>" maxlength="30" />
                </div>
              </div>

              <div class="col-md-6">
                <div class="form-group">
                  <label for="alamat">Alamat</label>
                  <textarea class="form-control" rows="3" name="alamat" placeholder="Alamat" maxlength="100" required><?php echo $toko['alamat']; ?></textarea>
                </div>
              </div>


              <div class="col-md-6">
                <div class="form-group">
                  <label for="keterangan">Keterangan</label>
                  <textarea class="form-control" rows="3" name="keterangan" placeholder="Keterangan Tambahan" maxlength="50"><?php echo $toko['keterangan']; ?></textarea>
                </div>
              </div>

              <div class="col-md-6">
                <div class="form-group">
                  <label for="no_telp">No Telp</label>
                  <input class="form-control" type="text" name="no_telp" placeholder="No Telp" required="required" value="<?php echo $toko['no_telp']; ?>" maxlength="13" />
                </div>
              </div>

              <div class="col-md-6">
                <div class="form-group">
                  <label for="alamat">Geolokasi</label>
                  <div class="row">
                    <div class="col-md-4">
                      <input id="geo_latt" class="form-control" type="text" name="geo_latt" placeholder="Geo Lattitude" value="<?php echo $toko['geo_latt']; ?>" />
                    </div>
                    <div class="col-md-4">
                      <input id="geo_long" class="form-control" type="text" name="geo_long" placeholder="Geo Longitude" value="<?php echo $toko['geo_long']; ?>" />
                    </div>
                    <div class="col-md-4">
                      <button class="btn btn-info btn-block" type="button" onclick="getLocation()">Dapatkan GPS</button>
                    </div>
                  </div>

                </div>
              </div>

              <div class="col-sm-6">
                <a href="<?php echo site_url('toko'); ?>"><span class="btn btn-danger btn-block">Batal</span></a>
              </div>
              <div class="col-sm-6">
                <button type="submit" class="btn btn-success btn-block">Simpan</button>
              </div>

            </form>
          </div>
          <!-- /.row -->
        </div>
        <!-- /.box-body -->
      </div>



      <?php $this->load->view('Script/geolokasi') ?>