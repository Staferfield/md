<div class="box box-success box-solid collapsed-box">
    <!-- box-header -->
    <div class="box-header with-border">
        <h3 class="box-title">Tambah Nota Penjualan</h3>

        <div class="box-tools pull-right">
            <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-plus"></i>
        </div>
    </div>

    <!-- /.box-header -->
    <div class="box-body">
        <div class="row">
            <form action="<?php echo site_url('Penjualan/addAction'); ?>" method="post">


                <div class="col-md-3">
                    <div class="form-group">

                        <label for="titip_id">Nota Titip:</label>
                        <select class="form-control" id="titip_id" name="titip_id" required>
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
                        <select class="form-control" id="sales_id" name="sales_id" <?php if ($this->session->userdata('level') == 4) {echo 'readonly';} ?>>
                            <?php
                            // Apabila user adalah sales, pilih dia
                            if ($this->session->userdata('level') == 4) {
                                echo '<option value="' . $this->session->userdata('id') . '">' . $this->session->userdata('nama') . '</option>';
                            }else {
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
                        <label for="tanggal">Tanggal:</label>
                        <input id="tanggal" class="form-control" type="datetime-local" name="tanggal" placeholder="Tanggal" value="<?php date_default_timezone_set("Asia/Jakarta");;
                                                                                                                                    echo date('Y-m-d\TH:i:s'); ?>" required />


                    </div>
                </div>
                <div class="col-sm-3">
                    <label class="invisible" for="submit">Tambah</label>
                    <button id="submit" type="submit" class="btn btn-success btn-block">Tambah</button>
                </div>

            </form>
        </div>
        <!-- /.row -->
    </div>
    <!-- /.box-body -->
</div>