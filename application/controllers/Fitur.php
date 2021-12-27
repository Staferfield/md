<?php
class Fitur extends CI_Controller{
    function __construct(){
        parent::__construct();
        $this->load->model('M_toko');

        // Redirect Login apabila belum
        if($this->session->userdata('login') != true){
            redirect('login');
        }
    }
    
    public function index() {
        redirect('Dashboard');
    }

    public function jadwal() {
        $data['jadwal'] = $this->M_toko->getJadwalPengambilan();
        
        $this->load->view('Main/v_Header');
        $this->load->view('Main/v_Sidebar');
        $this->load->view('Fitur/v_Jadwal', $data);
        $this->load->view('Main/v_Footer');
    }

    public function peta() {
        $data['toko'] = $this->M_toko->getToko();
        $this->load->view('Main/v_Header');
        $this->load->view('Main/v_Sidebar');
        $this->load->view('Fitur/v_Peta', $data);
        $this->load->view('Main/v_Footer');
    }


}?>