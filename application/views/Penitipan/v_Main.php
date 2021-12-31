    <!-- Content Header (Page header) -->
    <section class="content-header">
        <h1>
            Nota Penitipan
        </h1>
        <ol class="breadcrumb">
            <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
            <li><a href="#">Penitipan</a></li>
            <li class="active">Nota Penitipan</li>
        </ol>
    </section>

    <!-- Main content -->
    <section class="content">

        <!-- Default box -->
        <div class="box box-info box-solid">
            <div class="box-header with-border">
                <h3 class="box-title">Nota Penitipan</h3>

                <div class="box-tools pull-right">
                    <button type="button" class="btn btn-box-tool" data-widget="collapse" data-toggle="tooltip" title="" data-original-title="Collapse">
                        <i class="fa fa-minus"></i></button>
                </div>
            </div>
            <div class="box-body table-responsive">

                <table id="dataTable" class="table table-striped table-hover">
                    <thead class="thead-dark">
                        <tr>
                            <th class="">No Nota</th>
                            <th class="">Nama Toko</th>
                            <th class="">Nama Sales</th>
                            <th class="">Tanggal</th>
                            <th class="">Nota Jual</th>
                            <th class="">Item</th>
                            <th class="">Kelola</th>
                        </tr>
                    </thead>
                    <tbody class="">
                        <?php
                        foreach ($penitipan as $item) { ?>
                            <tr>
                                <td><?php echo $item['id']; ?></td>
                                <td><?php echo $item['toko_nama']; ?></td>
                                <td><?php echo $item['sales_nama']; ?></td>
                                <td><?php echo date_format(new DateTime($item['tanggal']), 'd-m-Y H:i:s'); ?></td>
                                <?php if ($item['jual_id']) {
                                    echo '<td><a class="label label-success" href="' . site_url('Item_Penjualan/byNotaID/') . $item['jual_id'] . '">' . $item['jual_id'] . '</a></td>';
                                } else {
                                    echo '<td><span class="label label-warning">Belum Diambil</span></td>';
                                }
                                ?>
                                <td><a class="btn btn-sm btn-info" href="<?php echo site_url('Item_Penitipan/byNotaID/' . $item['id']); ?>">Lihat Item</a></td>

                                <td>
                                    <div class="btn-group">
                                        <a class="btn btn-sm btn-info" href="<?php echo site_url('penitipan/edit/' . $item['id']); ?>"><i class="fa fa-fw fa-pencil"></i> Edit</a>
                                        <a class="btn btn-sm btn-danger" href="<?php echo site_url('penitipan/delete/' . $item['id']); ?>" onclick="return confirm('Hapus Nota Titip No. <?php echo $item['id'] . ' untuk ' . $item['toko_nama']; ?>?')"><i class="fa fa-fw fa-trash-o"></i> Hapus</a>
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

        <?php $this->load->view('Penitipan/v_Tambah'); ?>

    </section>
    <!-- /.content -->