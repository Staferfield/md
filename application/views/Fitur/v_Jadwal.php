    <!-- Content Header (Page header) -->
    <section class="content-header">
        <h1>
            Jadwal
            <small>it all starts here</small>
        </h1>
        <ol class="breadcrumb">
            <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
            <li><a href="#">Toko</a></li>
            <li class="active">Jadwal</li>
        </ol>
    </section>

    <!-- Main content -->
    <section class="content">

        <!-- Default box -->
        <div class="box box-warning box-solid">
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
                            <th>Sales</th>
                            <th>Alamat</th>
                            <th>Tanggal Penitipan</th>
                            <th>Tanggal Pengambilan</th>
                            <th>Keterangan</th>
                            <th>Kelola</th>
                        </tr>
                    </thead>
                    <tbody class="text-center">
                        <?php $i = 1;
                        foreach ($jadwal as $item) { ?>
                            <tr>
                                <td><?php echo $i;
                                    $i++ ?></td>
                                <td><?php echo $item['toko_nama']; ?></td>
                                <td><?php echo $item['sales_nama']; ?></td>
                                <td><?php echo $item['toko_alamat']; ?></td>
                                <td><?php echo $item['tanggal_titip']; ?></td>
                                <td><?php echo $item['tanggal_ambil']; ?></td>
                                <td><span class="label 
                                <?php
                                // Set warma label
                                if ($item['status'] >= 1) {
                                    echo "bg-green";
                                } elseif ($item['status'] == 0) {
                                    echo "bg-yellow";
                                } elseif ($item['status'] < 0) {
                                    echo "bg-red";
                                } ?>">
                                        <?php
                                        // Buat keterangan sesuai waktu pengambilan
                                        if ($item['status'] >= 1) {
                                            echo "Masih " . $item['status'] . " hari";
                                        } elseif ($item['status'] == 0) {
                                            echo "Ambil hari ini";
                                        } elseif ($item['status'] < 0) {
                                            echo "Telat " . abs($item['status'] * -1) . " hari";
                                        } ?>
                                    </span>
                                </td>
                                <td>
                                    <a class="btn btn-sm btn-primary" href="<?php echo site_url('Penjualan/addQuick/' . $item['titip_id']); ?>" onclick="return confirm('Buat nota penjualan &quot;<?php echo $item['toko_nama']; ?>&quot;?')">Buat Nota Jual</a>
                                </td>
                            </tr>
                        <?php } ?>
                    <tbody>
                </table>
            </div>
        </div>
        <!-- /.box-body -->
        </div>
        <!-- /.box -->

    </section>
    <!-- /.content -->