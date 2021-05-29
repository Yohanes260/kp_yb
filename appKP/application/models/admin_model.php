<?php
class admin_model extends CI_Model
{
	public function getBarang()
	{
		return $this->db->get('tbl_barang')->result_array();
	}

	public function tambahDataBarang()
	{
		$data = [
			"kodeBarang" => $this->input->post('kodeBarang'),
			"namaBarang" => $this->input->post('namaBarang'),
			"gambarBarang" => $this->input->post('gambarBarang'),
			"deskripsi" => $this->input->post('deskripsi'),
			"stok" => $this->input->post('stok')
		];

		$this->db->insert('tbl_barang', $data);
	}

	public function hapusDataBarang($kodeBarang)
	{
		//$this->db->where('kodeBarang', $kodeBarang);
		$this->db->delete('tbl_barang', ['kodeBarang' => $kodeBarang]);
	}

	public function getDetailBarang($kodeBarang)
	{
		return $this->db->get_where('tbl_barang', ['kodeBarang' => $kodeBarang])->row_array();
	}

	public function ubahDataBarang($new_image)
	{
		$data = [
			"kodeBarang" => $this->input->post('kodeBarang'),
			"namaBarang" => $this->input->post('namaBarang'),
			"gambarBarang" => $new_image,
			"deskripsi" => $this->input->post('deskripsi'),
			"stok" => $this->input->post('stok'),
			"hargaSewa/hari" => $this->input->post('hargaSewa/hari')
		];

		$this->db->where('kodeBarang', $this->input->post('kodeBarang'));
		$this->db->update('tbl_barang', $data);
	}

	public function cariDataBarang()
	{
		$cari = $this->input->post('cari', true);
		$this->db->like('namaBarang', $cari);
		$this->db->or_like('kodeBarang', $cari);
		return $this->db->get('tbl_barang')->result_array();
	}

	public function getLaporan()
	{
		$sql = "SELECT * FROM tbl_transaksi as t JOIN tbl_user as u ON t.id_customer = u.id JOIN tbl_barang as b ON t.kode_barang = b.kodeBarang";
		return $this->db->query($sql)->result_array();
	}
}
