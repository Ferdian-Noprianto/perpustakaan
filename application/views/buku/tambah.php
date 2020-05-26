<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h3 class="m-0 text-dark">Tambah Buku</h3>
                </div><!-- /.col -->
            </div><!-- /.row -->
        </div><!-- /.container-fluid -->
    </div> <!-- /.content-header -->

    <section class="content container">
        <div class="card">
            <div class="card-header">
                Tambah Data Buku
            </div>
            <div class="card-body">
                <form action="" method="post">
                    <?php if (validation_errors()) : ?>
                        <div class="alert alert-danger" role="alert">
                            <?php echo validation_errors(); ?>
                        </div>
                    <?php endif ?>
                    <div class="form-group">
                        <label for="judul">Judul buku</label>
                        <input type="text" name="judul" class="form-control" id="judul">
                    </div>
                    <div class="form-group">
                        <label for="id">Kode Buku</label>
                        <input type="text" name="id" class="form-control" id="id">
                    </div>
                    <div class="form-group">
                        <label for="penulis">Penulis</label>
                        <input type="text" name="penulis" class="form-control" id="penulis">
                    </div>
                    <div class="form-group">
                        <label for="penerbit">Penerbit</label>
                        <input type="text" name="penerbit" class="form-control" id="penerbit">
                    </div>
                    <div class="form-group">
                        <label for="rak">Rak Buku</label>
                        <input type="text" name="rak" class="form-control" id="rak">
                    </div>
                    <div class="form-group">
                        <label for="jumlah">Jumlah</label>
                        <input type="number" name="jumlah" class="form-control" id="jumlah">
                    </div>
                    <button type="submit" class="btn btn-primary">Simpan</button>
                    <button type="reset" class="btn btn-danger">Reset</button>
                </form>
            </div>
        </div>
    </section>
</div>