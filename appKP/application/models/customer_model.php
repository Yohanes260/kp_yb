<?php
class customer_model extends CI_Model
{
	public function getBarang()
	{
		return $this->db->get('tbl_barang')->result_array();
	}

	public function cariDataBarang()
	{
		$cari = $this->input->post('cari', true);
		$this->db->like('namaBarang', $cari);
		$this->db->or_like('kodeBarang', $cari);
		return $this->db->get('tbl_barang')->result_array();
	}

	public function getDetailBarang($kodeBarang)
	{
		return $this->db->get_where('tbl_barang', ['kodeBarang' => $kodeBarang])->row_array();
	}

	public function getPeminjaman($kodePeminjaman)
	{
		return $this->db->get_where('tbl_transaksi', ['id_transaksi' => $kodePeminjaman])->row_array();
	}
}
