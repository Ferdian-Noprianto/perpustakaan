<?php

class Model_buku extends CI_Model
{
    public function tampil_data()
    {
        $this->db->select('*');
        $this->db->from('buku');
        $this->db->order_by('judul', 'asc');
        $query = $this->db->get()->result_array();
        return $query;
    }

    public function tambah_data()
    {
        $data = [
            "id"        => $this->input->post('id', true),
            "judul"     => $this->input->post('judul', true),
            "penulis"   => $this->input->post('penulis', true),
            "penerbit"  => $this->input->post('penerbit', true),
            "rak"       => $this->input->post('rak', true),
            "jumlah"    => $this->input->post('jumlah', true)
        ];
        $this->db->insert('buku', $data);
    }

    public function hapus_data($id)
    {
        $this->db->where('id', $id);
        $this->db->delete('buku');
    }

    public function getbukuid($id)
    {
        return $this->db->get_where('buku', ['id' => $id])->row_array();
    }

    public function ubah_data()
    {
        $data = [
            "id"        => $this->input->post('id', true),
            "judul"     => $this->input->post('judul', true),
            "penulis"   => $this->input->post('penulis', true),
            "penerbit"  => $this->input->post('penerbit', true),
            "rak"       => $this->input->post('rak', true),
            "jumlah"    => $this->input->post('jumlah', true)
        ];
        $this->db->where('id', $this->input->post('id'));
        $this->db->update('buku', $data);
    }
}
