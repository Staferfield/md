<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class M_penitipan extends CI_Model {

	function __construct()
	{
		parent::__construct();
		$this->load->database();
	}

    // public function getPenitipan()
	// {
	// 	$this->db->select('nota_penitipan.id, nota_penitipan.toko_id, toko.nama AS toko_nama, nota_penitipan.sales_id, user.nama AS sales_nama, tanggal, status');
	// 	$this->db->from('nota_penitipan');
	// 	$this->db->join('user','user.id = nota_penitipan.sales_id');
	// 	$this->db->join('toko','toko.id=nota_penitipan.toko_id');

    //     $query = $this->db->get();
	// 	return $query->result_array();
	// }

    public function getPenitipan()
	{
		$this->db->select('nota_penitipan.id AS id, 
		toko.nama AS toko_nama, 
		user.nama AS sales_nama, 
		nota_penitipan.tanggal, 
		status, 
		nota_penjualan.titip_id AS jual_id');
		$this->db->from('nota_penitipan');
		$this->db->join('user','user.id = nota_penitipan.sales_id', 'left');
		$this->db->join('toko','toko.id=nota_penitipan.toko_id', 'left');
		$this->db->join('nota_penjualan','nota_penjualan.titip_id=nota_penitipan.id', 'left');
		$this->db->order_by('tanggal','DESC');

        $query = $this->db->get();
		return $query->result_array();
	}


	public function getPenitipanBelumTerambil()
	{
		$this->db->select('nota_penitipan.id, nota_penitipan.toko_id, toko.nama AS toko_nama, nota_penitipan.sales_id, user.nama AS sales_nama, tanggal, status');
		$this->db->from('nota_penitipan');
		$this->db->join('user','user.id = nota_penitipan.sales_id');
		$this->db->join('toko','toko.id=nota_penitipan.toko_id');
		$this->db->where('status','0');
        $query = $this->db->get();
		return $query->result_array();
	}

    public function getPenitipanByID($id)
	{
		$this->db->select('nota_penitipan.id, nota_penitipan.toko_id, toko.nama AS toko_nama, nota_penitipan.sales_id, user.nama AS sales_nama, tanggal, status');
		$this->db->from('nota_penitipan');
		$this->db->join('user','user.id = nota_penitipan.sales_id');
		$this->db->join('toko','toko.id=nota_penitipan.toko_id');
		$this->db->where('nota_penitipan.id', $id);

        $query = $this->db->get();
		return $query->row_array();
	}

	public function insertPenitipan($data)
	{
		$this->db->insert('nota_penitipan', $data);
		$insert_id = $this->db->insert_id();

		$result = $this->db->get_where('nota_penitipan', array('id' => $insert_id));
		return $result->row_array();
	}

	public function updatePenitipan($data, $id)
	{
		$this->db->where('id', $id);
		$this->db->update('nota_penitipan', $data);

		$result = $this->db->get_where('nota_penitipan', array('id' => $id));
		return $result->row_array();
	}


	
	public function deletePenitipan($id)
	{
		$result = $this->db->get_where('nota_penitipan', array('id' => $id));

		$this->db->where('id', $id);
		$this->db->delete('nota_penitipan');

		return $result->row_array();
	}

    public function getPenitipanBulanIni()
	{
		$this->db->select('nota_penitipan.id AS No Nota, toko.nama AS Nama Toko, user.nama AS Nama Sales, tanggal, status AS Sudah');
		$this->db->from('nota_penitipan');
		$this->db->join('user','user.id = nota_penitipan.sales_id');
		$this->db->join('toko','toko.id=nota_penitipan.toko_id');
		$this->db->where('month(tanggal)', date('m'));
		$this->db->where('year(tanggal)', date('Y'));

        $query = $this->db->get();
		return $query->result_array();
	}

	public function cekPenitipanExist($id)
	{
		$data = array(
            "id" => $id
        );

		$this->db->where($data);
		$result = $this->db->get('nota_penitipan');

		if(empty($result->row_array())){
			return false;
		}

		return true;
	}

}
?>