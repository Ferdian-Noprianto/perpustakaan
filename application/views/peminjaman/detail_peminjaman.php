<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h3 class="m-0 text-dark">Detail Buku</h3>
                </div><!-- /.col -->
            </div><!-- /.row -->
        </div><!-- /.container-fluid -->
    </div> <!-- /.content-header -->

    <div class="container">
        <div class="content-wrapper">
            <table id="mytable" class="table table-striped table-bordered">
                <thead>
                    <tr>
                        <th>No</th>
                        <th>Judul</th>
                        <th>Kode</th>
                        <th>Rak</th>
                        <th>Penulis</th>
                        <th>Penerbit</th>
                        <th>Aksi</th>
                    </tr>
                </thead>
                <tbody>

                    <?php $start = 1; ?>
                    <?php foreach ($detail as $dl) : ?>
                        <tr>
                            <td><?php echo $start++ ?></td>
                            <td><?php echo $dl['judul'] ?></td>
                            <td><?php echo $dl['id'] ?></td>
                            <td><?php echo $dl['rak'] ?></td>
                            <td><?php echo $dl['penulis'] ?></td>
                            <td><?php echo $dl['penerbit'] ?></td>
                            <td><button type="button" class="btn btn-primary" data-toggle="modal" data-target="#editbuku">
                                    Edit
                                </button></td>
                        </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>
        </div>
    </div>
</div>

<!-- Modal -->
<div class="modal fade" id="editbuku" tabindex="-1" role="dialog" aria-labelledby="editbukuLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="editbukuLabel">Masukkan kode buku</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form action="" method="post">
                <div class="modal-body">
                    <div class="form-group">
                        <input type="hidden" name="id_peminjaman" class="form-control" id="id_peminjaman" value="<?php echo $dl['id_peminjaman'] ?>">
                    </div>
                    <div class="form-group">
                        <input type="text" name="kode_buku" class="form-control" id="kode_buku" placeholder="kode buku.....">
                    </div>
                </div>
                <div class="modal-footer">
                    <a href="<?php base_url() ?>peminjaman/editbuku/<?php echo $dl['detail_id'] ?>" type="submit" class="btn btn-primary">Simpan</a>
                </div>
            </form>
        </div>
    </div>
</div>