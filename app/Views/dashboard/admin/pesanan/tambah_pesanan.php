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
<li class="breadcrumb-item active">Tambah Pesanan</li>
<?= $this->endSection() ?>

<?= $this->section('content') ?>
<div class="row">
    <div class="col-12">
        <div class="card">
            <div class="card-body">

                <h4 class="header-title">Tambahkan Pesanan</h4>
                <p class="card-title-desc">Menambahkan data Pesanan ke Toko.</p>
                <form action="<?= base_url('admin/tambah_produk') ?>" method="POST" enctype="multipart/form-data">
                <div class="form-group row">
                    <label for="example-text-input" class="col-md-2 col-form-label">Harga Total</label>
                    <div class="col-md-10">
                        <input class="form-control" type="number" name="harga" readonly>
                    </div>
                </div>
                <div class="form-group row">
                    <label for="example-text-input" class="col-md-2 col-form-label">Alamat Pesanan</label>
                    <div class="col-md-10">
                        <textarea class="form-control" type="text" name="alamat" > </textarea>
                    </div>
                </div>
                <div class="form-group row">
                    <label for="example-text-input" class="col-md-2 col-form-label">Nomer Telefon</label>
                    <div class="col-md-10">
                        <input class="form-control" type="text" name="phone">
                    </div>
                </div>
                <div class="form-group row">
                    <label class="col-md-2 col-form-label">Metode Pembayaran</label>
                    <div class="col-md-10">
                        <select class="form-control" name="bayar" readonly>
                            <option value="CASH" selected>Bayar Cash</option>
                        </select>
                    </div>
                </div>
                <div class="form-group row">
                    <label class="col-md-2 col-form-label">Pengiriman</label>
                    <div class="col-md-10">
                        <div class="mt-4 mt-lg-0">
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" type="radio" name="ongkir" id="inlineRadios1" value="Dalam Kota" checked="">
                                <label class="form-check-label" for="inlineRadios1">
                                    Dalam Kota (Yogyakarta)
                                </label>
                            </div>
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" type="radio" name="ongkir" id="inlineRadios2" value="Luar Kota">
                                <label class="form-check-label" for="inlineRadios2">
                                    Luar Kota
                                </label>
                            </div>
                        </div>
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
<div class="row">
    <div class="col-lg-12">
        <div class="card">
            <div class="card-body">
                <h4 class="header-title">List Produk</h4>
                <p class="card-title-desc">Menampilkan produk yang akan dibeli.</p>    
                
                <div class="table-responsive">
                    <table class="table table-hover mb-0">

                        <thead>
                            <tr>
                                <th>Nama Payung</th>
                                <th>Jumlah</th>
                                <th>Harga Satuan</th>
                                <th>Sub Total</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td>Payung Pantai</td>
                                <td>3</td>
                                <td>Rp. 90.000</td>
                                <td>Rp. 270.000</td>
                            </tr>
                        </tbody>
                    </table>
                </div>

            </div>
        </div>
    </div>
</div>
<?= $this->endSection() ?>

<?= $this->section('outJS') ?>
  <!-- Required datatable js -->
  <script src="<?= base_url('apaxy/libs/datatables.net/js/jquery.dataTables.min.js') ?>"></script>
  <script src="<?= base_url('apaxy/libs/datatables.net-bs4/js/dataTables.bootstrap4.min.js') ?>"></script>
  <!-- Responsive examples -->
  <script src="<?= base_url('apaxy/libs/datatables.net-responsive/js/dataTables.responsive.min.js') ?>"></script>
  <script src="<?= base_url('apaxy/libs/datatables.net-responsive-bs4/js/responsive.bootstrap4.min.js') ?>"></script>

  <!-- Datatable init js -->
  <script src="<?= base_url('apaxy/js/pages/datatables.init.js') ?>"></script>
<?= $this->endsection() ?>