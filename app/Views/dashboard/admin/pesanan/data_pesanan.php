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
<li class="breadcrumb-item active">Data Pesanan</li>
<?= $this->endSection() ?>

<?= $this->section('content') ?>

<div class="row">
  <div class="col-12">
      <div class="card">
          <div class="card-body">

              <h4 class="header-title"><?= $title ?></h4>
              <p class="card-title-desc">Menampilkan data Pesanan pada toko.
              </p>

              <table id="datatable" class="table table-bordered dt-responsive nowrap" style="border-collapse: collapse; border-spacing: 0; width: 100%;">
                  <thead>
                  <tr>
                      <th>ID</th>
                      <th>Waktu</th>
                      <th>Alamat</th>
                      <th>Total Bayar</th>
                      <th class="text-center">Ongkir</th>
                      <th>Metode Pembayaran</th>
                      <th>Nomer HP</th>
                      <th>Status</th>
                      <th>Keterangan</th>
                      <th class="text-center">Aksi</th>
                  </tr>
                  </thead>
                  <tbody>
                  <?php foreach($pesanan as $pes): ?>
                  <tr>
                      <td><?= $pes['order_unique_id'] ?></td>
                      <td><?= date('d/m/y H:i', (int) $pes['waktu_pesanan']) ?></td>
                      <td><?= $pes['alamat'] ?></td>
                      <td>Rp <?= number_format($pes['harga_total'], 0, ',', '.') ?></td>
                      <td><?= $pes['ongkir'] ?></td>
                      <td><?= $pes['metode_pembayaran'] ?></td>
                      <td><?= $pes['no_hp'] ?></td>
                      <td><?= $pes['status_pemesanan'] ?></td>
                      <td><?= $pes['informasi_pesanan'] ?></td>
                      <td class="text-center">
                        <div class="button-items">
                          <a class="btn btn-danger" href="<?= base_url('admin/hapus_pesanan/'.$pes['order_unique_id']) ?>" 
                            onclick="return confirm('Yakin ingin menghapus pesanan ini ?');"
                            role="button">Hapus</a>
                          <a class="btn btn-primary" href="<?= base_url('admin/edit_pesanan/'.$pes['order_unique_id']) ?>"
                            role="button">Edit</a>
                        </div>
                      </td>
                  </tr>
                  <?php endforeach; ?>
                  </tbody>
              </table>

          </div>
      </div>
  </div> <!-- end col -->
</div> <!-- end row -->
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