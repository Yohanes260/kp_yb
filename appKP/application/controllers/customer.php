<?php
defined('BASEPATH') or exit('No direct script access allowed');

class customer extends CI_Controller
{

	public function __construct()
	{
		parent::__construct();

		check_logged_in();
		$this->load->model('customer_model');
		$this->load->model('pemesanan_model');
		$this->load->library('form_validation');
	}

	public function index()
	{
		$data['user'] = $this->db->get_where('tbl_user', ['username' => $this->session->userdata('username')])->row_array();
		$data['title'] = 'Halaman Customer';
		$data['customer'] = $this->customer_model->getBarang();

		if ($this->input->post('cari')) {
			//$data['keyword'] = $this->input->post('cari');
			$data['customer'] = $this->customer_model->cariDataBarang();
		} else {
			$data['keyword'] = null;
		}

		$data['title'] = 'Halaman Login';
		$this->load->view('templates/header', $data);
		$this->load->view('templates/topbar2', $data);
		$this->load->view('user/homeUser', $data);
		$this->load->view('templates/footer', $data);
	}

	public function tentangkami()
	{
		$data['title'] = 'Halaman Detail';
		$this->load->view('templates/header', $data);
		$this->load->view('templates/topbar2', $data);
		$this->load->view('tentangkami', $data);
	}

	public function formsewa($kodeBarang)
	{
		$data['user'] = $this->db->get_where('tbl_user', ['username' => $this->session->userdata('username')])->row_array();
		$data['title'] = 'Halaman Sewa';
		$data['customer'] = $this->customer_model->getDetailBarang($kodeBarang);
		$this->load->view('templates/header', $data);
		$this->load->view('templates/topbar2', $data);
		$this->load->view('user/formsewa', $data);
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
			$this->load->view('templates/topbar2', $data);
			$this->load->view('user/edit', $data);
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
			redirect('customer');
		}
	}

	public function detail($kodeBarang)
	{
		$data['title'] = 'Detail Barang';
		$data['customer'] = $this->customer_model->getDetailBarang($kodeBarang);
		$this->load->view('templates/header', $data);
		$this->load->view('templates/topbar2', $data);
		$this->load->view('user/detail', $data);
	}

	public function tambah_pemesanan()
	{
		$data = [
			'id_customer' => $this->input->post('id_customer'),
			'kode_barang' => $this->input->post('kodeBarang'),
			'nama' => $this->input->post('nama'),
			'noHp' => $this->input->post('telepon'),
			'tanggalpinjam' => $this->input->post('tanggalpinjam'),
			'tanggalkembali' => $this->input->post('tanggalkembali'),
		];
		$this->pemesanan_model->tambahPemesanan($data);
	}
}
