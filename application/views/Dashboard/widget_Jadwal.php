<div class="col-md-12">
    <!-- Default box -->
    <div class="box box-info box-solid">
        <div class="box-header with-border">
            <h3 class="box-title">Jadwal Pengambilan</h3>

            <div class="box-tools pull-right">
                <button type="button" class="btn btn-box-tool" data-widget="collapse" data-toggle="tooltip" title="" data-original-title="Collapse">
                    <i class="fa fa-minus"></i></button>

            </div>
        </div>
        <div class="box-body table-responsive">
            <table id="dataTable" class="table table-striped table-hover">
                <thead class="thead-dark">
                    <tr>
                        <th>No</th>
                        <th>Nama Toko</th>
                        <th>Alamat</th>
                        <th>Tanggal Pengambilan</th>
                        <th>Keterangan</th>
                        <th>Tindakan</th>
                    </tr>
                </thead>
                <tbody class="">
                    <?php $i = 1;
                    foreach ($jadwal_sales as $item) { ?>
                        <tr>
                            <td><?php echo $i;
                                $i++ ?></td>
                            <td><?php echo $item['toko_nama']; ?></td>
                            <td><?php echo $item['toko_alamat']; ?></td>
                            <td><?php echo $item['tanggal_ambil']; ?></td>
                            <td><span class="label text-center 
                        <?php
                        if ($item['status'] >= 1) {
                            echo "bg-green";
                        } elseif ($item['status'] == 0) {
                            echo "bg-yellow";
                        } elseif ($item['status'] < 0) {
                            echo "bg-red";
                        } ?>">
                                    <?php
                                    // Buat keterangan apabila terlambat
                                    if ($item['status'] >= 1) {
                                        echo "Masih " . $item['status'] . " hari";
                                    } elseif ($item['status'] == 0) {
                                        echo "Ambil hari ini";
                                    } elseif ($item['status'] < 0) {
                                        echo "Telat " . abs($item['status'] * -1) . " hari";
                                    } ?> </span>
                            </td>
                            <td>
                                <a class="btn btn-sm btn-primary" href="<?php echo site_url('Penjualan/addQuick/' . $item['titip_id']); ?>" onclick="return confirm('Buat nota penjualan &quot;<?php echo $item['toko_nama']; ?>&quot;?')">Buat Nota Jual</a>
                            </td>
                        </tr>
                    <?php } ?>
                <tbody>
            </table>
        </div>
        <!-- /.box-body -->
    </div>
    <!-- /.box -->
</div>
<!-- /.col -->