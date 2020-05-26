<?php
class Buku extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        $this->load->model('model_buku');
    }
    public function index()
    {

        if (!isset($_SESSION["login"])) {
            redirect("login");
            exit;
        }

        $data['buku'] = $this->model_buku->tampil_data();

        $this->load->view('templates/header');
        $this->load->view('templates/sidebar_admin');
        $this->load->view('templates/topbar');
        $this->load->view('buku/view_buku', $data);
        $this->load->view('templates/footer');
    }

    public function tambah_buku()
    {
        if (!isset($_SESSION["login"])) {
            redirect("login");
            exit;
        }
        $this->form_validation->set_rules('judul', 'Judul Buku', 'required');
        $this->form_validation->set_rules('id', 'Kode Buku', 'required');
        $this->form_validation->set_rules('rak', 'Rak Buku', 'required');
        $this->form_validation->set_rules('penulis', 'Penulis', 'required');
        $this->form_validation->set_rules('penerbit', 'Penerbit', 'required');
        $this->form_validation->set_rules('jumlah', 'Jumlah', 'required|numeric');

        if ($this->form_validation->run() == false) {
            $this->load->view('templates/header');
            $this->load->view('templates/sidebar_admin');
            $this->load->view('templates/topbar');
            $this->load->view('buku/tambah');
            $this->load->view('templates/footer');
        } else {
            $this->model_buku->tambah_data();
            $this->session->set_flashdata('flash', 'ditambahkan');
            redirect('buku');
        }
    }

    public function hapus($id)
    {
        if (!isset($_SESSION["login"])) {
            redirect("login");
            exit;
        }
        $this->model_buku->hapus_data($id);
        $this->session->set_flashdata('flash', 'Dihapus');
        redirect('buku');
    }

    public function ubah($id)
    {
        if (!isset($_SESSION["login"])) {
            redirect("login");
            exit;
        }
        $data['buku'] = $this->model_buku->getbukuid($id);

        $this->form_validation->set_rules('judul', 'Judul Buku', 'required');
        $this->form_validation->set_rules('id', 'Kode Buku', 'required');
        $this->form_validation->set_rules('rak', 'Rak Buku', 'required');
        $this->form_validation->set_rules('penulis', 'Penulis', 'required');
        $this->form_validation->set_rules('penerbit', 'Penerbit', 'required');
        $this->form_validation->set_rules('jumlah', 'Jumlah', 'required|numeric');

        if ($this->form_validation->run() == false) {
            $this->load->view('templates/header');
            $this->load->view('templates/sidebar_admin');
            $this->load->view('templates/topbar');
            $this->load->view('buku/ubah', $data);
            $this->load->view('templates/footer');
        } else {
            $this->model_buku->ubah_data();
            $this->session->set_flashdata('flash', 'diubah');
            redirect('buku');
        }
    }
}
