<?php
class User extends CI_Controller{
    function __construct(){
        parent::__construct();
        $this->load->model('M_user');
        
        // Redirect Login apabila belum
        if($this->session->userdata('login') != true){
            redirect('Login');

        }
        // Redirect untuk sales
        if($this->session->userdata('level') == 4){
            redirect('Dashboard');
        }
    }
    
    public function index() {
        $data['user'] = $this->M_user->getUser();
        $this->load->view('Main/v_Header');
        $this->load->view('Main/v_Sidebar');
        $this->load->view('User/v_Main', $data);
        $this->load->view('Main/v_Footer');
    }

    public function add(){
        $this->load->view('Main/v_Header');
        $this->load->view('Main/v_Sidebar');
        $this->load->view('User/v_Add');
        $this->load->view('Main/v_Footer');
    }

    public function edit($id){
        $data['user'] = $this->M_user->getUserById($id);
        $this->load->view('Main/v_Header');
        $this->load->view('Main/v_Sidebar');
        $this->load->view('User/v_Edit', $data);
        $this->load->view('Main/v_Footer');
    }
// Performa karyawan (keseluruhan)
    public function performa(){
        $data['performa'] = $this->M_user->getSalesPerformance();
        $data['perf_bulan'] = $this->M_user->getSalesPerformanceLastMonth();
        $this->load->view('Main/v_Header');
        $this->load->view('Main/v_Sidebar');
        $this->load->view('User/v_Performa', $data);
        $this->load->view('Main/v_Footer');
    }
    
    public function addAction(){
        $data = array(
            "email" => $this->input->post("email"), 
            "password" => md5($this->input->post("password")), 
            "nama" => $this->input->post("nama"), 
            "alamat" => $this->input->post("alamat"), 
            "no_hp" => $this->input->post("no_hp"), 
            "level" => $this->input->post("level")
            );
        $this->M_user->insertUser($data);

        if($this->db->affected_rows()){
            redirect('User');
        } else {
            redirect('User/add');
        } 
    }

    public function editAction(){
        $id=$this->input->post("id");
        $data = array(
            "email" => $this->input->post("email"), 
            "password" => md5($this->input->post("password")), 
            "nama" => $this->input->post("nama"), 
            "alamat" => $this->input->post("alamat"), 
            "no_hp" => $this->input->post("no_hp"), 
            "level" => $this->input->post("level")
            );
        $this->M_user->updateUser($data, $id);

        if($this->db->affected_rows()){
            redirect('User');
        } else {
            redirect('User/Edit/'.$id);
        } 
    }

    public function delete($id){
        $this->M_user->deleteUser($id);
        if($this->db->affected_rows()){
            redirect('User');
        } else{
            echo "Data gagal dihapus";
        }
    }


}?>