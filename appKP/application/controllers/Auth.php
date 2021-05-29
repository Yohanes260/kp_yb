<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Auth extends CI_Controller
{

	public function __construct()
	{
		parent::__construct();
		$this->load->library('form_validation');
	}
	public function index()
	{
		$this->form_validation->set_rules('username', 'Username', 'trim|required');
		$this->form_validation->set_rules('password', 'Password', 'trim|required');

		if ($this->form_validation->run() == false) {
			$data['title'] = 'Halaman Login';
			$this->load->view('templates/header', $data);
			$this->load->view('auth/login', $data);
		} else {
			$this->login();
		}
	}

	private function  login()
	{
		$username = $this->input->post('username');
		$password = $this->input->post('password');

		$user = $this->db->get_where('tbl_user', ['username' => $username])->row_array();

		if ($user) {
			if (password_verify($password, $user['password'])) {
				$data = [
					'username' => $user['username'],
					'kode_role' => $user['kode_role']
				];
				$this->session->set_userdata($data);

				if ($user['kode_role'] == 1) {
					redirect('admin');
				} elseif ($user['kode_role'] == 2) {
					redirect('customer');
				}
			} else {
				$this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">Password salah!</div>');
				redirect('auth');
			}
		} else {
			$this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">Username tidak terdaftar!</div>');
			redirect('auth');
		}
	}

	public function register()
	{
		$this->form_validation->set_rules('username', 'Username', 'required|trim|is_unique[tbl_user.username]', [
			'required' => 'Username tidak boleh kosong',
			'is_unique' => 'Username sudah ada'
		]);

		$this->form_validation->set_rules('password', 'Password', 'required|trim', ['required' => 'Password tidak boleh kosong']);

		$this->form_validation->set_rules('nama', 'Nama', 'required|trim', ['required' => 'Nama tidak boleh kosong']);

		$this->form_validation->set_rules('alamat', 'Alamat', 'required|trim', ['required' => 'Alamat tidak boleh kosong']);

		$this->form_validation->set_rules('jk', 'JenisKelamin', 'required|trim', ['required' => 'Jenis Kelamin tidak boleh kosong']);

		$this->form_validation->set_rules('notelepon', 'noTelepoon', 'required|trim', ['required' => 'Nomor Telepon tidak boleh kosong']);

		if ($this->form_validation->run() == false) {
			$data['title'] = 'Daftar Akun';
			$this->load->view('templates/header', $data);
			$this->load->view('auth/register', $data);
		} else {
			$password = $this->input->post('password');
			$data = [
				'username' => $this->input->post('username', true),
				'password' => password_hash($password, PASSWORD_DEFAULT),
				'namaLengkap' => $this->input->post('nama'),
				'alamat' => $this->input->post('alamat'),
				'jeniskelamin' => $this->input->post('jk'),
				'nomortelepon' => $this->input->post('notelepon'),
				'kode_role' => 2
			];

			$this->db->insert('tbl_user', $data);
			$this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Akun anda telah dibuat. Silahkan Login!</div>');
			redirect('auth');
		}
	}

	public function logout()
	{
		$this->session->unset_userdata('username');
		$this->session->unset_userdata('role_id');

		$this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Anda telah Log Out!</div>');
		redirect('auth');
	}
}
