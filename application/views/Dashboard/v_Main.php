    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Dashboard
      </h1>
      <ol class="breadcrumb">
        <li><a href="<?php echo site_url('Dashboard') ?>"><i class="fa fa-dashboard"></i> Home</a></li>
        <li class="active">Dashboard</li>
      </ol>
    </section>

    <!-- Main content -->
    <section class="content">
      <div class="row">
        <!-- Apabila owner -->
        <?php if ($this->session->userdata("level") == 1 || $this->session->userdata("level") == 0) {

          // Load Grafik Pendapatan
          $this->load->view('Dashboard/widget_PendapatanPerbulan');

          // Load Grafik Penitipan & Penjualan
          $this->load->view('Dashboard/widget_PenjualanPerbulan');
          $this->load->view('Dashboard/widget_PenjualanBar');

        } ?>

        <!-- Apabila manajer -->
        <?php if ($this->session->userdata("level") == 2 || $this->session->userdata("level") == 0) {
          $this->load->view('Dashboard/widget_PerformaSales');
          // $this->load->view('Dashboard/widget_PerformaToko');
          // $this->load->view('Dashboard/widget_PerformaRoti');
        } ?>

        <!-- Apabila sales -->
        <?php if ($this->session->userdata("level") == 4 || $this->session->userdata("level") == 0) {
          // Load jadwal sales
          $this->load->view('Dashboard/widget_Jadwal');
        } ?>

      </div>
      <!-- /.row -->
    </section>
    <!-- /.content -->