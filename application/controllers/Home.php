<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Home extends CI_Controller {

	function __construct() {
		parent::__construct();
		
		$this->load->model('M_Master');
	}

	public function index()
	{
		if (!$this->session->userdata('user')) {
			$this->M_Master->warning('Silahkan login terlebih dahulu');
			redirect('login');
		}

        $select = "kegiatan.*, nama";
        $data['data'] = $this->M_Master->get_join('kegiatan', 'jenis_kegiatan', 'kegiatan' . '.jenis_id=jenis_kegiatan.id', $select)->result();

		$this->load->view('template/landing', $data);
	}

	public function event_detail($id = null)
	{
        if (!$id) redirect('/');

        if ($this->input->method(TRUE) == 'POST') {
			$kategori_peserta = $this->input->post('kategori_peserta');
			$alasan = $this->input->post('alasan');

			$this->M_Master->add('daftar', [
				'tanggal_daftar' => date('Y-m-d'),
				'alasan' => $alasan,
				'users_id' => $this->session->userdata('user')->id,
				'kegiatan_id' => $id,
				'kategori_peserta_id' => $kategori_peserta,
			]);

			$this->M_Master->success('Anda berhasil daftar');
			redirect('/');
		}

        $select = "kegiatan.*, nama";
		$data['kategori_peserta'] = $this->M_Master->get('kategori_peserta')->result();
        $data['detail'] = $this->M_Master->get_join('kegiatan', 'jenis_kegiatan', 'kegiatan' . '.jenis_id=jenis_kegiatan.id', $select)->row();

		$this->load->view('template/event_detail', $data);
	}

	public function login() {
        if ($this->input->method(TRUE) == 'POST') {
			$email = $this->input->post('email');
			$password = md5($this->input->post('password'));

			$where = [
				'email' => $email,
				'password' => $password,
			];

			$cek = $this->M_Master->get_id('users', $where)->row();

			if ($cek) {
				$this->session->set_userdata('user', $cek);
				$this->M_Master->success('Anda berhasil login');

				if ($cek->role === 'public') {
					redirect('/');
				} else {
					redirect('admin/jenis-kegiatan');
				}
			} else {
				$this->M_Master->warning('Email atau password salah');
				redirect('login');
			}
        }

		$this->load->view('template/login');
	}

	public function register()
	{
        if ($this->input->method(TRUE) == 'POST') {
			$username = $this->input->post('username');
			$email = $this->input->post('email');
			$password = md5($this->input->post('password'));

			$where = "username = '$username' or email = '$email'";

			$cek = $this->M_Master->get_id('users', $where)->row();

			if (!$cek) {
                $add = $this->M_Master->add('users', [
					'username' => $username,
					'email' => $email,
					'password' => $password,
					'status' => 1,
					'created_at' => date('Y-m-d H:i:s'),
					'role' => 'public',
				]);
				$this->M_Master->success('Anda berhasil register');
				redirect('login');
			} else {
				$this->M_Master->warning('Username atau email sudah terdaftar');
				redirect('register');
			}
        }

		$this->load->view('template/register');
	}

	public function logout()
	{
		$this->session->sess_destroy();
		redirect('login');
	}

}