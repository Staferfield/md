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
                    <thead class="thead-dark text-center">
                        <tr>
                            <th class="text-center">No</th>
                            <th class="text-center">Nama Toko</th>
                            <th class="text-center">Sales</th>
                            <th class="text-center">Alamat</th>
                            <th class="text-center">Tanggal Penitipan</th>
                            <th class="text-center">Tanggal Pengambilan</th>
                            <th class="text-center">Keterangan</th>
                        </tr>
                    </thead>
                    <tbody class="text-center">
                        <?php $i = 1;
                        foreach ($jadwal as $item) { ?>
                            <tr>
                                <td><?php echo $i;
                                    $i++ ?></td>
                                <td class="text-left"><?php echo $item['toko_nama']; ?></td>
                                <td class="text-center"><?php echo $item['sales_nama']; ?></td>
                                <td class="text-center"><?php echo $item['toko_alamat']; ?></td>
                                <td class="text-center"><?php echo $item['tanggal_titip']; ?></td>
                                <td class="text-center"><?php echo $item['tanggal_ambil']; ?></td>
                                <td class="text-center"><span class="label text-center <?php
                                                                                        if ($item['status'] >= 1) {
                                                                                            echo "bg-green";
                                                                                        } elseif ($item['status'] == 0) {
                                                                                            echo "bg-yellow";
                                                                                        } elseif ($item['status'] < 0) {
                                                                                            echo "bg-red";
                                                                                        } ?>"><?php
                            // Buat keterangan apabila terlambat
                            if ($item['status'] >= 1) {
                                echo "Masih " . $item['status'] . " hari";
                            } elseif ($item['status'] == 0) {
                                echo "Ambil hari ini";
                            } elseif ($item['status'] < 0) {
                                echo "Telat " . abs($item['status'] * -1) . " hari";
                            } ?>
                                    </span>
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