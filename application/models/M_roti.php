<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class M_roti extends CI_Model {

	function __construct()
	{
		parent::__construct();
		$this->load->database();
	}

    public function getRoti()
	{
        $query = $this->db->get('roti');
		return $query->result_array();
	}

	public function getRotiById($id)
	{
		$query = $this->db->get_where('roti', array('id' => $id));
		return $query->row_array();
	}

public function getRotiPerformance()
{
	$this->db->select('roti.id,
    roti.nama,
    roti.harga,
    sum(item_penjualan.jml_laku) AS jml_titip,
    sum(item_penjualan.jml_laku) AS jml_laku,
    sum(item_penjualan.jml_titip - item_penjualan.jml_laku) AS jml_retur,
    sum(item_penjualan.jml_laku * item_penjualan.harga) AS subtotal,
    ROUND(sum(item_penjualan.jml_laku)*100 / sum(item_penjualan.jml_titip)) AS performa', false);
	$this->db->from('roti');
	$this->db->join('item_penjualan','(item_penjualan.roti_id=roti.id)', 'left');
	$this->db->join('nota_penjualan','nota_penjualan.id=item_penjualan.nota_id', 'left');
	$this->db->group_by('roti.id');
	$this->db->order_by('roti.id', 'ASC');

	$query = $this->db->get();
	return $query->result_array();
}

public function getRotiPerformanceLastMonth()
{
	$this->db->select('roti.id,
    roti.nama,
    roti.harga,
    sum(item_penjualan.jml_laku) AS jml_titip,
    sum(item_penjualan.jml_laku) AS jml_laku,
    sum(item_penjualan.jml_titip - item_penjualan.jml_laku) AS jml_retur,
    sum(item_penjualan.jml_laku * item_penjualan.harga) AS subtotal,
    ROUND(sum(item_penjualan.jml_laku)*100 / sum(item_penjualan.jml_titip)) AS performa', false);
	$this->db->from('roti');
	$this->db->join('nota_penjualan','YEAR(nota_penjualan.tanggal)=YEAR(CURRENT_DATE-INTERVAL 1 MONTH) AND MONTH(nota_penjualan.tanggal)=MONTH(CURRENT_DATE-INTERVAL 1 MONTH)', 'left');
	$this->db->join('item_penjualan','(item_penjualan.nota_id=nota_penjualan.id AND item_penjualan.roti_id=roti.id)', 'left');
	$this->db->group_by('roti.id', 'year(tanggal)','month(tanggal)');
	$this->db->order_by('roti.id', 'ASC');

	$query = $this->db->get();
	return $query->result_array();
}

	public function insertRoti($data)
	{
		$this->db->insert('roti', $data);

		$insert_id = $this->db->insert_id();
		$result = $this->db->get_where('roti', array('id' => $insert_id));
		return $result->row_array();
	}

	public function updateRoti($data, $id)
	{
		$this->db->where('id', $id);
		$this->db->update('roti', $data);

		$result = $this->db->get_where('roti', array('id' => $id));
		return $result->row_array();
	}

	public function deleteRoti($id)
	{
		$result = $this->db->get_where('roti', array('id' => $id));

		$this->db->where('id', $id);
		$this->db->delete('roti');

		return $result->row_array();
	}

	public function cekRotiExist($id)
	{
		$data = array(
            "id" => $id
        );

		$this->db->where($data);
		$result = $this->db->get('roti');

		if(empty($result->row_array())){
			return false;
		}

		return true;
	}

}
?>