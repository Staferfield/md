    <!-- Content Header (Page header) -->
    <section class="content-header">
        <h1>
            Nota Penjualan
        </h1>
        <ol class="breadcrumb">
            <li><a href="<?php echo base_url() ?>"><i class="fa fa-dashboard"></i> Home</a></li>
            <li class="active">Penjualan</li>
        </ol>
    </section>

    <!-- Main content -->
    <section class="content">

        <!-- Default box -->
        <div class="box box-info box-solid">
            <div class="box-header with-border">
                <h3 class="box-title">Nota Penjualan
                </h3>

                <div class="box-tools pull-right">
                    <button type="button" class="btn btn-box-tool" data-widget="collapse" data-toggle="tooltip" title="" data-original-title="Collapse">
                        <i class="fa fa-minus"></i></button>
                </div>
            </div>
            <div class="box-body table-responsive">


                <table id="dataTable" class="table table-striped table-hover text-center">
                    <thead class="thead-dark">
                        <tr>
                            <th>No Nota</th>
                            <th>Nama Toko</th>
                            <th>Nama Sales</th>
                            <th>Tanggal</th>
                            <th>Nota Titip</th>
                            <th>Item</th>
                            <th >Kelola</th>
                        </tr>
                    </thead>
                    <tbody class="text-center">
                        <?php $i = 1;
                        foreach ($penjualan as $item) { ?>
                            <tr>
                                <td class=""><?php echo $item['id']; ?></td>
                                <!-- <td class=""><?php //echo $item['titip_id']; ?></td> -->
                                <td class=""><?php echo $item['toko_nama']; ?></td>
                                <td class=""><?php echo $item['sales_nama']; ?></td>
                                <td class=""><?php echo $item['tanggal']; ?></td>

                                <td class=""><a class="label label-success" href="<?php echo site_url('Item_Penitipan/byNotaID/'.$item['titip_id']); ?>"><?php echo $item['titip_id']; ?></a></td>

                                <td class=""><a class="btn btn-sm btn-info" href="<?php echo site_url('Item_Penjualan/byNotaID/' . $item['id']); ?>">Lihat Item</a></td>

                                <td>
                                    <div class="btn-group">
                                        <a class="btn btn-sm btn-info" href="<?php echo site_url('penjualan/edit/' . $item['id']); ?>"><i class="fa fa-fw fa-pencil"></i> Edit</a>
                                        <a class="btn btn-sm btn-danger" href="<?php echo site_url('penjualan/delete/' . $item['id']); ?>" onclick="return confirm('Hapus Nota Penjualan No. <?php echo $item['id'] . ' untuk ' . $item['toko_nama']; ?>?')"><i class="fa fa-fw fa-trash-o"></i> Hapus</a>
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

        <?php $this->load->view('Penjualan/v_Tambah') ?>

    </section>
    <!-- /.content -->