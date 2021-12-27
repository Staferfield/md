<div class="box box-success collapsed-box">
  <!-- box-header -->
  <div class="box-header with-border">
    <h3 class="box-title">Tambah Toko</h3>

    <div class="box-tools pull-right">
      <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-plus"></i>
    </div>
  </div>

  <!-- /.box-header -->
  <div class="box-body">
    <div class="row">

      <form action="<?php echo site_url('toko/addAction'); ?>" method="post">

        <div class="col-md-4">
          <div class="form-group">
            <label for="nama">Nama Toko:</label>
            <input type="text" class="form-control" name="nama" placeholder="Nama" required="required" value="<?php  ?>" maxlength="30" />

          </div>
        </div>
        <div class="col-md-4">
          <div class="form-group">
            <label for="pemilik">Nama Pemilik:</label>
            <input type="text" class="form-control" name="pemilik" placeholder="Pemilik" required="required" value="<?php  ?>" maxlength="30" />

          </div>
        </div>
        <div class="col-md-4">
          <div class="form-group">
            <label for="no_telp">No Telp:</label>
            <input type="text" name="no_telp" class="form-control" placeholder="No Telp" required="required" value="<?php  ?>" maxlength="13" />

          </div>
        </div>
        <div class="col-md-4">
          <div class="form-group">
            <label for="alamat">Alamat:</label>
            <textarea name="alamat" class="form-control" placeholder="Alamat" required="required" maxlength="100"><?php  ?></textarea>

          </div>
        </div>
        <div class="col-md-4">
          <div class="form-group">
            <label for="keterangan">Keterangan Tambahan:</label>
            <textarea name="keterangan" class="form-control" placeholder="Keterangan Tambahan" maxlength="50"><?php  ?></textarea>

          </div>
        </div>
        <div class="col-md-4">
          <div class="form-group">
            <label for="geo_latt">Posisi GPS:</label>
            <input id="geo_latt" type="text" class="form-control" name="geo_latt" placeholder="Geo Lattitude" value="<?php  ?>" />
            <input id="geo_long" type="text" class="form-control" name="geo_long" placeholder="Geo Longitude" value="<?php  ?>" />

            <button class="btn btn-xs btn-block btn-primary" type="button" onclick="getLocation()">Dapatkan Geolokasi</button>

          </div>
        </div>


        <a href="<?php echo site_url('toko'); ?>"><span class="btn btn-danger">Batal</span>
        </a>
        <button type="submit" class="btn btn-success">Simpan</button>

      </form>

    </div>
    <!-- /.row -->

  </div>
  <!-- /.box-body -->
</div>
<!-- /.box -->

<?php $this->load->view('Script/geolokasi') ?>