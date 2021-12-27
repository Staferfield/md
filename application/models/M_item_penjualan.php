<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class M_item_penjualan extends CI_Model {

	function __construct()
	{
		parent::__construct();
		$this->load->database();
	}

    public function getItemPenjualan()
	{
		$this->db->select('item_penjualan.id AS id, nota_id, roti.id as roti_id, roti.nama AS roti_nama, jml_titip, jml_laku, jml_titip-jml_laku AS jml_retur, item_penjualan.harga, item_penjualan.harga * jml_laku AS subtotal', false);
		$this->db->from('item_penjualan');
		$this->db->join('nota_penjualan','item_penjualan.nota_id=nota_penjualan.id');
		$this->db->join('roti','item_penjualan.roti_id=roti.id'); 

        $query = $this->db->get();
		return $query->result_array();
	}

    public function getItemPenjualanByID($id)
	{
		$this->db->select('item_penjualan.id AS id, nota_id, roti.id as roti_id, roti.nama AS roti_nama, jml_titip, jml_laku, jml_titip-jml_laku AS jml_retur, item_penjualan.harga, item_penjualan.harga * jml_laku AS subtotal', false);
		$this->db->from('item_penjualan');
		$this->db->join('nota_penjualan','item_penjualan.nota_id=nota_penjualan.id');
		$this->db->join('roti','item_penjualan.roti_id=roti.id'); 
		$this->db->where('item_penjualan.id', $id);

        $query = $this->db->get();
		return $query->row_array();
	}

    public function getItemPenjualanByNotaID($nota_id)
	{
		$this->db->select('item_penjualan.id AS id, nota_id, roti.nama AS roti_nama, jml_titip, jml_laku, jml_titip-jml_laku AS jml_retur, item_penjualan.harga, item_penjualan.harga * jml_laku AS subtotal', false);
		$this->db->from('item_penjualan');
		$this->db->join('nota_penjualan','item_penjualan.nota_id=nota_penjualan.id');
		$this->db->join('roti','item_penjualan.roti_id=roti.id'); 
		$this->db->where('item_penjualan.nota_id', $nota_id);

        $query = $this->db->get();
		return $query->result_array();
	}

	public function insertItemPenjualan($data)
	{
		// Tambahkan item penjualan
		$this->db->insert('item_penjualan', $data);
		$insert_id = $this->db->insert_id();
		$result = $this->db->get_where('item_penjualan', array('id' => $insert_id));

		return $result->row_array();
	}


	public function insertItemPenjualanBatch($data)
	{
		// Tambahkan item penjualan
		$this->db->insert_batch('iten_penjualan', $data);

		return;
	}


	public function updateItemPenjualan($data, $id)
	{
		$this->db->where('id', $id);
		$this->db->update('item_penjualan', $data);

		$result = $this->db->get_where('item_penjualan', array('id' => $id));
		return $result->row_array();
	}

	public function deleteItemPenjualan($id)
	{
		$result = $this->db->get_where('item_penjualan', array('id' => $id));

		$this->db->where('id', $id);
		$this->db->delete('item_penjualan');

		return $result->row_array();
	}

	public function deleteItemPenjualanByNotaID($penjualan_id)
	{
		$result = $this->db->get_where('item_penjualan', array('penjualan_id' => $penjualan_id));

		$this->db->where('penjualan_id', $penjualan_id);
		$this->db->delete('item_penjualan');
		// Pakai result_array karena mungkin ada lebih dari 1
		return $result->result_array();
	}

}
?>