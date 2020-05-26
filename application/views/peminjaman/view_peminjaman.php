<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h3 class="m-0 text-dark">Data Peminjaman</h3>
                </div><!-- /.col -->
            </div><!-- /.row -->
        </div><!-- /.container-fluid -->
    </div> <!-- /.content-header -->

    <div class="container">
        <?php if ($this->session->flashdata('flash')) : ?>
            <div class="content-wrapper">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <div class="alert alert-success alert-dismissible fade show" role="alert">Data Peminjaman
                            <strong>Berhasil</strong> <?php echo $this->session->flashdata('flash'); ?> .
                            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                    </div><!-- /.col -->
                </div><!-- /.row -->
            </div>
        <?php endif; ?>
        <div class="content-wrapper">
            <table id="mytable" class="table table-striped table-bordered">
                <thead>
                    <tr>
                        <th>No</th>
                        <th>ID Peminjaman</th>
                        <th>Nama</th>
                        <th>Kelas</th>
                        <th>Tgl Peminjaman</th>
                        <th>Deadline/Tgl Pengembalian</th>
                        <th>Status</th>
                        <th>Aksi</th>
                    </tr>
                </thead>
                <tbody>

                    <?php $start = 1; ?>
                    <?php foreach ($peminjaman as $pm) : ?>
                        <tr>
                            <td><?php echo $start++ ?></td>
                            <td><?php echo $pm['id'] ?></td>
                            <td><?php echo $pm['nama'] ?></td>
                            <td><?php echo $pm['kelas'] ?></td>
                            <td><?php echo $pm['tgl_pinjam'] ?></td>
                            <td><?php echo $pm['tgl_kembali'] ?></td>
                            <td><?php echo $pm['status'] ?></td>
                            <td>
                                <a href="<?php echo base_url() ?>peminjaman/detail/<?php echo $pm['id'] ?>" class="btn btn-primary btn-sm">Buku</a>
                                <a href="<?php echo base_url() ?>peminjaman/cetak/<?php echo $pm['id'] ?>" class="btn btn-success btn-sm"> <i class="fas fa-print"></i> Cetak</a>
                            </td>
                        </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>
        </div>
    </div>
</div>