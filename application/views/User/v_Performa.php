    <!-- Content Header (Page header) -->
    <section class="content-header">
        <h1>
            Performa Karyawan
        </h1>
        <ol class="breadcrumb">
            <li><a href="<?php echo base_url() ?>"><i class="fa fa-dashboard"></i> Home</a></li>
            <li><a href="<?php echo site_url('User') ?>">Karyawan</a></li>
            <li class="active">Performa</li>
        </ol>
    </section>

    <!-- Main content -->
    <section class="content">

        <!-- Default box -->
        <div class="box box-info box-solid">
            <div class="box-header with-border">
                <h3 class="box-title">Performa Sales</h3> <small>(Bulan Lalu)</small>

                <div class="box-tools pull-right">
                    <button type="button" class="btn btn-box-tool" data-widget="collapse" data-toggle="tooltip" title="" data-original-title="Collapse">
                        <i class="fa fa-minus"></i></button>
                </div>
            </div>
            <div class="box-body table-responsive">
                <table id="dataTable" class="table table-striped table-hover">
                    <thead class="thead-dark">
                        <tr>
                            <th scope="col">No</th>
                            <th scope="col">Nama</th>
                            <th scope="col">Alamat</th>
                            <th scope="col">Banyak Pengantaran</th>
                            <th scope="col">Banyak Pengambilan</th>
                            <th scope="col">Kontribusi</th>
                        </tr>
                    </thead>

                    <tbody id="load_data" class="">
                        <?php $i = 1;
                        foreach ($perf_bulan as $data) {
                            // Kalkulasi performa
                            $data['performa']=round(($data['pengantaran']+$data['pengambilan']) / $data['total'] * 100);
                        ?>
                            <tr>
                                <td><?php echo $i;
                                    $i++ ?></td>
                                <td><?php echo $data['nama']; ?></td>
                                <td><?php echo $data['alamat']; ?></td>
                                <td><?php echo $data['pengantaran']; ?></td>
                                <td><?php echo $data['pengambilan']; ?></td>
                                <td>
                                    <div class="progress-group">
                                        <span class="progress-number pull-right btn-xs bg-gray btn-flat"><small><?php echo $data['performa']; ?>%</small></span>
                                        <div class="progress">
                                            <div class="progress-bar progress-bar-green" style="width: <?php echo $data['performa']; ?>%"></div>
                                        </div>
                                    </div>
                                    <!-- /.progress-group -->
                                </td>
                            </tr>
                        <?php } ?>
                    </tbody>
                </table>
            </div>
            <!-- /.box-body -->
        </div>
        <!-- /.box -->

        <!-- Default box -->
        <div class="box box-info box-solid">
            <div class="box-header with-border">
                <h3 class="box-title">Performa Sales</h3> <small>(Keseluruhan)</small>

                <div class="box-tools pull-right">
                    <button type="button" class="btn btn-box-tool" data-widget="collapse" data-toggle="tooltip" title="" data-original-title="Collapse">
                        <i class="fa fa-minus"></i></button>
                </div>
            </div>
            <div class="box-body">
                <table id="dataTable2" class="table table-striped table-hover">
                    <thead class="thead-dark">
                        <tr>
                            <th scope="col">No</th>
                            <th scope="col">Nama</th>
                            <th scope="col">Alamat</th>
                            <th scope="col">Banyak Pengantaran</th>
                            <th scope="col">Banyak Pengambilan</th>
                            <th scope="col">Kontribusi</th>
                        </tr>
                    </thead>

                    <tbody id="load_data" class="">
                        <?php $i = 1;
                        foreach ($performa as $data) {
                            // Kalkulasi performa
                            $data['performa']=round(($data['pengantaran']+$data['pengambilan']) / $data['total'] * 100);
                        ?>
                            <tr>
                                <td><?php echo $i;
                                    $i++ ?></td>
                                <td><?php echo $data['nama']; ?></td>
                                <td><?php echo $data['alamat']; ?></td>
                                <td><?php echo $data['pengantaran']; ?></td>
                                <td><?php echo $data['pengambilan']; ?></td>
                                <td>
                                    <div class="progress-group">
                                        <span class="progress-number pull-right btn-xs bg-gray btn-flat"><small><?php echo $data['performa']; ?>%</small></span>
                                        <div class="progress">
                                            <div class="progress-bar progress-bar-green" style="width: <?php echo $data['performa']; ?>%"></div>
                                        </div>
                                    </div>
                                    <!-- /.progress-group -->
                                </td>
                            </tr>
                        <?php } ?>
                    </tbody>
                </table>
            </div>
            <!-- /.box-body -->
        </div>
        <!-- /.box -->

    </section>