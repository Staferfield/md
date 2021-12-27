    <!-- Content Header (Page header) -->
    <section class="content-header">
        <h1>
            Toko
        </h1>
        <ol class="breadcrumb">
            <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
            <li><a href="#">Toko</a></li>
            <li class="active">Performa Toko</li>
        </ol>
    </section>

    <!-- Main content -->
    <section class="content">

        <!-- Default box -->
        <div class="box box-info box-solid">
            <div class="box-header with-border">
                <h3 class="box-title">Performa Toko</h3> <small>(Bulan Lalu)</small>

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
                            <th scope="col">Alamat</th>
                            <th scope="col">Roti Dititipkan</th>
                            <th scope="col">Roti Terjual</th>
                            <th scope="col">Roti Diretur</th>
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
                                <td><?php echo $akun['alamat'];?></td>
                                <td><?php echo $akun['jml_titip'];?></td>
                                <td><?php echo $akun['jml_laku'];?></td>
                                <td><?php echo $akun['jml_retur'];?></td>
                                <td>
                                    <div class="progress-group">
                                    <span class="progress-number pull-right btn-xs bg-gray btn-flat"><small><?php echo $akun['performa'];?>%</small></span>
                                        <div class="progress">
                                            <div class="progress-bar progress-bar-green" style="width: <?php echo $akun['performa']; ?>%"></div>
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
                <h3 class="box-title">Performa Toko</h3> <small>(Keseluruhan)</small>

                <div class="box-tools pull-right">
                    <button type="button" class="btn btn-box-tool" data-widget="collapse" data-toggle="tooltip" title="" data-original-title="Collapse">
                        <i class="fa fa-minus"></i></button>
                </div>
            </div>
            <div class="box-body">

                <table class="table table-striped table-hover text-center">
                    <thead class="thead-dark">
                        <tr>
                            <th scope="col">No</th>
                            <th scope="col">Nama</th>
                            <th scope="col">Alamat</th>
                            <th scope="col">Roti Dititipkan</th>
                            <th scope="col">Roti Terjual</th>
                            <th scope="col">Roti Diretur</th>
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
                                <td><?php echo $akun['alamat'];?></td>
                                <td><?php echo $akun['jml_titip'];?></td>
                                <td><?php echo $akun['jml_laku'];?></td>
                                <td><?php echo $akun['jml_retur'];?></td>
                                <td>
                                    <div class="progress-group">
                                    <span class="progress-number pull-right btn-xs bg-gray btn-flat"><small><?php echo $akun['performa'];?>%</small></span>
                                        <div class="progress">
                                            <div class="progress-bar progress-bar-green" style="width: <?php echo $akun['performa']; ?>%"></div>
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