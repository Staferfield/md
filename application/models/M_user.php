<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class M_user extends CI_Model {

	function __construct()
	{
		parent::__construct();
		$this->load->database();
	}

    public function getUser()
	{
		$this->db->order_by('user.level', 'ASC');
		$query = $this->db->get('user');
		
		return $query->result_array();
	}

	public function getUserById($id)
	{
		$query = $this->db->get_where('user', array('id' => $id));
		return $query->row_array();
	}

	public function getUserByLevel($level)
	{
        $query = $this->db->get_where('user', array('level' => $level));
		return $query->result_array();
	}

	// TODO -> Improve
	public function getSalesPerformance()
	{
		$this->db->select('user.id,
		user.nama, 
		user.alamat, 
		IFNULL(count(nota_penitipan.id), 0) AS pengantaran,
		IFNULL(count(nota_penjualan.id), 0) AS pengambilan,
        (SELECT COUNT(id) FROM nota_penjualan)+(SELECT COUNT(id) FROM nota_penitipan) AS total
		', false);
		$this->db->from('user');
		$this->db->join('nota_penitipan','nota_penitipan.sales_id=user.id', 'left');
		$this->db->join('nota_penjualan','(nota_penjualan.sales_id=user.id AND nota_penitipan.id=nota_penjualan.titip_id) OR (nota_penitipan.sales_id=user.id AND nota_penjualan.sales_id!=user.id AND nota_penitipan.id=nota_penjualan.titip_id)', 'left');
		$this->db->where('level', 4);
		$this->db->group_by('user.nama');
		$this->db->order_by('user.id', 'ASC');

        $query = $this->db->get();
		return $query->result_array();
	}
	// TODO -> Improve
	public function getSalesPerformanceLastMonth()
	{
		$this->db->select('user.id,
		user.nama, 
		user.alamat, 
		IFNULL(count(nota_penitipan.id), 0) AS pengantaran,
		IFNULL(count(nota_penjualan.id), 0) AS pengambilan,
        (SELECT COUNT(id) FROM nota_penjualan WHERE YEAR(tanggal)=YEAR(CURRENT_DATE-INTERVAL 1 MONTH) AND MONTH(tanggal)=MONTH(CURRENT_DATE-INTERVAL 1 MONTH))
        +(SELECT COUNT(id) FROM nota_penitipan WHERE YEAR(tanggal)=YEAR(CURRENT_DATE-INTERVAL 1 MONTH) AND MONTH(tanggal)=MONTH(CURRENT_DATE-INTERVAL 1 MONTH)) AS total
		', false);
		$this->db->from('user');
		$this->db->join('nota_penitipan','nota_penitipan.sales_id=user.id AND YEAR(nota_penitipan.tanggal)=YEAR(CURRENT_DATE-INTERVAL 1 MONTH) AND MONTH(nota_penitipan.tanggal)=MONTH(CURRENT_DATE-INTERVAL 1 MONTH)', 'left');
		$this->db->join('nota_penjualan','(nota_penjualan.sales_id=user.id AND nota_penitipan.id=nota_penjualan.titip_id) OR (nota_penitipan.sales_id=user.id AND nota_penjualan.sales_id!=user.id AND nota_penitipan.id=nota_penjualan.titip_id)', 'left');
		$this->db->where('level', 4);
		$this->db->group_by('user.nama');
		$this->db->order_by('user.id', 'ASC');

        $query = $this->db->get();
		return $query->result_array();
	}

	public function getSalesPerformanceThirtyDay()
	{
		$this->db->select('
        user.id
        , user.nama
        , user.alamat
        , (SELECT COUNT(id) FROM nota_penitipan WHERE sales_id=user.id AND tanggal >= DATE_SUB(NOW(), INTERVAL 30 DAY)) AS pengantaran
        , (SELECT COUNT(id) FROM nota_penjualan WHERE sales_id=user.id AND tanggal >= DATE_SUB(NOW(), INTERVAL 30 DAY)) AS pengambilan
        , (SELECT COUNT(id) FROM nota_penjualan WHERE tanggal >= DATE_SUB(NOW(), INTERVAL 30 DAY))+(SELECT COUNT(id) FROM nota_penitipan WHERE tanggal >= DATE_SUB(NOW(), INTERVAL 30 DAY)) AS total
        , ifnull(sum(item_penitipan.jml_titip),0) AS jml_antar
		, (SELECT sum(jml_titip) FROM item_penitipan RIGHT JOIN nota_penitipan ON nota_penitipan.id=item_penitipan.nota_id WHERE tanggal >= DATE_SUB(NOW(), INTERVAL 30 DAY)) AS total_antar
		', false);
		$this->db->from('user');
		$this->db->join('nota_penitipan','nota_penitipan.sales_id=user.id AND nota_penitipan.tanggal >= DATE_SUB(NOW(), INTERVAL 30 DAY)', 'left');
		$this->db->join('item_penitipan','item_penitipan.nota_id=nota_penitipan.id AND nota_penitipan.sales_id=user.id', 'left');
		$this->db->where('level', 4);
		$this->db->group_by('user.id');
		$this->db->order_by('jml_antar', 'DESC');

        $query = $this->db->get();
		return $query->result_array();
	}

	public function insertUser($data)
	{
		$this->db->insert('user', $data);

		$insert_id = $this->db->insert_id();
		$result = $this->db->get_where('user', array('id' => $insert_id));
		return $result->row_array();
	}

	public function updateUser($data, $id)
	{
		$this->db->where('id', $id);
		$this->db->update('user', $data);

		$result = $this->db->get_where('user', array('id' => $id));
		return $result->row_array();
	}

	public function deleteUser($id)
	{
		$result = $this->db->get_where('user', array('id' => $id));

		$this->db->where('id', $id);
		$this->db->delete('user');

		return $result->row_array();
	}

	public function cekLoginUser($data)
	{
		$this->db->where($data);
		$result = $this->db->get('user');

		return $result->row_array();
	}

	public function cekUserExist($id)
	{
		$data = array(
            "id" => $id
        );

		$this->db->where($data);
		$result = $this->db->get('user');

		if(empty($result->row_array())){
			return false;
		}

		return true;
	}
}
?>