<?php
class Toko extends CI_Controller{
    function __construct(){
        parent::__construct();
        $this->load->model('M_toko');
        
        // Redirect Login apabila belum
        if($this->session->userdata('login') != true){
            redirect('Login');

        }
    }
    
    public function index() {
        $this->load->view('Main/v_Header');
        $this->load->view('Main/v_Sidebar');
        $data['toko'] = $this->M_toko->getToko();
        $this->load->view('Toko/v_Main', $data);
        $this->load->view('Main/v_Footer');
    }

    public function add(){
        $this->load->view('Main/v_Header');
        $this->load->view('Main/v_Sidebar');
        $this->load->view('Toko/v_Add');
        $this->load->view('Main/v_Footer');
    }

    public function edit($id){
        $this->load->view('Main/v_Header');
        $this->load->view('Main/v_Sidebar');
        $data['toko'] = $this->M_toko->getTokoById($id);
        $this->load->view('Toko/v_Edit', $data);
        $this->load->view('Main/v_Footer');
    }

    public function peta() {
        $this->load->view('Main/v_Header');
        $this->load->view('Main/v_Sidebar');
        $data['toko'] = $this->M_toko->getToko();
        $this->load->view('Fitur/v_Peta', $data);
        $this->load->view('Main/v_Footer');
    }
    // Performa karyawan
    public function performa(){
        $data['performa'] = $this->M_toko->getTokoPerformance();
        $data['perf_lalu'] = $this->M_toko->getTokoPerformanceLastMonth();
        $this->load->view('Main/v_Header');
        $this->load->view('Main/v_Sidebar');
        $this->load->view('Toko/v_Performa', $data);
        $this->load->view('Main/v_Footer');
    }


    public function addAction(){
        $data = array(
            "nama" => $this->input->post("nama"), 
            "pemilik" => $this->input->post("pemilik"), 
            "alamat" => $this->input->post("alamat"), 
            "no_telp" => $this->input->post("no_telp"), 
            "geo_latt" => $this->input->post("geo_latt"),
            "geo_long" => $this->input->post("geo_long"),
            "keterangan" => $this->input->post("keterangan")
            );
        $this->M_toko->insertToko($data);

        if($this->db->affected_rows()){
            redirect('Toko');
        } else {
            redirect('Toko/add');
        } 
    }

    public function editAction(){
        $id=$this->input->post("id");
        $data = array(
            "nama" => $this->input->post("nama"), 
            "pemilik" => $this->input->post("pemilik"), 
            "alamat" => $this->input->post("alamat"), 
            "no_telp" => $this->input->post("no_telp"), 
            "geo_latt" => $this->input->post("geo_latt"),
            "geo_long" => $this->input->post("geo_long"),
            "keterangan" => $this->input->post("keterangan")
            );
        $this->M_toko->updateToko($data, $id);

        if($this->db->affected_rows()){
            redirect('Toko');
        } else {
            redirect('Toko/Edit/'.$id);
        } 
    }


    public function delete($id){
        $this->M_toko->deleteToko($id);
        if($this->db->affected_rows()){
            redirect('Toko');
        } else{
            echo "Data gagal dihapus";
        }
    }


}?>