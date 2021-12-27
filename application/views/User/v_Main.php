    <!-- Content Header (Page header) -->
    <section class="content-header">
        <h1>
            Karyawan
        </h1>
        <ol class="breadcrumb">
            <li><a href="<?php echo base_url() ?>"><i class="fa fa-dashboard"></i> Home</a></li>
            <li class="active">Karyawan</li>
        </ol>
    </section>

    <!-- Main content -->
    <section class="content">
        <!-- Your Page Content Here -->
        <div class="box box-info box-solid">
            <div class="box-header">
                <h3 class="box-title">Data Karyawan</h3>
            </div>
            <!-- /.box-header -->

            <div class="box-body table-responsive">
                <table id="dataTable" class="table table-striped table-hover">
                    <thead class="thead-dark">
                        <tr>
                            <th>No</th>
                            <th>Nama</th>
                            <th>Alamat</th>
                            <th>No Hp</th>
                            <th>Level</th>
                            <th>Kelola</th>
                        </tr>
                    </thead>

                    <tbody id="load_data" class="">
                        <?php $i = 1;
                        foreach ($user as $akun) {
                            // Jangan tampilkan akun root dan Pemilik
                            if ($akun['level'] <= 1) {
                                continue;
                            } ?>
                            <tr>
                                <td><?php echo $i;
                                    $i++ ?></td>
                                <td><?php echo $akun['nama']; ?></td>
                                <td><?php echo $akun['alamat']; ?></td>
                                <td><?php echo $akun['no_hp']; ?></td>
                                <td><?php
                                    if ($akun['level'] == 0) {
                                        echo "Root";
                                    } elseif ($akun['level'] == 1) {
                                        echo "Owner";
                                    } elseif ($akun['level'] == 2) {
                                        echo "Manajer";
                                    } elseif ($akun['level'] == 4) {
                                        echo "Sales";
                                    };
                                    ?></td>

                                <td>
                                    <div class="btn-group">
                                        <a class="btn btn-sm btn-primary" href="<?php echo site_url('User/edit/' . $akun['id']); ?>">Edit</a>
                                        <a class="btn btn-sm btn-danger" href="<?php echo site_url('User/delete/' . $akun['id']); ?>" onclick="return confirm('Hapus akun &quot;<?php echo $akun['nama']; ?>&quot;?')">Hapus</a>
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


        <?php $this->load->view('User/v_Tambah') ?>

    </section>