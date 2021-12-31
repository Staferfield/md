
        <div class="col-md-12">
          <div class="box box-info">
            <div class="box-header with-border">
              <h3 class="box-title">Pendapatan</h3>

              <div class="box-tools pull-right">
                <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i>
                </button>
                <button type="button" class="btn btn-box-tool" data-widget="remove"><i class="fa fa-times"></i></button>
              </div>
            </div>
            <!-- /.box-header -->

            <!-- Grafik -->
            <div class="box-body">
              <div class="row">

              <!-- Grafk -->
              <div class="col-md-12">
                  <p class="text-center">
                    <strong>Pendapatan (Rupiah):
                    <?php 
                      echo date_format(new DateTime($penjualan_monthly[0]['tanggal']),'M Y');
                      echo " - ";
                      echo date_format(new DateTime($penjualan_monthly[count($penjualan_monthly)-1]['tanggal']),'M Y');
                    ?>
                    </strong>
                  </p>
                  <div class="chart">
                    <!-- Sales Chart Canvas -->
                    <canvas id="pendapatanChart" style="height: 400px;"></canvas>
                  </div>
                  <!-- /.chart-responsive -->
                </div>
                <!-- /.col -->
              </div>
              <!-- /.row -->
            </div>
            <!-- ./box-body -->


          </div>
          <!-- /.box -->
        </div>
        <!-- /.col -->
