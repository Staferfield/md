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
          <h3 class="box-title">Tambah Nota Penjualan
          </h3>

          <div class="box-tools pull-right">
            <button type="button" class="btn btn-box-tool" data-widget="collapse" data-toggle="tooltip" title="" data-original-title="Collapse">
              <i class="fa fa-minus"></i></button>
          </div>
        </div>
        <div class="box-body">

          <form action="<?php echo site_url('Penjualan/addAction'); ?>" method="post">

            <div class="col-md-3">
              <div class="form-group">
                <label for="titip_id">Nota Titip:</label>
                <select id="titip_id" class="form-control" name="titip_id">
                  <!-- Tampilkan pilihan nota yang belum terambil -->
                  <?php //$i = 1;
                  foreach ($penitipan as $nota) {
                    echo '<option value="' . $nota['id'] . '|' . $nota['toko_id'] . '">No ' . $nota['id'] . ". " . $nota['toko_nama'] . '</option>';
                    //$i++;
                  } ?>
                </select>

              </div>
            </div>
            <div class="col-md-3">
              <div class="form-group">

                <label for="sales_id">Pilih Sales:</label>
                <select class="form-control" id="sales_id" name="sales_id" <?php if ($this->session->userdata('level') == 4) {
                                                                              echo 'readonly';
                                                                            } ?>>
                  <?php
                  // Apabila user adalah sales, pilih dia
                  if ($this->session->userdata('level') == 4) {
                    echo '<option value="' . $this->session->userdata('id') . '">' . $this->session->userdata('nama') . '</option>';
                  } else {
                    // Reset nomer
                    $i = 1;
                    foreach ($sales as $s) {
                      echo '<option value="' .    $s['id'] . '">' . $i .     ". " . $s['nama'] . '</ option>';
                      $i++;
                    }
                  }
                  ?>


                </select>

              </div>
            </div>
            <div class="col-md-3">
              <div class="form-group">


                <!-- #PERLU_CHECK rubah format waktu -->
                <label for="tanggal">Waktu:</label>
                <input type="datetime-local" class="form-control" name="tanggal" placeholder="Tanggal" required="required" value="<?php date_default_timezone_set("Asia/Jakarta");;
                                                                                                                                  echo date('Y-m-d\TH:i:s'); ?>" />

              </div>
            </div>
            <div class="col-md-3">
              <div class="form-group">


                <a href="<?php echo site_url('Penjualan'); ?>"><span class="btn btn-danger">Batal</span>
                </a>
                <button type="submit" class="btn btn-success">Simpan</button>
          </form>
        </div>
      </div>
      </div>
      <!-- /.box-body -->
      </div>
      <!-- /.box -->

    </section>
    <!-- /.content -->