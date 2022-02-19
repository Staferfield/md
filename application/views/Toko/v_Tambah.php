<div class="box box-success box-solid collapsed-box">
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

                <div class="col-md-6">
                    <div class="form-group">
                        <label for="nama">Nama Toko</label>
                        <input type="text" class="form-control" name="nama" placeholder="Nama Toko" maxlength="30" required />
                    </div>
                </div>

                <div class="col-md-6">
                    <div class="form-group">
                        <label for="pemilik">Nama Pemilik</label>
                        <input type="text" class="form-control" name="pemilik" placeholder="Pemilik" maxlength="30" required />
                    </div>
                </div>

                <div class="col-md-6">
                    <div class="form-group">
                        <label for="alamat">Alamat</label>
                        <textarea class="form-control" rows="3" name="alamat" placeholder="Alamat" maxlength="100" required></textarea>
                    </div>
                </div>


                <div class="col-md-6">
                    <div class="form-group">
                        <label for="keterangan">Keterangan</label>
                        <textarea class="form-control" rows="3" name="keterangan" placeholder="Keterangan Tambahan" maxlength="50"></textarea>
                    </div>
                </div>

                <div class="col-md-6">
                    <div class="form-group">
                        <label for="no_telp">No Telp</label>
                        <input class="form-control" type="text" name="no_telp" placeholder="No Telp" required="required" maxlength="13" />
                    </div>
                </div>

                <div class="col-md-6">
                    <div class="form-group">
                        <label for="alamat">Geolokasi</label>
                        <div class="row">
                            <div class="col-md-4">
                                <input id="geo_latt" class="form-control" type="text" name="geo_latt" placeholder="Geo Lattitude" />
                            </div>
                            <div class="col-md-4">
                                <input id="geo_long" class="form-control" type="text" name="geo_long" placeholder="Geo Longitude" />
                            </div>
                            <div class="col-md-4">
                                <button class="btn btn-info btn-block" type="button" onclick="getLocation()">Dapatkan GPS</button>
                            </div>
                        </div>

                    </div>
                </div>

                <div class="col-sm-6">
                    <!-- <a href="<?php echo site_url('toko'); ?>"><span class="btn btn-danger btn-block">Batal</span></a> -->
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
<!-- /.box -->

<?php $this->load->view('Script/geolokasi') ?>