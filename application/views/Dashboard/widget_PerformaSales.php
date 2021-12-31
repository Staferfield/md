<div class="col-md-12">
            <!-- Default box -->
        <div class="box box-info box-solid">
            <div class="box-header with-border">
                <h3 class="box-title">Performa Sales</h3> <small>(30 hari terakhir)</small>

                <div class="box-tools pull-right">
                    <button type="button" class="btn btn-box-tool" data-widget="collapse" data-toggle="tooltip" title="" data-original-title="Collapse">
                        <i class="fa fa-minus"></i></button>
                </div>
            </div>
            <div class="box-body">
                <table id="dataTable2" class="table table-striped table-hover">
                    <thead class="thead-dark">
                        <tr>
                            <th scope="col" class="text-center">No</th>
                            <th scope="col" class="text-center">Nama</th>
                            <th scope="col" class="text-center">Alamat</th>
                            <th scope="col" class="text-center">Banyak Pengantaran</th>
                            <th scope="col" class="text-center">Banyak Pengambilan</th>
                            <th scope="col" class="text-center">Kontribusi</th>
                        </tr>
                    </thead>

                    <tbody id="load_data" class="text-center">
                        <?php $i = 1;
                        foreach ($performa_sales as $data) {
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
                                        <span class="progress-number pull-right btn-xs bg-gray btn-flat"><small><?php echo round($data['performa'] / $data['total'] * 100); ?>%</small></span>
                                        <div class="progress">
                                            <div class="progress-bar progress-bar-green" style="width: <?php echo round($data['performa'] / $data['total'] * 100); ?>%"></div>
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
        </div>
        <!-- /.col -->