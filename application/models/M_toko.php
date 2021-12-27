<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class M_toko extends CI_Model {

	function __construct()
	{
		parent::__construct();
		$this->load->database();
	}

    public function getToko()
	{
        $query = $this->db->get('toko');
		return $query->result_array();
	}

	public function getTokoById($id)
	{
		$query = $this->db->get_where('toko', array('id' => $id));
		return $query->row_array();
	}

	public function getTokoPerformance()
		{
			$this->db->select('nama,
			alamat,
			IFNULL(sum(item_penjualan.jml_titip), 0) AS jml_titip,
			IFNULL(sum(item_penjualan.jml_laku), 0) AS jml_laku,
			IFNULL(sum(item_penjualan.jml_titip - item_penjualan.jml_laku), 0) AS jml_retur,
			ROUND(IFNULL(sum(item_penjualan.jml_laku) / sum(item_penjualan.jml_titip), 0) *100) AS performa', false);
			$this->db->from('toko');
			$this->db->join('nota_penjualan','nota_penjualan.toko_id=toko.id', 'left');
			$this->db->join('item_penjualan','(item_penjualan.nota_id=nota_penjualan.id)', 'left');
			$this->db->group_by('toko.nama');
			$this->db->order_by('toko.id', 'ASC');
	
			$query = $this->db->get();
			return $query->result_array();
		}

		public function getTokoPerformanceLastMonth()
		{
			$this->db->select('nama,
			alamat,
			IFNULL(sum(item_penjualan.jml_titip), 0) AS jml_titip,
			IFNULL(sum(item_penjualan.jml_laku), 0) AS jml_laku,
			IFNULL(sum(item_penjualan.jml_titip - item_penjualan.jml_laku), 0) AS jml_retur,
			ROUND(IFNULL(sum(item_penjualan.jml_laku) / sum(item_penjualan.jml_titip), 0) *100) AS performa', false);
			$this->db->from('toko');
			$this->db->join('nota_penjualan','nota_penjualan.toko_id=toko.id AND YEAR(nota_penjualan.tanggal)=YEAR(CURRENT_DATE-INTERVAL 1 MONTH) AND MONTH(nota_penjualan.tanggal)=MONTH(CURRENT_DATE-INTERVAL 1 MONTH)', 'left');
			$this->db->join('item_penjualan','(item_penjualan.nota_id=nota_penjualan.id)', 'left');
			$this->db->group_by('toko.nama');
			$this->db->order_by('toko.id', 'ASC');
	
			$query = $this->db->get();
			return $query->result_array();
		}

	public function insertToko($data)
	{
		$this->db->insert('toko', $data);

		$insert_id = $this->db->insert_id();
		$result = $this->db->get_where('toko', array('id' => $insert_id));
		return $result->row_array();
	}

	public function updateToko($data, $id)
	{
		$this->db->where('id', $id);
		$this->db->update('toko', $data);

		$result = $this->db->get_where('toko', array('id' => $id));
		return $result->row_array();
	}

	public function deleteToko($id)
	{
		$result = $this->db->get_where('toko', array('id' => $id));

		$this->db->where('id', $id);
		$this->db->delete('toko');

		return $result->row_array();
	}

    public function getJadwalPengambilan()
	{
		$this->db->select('toko.id as toko_id, toko.nama AS toko_nama, user.nama AS sales_nama, toko.alamat as toko_alamat, nota_penitipan.id AS titip_id, tanggal AS tanggal_titip, DATE_ADD(tanggal , INTERVAL 7 DAY) AS tanggal_ambil, DATEDIFF(DATE_ADD(tanggal , INTERVAL 7 DAY), DATE(NOW())) AS status', false);
		$this->db->from('toko');
		$this->db->join('nota_penitipan','nota_penitipan.toko_id=toko.id', 'left');
		$this->db->join('user','user.id=nota_penitipan.sales_id', 'left');
		$this->db->where('status', 0);
		$this->db->order_by('status', 'ASC');

        $query = $this->db->get();
		return $query->result_array();
	}

    public function getJadwalPengambilanBySalesID($id)
	{
		$this->db->select('toko.id as toko_id, toko.nama AS toko_nama, user.nama AS sales_nama, toko.alamat as toko_alamat, nota_penitipan.id AS titip_id, tanggal AS tanggal_titip, DATE_ADD(tanggal , INTERVAL 7 DAY) AS tanggal_ambil, DATEDIFF(DATE_ADD(tanggal , INTERVAL 7 DAY), DATE(NOW())) AS status', false);
		$this->db->from('toko');
		$this->db->join('nota_penitipan','nota_penitipan.toko_id=toko.id', 'left');
		$this->db->join('user','user.id=nota_penitipan.sales_id', 'left');
		$this->db->where('status', 0);
		$this->db->where('sales_id', $id);
		$this->db->order_by('status', 'ASC');

        $query = $this->db->get();
		return $query->result_array();
	}


	public function cekTokoExist($id)
	{
		$data = array(
            "id" => $id
        );

		$this->db->where($data);
		$result = $this->db->get('toko');

		if(empty($result->row_array())){
			return false;
		}

		return true;
	}

}
?>