    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Dashboard
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
        <li class="active">Dashboard</li>
      </ol>
    </section>

    <!-- Main content -->
    <section class="content">

      <!-- Load jadwal sales -->
      <?php if ($this->session->userdata("level") == 1 || $this->session->userdata("level") == 0) {

        $this->load->view('Dashboard/widget_PendapatanPerbulan');

        $this->load->view('Dashboard/widget_PenjualanPerbulan');
      } ?>

      <!-- Apabila sales -> Load jadwal sales -->
      <?php if ($this->session->userdata("level") == 4 || $this->session->userdata("level") == 0) {

        $this->load->view('Dashboard/widget_Jadwal');
      } ?>


    </section>
    <!-- /.content -->