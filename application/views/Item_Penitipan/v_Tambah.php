        <!-- Form untuk menambahkan data item -->
        <!-- Default box -->
        <div class="box collapsed-box">
            <div class="box-header with-border">
                <h3 class="box-title">Tambah Item Roti</h3>

                <div class="box-tools pull-right">
                    <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-plus"></i>
                </div>
            </div>
            <!-- /.box-header -->
            <div class="box-body">
                <div class="row">
                    <form id="formTambah" action="<?php echo site_url('Item_Penitipan/addAction/' . $nota['id']); ?>" method="post">
                        <div class="col-md-4">
                            <div class="form-group">
                                <label for="roti_id">Pilih Roti:</label>
                                <select class="form-control" name="roti_id" required="required">
                                    <?php
                                    $i = 1;
                                    foreach ($roti as $item) {
                                        echo '<option value="' . $item['id'] . '">' . $i . '. ' . $item['nama'] . '</option>';
                                        $i++;
                                    } ?>
                                </select>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group">
                                <label for="jml_titip">Jumlah Titip:</label>
                                <input class="form-control" type="number" name="jml_titip" placeholder="Jumlah Titip" value="<?php ?>" min="0" required="required" />
                            </div>
                        </div>

                        <div class="col-sm-4">
                            <label class="invisible" for="submit">Kirim</label>
                            <button id="submit" type="submit" class="btn btn-success btn-block">Tambah</button>
                        </div>
                    </form>
                </div>
                <!-- /.row -->
            </div>
            <!-- /.box-body -->
        </div>
        <!-- /.box -->
