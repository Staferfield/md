    <!-- Content Header (Page header) -->
    <section class="content-header">
        <h1>
            Toko
        </h1>
        <ol class="breadcrumb">
            <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
            <li class="active">Toko</li>
        </ol>
    </section>

    <!-- Main content -->
    <section class="content">

        <!-- Default box -->
        <div class="box box-info box-solid">
            <div class="box-header with-border">
                <h3 class="box-title">Data Toko</h3>

                <div class="box-tools pull-right">
                    <button type="button" class="btn btn-box-tool" data-widget="collapse" data-toggle="tooltip" title="" data-original-title="Collapse">
                        <i class="fa fa-minus"></i></button>
                </div>
            </div>
            <div class="box-body table-responsive">
                <!-- /.box-header -->

                <div class="box-header">
                    <a class="btn btn-success" href="<?php echo site_url('toko/add'); ?>">Tambah Toko</a>
                </div>

                <table id="dataTable" class="table table-striped table-hover">
                    <thead class="thead-dark text-center">
                        <tr>
                            <th class="text-center">No</th>
                            <th class="text-center">Nama</th>
                            <th class="text-center">Pemilik</th>
                            <th class="text-center">Alamat</th>
                            <th class="text-center">No Telp</th>
                            <th class="text-center">Keterangan</th>
                            <th class="text-center">Kelola</th>
                        </tr>
                    </thead>
                    <tbody class="text-center">
                        <?php $i = 1;
                        foreach ($toko as $item) { ?>
                            <tr>
                                <td><?php echo $i;
                                    $i++ ?></td>
                                <td class="text-left"><?php echo $item['nama']; ?></td>
                                <td class="text-center"><?php echo $item['pemilik']; ?></td>
                                <td class="text-center"><?php echo $item['alamat']; ?></td>
                                <td class="text-center"><?php echo $item['no_telp']; ?></td>
                                <td class="text-center"><?php echo $item['keterangan']; ?></td>

                                <td>
                                    <div class="btn-group">
                                        <a class="btn btn-sm btn-info" href="<?php echo site_url('toko/edit/' . $item['id']); ?>"><i class="fa fa-fw fa-pencil"></i> Edit</a>
                                        <a class="btn btn-sm btn-danger" href="<?php echo site_url('toko/delete/' . $item['id']); ?>" onclick="return confirm('Hapus Toko &quot;<?php echo $item['nama']; ?>&quot;?')"><i class="fa fa-fw fa-trash-o"></i> Hapus</a>
                                    </div>
                                </td>
                            </tr>
                        <?php } ?>
                    <tbody>
                </table>

            </div>
            <!-- /.box-body -->
        </div>
        <!-- /.box -->

    </section>
    <!-- /.content -->