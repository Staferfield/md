<?php
class Logout extends CI_Controller{
    function __construct(){
        parent::__construct();
        $this->load->model('M_login');

        // Kalau belum login, redirect ke login
        if($this->session->userdata('login') != true){
            redirect('Login');
		}
    }
    
    public function index() {
        // logout dan hapus session 
        $this->session->sess_destroy();
        redirect('Login');
    }

}
?>