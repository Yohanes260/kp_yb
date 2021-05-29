<?php
class pemesanan_model extends CI_Model
{
	private $table = "tbl_transaksi";
	public function getAllPemesanan()
	{
		$sql = "SELECT * FROM tbl_transaksi as t JOIN tbl_user as u ON t.id_customer = u.id JOIN tbl_barang as b ON t.kode_barang = b.kodeBarang";
		return $this->db->query($sql)->result_array();
	}
	public function getPemesananByCustomer($id)
	{
		$sql = "SELECT * FROM tbl_transaksi as t JOIN tbl_user as u ON t.id_customer = u.id JOIN tbl_barang as b ON t.kode_barang = b.kodeBarang WHERE t.id_customer = $id";
		return $this->db->query($sql)->result_array();
	}

	public function tambahPemesanan($data)
	{
		return $this->db->insert($this->table, $data);
	}
}
