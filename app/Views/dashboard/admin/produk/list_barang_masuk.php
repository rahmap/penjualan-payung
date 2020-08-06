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
  <li class="breadcrumb-item"><a href="javascript: void(0);">Produk</a></li>
  <li class="breadcrumb-item active">Data Barang Masuk</li>
<?= $this->endSection() ?>

<?= $this->section('content') ?>
  <div class="row">
    <div class="col-12">
      <div class="card">
        <div class="card-body">

          <h4 class="header-title"><?= $title ?></h4>
          <p class="card-title-desc">Menampilkan data barang masuk pada toko.
          </p>

          <table id="datatable" class="table table-bordered dt-responsive nowrap" style="border-collapse: collapse; border-spacing: 0; width: 100%;">
            <thead class="text-center">
            <tr>
              <th>Tanggal Masuk</th>
              <th>Nama Produk</th>
              <th>Stok Masuk</th>
            </tr>
            </thead>
            <tbody class="text-center">
            <?php if($produks != null): ?>
              <?php foreach($produks as $produk): ?>
                <tr>
                  <td><?= $produk['tanggal_barang_masuk'] ?></td>
                  <td><?= $produk['nama_produk'] ?></td>
                  <td><?= $produk['MASUK'] ?></td>
                </tr>
              <?php endforeach; ?>
            <?php endif; ?>
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