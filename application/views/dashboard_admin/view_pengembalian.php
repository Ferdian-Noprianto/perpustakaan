<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h3 class="m-0 text-dark">Perpanjangan Buku</h3>
                </div><!-- /.col -->
            </div><!-- /.row -->
        </div><!-- /.container-fluid -->
    </div> <!-- /.content-header -->

    <section class="content container">
        <div class="card">
            <div class="card-header">
                Konfirmasi
            </div>
            <div class="card-body">
                <form action="" method="post">
                    <div class="form-group">
                        <label for="id">ID Peminjaman</label>
                        <input type="text" name="id" readonly="radonly" class="form-control" id="id" value="<?php echo $pengembalian[0]['id']; ?>">
                    </div>
                    <div class="form-group">
                        <label for="nama">Nama Peminjam</label>
                        <input type="text" name="nama" class="form-control" id="nama" readonly="radonly" value="<?= $pengembalian[0]['nama']; ?>">
                    </div>
                    <div class="form-group">
                        <label for="nis">NIS</label>
                        <input type="text" name="nis" class="form-control" id="nis" readonly="radonly" value="<?= $pengembalian[0]['nis'] ?>">
                    </div>
                    <div class="form-group">
                        <label for="kelas">Kelas</label>
                        <input type="text" name="kelas" class="form-control" id="kelas" readonly="radonly" value="<?= $pengembalian[0]['kelas'] ?>">
                    </div>
                    <div>
                        <label for="kelas">Buku</label>
                    </div>
                    <div class="form-group">
                        <table class="table table-striped table-bordered">
                            <thead>
                                <tr>
                                    <th>No</th>
                                    <th>Kode</th>
                                    <th>Judul</th>
                            </thead>
                            <tbody>
                                <?php $start = 1; ?>
                                <?php foreach ($buku as $bk) : ?>
                                    <tr>
                                        <td><?php echo $start++ ?></td>
                                        <td><?php echo $bk['id'] ?></td>
                                        <td><?php echo $bk['judul'] ?></td>
                                    </tr>
                                <?php endforeach; ?>
                            </tbody>
                        </table>
                    </div>
                    <div class="form-group">
                        <label for="tgl_pinjam">Tanggal Peminjaman</label>
                        <input type="date" name="tgl_pinjam" class="form-control" readonly="radonly" id="tgl_pinjam" value="<?= $pengembalian[0]['tgl_pinjam'] ?>">
                    </div>
                    <div class="form-group">
                        <label for="tgl_kembali">Tanggal Deadline</label>
                        <input type="date" name="tgl_kembali" class="form-control" readonly="radonly" id="tgl_kembali" value="<?= $pengembalian[0]['tgl_kembali'] ?>">
                    </div>
                    <?php
                    $date1  = strtotime($pengembalian[0]['tgl_kembali']);
                    $date2 = time(); // Waktu sekarang
                    if ($date1 > $date2) {
                        $denda = "0";
                    } else {
                        $diff = $date2 - $date1;
                        $denda = floor($diff / (60 * 60 * 24)) * 500;
                    }
                    ?>
                    <div class="form-group">
                        <label for="denda">Denda</label>
                        <input type="text" class="form-control" readonly="radonly" value="<?= 'Rp. ' . $denda ?>">
                        <input type="hidden" name="denda" class="form-control" readonly="radonly" id="denda" value="<?= $denda ?>">
                    </div>
                    <button type="submit" class="btn btn-primary">Pengembalian</button>
                </form>
            </div>
        </div>
    </section>
</div>