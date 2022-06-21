<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class M_item_penitipan extends CI_Model {

	function __construct()
	{
		parent::__construct();
		$this->load->database();
	}

    public function getItemPenitipan()
	{
		$this->db->select('item_penitipan.id AS id, nota_id, roti.id AS roti_id, roti.nama AS roti_nama, jml_titip');
		$this->db->from('item_penitipan');
		$this->db->join('nota_penitipan','item_penitipan.nota_id=nota_penitipan.id', 'left');
		$this->db->join('roti','item_penitipan.roti_id=roti.id', 'left');
        $query = $this->db->get();
		return $query->result_array();
	}

    public function getItemPenitipanByID($id)
	{
		$this->db->select('item_penitipan.id AS id, nota_id, roti.id AS roti_id, roti.nama AS roti_nama, jml_titip');
		$this->db->from('item_penitipan');
		$this->db->join('nota_penitipan','item_penitipan.nota_id=nota_penitipan.id', 'left');
		$this->db->join('roti','item_penitipan.roti_id=roti.id', 'left');
		$this->db->where('item_penitipan.id', $id);

        $query = $this->db->get();
		return $query->row_array();
	}

    public function getItemPenitipanByNotaID($nota_id)
	{
		$query = $this->db->select('item_penitipan.id AS id, nota_id, roti.id AS roti_id, roti.nama AS roti_nama, jml_titip')
		->from('item_penitipan')
	    ->join('nota_penitipan','item_penitipan.nota_id=nota_penitipan.id', 'left')
		->join('roti','item_penitipan.roti_id=roti.id', 'left')
		->where('item_penitipan.nota_id', $nota_id);

		

        $query->where('is_active',true);
		return $query->result_array();
	}

	public function insertItemPenitipan($data)
	{
		// Tambahkan item penitipan
		$this->db->insert('item_penitipan', $data);
		$insert_id = $this->db->insert_id();

		$result = $this->db->get_where('item_penitipan', array('id' => $insert_id));
		return $result->row_array();
	}

	public function updateItemPenitipan($data, $id)
	{
		$this->db->where('id', $id);
		$this->db->update('item_penitipan', $data);

		$result = $this->db->get_where('item_penitipan', array('id' => $id));
		return $result->row_array();
	}

	public function deleteItemPenitipan($id)
	{
		$result = $this->db->get_where('item_penitipan', array('id' => $id));

		$this->db->where('id', $id);
		$this->db->delete('item_penitipan');

		return $result->row_array();
	}

	public function deleteItemPenitipanByPenitipanId($penitipan_id)
	{
		$result = $this->db->get_where('item_penitipan', array('penitipan_id' => $penitipan_id));

		$this->db->where('penitipan_id', $penitipan_id);
		$this->db->delete('item_penitipan');
		// Pakai result_array karena mungkin ada lebih dari 1
		return $result->result_array();
	}

}
?>