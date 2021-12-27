    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Edit Item Penjualan
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
        <li><a href="<?php  ?>">Nota Penjualan</a></li>
        <li class="active">Item Penjualan</li>
      </ol>
    </section>

    <!-- Main content -->
    <section class="content">

      <!-- Tabel Item Penjualan -->
      <!-- Default box -->
      <div class="box box-info box-solid">
        <div class="box-header with-border">
          <h3 class="box-title">Item Penjualan</h3>

          <div class="box-tools pull-right">
            <button type="button" class="btn btn-box-tool" data-widget="collapse" data-toggle="tooltip" title="" data-original-title="Collapse">
              <i class="fa fa-minus"></i></button>
          </div>
        </div>
        <div class="box-body">



            <form action="<?php echo site_url('Item_Penjualan/editAction'); ?>" method="post">

              <input class="form-control" type="hidden" name="id" placeholder="ID" value="<?php echo $item_penjualan['id'] ?>" required />

              <input class="form-control" type="hidden" name="nota_id" placeholder="Nota ID" value="<?php echo $item_penjualan['nota_id'] ?>" required />

              <div class="col-md-4">
                <div class="form-group">
                  <label for="roti_id">Pilih Roti:</label>
                  <select class="form-control" name="roti_id" required>
                    <?php
                    $i = 1;
                    foreach ($roti as $item) {
                      echo '<option value="' . $item['id'] . '" ';
                      if ($item['id'] == $item_penjualan['roti_id']) {
                        echo 'selected';
                      };
                      echo '>' . $i . '. ' . $item['nama'] . '</option>';
                      $i++;
                    } ?>
                  </select>
                </div>
              </div>
              <div class="col-md-2">
                <div class="form-group">
                  <label for="jml_titip">Jumlah Titip:</label>
                  <input class="form-control" type="number" name="jml_titip" placeholder="Jumlah Titip" value="<?php echo $item_penjualan['jml_titip'] ?>" min="0" required />
                </div>
              </div>
              <div class="col-md-2">
                <div class="form-group">
                  <label for="jml_laku">Jumlah Laku:</label>
                  <input class="form-control" type="number" name="jml_laku" placeholder="Jumlah Laku" value="<?php echo $item_penjualan['jml_laku'] ?>" min="0" max="<?php echo $item_penjualan['jml_titip'] ?>" required />
                </div>
              </div>
              <div class="col-md-2">
                <div class="form-group">
                  <label for="harga">Harga:</label>
                  <input class="form-control" type="number" name="harga" placeholder="Harga" value="<?php if ($item_penjualan['harga'] == 0) {
                                                                                                      echo $roti[$item_penjualan['roti_id']]['harga'];
                                                                                                    } else {
                                                                                                      echo $item_penjualan['harga'];
                                                                                                      // Apabila harga 0, maka ambil dari tabel roti, apaibla tidak maka biarkan
                                                                                                    } ?>" min="0" required />
                </div>
              </div>

              <div class="col-sm-2">
                <label class="invisible" for="submit">Simpan</label>
                <a href="<?php echo site_url('Item_Penjualan/byNotaID/' . $item_penjualan['nota_id']); ?>"><span class="btn btn-primary">Batal</span></a>
                <button id="submit" type="submit" class="btn btn-success btn-block">Simpan</button>
              </div>
            </form>


          </div>
          <!-- /.box-body -->


        </div>
        <!-- /.box -->


    </section>
    <!-- /.content -->