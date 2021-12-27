<?php
class Dashboard extends CI_Controller{
    function __construct(){
        parent::__construct();
        // Redirect Login apabila belum
        if($this->session->userdata('login') != true){
            redirect('login');
        }

    }
    
    public function index() {
        $level=$this->session->userdata("level");

        // Pemilik -> 1
        if ($level==1) {
            $this->load->model('M_penjualan');
            $data['penjualan_monthly']= $this->M_penjualan->getPenjualanPerbulan();
        }

        // Manajer -> 2
        if ($level==2) {
        }
        
        // Sales -> 4
        if ($level==4 || $level==0) {
            $this->load->model('M_toko');
            $data['jadwal_sales'] = $this->M_toko->getJadwalPengambilanBySalesID($this->session->userdata("id"));
        }
      

        $this->load->view('Main/v_Header');
        $this->load->view('Main/v_Sidebar');
        $this->load->view('Dashboard/v_Main', $data);
        $this->load->view('Main/v_Footer');
    }
}
