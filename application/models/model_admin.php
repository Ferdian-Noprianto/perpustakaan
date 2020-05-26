<?php

class Model_admin extends CI_Model
{

    public function peminjaman()
    {
        $tanggal_peminjaman = date('Y-m-d');
        $tanggal_pengembalian = date('Y-m-d', time() + 604800);
        $data = [
            "id"            => $this->input->post('id', true),
            "nama"          => $this->input->post('nama', true),
            "nis"           => $this->input->post('nis', true),
            "kelas"         => $this->input->post('kelas', true),
            "tgl_pinjam"    => $tanggal_peminjaman,
            "tgl_kembali"   => $tanggal_pengembalian,
            "status"        => 1,
            "denda"        => 0
        ];
        $this->db->insert('peminjaman', $data);

        $buku = $this->input->post('kode_buku');
        $jumlah = count($buku);

        for ($i = 0; $i < $jumlah; $i++) {
            if ($buku[$i] != '') {
                $data = [
                    "id_peminjaman"    => $this->input->post('id', true),
                    "id_buku"          => $buku[$i]
                ];
                $this->db->insert('peminjaman_detail', $data);
            }
        }
    }

    public function get_invoice()
    {
        $q = $this->db->query("SELECT MAX(RIGHT(id_peminjaman,4)) AS kd_max FROM peminjaman_detail WHERE DATE(tanggal)=CURDATE()");
        $kd = "";
        if ($q->num_rows() > 0) {
            foreach ($q->result() as $k) {
                $tmp = ((int) $k->kd_max) + 1;
                $kd = sprintf("%04s", $tmp);
            }
        } else {
            $kd = "0001";
        }
        date_default_timezone_set('Asia/Jakarta');
        return date('ymd') . $kd;
    }

    public function get_data_buku()
    {
        $id = $this->input->post('id_peminjam');
        $this->db->select('id, nama, nis, kelas, tgl_pinjam, tgl_kembali, denda');
        $this->db->from('peminjaman');
        $this->db->like('id', $id);
        $query = $this->db->get()->result_array();
        return $query;
    }

    public function catat_perpanjangan()
    {
        $tanggal_pengembalian = date('Y-m-d', time() + 604800);
        $data = [
            "id"            => $this->input->post('id', true),
            "nama"          => $this->input->post('nama', true),
            "nis"           => $this->input->post('nis', true),
            "kelas"         => $this->input->post('kelas', true),
            "tgl_pinjam"    => $this->input->post('tgl_pinjam', true),
            "tgl_kembali"   => $tanggal_pengembalian,
            "status"        => 2,
            "denda"        => $this->input->post('denda', true)
        ];
        $this->db->where('id', $this->input->post('id'));
        $this->db->update('peminjaman', $data);
    }

    public function catat_pengembalian()
    {
        $tanggal_pengembalian = date('Y-m-d');
        $data = [
            "id"            => $this->input->post('id', true),
            "nama"          => $this->input->post('nama', true),
            "nis"           => $this->input->post('nis', true),
            "kelas"         => $this->input->post('kelas', true),
            "tgl_pinjam"    => $this->input->post('tgl_pinjam', true),
            "tgl_kembali"   => $tanggal_pengembalian,
            "status"        => 3,
            "denda"        => $this->input->post('denda', true)
        ];
        $this->db->where('id', $this->input->post('id'));
        $this->db->update('peminjaman', $data);
    }

    public function get_buku()
    {
        $id = $this->input->post('id_peminjam');
        $this->db->select('buku.id, buku.judul');
        $this->db->from('peminjaman_detail');
        $this->db->join('peminjaman', 'peminjaman_detail.id_peminjaman = peminjaman.id');
        $this->db->join('buku', 'peminjaman_detail.id_buku = buku.id');
        $this->db->where('peminjaman_detail.id_peminjaman', $id);
        $this->db->order_by('buku.judul', 'ASC');
        $query = $this->db->get()->result_array();
        return $query;
    }

    public function get_judulbuku()
    {
        $this->db->select('id, judul');
        $this->db->from('buku');
        $this->db->order_by('judul', 'asc');
        $query = $this->db->get()->result_array();
        return $query;
    }

    public function get_peminjam()
    {
        $id = $this->input->post('id');
        $this->db->select('*');
        $this->db->from('peminjaman');
        $this->db->where('id', $id);
        $query = $this->db->get()->result_array();
        return $query;
    }
}
