<?php
class Item_Penitipan extends CI_Controller{
    function __construct(){
        parent::__construct();
        $this->load->model('M_penitipan');
        $this->load->model('M_item_penitipan');
        $this->load->model('M_roti');
        
        // Redirect Login apabila belum
        if($this->session->userdata('login') != true){
            redirect('Login');

        }
    }
    
    public function index() {
        redirect('Penitipan');
    }

    public function byNotaID($nota_id) {
        $data['nota'] = $this->M_penitipan->getPenitipanById($nota_id);
        $data['roti'] = $this->M_roti->getRoti();
        $data['item_penitipan'] = $this->M_item_penitipan->getItemPenitipanByNotaID($nota_id);

        $this->load->view('Main/v_Header');
        $this->load->view('Main/v_Sidebar');
        $this->load->view('Item_Penitipan/v_Main', $data);
        $this->load->view('Main/v_Footer');
    }

    public function add(){
        $this->load->view('Main/v_Header');
        $this->load->view('Main/v_Sidebar');
        $this->load->view('Item_Penitipan/v_Add');
        $this->load->view('Main/v_Footer');
    }
    
    public function addAction($nota_id){
        $data = array(
            "nota_id" => $nota_id, 
            "roti_id" => $this->input->post("roti_id"), 
            "jml_titip" => $this->input->post("jml_titip") 
            );
        $this->M_item_penitipan->insertItemPenitipan($data);

        if($this->db->affected_rows()){
            redirect('Item_Penitipan/byNotaID/'.$nota_id);
        } else {
            redirect('Item_Penitipan/byNotaID/'.$nota_id);
        } 
    }

    public function addBatchAction($nota_id){
//         <tr>
// <td><input type="text" name="Name[0]" value=""></td>
// <td><input type="text" name="Address[0]"  value=""><br></td>
// <td><input type="text" name="Age[0]" value=""></td>
// <td><input type="text" name="Email[0]" value=""></td>
// </tr>
        // $data =array();
        // for($i=0; $i<$count; $i++) {
        // $data[$i] = array(
        //            'name' => $name[$i], 
        //            'address' => $address[$i],
        //            'age' => $age[$i],
        //            'email' => $email[$i],
        //            );
        // }
        // $this->db->insert_batch('item_penitipan', $data);

    //     <tr>
    //     <td><input type="text" name="user[0][name]" value=""></td>
    //     <td><input type="text" name="user[0][address]" value=""><br></td>
    //     <td><input type="text" name="user[0][age]" value=""></td>
    //     <td><input type="text" name="user[0][email]" value=""></td>
    // </tr>

        // foreach($_POST['user'] as $data)
        // {
        //     $this->M_item_penitipan->insertItemPenitipan($data);
        // }

        if($this->db->affected_rows()){
            redirect('Item_Penitipan/byNotaID/'.$nota_id);
        } else {
            redirect('Item_Penitipan');
        } 
    }

    public function edit($id){
        // Ambil list roti
        $data['roti'] = $this->M_roti->getRoti();
        $data['item_penitipan'] = $this->M_item_penitipan->getItemPenitipanByID($id);

        $this->load->view('Main/v_Header');
        $this->load->view('Main/v_Sidebar');
        $this->load->view('Item_Penitipan/v_Edit', $data);
        $this->load->view('Main/v_Footer');
    }

    public function editAction(){
        $id=$this->input->post("id");
        $data = array(
            "nota_id" => $this->input->post("nota_id"), 
            "roti_id" => $this->input->post("roti_id"), 
            "jml_titip" => $this->input->post("jml_titip") 
            );
        $this->M_item_penitipan->updateItemPenitipan($data, $id);

        if($this->db->affected_rows()){
            redirect('Item_Penitipan/byNotaID/'.$data['nota_id']);
        } else {
            redirect('Item_Penitipan/Edit/'.$id);
        } 
    }


    public function delete($nota_id, $id){
        $this->M_item_penitipan->deleteItemPenitipan($id);
        if($this->db->affected_rows()){
            redirect('Item_Penitipan/byNotaID/'.$nota_id);
        } else{
            echo "Data gagal dihapus";
        }
    }


}?>