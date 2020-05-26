<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Admin extends CI_Controller
{
	public function __construct()
	{
		parent::__construct();
		$this->load->model('model_admin');
	}
	public function index()
	{
		if (!isset($_SESSION["login"])) {
			redirect('login');
			exit;
		}

		$this->load->view('templates/header');
		$this->load->view('templates/sidebar_admin');
		$this->load->view('templates/topbar');
		$this->load->view('dashboard_admin/dashboard_admin');
		$this->load->view('templates/footer');
	}

	public function logout()
	{
		session_unset();
		session_destroy();
		redirect('login');
	}

	public function peminjaman()
	{

		if (!isset($_SESSION["login"])) {
			redirect('login');
			exit;
		}



		$this->form_validation->set_rules('nama', 'Nama', 'required');
		$this->form_validation->set_rules('nis', 'NIS', 'required|numeric');
		$this->form_validation->set_rules('kelas', 'Kelas', 'required');

		if ($this->form_validation->run() == false) {
			$data['invoice'] = $this->model_admin->get_invoice();

			$this->load->view('templates/header');
			$this->load->view('templates/sidebar_admin');
			$this->load->view('templates/topbar');
			$this->load->view('dashboard_admin/view_peminjaman', $data);
			$this->load->view('templates/footer');
		} else {
			$buku = $this->input->post('kode_buku');
			$jumlah = count($buku);

			for ($i = 0; $i < $jumlah; $i++) {
				if ($buku[$i] != '') {
					$kode = $this->db->get_where('peminjaman_detail', ['id_buku' => $buku[$i]])->result_array();
					if (!$kode) {
						$this->session->set_flashdata('flash', '<div class="alert alert-danger" role="alert">Kode Buku Salah</div>');
						redirect('admin/peminjaman');
						die;
					}
				}
			}
			if ($kode) {
				$this->model_admin->peminjaman();
				$this->session->set_flashdata('flash', 'ditambahkan');
				redirect('peminjaman');
			} else {
				$this->session->set_flashdata('flash', '<div class="alert alert-danger" role="alert">Masukkan kode buku</div>');
				redirect('admin/peminjaman');
			}
		}
	}

	public function perpanjangan()
	{
		if (!isset($_SESSION["login"])) {
			redirect('login');
			exit;
		}

		$this->form_validation->set_rules('nama', 'Nama', 'required');
		$this->form_validation->set_rules('nis', 'NIS', 'required|numeric');
		$this->form_validation->set_rules('kelas', 'Kelas', 'required');

		if ($this->form_validation->run() == false) {
			$data['perpanjang'] = $this->model_admin->get_data_buku();
			$data['buku'] = $this->model_admin->get_buku();

			$this->load->view('templates/header');
			$this->load->view('templates/sidebar_admin');
			$this->load->view('templates/topbar');
			$this->load->view('dashboard_admin/view_perpanjangan', $data);
			$this->load->view('templates/footer');
		} else {
			$this->model_admin->catat_perpanjangan();
			$this->session->set_flashdata('flash', 'diperpanjang');
			redirect('peminjaman');
		}
	}

	public function pengembalian()
	{
		if (!isset($_SESSION["login"])) {
			redirect('login');
			exit;
		}

		$this->form_validation->set_rules('nama', 'Nama', 'required');
		$this->form_validation->set_rules('nis', 'NIS', 'required|numeric');
		$this->form_validation->set_rules('kelas', 'Kelas', 'required');

		if ($this->form_validation->run() == false) {
			$data['pengembalian'] = $this->model_admin->get_data_buku();
			$data['buku'] = $this->model_admin->get_buku();

			$this->load->view('templates/header');
			$this->load->view('templates/sidebar_admin');
			$this->load->view('templates/topbar');
			$this->load->view('dashboard_admin/view_pengembalian', $data);
			$this->load->view('templates/footer');
		} else {
			$this->model_admin->catat_pengembalian();
			$this->session->set_flashdata('flash', 'dikembalikan');
			redirect('peminjaman');
		}
	}
}
