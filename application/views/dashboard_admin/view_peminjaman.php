<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h3 class="m-0 text-dark">Peminjaman Buku</h3>
                </div><!-- /.col -->
            </div><!-- /.row -->
        </div><!-- /.container-fluid -->
    </div> <!-- /.content-header -->

    <section class="content container">
        <div class="card">
            <div class="card-header">
                Masukkan data
            </div>
            <div class="card-body">
                <form action="" method="post">
                    <?php if (validation_errors()) : ?>
                        <div class="alert alert-danger" role="alert">
                            <?php echo validation_errors(); ?>
                        </div>
                    <?php endif ?>
                    <?php echo $this->session->flashdata('flash'); ?>
                    <div class="form-group">
                        <label for="id">ID Peminjaman</label>
                        <input type="text" name="id" readonly="radonly" class="form-control" id="id" value="<?= $invoice ?>">
                    </div>
                    <div class=" form-group">
                        <label for="nama">Nama Peminjam</label>
                        <input type="text" name="nama" class="form-control" id="nama" value="<?= set_value('nama') ?>">
                    </div>
                    <div class="form-group">
                        <label for="nis">NIS</label>
                        <input type="text" name="nis" class="form-control" id="nis" value="<?= set_value('nis') ?>">
                    </div>
                    <div class="form-group">
                        <label for="kelas">Kelas</label>
                        <input type="text" name="kelas" class="form-control" id="kelas" value="<?= set_value('kelas') ?>">
                    </div>
                    <div>
                        <label for="kelas">Buku</label>
                    </div>
                    <div class="form-group">
                        <input type="text" name="kode_buku[]" class="form-control" id="kode_buku" placeholder="Masukkan Kode Buku">
                    </div>
                    <div class="form-group">
                        <input type="text" name="kode_buku[]" class="form-control" id="kode_buku" placeholder="Masukkan Kode Buku">
                    </div>
                    <div class="form-group">
                        <input type="text" name="kode_buku[]" class="form-control" id="kode_buku" placeholder="Masukkan Kode Buku">
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
                    <button type="submit" class="btn btn-primary">Simpan</button>
                    <button type="reset" class="btn btn-danger">Reset</button>
                </form>
            </div>
        </div>
    </section>
</div>

<!-- Modal -->
<div class="modal fade" id="tambahbuku" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Modal title</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form action="" method="post">
                <div class="modal-body">
                    <div class="form-group">
                        <label for="id">ID Peminjaman</label>
                        <input type="text" name="id_peminjam" value="<?= $invoice ?>" class="form-control" id="id_peminjam">
                    </div>
                    <div class="form-group">
                        <label for="kode_buku">Kode Buku</label>
                        <input type="text" name="kode_buku" class="form-control" id="kode_buku">
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="submit" class="btn btn-primary">tambah</button>
                </div>
            </form>
        </div>
    </div>
</div>