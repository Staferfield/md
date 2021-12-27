<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class M_login extends CI_Model {

	function __construct()
	{
		parent::__construct();
		$this->load->database();
	}

    public function getUserLogin($email, $password) {
        return $this->db->get_where('user', array('email' => $email, 'password' => $password));
    }
}
?>