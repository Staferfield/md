<?php
class Penitipan extends CI_Controller{
    function __construct(){
        parent::__construct();
        $this->load->model('M_penitipan');
        $this->load->model('M_toko');
        $this->load->model('M_user');
        
        // Redirect Login apabila belum
        if($this->session->userdata('login') != true){
            redirect('Login');

        }
    }
    
    public function index() {
        // Ambil data untuk form tambah
        $data['toko'] = $this->M_toko->getToko();
        // Ambil sales saja
        $data['sales'] = $this->M_user->getUserByLevel(4);

        $data['penitipan'] = $this->M_penitipan->getPenitipan();
        $this->load->view('Main/v_Header');
        $this->load->view('Main/v_Sidebar');
        $this->load->view('Penitipan/v_Main', $data);
        $this->load->view('Main/v_Footer');
    }


    public function add(){
        $data['toko'] = $this->M_toko->getToko();
        // Ambil sales saja
        $data['sales'] = $this->M_user->getUserByLevel(4);

        $this->load->view('Main/v_Header');
        $this->load->view('Main/v_Sidebar');
        $this->load->view('Penitipan/v_Add', $data);
        $this->load->view('Main/v_Footer');
    }
    
    public function addAction(){
        $data = array(
            "toko_id" => $this->input->post("toko_id"), 
            "sales_id" => $this->input->post("sales_id"), 
            // format tanggal perlu dirubah karena adalah string
            "tanggal" => date_format(new DateTime($this->input->post("tanggal")) ,"Y-m-d H:i:s"), 
            "status" => 0
            );
        $result=$this->M_penitipan->insertPenitipan($data);

        if($this->db->affected_rows()){
            redirect('Item_Penitipan/byNotaID/'.$result['id']);
        } else {
            redirect('Penitipan/add');
        } 
    }

    public function edit($id){
        // Ambil data toko untuk list nama
        $data['toko'] = $this->M_toko->getToko();
        // Ambil data sales untuk list nama
        $data['sales'] = $this->M_user->getUserByLevel(4);


        $data['penitipan'] = $this->M_penitipan->getPenitipanById($id);

        $this->load->view('Main/v_Header');
        $this->load->view('Main/v_Sidebar');
        $this->load->view('Penitipan/v_Edit', $data);
        $this->load->view('Main/v_Footer');
    }

    public function editAction(){
        $id=$this->input->post("id");
        $data = array(
            "toko_id" => $this->input->post("toko_id"), 
            "sales_id" => $this->input->post("sales_id"), 
            "tanggal" => date_format(new DateTime($this->input->post("tanggal")) ,"Y-m-d H:i:s"), 
            "status" => $this->input->post("status")
            );
        $this->M_penitipan->updatePenitipan($data, $id);

        if($this->db->affected_rows()){
            redirect('Penitipan');
        } else {
            redirect('Penitipan/Edit/'.$id);
        } 
    }

    public function delete($id){
        $this->M_penitipan->deletePenitipan($id);
        if($this->db->affected_rows()){
            redirect('Penitipan');
        } else{
            echo "Data gagal dihapus";
        }
    }


}?>