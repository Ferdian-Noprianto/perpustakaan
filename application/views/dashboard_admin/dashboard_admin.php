<div class="content-wrapper">

  <section class="content container">
    <div class="row-300">
      <div class="col-15">
        <div class="card-deck">
          <div class="card" style="width: 18rem;">
            <img src="<?= base_url('assets/') ?>img/peminjaman.png" class="card-img-top" alt="...">
            <div class="card-body">
              <h5 class="card-title">Peminjaman Buku</h5>

              <p class="card-text">Siswa maksimal meminjam tiga buku dengan waktu peminjaman selama satu minggu.</p>
              <!-- Button trigger modal -->
              <a href="<?= base_url() ?>admin/peminjaman" type="button" class="btn btn-primary">
                Peminjaman
              </a>
            </div>
          </div>
          <div class="card" style="width: 18rem;">
            <img src="<?= base_url('assets/') ?>img/perpanjangan.png" class="card-img-top" alt="...">
            <div class="card-body">
              <h5 class="card-title">Perpanjangan Buku</h5>
              <form action="<?= base_url() ?>admin/perpanjangan" method="post">
                <input type="text" name="id_peminjam" class="form-control" id="id_peminjam" placeholder="Masukkan ID Peminjaman"><br>
                <button class="btn btn-primary" type="submit">Konfirmasi</button>
              </form>
            </div>
          </div>
          <div class="card" style="width: 18rem;">
            <img src="<?= base_url('assets/') ?>img/pengembalian.png" class="card-img-top" alt="...">
            <div class="card-body">
              <h5 class="card-title">Penembalian Buku</h5>
              <form action="<?= base_url() ?>admin/pengembalian" method="post">
                <input type="text" name="id_peminjam" class="form-control" id="id_peminjam" placeholder="Masukkan ID Peminjaman"><br>
                <button class="btn btn-primary" type="submit">Konfirmasi</button>
              </form>
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>
</div>

<!-- Modal -->
<div class="modal fade" id="peminjaman" tabindex="-1" role="dialog" aria-labelledby="peminjaman" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Catat Peminjaman</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <form action="<?php base_url() ?>admin/peminjaman" method="post">
        <div class="modal-body">
          <div class="form-group">
            <label for="id">ID Peminjaman</label>
            <input type="text" name="id" readonly="radonly" class="form-control" id="id" value="<?= $invoice ?>">
          </div>
          <div class="form-group">
            <label for="nama">Nama Peminjam</label>
            <input type="text" name="nama" class="form-control" id="nama">
          </div>
          <div class="form-group">
            <label for="nis">NIS</label>
            <input type="text" name="nis" class="form-control" id="nis">
          </div>
          <div class="form-group">
            <label for="kelas">Kelas</label>
            <input type="text" name="kelas" class="form-control" id="kelas">
          </div>
          <div class="form-group">
            <label for="tgl_pinjam">Tanggal Peminjaman</label>
            <input type="text" name="tgl_pinjam" class="form-control" readonly="radonly" id="tgl_pinjam" value="<?= date('l, d-m-Y') ?>">
          </div>
          <?php $d = strtotime("+7 days"); ?>
          <div class="form-group">
            <label for="tgl_kembali">Tanggal Deadline</label>
            <input type="text" name="tgl_kembali" class="form-control" readonly="radonly" id="tgl_kembali" value="<?= date('l, d-m-Y', $d) ?>">
          </div>
        </div>
        <div class="modal-footer">
          <button type="submit" class="btn btn-primary">Simpan</button>
        </div>
      </form>
    </div>
  </div>
</div>