<div class="row">
        <div class="col-md-12">
          <div class="box box-info">
            <div class="box-header with-border">
              <h3 class="box-title">Penitipan & Penjualan</h3>

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
                    <strong>Penjualan:
                    <?php 
                      echo date_format(new DateTime($penjualan_monthly[0]['tanggal']),'M Y');
                      echo " - ";
                      echo date_format(new DateTime($penjualan_monthly[count($penjualan_monthly)-1]['tanggal']),'M Y');
                    ?>
                    </strong>
                  </p>
                  <div class="chart">
                    <!-- Sales Chart Canvas -->
                    <canvas id="salesChart" style="height: 300px;"></canvas>
                  </div>
                  <!-- /.chart-responsive -->
                </div>
                <!-- /.col -->
              </div>
              <!-- /.row -->
            </div>
            <!-- ./box-body -->

            <!-- Keterangan -->
            <!-- <div class="box-footer">
              <div class="row">
                <div class="col-sm-3 col-xs-6">
                  <div class="description-block border-right">
                    <span class="description-percentage text-green"><i class="fa fa-caret-up"></i> 17%</span>
                    <h5 class="description-header">$35,210.43</h5>
                    <span class="description-text">TOTAL REVENUE</span>
                  </div> -->
                  <!-- /.description-block -->
                <!-- </div> -->
                <!-- /.col -->
                <!-- <div class="col-sm-3 col-xs-6">
                  <div class="description-block border-right">
                    <span class="description-percentage text-yellow"><i class="fa fa-caret-left"></i> 0%</span>
                    <h5 class="description-header">$10,390.90</h5>
                    <span class="description-text">TOTAL COST</span>
                  </div> -->
                  <!-- /.description-block -->
                <!-- </div> -->
                <!-- /.col -->
                <!-- <div class="col-sm-3 col-xs-6">
                  <div class="description-block border-right">
                    <span class="description-percentage text-green"><i class="fa fa-caret-up"></i> 20%</span>
                    <h5 class="description-header">$24,813.53</h5>
                    <span class="description-text">TOTAL PROFIT</span>
                  </div> -->
                  <!-- /.description-block -->
                <!-- </div> -->
                <!-- /.col -->
                <!-- <div class="col-sm-3 col-xs-6">
                  <div class="description-block">
                    <span class="description-percentage text-red"><i class="fa fa-caret-down"></i> 18%</span>
                    <h5 class="description-header">1200</h5>
                    <span class="description-text">GOAL COMPLETIONS</span>
                  </div> -->
                  <!-- /.description-block -->
                <!-- </div>
              </div> -->
              <!-- /.row -->
            <!-- </div> -->
            <!-- /.box-footer -->

          </div>
          <!-- /.box -->
        </div>
        <!-- /.col -->
      </div>
      <!-- /.row -->
