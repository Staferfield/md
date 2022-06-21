<?php
class Roti extends CI_Controller{
    function __construct(){
        parent::__construct();
        $this->load->model('M_roti');

        // Redirect Login apabila belum
        if($this->session->userdata('login') != true){
            redirect('Login');

        }
        // Redirect untuk sales, karena sales tidak dapat memodifikasi roti
        if($this->session->userdata('level') == 4){
            redirect('Dashboard');
        }
    }
    
    public function index() {
        $data['roti'] = $this->M_roti->getRoti();

        $this->load->view('Main/v_Header');
        $this->load->view('Main/v_Sidebar');
        $this->load->view('Roti/v_Main', $data);
        $this->load->view('Main/v_Footer');
    }
    // Performa karyawan
    public function performa(){
        $data['performa'] = $this->M_roti->getRotiPerformance();
        $data['perf_lalu'] = $this->M_roti->getRotiPerformanceLastMonth();

        $this->load->view('Main/v_Header');
        $this->load->view('Main/v_Sidebar');
        $this->load->view('Roti/v_Performa', $data);
        $this->load->view('Main/v_Footer');
    }

    public function add(){
        $this->load->view('Main/v_Header');
        $this->load->view('Main/v_Sidebar');
        $this->load->view('Roti/v_Add');
        $this->load->view('Main/v_Footer');
    }
    
    public function edit($id){
        $data['roti'] = $this->M_roti->getRotiById($id);

        $this->load->view('Main/v_Header');
        $this->load->view('Main/v_Sidebar');
        $this->load->view('Roti/v_Edit', $data);
        $this->load->view('Main/v_Footer');
    }
    
    public function addAction(){
        $data = array(
            "nama" => $this->input->post("nama"), 
            "harga" => $this->input->post("harga")
            );
        $this->M_roti->insertRoti($data);

        if($this->db->affected_rows()){
            redirect('Roti');
        } else {
            redirect('Roti/add');
        } 
    }

    public function editAction(){
        $id=$this->input->post("id");
        $data = array(
            "nama" => $this->input->post("nama"), 
            "harga" => $this->input->post("harga")
            );
        $this->M_roti->updateRoti($data, $id);

        if($this->db->affected_rows()){
            redirect('Roti');
        } else {
            redirect('Roti/Edit/'.$id);
        } 
    }

    public function delete($id){
        $this->M_roti->deleteRoti($id);
        if($this->db->affected_rows()){
            redirect('Roti');
        } else{
            echo "Data gagal dihapus";
        }
    }


}?>