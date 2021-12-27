<?php
class Penjualan extends CI_Controller{
    function __construct(){
        parent::__construct();
        $this->load->model('M_penjualan');
        $this->load->model('M_penitipan');
        $this->load->model('M_item_penitipan');
        $this->load->model('M_item_penjualan');
        $this->load->model('M_toko');
        $this->load->model('M_user');
        
        // Redirect Login apabila belum
        if($this->session->userdata('login') != true){
            redirect('Login');

        }

    }
    
    public function index() {
        // Ambil data penitipan yang belum diambil
        $data['penitipan'] = $this->M_penitipan->GetPenitipanBelumTerambil();
        // Ambil data toko
        $data['toko'] = $this->M_toko->getToko();
        // Ambil data sales
        $data['sales'] = $this->M_user->getUserByLevel(4);

        $data['penjualan'] = $this->M_penjualan->getPenjualan();
        $this->load->view('Main/v_Header');
        $this->load->view('Main/v_Sidebar');
        $this->load->view('Penjualan/v_Main', $data);
        $this->load->view('Main/v_Footer');
    }


    public function add(){
        // Ambil data penitipan yang belum diambil
        $data['penitipan'] = $this->M_penitipan->GetPenitipanBelumTerambil();
        // Ambil data toko
        $data['toko'] = $this->M_toko->getToko();
        // Ambil data sales
        $data['sales'] = $this->M_user->getUserByLevel(4);

        $this->load->view('Main/v_Header');
        $this->load->view('Main/v_Sidebar');
        $this->load->view('Penjualan/v_Add', $data);
        $this->load->view('Main/v_Footer');
    }

    public function addAction(){
        // Pisah data titip_id dan toko_id
        $split = explode('|',$this->input->post("titip_id"));
        $titip_id=$split[0];
        $toko_id=$split[1];

        // Buat nota penjualan
        $data = array(
            "titip_id" => $titip_id, 
            "toko_id" => $toko_id, 
            "sales_id" => $this->input->post("sales_id"), 
            "tanggal" => date_format(new DateTime($this->input->post("tanggal")) ,"Y-m-d H:i:s")
        );
        $result=$this->M_penjualan->insertPenjualan($data);


       // Dapatkan data item penitipan dan masukkan data ke item penjualan
       $data_titip=$this->M_item_penitipan->getItemPenitipanByNotaID($titip_id);

       foreach ($data_titip as $item) {
           $data = array(
               "nota_id" => $result['id'],
               "roti_id" => $item['roti_id'], 
               "jml_titip" => $item['jml_titip']
           );
               $this->M_item_penjualan->insertItemPenjualan($data);
       }

        // Rubah status menjadi "terambil" untuk nota penitipan
        $update = array(
            "status" => 1
        );
        $this->M_penitipan->updatePenitipan($update, $titip_id);

        if($this->db->affected_rows()){
            redirect('Item_Penjualan/byNotaID/'.$result['id']);
        } else {
            redirect('Penjualan/add');
        } 
    }
    
    public function addQuick($titip_id){
        // Ambil data nota penitipan
        $penitipan = $this->M_penitipan->getPenitipanByID($titip_id);

        // Apabila yang buat sales, maka sales sebagai penulis nota jual, apabila tidak maka gunakan yang menitipkan roti
        if($this->session->userdata('level')==4){
            $sales_id = $this->session->userdata('id');
        } else {
            $sales_id = $penitipan['sales_id'];
        }
        // Dapatkan waktu dengan timezone GMT+7
        date_default_timezone_set("Asia/Jakarta");
        $datetime=date('Y-m-d H:i:s');

        // Buat nota penjualan
        $data = array(
            "titip_id" => $titip_id,
            "toko_id" => $penitipan['toko_id'], 
            "sales_id" => $sales_id, 
            "tanggal" => $datetime
        );
        $result=$this->M_penjualan->insertPenjualan($data);


       // Dapatkan data item penitipan dan masukkan data ke item penjualan
       $data_titip=$this->M_item_penitipan->getItemPenitipanByNotaID($titip_id);

       foreach ($data_titip as $item) {
           $data = array(
               "nota_id" => $result['id'],
               "roti_id" => $item['roti_id'], 
               "jml_titip" => $item['jml_titip']
           );
               $this->M_item_penjualan->insertItemPenjualan($data);
       }

        // Rubah status menjadi "terambil" untuk nota penitipan
        $update = array(
            "status" => 1
        );
        $this->M_penitipan->updatePenitipan($update, $titip_id);

        if($this->db->affected_rows()){
            redirect('Item_Penjualan/byNotaID/'.$result['id']);
        } else {
            redirect('Penjualan/add');
        } 
    }


    public function edit($id){
        $data['penjualan'] = $this->M_penjualan->getPenjualanById($id);
        $data['toko'] = $this->M_toko->getToko();
        // Ambil sales saja
        $data['sales'] = $this->M_user->getUserByLevel(4);

        $this->load->view('Main/v_Header');
        $this->load->view('Main/v_Sidebar');
        $this->load->view('Penjualan/v_Edit', $data);
        $this->load->view('Main/v_Footer');
    }

    public function editAction(){
        $id=$this->input->post("id");
        $data = array(
            "titip_id" => $this->input->post("titip_id"), 
            "toko_id" => $this->input->post("toko_id"),  
            "sales_id" => $this->input->post("sales_id"), 
            "tanggal" => date_format(new DateTime($this->input->post("tanggal")) ,"Y-m-d H:i:s") 
            );
        $this->M_penjualan->updatePenjualan($data, $id);

        if($this->db->affected_rows()){
            redirect('Penjualan');
        } else {
            redirect('Penjualan/Edit/'.$id);
        } 
    }


    public function delete($id){
        // Rubah status menjadi "blm terambil" untuk nota penitipan
        $titip_id=$this->M_penjualan->getPenjualanById($id);
        $update = array(
            "status" => 0
        );
        $this->M_penitipan->updatePenitipan($update, $titip_id['titip_id']);

        // Hapus nota penjualan
        $this->M_penjualan->deletePenjualan($id);
        if($this->db->affected_rows()){
            redirect('Penjualan');
        } else{
            echo "Data gagal dihapus";
        }
    }


}?>