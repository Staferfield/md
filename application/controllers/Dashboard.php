<?php
class Dashboard extends CI_Controller{
    function __construct(){
        parent::__construct();
        // Redirect Login apabila belum
        if($this->session->userdata('login') != true){
            redirect('login');
        }

        $this->load->model('M_user');
        $this->load->model('M_roti');
        $this->load->model('M_toko');
        $this->load->model('M_penjualan');
    }
    
    public function index() {
        $level=$this->session->userdata("level");

        // Pemilik -> 1
        if ($level==1 || $level==0) {
            $data['penjualan_monthly']= $this->M_penjualan->getPenjualanPerbulan();
        }

        // Manajer -> 2
        if ($level==2 || $level==0) {
            $data['performa_sales'] = $this->M_user->getSalesPerformanceThirtyDay();
            $data['penjualan_monthly']= $this->M_penjualan->getPenjualanPerbulan();
            // $data['performa_roti'] = $this->M_roti->getRotiPerformance();
            // $data['performa_sales'] = $this->M_toko->getTokoPerformance();
            // $data['performa_toko'] = $this->M_user->getSalesPerformance();
        }
        // Sales -> 4
        if ($level==4 || $level==0) {
            $id=$this->session->userdata("id");
            // apabila root, tampilkan semua jadwal
            if($level==0){
                $id='%';    
            }
            $data['jadwal_sales'] = $this->M_toko->getJadwalPengambilanBySalesID($id);
        }

        $this->load->view('Main/v_Header');
        $this->load->view('Main/v_Sidebar');
        $this->load->view('Dashboard/v_Main', $data);
        $this->load->view('Main/v_Footer');
    }
}
