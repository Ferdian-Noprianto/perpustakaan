<div class="content-wrapper">
  <!-- Content Header (Page header) -->
  <div class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm-6">
          <h3 class="m-0 text-dark">Data Buku</h3>
        </div><!-- /.col -->
      </div><!-- /.row -->
    </div><!-- /.container-fluid -->
  </div> <!-- /.content-header -->

  <div class="container">
    <?php if ($this->session->flashdata('flash')) : ?>
      <div class="content-wrapper">
        <div class="row mb-2">
          <div class="col-sm-6">
            <div class="alert alert-success alert-dismissible fade show" role="alert">Data Buku
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
      <a href="<?= base_url() ?>buku/tambah_buku" class="btn btn-primary mb-3" name="tambahbuku"><i class="fa fa-plus"></i> Tambah Data</a>
      <table id="mytable" class="table table-striped table-bordered">
        <thead>
          <tr>
            <th>No</th>
            <th>Judul</th>
            <th>Kode</th>
            <th>Rak</th>
            <th>Penulis</th>
            <th>Penerbit</th>
            <th>Jumlah</th>
            <th>Aksi</th>
          </tr>
        </thead>
        <tbody>

          <?php $start = 1; ?>
          <?php foreach ($buku as $bk) : ?>
            <tr>
              <td><?php echo $start++ ?></td>
              <td><?php echo $bk['judul'] ?></td>
              <td><?php echo $bk['id'] ?></td>
              <td><?php echo $bk['rak'] ?></td>
              <td><?php echo $bk['penulis'] ?></td>
              <td><?php echo $bk['penerbit'] ?></td>
              <td><?php echo $bk['jumlah'] ?></td>
              <td><a href="<?php echo base_url() ?>buku/hapus/<?php echo $bk['id'] ?>" class="btn btn-danger btn-sm mr-3" onclick="return confirm('yakin?')">hapus</a>
                <a href="<?php echo base_url() ?>buku/ubah/<?php echo $bk['id'] ?>" class="btn btn-primary btn-sm">ubah</a>
              </td>
            </tr>
          <?php endforeach; ?>
        </tbody>
      </table>
    </div>
  </div>
</div>