    <!-- Content Header (Page header) -->
    <section class="content-header">
        <h1>
            Item Penitipan
        </h1>
        <ol class="breadcrumb">
        <li><a href="<?php echo base_url(); ?>"><i class="fa fa-dashboard"></i> Home</a></li>
            <li><a href="<?php echo site_url('Penitipan') ?>">Nota Penitipan</a></li>
            <li class="active">Item</li>
        </ol>
    </section>

    <!-- Main content -->
    <section class="content">
        <!-- Tabel Item Penitipan untuk Nota -->
        <!-- Default box -->
        <div class="box box-info box-solid">
            <div class="box-header with-border">
                <h3 class="box-title">Item Penitipan</h3>

                <div class="box-tools pull-right">
                    <button type="button" class="btn btn-box-tool" data-widget="collapse" data-toggle="tooltip" title="" data-original-title="Collapse">
                        <i class="fa fa-minus"></i></button>
                </div>
            </div>
            <div class="box-body table-responsive">
                <p>
                    No Nota: <?php echo $nota['id']; ?></br>
                    Toko : <?php echo $nota['toko_nama']; ?></br>
                    Sales : <?php echo $nota['sales_nama']; ?></br>
                    Tanggal: <?php echo $nota['tanggal']; ?>
                </p>

                <div class="box-header">
                    <a class="btn btn-primary btn-sm" href="<?php echo site_url('Penitipan'); ?>"><i class="fa fa-angle-left"></i> Kembali</a>
                </div>


                <table id="dataTable" class="table table-striped table-hover">
                    <thead class="thead-dark">
                        <tr>
                            <th>No</th>
                            <th>Nama Roti</th>
                            <th>Jumlah Titip</th>
                            <th>Kelola</th>
                        </tr>
                    </thead>
                    <tbody class="">
                        <?php $i = 1;
                        foreach ($item_penitipan as $item) { ?>
                            <tr>
                                <td><?php echo $i;
                                    $i++ ?></td>
                                <td class=""><?php echo $item['roti_nama']; ?></td>
                                <td class=""><?php echo $item['jml_titip']; ?></td>
                                <td>
                                    <div class="btn-group">
                                        <a class="btn btn-sm btn-info" href="<?php echo site_url('item_penitipan/edit/' . $item['id']); ?>"><i class="fa fa-fw fa-pencil"></i> Edit</a>
                                        <a class="btn btn-sm btn-danger" href="<?php echo site_url('item_penitipan/delete/' . $item['id']); ?>" onclick="return confirm('Hapus Item <?php echo $item['roti_nama']; ?>?')"><i class="fa fa-fw fa-trash-o"></i> Hapus</a>
                                    </div>
                                </td>
                            </tr>
                        <?php } ?>
                    </tbody>
                </table>

            </div>
            <!-- /.box-body -->


        </div>
        <!-- /.box -->

        <!-- Tambahkan, form penambahan item -->
        <?php $this->load->view('Item_Penitipan/v_Tambah') ?>


    </section>
    <!-- /.content -->