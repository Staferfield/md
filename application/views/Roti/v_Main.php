    <!-- Content Header (Page header) -->
    <section class="content-header">
        <h1>
            Roti
        </h1>
        <ol class="breadcrumb">
            <li><a href="<?php echo base_url() ?>"><i class="fa fa-dashboard"></i> Home</a></li>
            <li class="active">Roti</li>
        </ol>
    </section>

    <!-- Main content -->
    <section class="content">

        <!-- Default box -->
        <div class="box box-info box-solid">
            <div class="box-header with-border">
                <h3 class="box-title">Data Roti</h3>

                <div class="box-tools pull-right">
                    <button type="button" class="btn btn-box-tool" data-widget="collapse" data-toggle="tooltip" title="" data-original-title="Collapse">
                        <i class="fa fa-minus"></i></button>
                </div>
            </div>
            <div class="box-body">

                <table id="dataTable" class="table table-striped table-hover">
                    <thead class="thead-dark">
                        <tr>
                            <th class="">No</th>
                            <th class="">Nama</th>
                            <th class="">Harga</th>
                            <th class="">Kelola</th>
                        </tr>
                    </thead>
                    <tbody class="">
                        <?php $i = 1;
                        foreach ($roti as $item) { ?>
                            <tr>
                                <td><?php echo $i;
                                    $i++ ?></td>
                                <td class="text-left font-weight-bold"><?php echo $item['nama']; ?></td>
                                <td><?php echo 'Rp. ' . number_format($item['harga'], 0, ',', '.'); ?></td>

                                <td>
                                    <a class="btn btn-primary" href="<?php echo site_url('roti/edit/' . $item['id']); ?>">Edit</a>
                                    <a class="btn btn-danger" href="<?php echo site_url('roti/delete/' . $item['id']); ?>" onclick="return confirm('Yakin Hapus Post &quot;<?php echo $item['nama']; ?>&quot;?')">Hapus</a>
                                </td>
                            </tr>
                        <?php } ?>
                    <tbody>
                </table>

            </div>
            <!-- /.box-body -->
        </div>
        <!-- /.box -->


        <?php $this->load->view('Roti/v_Tambah') ?>


    </section>
    <!-- /.content -->