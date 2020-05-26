<?php
class Login extends Ci_Controller
{

    public function index()
    {
        if (isset($_SESSION["login"])) {
            redirect('admin');
            exit;
        }
        $this->form_validation->set_rules('name', 'Username', 'trim|required');
        $this->form_validation->set_rules('password', 'Password', 'trim|required');
        if ($this->form_validation->run() == false) {
            $this->load->view('view_login');
        } else {
            $this->_login();
        }
    }

    private function _login()
    {
        $name = $this->input->post('name');
        $password = $this->input->post('password');

        $admin = $this->db->get_where('admin', ['name' => $name])->row_array();

        if ($admin) {
            if ($password == $admin['password']) {
                $data = ['name' => $admin['name']];
                $this->session->set_userdata($data);
                $_SESSION['login'] = true;
                redirect('admin');
            } else {
                $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">Password anda salah</div>');
                redirect('login');
            }
        } else {
            $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">Username tidak terdaftar</div>');
            redirect('login');
        }
    }
}
