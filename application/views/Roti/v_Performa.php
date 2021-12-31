    <!-- Content Header (Page header) -->
    <section class="content-header">
        <h1>
            Roti
        </h1>
        <ol class="breadcrumb">
            <li><a href="<?php echo base_url() ?>"><i class="fa fa-dashboard"></i> Home</a></li>
            <li><a href="<?php echo site_url('Roti') ?>">Roti</a></li>
            <li class="active">Performa</li>
        </ol>
    </section>

    <!-- Main content -->
    <section class="content">

        <!-- Default box -->
        <div class="box box-info box-solid">
            <div class="box-header with-border">
                <h3 class="box-title">Performa Roti</h3> <small>(Bulan Lalu)</small>

                <div class="box-tools pull-right">
                    <button type="button" class="btn btn-box-tool" data-widget="collapse" data-toggle="tooltip" title="" data-original-title="Collapse">
                        <i class="fa fa-minus"></i></button>
                </div>
            </div>
            <div class="box-body">

                <table id="dataTable" class="table table-striped table-hover text-center">
                    <thead class="thead-dark">
                        <tr>
                            <th scope="col">No</th>
                            <th scope="col">Nama</th>
                            <th scope="col">Harga</th>
                            <th scope="col">Dititipkan</th>
                            <th scope="col">Terjual</th>
                            <th scope="col">Diretur</th>
                            <th scope="col">Subtotal<br><small>(Harga sesuai nota jual)</small></th>
                            <th scope="col">Performa</th>
                        </tr>
                    </thead>

                    <tbody id="load_data">
                        <?php $i = 1;
                        foreach ($perf_lalu as $akun) {
                        ?>
                            <tr>
                                <td><?php echo $i;
                                    $i++ ?></td>
                                <td><?php echo $akun['nama'];?></td>
                                <td><?php echo 'Rp. '.number_format($akun['harga'],0,',','.');?></td>
                                <td><?php echo $akun['jml_titip'];?></td>
                                <td><?php echo $akun['jml_laku'];?></td>
                                <td><?php echo $akun['jml_retur'];?></td>
                                <td><?php IF($akun['subtotal']<> 0){echo 'Rp. '.number_format($akun['subtotal'],0,',','.');}?></td>
                                <td>
                                    <div class="progress-group">
                                    <span class="progress-number pull-right btn-xs bg-gray btn-flat"><small><?php echo $akun['performa'];?>%</small></span>
                                        <div class="progress">
                                            <div class="progress-bar" style="width: <?php echo $akun['performa']; ?>%"></div>
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
                <h3 class="box-title">Performa Roti</h3> <small>(Keseluruhan)</small>

                <div class="box-tools pull-right">
                    <button type="button" class="btn btn-box-tool" data-widget="collapse" data-toggle="tooltip" title="" data-original-title="Collapse">
                        <i class="fa fa-minus"></i></button>
                </div>
            </div>
            <div class="box-body">

                <table id="dataTable2" class="table table-striped table-hover text-center">
                    <thead class="thead-dark">
                        <tr>
                            <th scope="col">No</th>
                            <th scope="col">Nama</th>
                            <th scope="col">Harga</th>
                            <th scope="col">Dititipkan</th>
                            <th scope="col">Terjual</th>
                            <th scope="col">Diretur</th>
                            <th scope="col">Subtotal<br><small>(Harga sesuai nota jual)</small></th>
                            <th scope="col">Performa</th>
                        </tr>
                    </thead>

                    <tbody id="load_data">
                        <?php $i = 1;
                        foreach ($performa as $akun) {
                        ?>
                            <tr>
                                <td><?php echo $i;
                                    $i++ ?></td>
                                <td><?php echo $akun['nama'];?></td>
                                <td><?php echo 'Rp. '.number_format($akun['harga'],0,',','.');?></td>
                                <td><?php echo $akun['jml_titip'];?></td>
                                <td><?php echo $akun['jml_laku'];?></td>
                                <td><?php echo $akun['jml_retur'];?></td>
                                <td><?php IF($akun['subtotal']<> 0){echo 'Rp. '.number_format($akun['subtotal'],0,',','.');}?></td>
                                <td>
                                    <div class="progress-group">
                                    <span class="progress-number pull-right btn-xs bg-gray btn-flat"><small><?php echo $akun['performa'];?>%</small></span>
                                        <div class="progress">
                                            <div class="progress-bar" style="width: <?php echo $akun['performa']; ?>%"></div>
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
    <!-- /.content -->