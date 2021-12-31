<?php
class Item_Penjualan extends CI_Controller{
    function __construct(){
        parent::__construct();
        $this->load->model('M_item_penjualan');
        $this->load->model('M_penjualan');
        $this->load->model('M_roti');
        $this->load->model('M_toko');
        $this->load->model('M_user');
        
        // Redirect Login apabila belum
        if($this->session->userdata('login') != true){
            redirect('Login');

        }
    }
    
    public function index() {
        redirect('Penjualan');
    }

    public function byNotaID($nota_id) {
        // Data untuk tambah roti
        $data['roti'] = $this->M_roti->getRoti();
        // Data info nota
        $data['nota'] = $this->M_penjualan->getPenjualanById($nota_id);

        $data['item_penjualan'] = $this->M_item_penjualan->getItemPenjualanByNotaID($nota_id);

        $this->load->view('Main/v_Header');
        $this->load->view('Main/v_Sidebar');
        $this->load->view('Item_Penjualan/v_Main', $data);
        $this->load->view('Main/v_Footer');
    }

    public function add(){
        // Ambil data toko
        $data['toko'] = $this->M_toko->getToko();
        // Ambil data sales
        $data['sales'] = $this->M_user->getUserByLevel(4);

        $this->load->view('Main/v_Header');
        $this->load->view('Main/v_Sidebar');
        $this->load->view('Item_Penjualan/v_Add', $data);
        $this->load->view('Main/v_Footer');
    }
    
    public function addAction(){
        $data = array(
            "nota_id" => $this->input->post("nota_id"), 
            "roti_id" => $this->input->post("roti_id"), 
            "jml_titip" => $this->input->post("jml_titip"), 
            "jml_laku" => $this->input->post("jml_laku"),
            "harga" => $this->input->post("harga")
            );
        $this->M_item_penjualan->insertItemPenjualan($data);

        if($this->db->affected_rows()){
            redirect('Item_Penjualan');
        } else {
            redirect('Item_Penjualan/add');
        } 
    }

    public function edit($id){
        // Ambil data toko
        $data['roti'] = $this->M_roti->getRoti();
        // Ambil data toko
        // $data['toko'] = $this->M_toko->getToko();
        // Ambil data sales
        // $data['sales'] = $this->M_user->getUserByLevel(4);

        $data['item_penjualan'] = $this->M_item_penjualan->getItemPenjualanById($id);

        $this->load->view('Main/v_Header');
        $this->load->view('Main/v_Sidebar');
        $this->load->view('Item_Penjualan/v_Edit', $data);
        $this->load->view('Main/v_Footer');
    }

    public function editAction(){
        $id=$this->input->post("id");
        $data = array(
            "nota_id" => $this->input->post("nota_id"), 
            "roti_id" => $this->input->post("roti_id"), 
            "jml_titip" => $this->input->post("jml_titip"), 
            "jml_laku" => $this->input->post("jml_laku"),
            "harga" => $this->input->post("harga")
            );
        $this->M_item_penjualan->updateItemPenjualan($data, $id);

        $nota_id=$this->input->post("nota_id");
        if($this->db->affected_rows()){
            redirect('Item_Penjualan/byNotaID/'.$nota_id);
        } else {
            redirect('Item_Penjualan/Edit/'.$id);
        } 
    }


    public function delete($id){
        // Ambil id nota penjualan
        $item=$this->M_item_penjualan->getItemPenjualanById($id);

        $this->M_item_penjualan->deleteItemPenjualan($id);
        if($this->db->affected_rows()){
            redirect('Item_Penjualan/byNotaID/'.$item['nota_id']);
        } else{
            echo "Data gagal dihapus";
        }
    }


}?>