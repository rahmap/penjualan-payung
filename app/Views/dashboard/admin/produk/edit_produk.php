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
<li class="breadcrumb-item active">Data Produk</li>
<?= $this->endSection() ?>

<?= $this->section('content') ?>
<div class="row">
    <div class="col-12">
        <div class="card">
            <div class="card-body">

                <h4 class="header-title">Update Produk</h4>
                <p class="card-title-desc">Mengupdate data Produk ke Toko.</p>
                <form action="<?= base_url('admin/edit_produk/'.$produk['product_id']) ?>" method="POST" enctype="multipart/form-data">
                <div class="form-group row">
                    <label for="example-text-input" class="col-md-2 col-form-label">Nama Payung</label>
                    <div class="col-md-10">
                        <input class="form-control" type="text" name="nama" value="<?= $produk['nama_produk'] ?>">
                    </div>
                </div>
                <div class="form-group row">
                    <label for="example-text-input" class="col-md-2 col-form-label">Harga Payung</label>
                    <div class="col-md-10">
                        <input class="form-control" type="number" name="harga" value="<?= $produk['harga_produk'] ?>">
                    </div>
                </div>
                <div class="form-group row">
                    <label for="example-text-input" class="col-md-2 col-form-label">Stok Payung</label>
                    <div class="col-md-10">
                        <input class="form-control" type="number" name="stok" value="<?= $produk['stok'] ?>">
                    </div>
                </div>
								<div class="form-group row">
                    <label for="example-text-input" class="col-md-2 col-form-label">Berat Payung</label>
                    <div class="col-md-10">
                        <input class="form-control" type="number" name="berat" value="<?= $produk['berat'] ?>">
                    </div>
                </div>
                <div class="form-group row">
                    <label for="example-text-input" class="col-md-2 col-form-label">Gambar Payung</label>
                    <div class="col-md-10">
                        <input class="form-control" type="file" name="gambar" value="<?= $produk['gambar_produk'] ?>">
                    </div>
                </div>
                <div class="form-group row">
                    <label for="example-text-input" class="col-md-2 col-form-label">Keterangan Payung</label>
                    <div class="col-md-10">
                        <textarea class="form-control" type="text" name="keterangan"> <?= $produk['keterangan_produk'] ?></textarea>
                    </div>
                </div>
                <div class="form-group d-flex justify-content-center">
                  <button type="submit" name="submit" class="btn btn-primary mt-3 mt-sm-0">Submit</button>
                </div>
                </form>
            </div>
        </div>
    </div>
    <!-- end col -->
</div>
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