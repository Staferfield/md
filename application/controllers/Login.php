<?php
class Login extends CI_Controller{
    function __construct(){
        parent::__construct();
        $this->load->model('M_login');

        // Apabila sudah login, redirect ke dashboard
        if($this->session->userdata('login') == true){
            redirect('Dashboard');
		}
    }
    
    public function index() {
        $this->load->view('Main/v_Login');
    }

    public function loginAction() {
        $email = $this->input->post('email');
        $password = md5($this->input->post('password'));

        $user = $this->M_login->getUserLogin($email, $password)->num_rows();
        // TODO MD5 tidak aman, gunakan fitur password_hash() dan password_verify() 
        if ($user > 0) {
            $data = $this->M_login->getUserLogin($email, $password)->row_array();
            $data_session = array(
                'id' => $data['id'],
                'email' => $data['email'],
                'nama' => $data['nama'],
                'level' => $data['level'],
                'login' => true
            );
            $this->session->set_userdata($data_session);
            redirect('Dashboard');
        } else {
            redirect('Login');
        }
    }
}
?>