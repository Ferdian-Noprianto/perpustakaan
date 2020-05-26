<?php

class Model_peminjaman extends CI_Model
{
    public function tampil_data()
    {
        $this->db->select('peminjaman.id, peminjaman.nama, peminjaman.nis, peminjaman.kelas, peminjaman.tgl_pinjam, peminjaman.tgl_kembali, status.status');
        $this->db->from('peminjaman');
        $this->db->join('status', 'peminjaman.status = status.id');
        $this->db->order_by('peminjaman.id', 'DESC');
        $query = $this->db->get()->result_array();
        return $query;
    }

    public function detail_buku($id)
    {
        $this->db->select('buku.id, buku.judul, buku.rak, buku.penulis, buku.penerbit, peminjaman_detail.id_peminjaman, peminjaman_detail.id as detail_id');
        $this->db->from('peminjaman_detail');
        $this->db->join('peminjaman', 'peminjaman_detail.id_peminjaman = peminjaman.id');
        $this->db->join('buku', 'peminjaman_detail.id_buku = buku.id');
        $this->db->where('peminjaman_detail.id_peminjaman', $id);
        $this->db->order_by('buku.judul', 'ASC');
        $query = $this->db->get()->result_array();
        return $query;
    }

    public function hapus_data($id)
    {
        $this->db->where('id', $id);
        $this->db->delete('buku');
    }
}
