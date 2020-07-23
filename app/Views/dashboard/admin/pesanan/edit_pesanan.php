<?= $this->extend('layouts/main_dashboard') ?>

<?= $this->section('title') ?>
<?= $title ?>
<?= $this->endSection() ?>

<?= $this->section('outCSS') ?>
  <!-- DataTables -->
  <link href="<?= base_url('apaxy/libs/datatables.net-bs4/css/dataTables.bootstrap4.min.css') ?>" rel="stylesheet" type="text/css" />
  <link href="<?= base_url('apaxy/libs/datatables.net-buttons-bs4/css/buttons.bootstrap4.min.css') ?>" rel="stylesheet" type="text/css" />

  <!-- Responsive datatable examples -->
  <link href="<?= base_url('apaxy/libs/datatables.net-responsive-bs4/css/responsive.bootstrap4.min.css') ?>" rel="stylesheet" type="text/css" />     
<?= $this->endSection() ?>

<?= $this->section('pageName') ?>
<?= $title ?>
<?= $this->endSection() ?>

<?= $this->section('breadcrumb') ?>
<li class="breadcrumb-item"><a href="#"><?= APP_NAME ?></a></li>
<li class="breadcrumb-item"><a href="javascript: void(0);">Pesanan</a></li>
<li class="breadcrumb-item active">Update Pesanan</li>
<?= $this->endSection() ?>

<?= $this->section('content') ?>

<div class="row">
  <div class="col-6">
      <div class="card">
          <div class="card-body">

              <h4 class="header-title">Data Item Dibeli</h4>
              <p class="card-title-desc">Menampilkan data produk yang dibeli.
              </p>

              <table id="datatable" class="table table-bordered dt-responsive nowrap" style="border-collapse: collapse; border-spacing: 0; width: 100%;">
                  <thead>
                  <tr>
                      <th>Nama Produk</th>
                      <th>Harga Satuan</th>
                      <th>Jumlah Item</th>
                      <th>Sub Total</th>
                  </tr>
                  </thead>
                  <tbody>
                  <?php foreach($pesanan as $pes): ?>
                  <tr>
                      <td><?= $pes['nama_produk_pemesanan'] ?></td>
                      <td>Rp <?= number_format($pes['harga_produk_pemesanan'], 0, ',', '.') ?></td>
                      <td><?= $pes['jumlah_pesan_produk'] ?></td>
                      <td>Rp <?= number_format($pes['harga_produk_pemesanan'] * $pes['jumlah_pesan_produk'], 0, ',', '.') ?></td>
                  </tr>
                  <?php endforeach; ?>
                  </tbody>
              </table>

          </div>
      </div>
  </div> <!-- end col -->
  <div class="col-6">
      <div class="card">
          <div class="card-body">

              <h4 class="header-title">Data Pesanan</h4>
              <p class="card-title-desc">Menampilkan data pemesanan.
              </p>

              <table id="datatable" class="table table-bordered dt-responsive nowrap" style="border-collapse: collapse; border-spacing: 0; width: 100%;">
                  <thead>
                  <tr>
                      <th>Alamat</th>
                      <th>Total Bayar</th>
                      <th>Metode Pembayaran</th>
                      <th>Status</th>
                      <th>Keterangan</th>
                  </tr>
                  </thead>
                  <tbody>
                  <tr>
                      <td><?= $produk['alamat'] ?></td>
                      <td>Rp <?= number_format((int) $produk['harga_total'], 0, ',', '.') ?></td>
                      <td><?= $produk['metode_pembayaran'] ?></td>
                      <?php $warna; if($produk['status_pemesanan'] == 'pending'){ $warna = 'warning'; } else if($produk['status_pemesanan'] == 'success'){ $warna='success'; } else { $warna='danger'; } ?>
                      <td><?= '<span class="badge badge-'.$warna.'">'.$produk['status_pemesanan'].'</span>' ?></td>
                      <td><?= $produk['informasi_pesanan'] ?></td>
                  </tr>
                  </tbody>
              </table>

          </div>
      </div>
  </div> <!-- end col -->
</div> <!-- end row -->
<div class="row">

  <div class="col-lg-6">
      <div class="card">
          <div class="card-body">

              <h4 class="header-title">Bukti Pembayaran</h4>

              <div class="">
                  <img src="<?= base_url('bukti_pembayaran/'.$produk['bukti_pembayaran']) ?>" class="img-fluid" alt="Foto Bukti Pembayaran">
              </div>
          </div>
      </div>
  </div>
  <div class="col-6">
        <div class="card">
            <div class="card-body">

                <h4 class="header-title">Update Pesanan</h4>
                <p class="card-title-desc">Mengupdate data Pesanan.</p>
                <form action="<?= base_url('admin/edit_pesanan/'.$produk['order_unique_id']) ?>" method="POST">
                <div class="form-group row">
                  <label class="col-md-2 col-form-label">Status Pemesanan</label>
                  <div class="col-md-10">
                      <select class="form-control" name="status">
                      <?php if($produk['status_pemesanan'] == 'pending'): ?>
                          <option value="success" <?= ($produk['status_pemesanan'] == 'success')? 'selected' : '' ?>>Success</option>
                          <option value="cancel" <?= ($produk['status_pemesanan'] == 'cancel')? 'selected' : '' ?>>Cancel</option>
                      <?php else: ?>
                          <option value=""> - </option>
                      <?php endif; ?>
                      </select>
                  </div>
                </div>
                <div class="form-group row">
                    <label for="example-text-input" class="col-md-2 col-form-label">Keterangan Pesanan</label>
                    <div class="col-md-10">
                        <input class="form-control" type="text" name="informasi" value="<?= $produk['informasi_pesanan'] ?>">
                    </div>
                </div>
                <div class="form-group d-flex justify-content-center">
                  <button type="submit" name="submit" class="btn btn-primary mt-3 mt-sm-0">Ubah</button>
                </div>
                </form>
            </div>
        </div>
    </div>
</div>

<class class="row">
  <div class="col-6">
      <div class="card">
          <div class="card-body">

              <h4 class="header-title">Data Pembeli</h4>
              <p class="card-title-desc">Menampilkan data pembeli.
              </p>

              <table id="datatable" class="table table-bordered dt-responsive nowrap" style="border-collapse: collapse; border-spacing: 0; width: 100%;">
                  <thead>
                  <tr>
                      <th>Nama Pembeli</th>
                      <th>Email Pembeli</th>
                  </tr>
                  </thead>
                  <tbody>
                  <tr>
                      <td><?= $produk['user_name'] ?></td>
                      <td><?= $produk['user_email'] ?></td>
                  </tr>
                  </tbody>
              </table>

          </div>
      </div>
  </div> <!-- end col -->
  <div class="col-6">
      <div class="card">
          <div class="card-body">

              <h4 class="header-title">Data Pengelola Pemesanan</h4>
              <p class="card-title-desc">Menampilkan data Pengelola Pemesanan.
              </p>

              <table id="datatable" class="table table-bordered dt-responsive nowrap" style="border-collapse: collapse; border-spacing: 0; width: 100%;">
                  <thead>
                  <tr>
                      <th>Nama Admin</th>
                      <th>Email Admin</th>
                  </tr>
                  </thead>
                  <tbody>
                  <tr>
                      <td><?= $produk['nama_admin'] ?></td>
                      <td><?= $produk['email_admin'] ?></td>
                  </tr>
                  </tbody>
              </table>

          </div>
      </div>
  </div> <!-- end col -->
</class>
<?= $this->endSection() ?>

<?= $this->section('outJS') ?>
  <!-- Required datatable js -->
  <script src="<?= base_url('apaxy/libs/datatables.net/js/jquery.dataTables.min.js') ?>""></script>
  <script src="<?= base_url('apaxy/libs/datatables.net-bs4/js/dataTables.bootstrap4.min.js') ?>"></script>
  <!-- Responsive examples -->
  <script src="<?= base_url('apaxy/libs/datatables.net-responsive/js/dataTables.responsive.min.js') ?>"></script>
  <script src="<?= base_url('apaxy/libs/datatables.net-responsive-bs4/js/responsive.bootstrap4.min.js') ?>"></script>

  <!-- Datatable init js -->
  <script src="<?= base_url('apaxy/js/pages/datatables.init.js') ?>"></script>
<?= $this->endsection() ?>