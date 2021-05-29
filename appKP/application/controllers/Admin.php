<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Admin extends CI_Controller
{

	public function __construct()
	{
		parent::__construct();
		check_logged_in();

		$this->load->model('admin_model');
		$this->load->model('customer_model');
		$this->load->model('pemesanan_model');
		$this->load->library('form_validation');
	}

	public function index()
	{
		$data['user'] = $this->db->get_where('tbl_user', ['username' => $this->session->userdata('username')])->row_array();
		$data['title'] = 'Halaman Admin';
		$data['admin'] = $this->admin_model->getBarang();

		if ($this->input->post('cari')) {
			//$data['keyword'] = $this->input->post('cari');
			$data['admin'] = $this->admin_model->cariDataBarang();
		} else {
			$data['keyword'] = null;
		}

		$this->load->view('templates/header', $data);
		$this->load->view('templates/topbar', $data);
		$this->load->view('admin/homeAdmin', $data);
		$this->load->view('templates/footer', $data);
	}

	public function laporan()
	{
		$data['user'] = $this->db->get_where('tbl_user', ['username' => $this->session->userdata('username')])->row_array();
		$data['title'] = 'Halaman Laporan';
		$data['laporan'] = $this->admin_model->getLaporan();
		$this->load->view('templates/header', $data);
		$this->load->view('templates/topbar', $data);
		$this->load->view('admin/laporan', $data);
		$this->load->view('templates/footer', $data);
	}

	public function tentangkami()
	{
		$data['title'] = 'Halaman Detail';
		$this->load->view('templates/header', $data);
		$this->load->view('templates/topbar', $data);
		$this->load->view('tentangkami', $data);
		$this->load->view('templates/footer', $data);
	}

	public function tambahBarang()
	{

		// $data['admin'] = $this->admin_model->getBarang();
		// $data['user'] = $this->db->get_where('tbl_barang', ['kodeBarang' => $this->session->userdata('kodeBarang')])->row_array();
		$data['title'] = 'Halaman Tambah Barang';
		$this->form_validation->set_rules('kodeBarang', 'Kode Barang', 'required|max_length[5]|is_unique[tbl_barang.kodeBarang]');
		$this->form_validation->set_rules('namaBarang', 'Nama Barang', 'required|is_unique[tbl_barang.namaBarang]');
		$this->form_validation->set_rules('gambarBarang', 'Gambar Barang');
		$this->form_validation->set_rules('deskripsi', 'Deskripsi', 'required');
		$this->form_validation->set_rules('stok', 'Stok Barang', 'required');

		if ($this->form_validation->run() ==  FALSE) {
			$this->load->view('templates/header', $data);
			$this->load->view('templates/topbar', $data);
			$this->load->view('admin/tambah', $data);
			$this->load->view('templates/footer', $data);
		} else {
			$this->admin_model->tambahDataBarang();
			$this->session->set_flashdata('flash', 'berhasil ditambahkan!');
			redirect('admin');
		}
	}

	public function hapus($kodeBarang)
	{
		$this->admin_model->hapusDataBarang($kodeBarang);
		$this->session->set_flashdata('flash', 'berhasil dihapus!');
		redirect('admin');
	}

	public function detail($kodeBarang)
	{
		$data['title'] = 'Detail Barang';
		$data['admin'] = $this->admin_model->getDetailBarang($kodeBarang);
		$this->load->view('templates/header', $data);
		$this->load->view('templates/topbar', $data);
		$this->load->view('admin/detail', $data);
		$this->load->view('templates/footer', $data);
	}

	public function ubah($kodeBarang)
	{
		// $data['admin'] = $this->admin_model->getBarang();
		// $data['user'] = $this->db->get_where('tbl_barang', ['kodeBarang' => $this->session->userdata('kodeBarang')])->row_array();
		$data['title'] = 'Halaman Ubah Barang';
		$data['admin'] = $this->admin_model->getDetailBarang($kodeBarang);
		$this->form_validation->set_rules('kodeBarang', 'Kode Barang', 'required|max_length[5]');
		$this->form_validation->set_rules('namaBarang', 'Nama Barang', 'required');
		$this->form_validation->set_rules('gambarBarang', 'Gambar Barang');
		$this->form_validation->set_rules('deskripsi', 'Deskripsi');
		$this->form_validation->set_rules('stok', 'Stok Barang', 'required');
		$this->form_validation->set_rules('hargaSewa/hari', 'Harga Sewa/hari', 'required');

		if ($this->form_validation->run() ==  FALSE) {
			$this->load->view('templates/header', $data);
			$this->load->view('templates/topbar', $data);
			$this->load->view('admin/ubah', $data);
			$this->load->view('templates/footer', $data);
		} else {
			$upload_image = $_FILES['gambarBarang']['name'];

			if ($upload_image) {
				$config['allowed_types'] = 'gif|jpg|png';
				$config['max_size'] = '2048';
				$config['upload_path'] = './assets/image/';

				$this->load->library('upload', $config);

				if ($this->upload->do_upload('gambarBarang')) {
					$old_image = $data['admin']['gambarBarang'];
					if ($old_image != 'default_barang.png') {
						unlink(FCPATH . 'assets/image/' . $old_image);
					}
					$new_image = $this->upload->data('file_name');
				} else {
					echo $this->upload->display_errors();
				}
			}
			$this->admin_model->ubahDataBarang($new_image);
			$this->session->set_flashdata('flash', 'berhasil diubah!');
			redirect('admin');
		}
	}

	public function editProfile()
	{
		$data['user'] = $this->db->get_where('tbl_user', ['username' => $this->session->userdata('username')])->row_array();
		$data['title'] = 'Edit Profile';

		$this->form_validation->set_rules('namaLengkap', 'Nama Lengkap', 'required|trim');
		$this->form_validation->set_rules('alamat', 'Alamat', 'required|trim');
		$this->form_validation->set_rules('nomortelepon', 'Nomor Telepon', 'required|trim');
		$this->form_validation->set_rules('jenisKelamin', 'Jenis Kelamin', 'required|trim');

		if ($this->form_validation->run() == false) {
			$this->load->view('templates/header', $data);
			$this->load->view('templates/topbar', $data);
			$this->load->view('admin/editprofile', $data);
			$this->load->view('templates/footer', $data);
		} else {
			$username = $this->input->post('username');
			$nama = $this->input->post('namaLengkap');
			$alamat = $this->input->post('alamat');
			$notelepon = $this->input->post('nomortelepon');
			$jenisKelamin = $this->input->post('jenisKelamin');

			$this->db->set('namaLengkap', $nama);
			$this->db->set('alamat', $alamat);
			$this->db->set('nomortelepon', $notelepon);
			$this->db->set('jenisKelamin', $jenisKelamin);

			$this->db->where('username', $username);
			$this->db->update('tbl_user');

			$this->session->set_flashdata('message', 'berhasil diubah!');
			redirect('admin');
		}
	}

	public function tampilPemesanan()
	{
		$data['title'] = 'Halaman List Pemesanan';
		$data['pemesanan'] = $this->pemesanan_model->getAllPemesanan();
		$this->load->view('templates/header', $data);
		$this->load->view('templates/topbar', $data);
		$this->load->view('admin/tampilPemesanan', $data);
		$this->load->view('templates/footer', $data);
	}
}
