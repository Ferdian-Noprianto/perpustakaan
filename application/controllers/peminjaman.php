<?php
class Peminjaman extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        $this->load->model('model_peminjaman');
    }
    public function index()
    {

        if (!isset($_SESSION["login"])) {
            redirect("login");
            exit;
        }

        $data['peminjaman'] = $this->model_peminjaman->tampil_data();

        $this->load->view('templates/header');
        $this->load->view('templates/sidebar_admin');
        $this->load->view('templates/topbar');
        $this->load->view('peminjaman/view_peminjaman', $data);
        $this->load->view('templates/footer');
    }

    public function detail($id)
    {
        if (!isset($_SESSION["login"])) {
            redirect("login");
            exit;
        }

        $data['detail'] = $this->model_peminjaman->detail_buku($id);

        $this->load->view('templates/header');
        $this->load->view('templates/sidebar_admin');
        $this->load->view('templates/topbar');
        $this->load->view('peminjaman/detail_peminjaman', $data);
        $this->load->view('templates/footer');
    }

    public function editbuku($id_peminjaman)
    {
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
}
