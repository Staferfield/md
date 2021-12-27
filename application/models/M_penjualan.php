<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class M_penjualan extends CI_Model {

	function __construct()
	{
		parent::__construct();
		$this->load->database();
	}

    public function getPenjualan()
	{
		$this->db->select('nota_penjualan.id, titip_id, toko.id AS toko_id, toko.nama AS toko_nama, user.id AS sales_id, user.nama AS sales_nama, tanggal');
		$this->db->from('nota_penjualan');
		$this->db->join('user','user.id = nota_penjualan.sales_id');
		$this->db->join('toko','toko.id=nota_penjualan.toko_id');

		$query = $this->db->get();
		return $query->result_array();
	}

    public function getPenjualanByID($id)
	{
		$this->db->select('nota_penjualan.id, titip_id, toko.id AS toko_id, toko.nama AS toko_nama, user.id AS sales_id, user.nama AS sales_nama, tanggal');
		$this->db->from('nota_penjualan');
		$this->db->join('user','user.id = nota_penjualan.sales_id');
		$this->db->join('toko','toko.id=nota_penjualan.toko_id');
		$this->db->where('nota_penjualan.id', $id);

		$query = $this->db->get();
		return $query->row_array();
	}

    public function getPenjualanBulanIni()
	{
		$this->db->select('nota_penjualan.id AS No Nota, toko.nama AS Nama Toko, user.nama AS Nama Sales, tanggal');
		$this->db->from('nota_penjualan');
		$this->db->join('user','user.id = nota_penjualan.sales_id');
		$this->db->join('toko','toko.id=nota_penjualan.toko_id');
		$this->db->where('year(tanggal)', date('Y'));
		$this->db->where('month(tanggal)', date('m'));

        $query = $this->db->get();
		return $query->result_array();
	}

	// Perjualan perbulan (Setahun terakhir)
	public function getPenjualanPerbulan()
	{
		$this->db->select('tanggal, year(tanggal) AS tahun, month(tanggal) AS bulan, tanggal, sum(jml_titip) AS jml_titip, sum(jml_laku) AS jml_laku, sum(jml_laku*harga) AS total', false);
		$this->db->from('nota_penjualan');
		$this->db->join('item_penjualan','item_penjualan.nota_id=nota_penjualan.id');
		$this->db->where('UNIX_TIMESTAMP(nota_penjualan.tanggal)>=UNIX_TIMESTAMP(CURRENT_DATE-INTERVAL 12 MONTH)');
		$this->db->group_by('year(tanggal)');
		$this->db->group_by('month(tanggal)');
		$this->db->order_by('year(tanggal)', 'ASC');
		$this->db->order_by('month(tanggal)', 'ASC');
		// $this->db->limit('12');
		
        $query = $this->db->get();
		return $query->result_array();
	}

	public function insertPenjualan($data)
	{
		$this->db->insert('nota_penjualan', $data);

		$insert_id = $this->db->insert_id();
		$result = $this->db->get_where('nota_penjualan', array('id' => $insert_id));
		return $result->row_array();
	}

	public function updatePenjualan($data, $id)
	{
		$this->db->where('id', $id);
		$this->db->update('nota_penjualan', $data);

		$result = $this->db->get_where('nota_penjualan', array('id' => $id));
		return $result->row_array();
	}

	public function deletePenjualan($id)
	{
		$result = $this->db->get_where('nota_penjualan', array('id' => $id));

		$this->db->where('id', $id);
		$this->db->delete('nota_penjualan');

		return $result->row_array();
	}

	public function cekPenjualanExist($id)
	{
		$data = array(
            "id" => $id
        );

		$this->db->where($data);
		$result = $this->db->get('nota_penjualan');

		if(empty($result->row_array())){
			return false;
		}

		return true;
	}

}
?>