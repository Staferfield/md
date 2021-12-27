    <!-- Content Header (Page header) -->
    <section class="content-header">
        <h1>
            Toko
        </h1>
        <ol class="breadcrumb">
            <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
            <li><a href="#">Toko</a></li>
            <li class="active">Peta Toko</li>
        </ol>
    </section>

    <!-- Main content -->
    <section class="content">

        <!-- Default box -->
        <div class="box box-warning box-solid">
            <div class="box-header with-border">
                <h3 class="box-title">Peta Lokasi Toko</h3>

                <div class="box-tools pull-right">
                    <button type="button" class="btn btn-box-tool" data-widget="collapse" data-toggle="tooltip" title="" data-original-title="Collapse">
                        <i class="fa fa-minus"></i></button>
                </div>
            </div>
            <div class="box-body">
                <div id="map" style="width:100% ; height: 800px">
                </div>
            </div>
            <!-- /.box-body -->
        </div>
        <!-- /.box -->

    </section>
    <!-- /.content -->


<?php $this->load->view('Script/peta') ?>