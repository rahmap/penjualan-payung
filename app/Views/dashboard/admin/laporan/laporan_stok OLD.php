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
<li class="breadcrumb-item"><a href="javascript: void(0);">Laporan</a></li>
<li class="breadcrumb-item active">Laporan Stok</li>
<?= $this->endSection() ?>

<?= $this->section('content') ?>
<div class="row justify-content-center">
  <div class="col-8">
      <div class="card">
          <div class="card-body">

              <h4 class="header-title">Cari Berdasarkan Tanggal</h4>
              <form action="<?= base_url('admin/laporan_stok') ?>" method="GET">
                <div class="form-group row">
                    <label for="example-date-input" class="col-md-2 col-form-label">Tanggal</label>
                    <div class="col-md-10">
                        <input class="form-control" type="date" required name="tanggal" value="<?= (session()->has('mulai'))? session()->mulai : date('Y-m-d'); ?>" id="example-date-input">
                    </div>
                </div>
                <div class="form-group row justify-content-center">
                  <button type="submit" class="btn btn-primary mt-3 mt-sm-0">Cari Data</button>
                </div>
              </form>
              <a href="<?= base_url('admin/laporan_stok') ?>"><button class="btn btn-success mt-3 mt-sm-0 mr-3">Tampilkan Semua Data</button></a>
          </div>
      </div>
  </div>
  <!-- end col -->
</div>
<div class="row">
  <div class="col-12">
      <div class="card">
          <div class="card-body">

              <h4 class="header-title"><?= $title ?></h4>
              <p class="card-title-desc">Menampilkan data laporan stok barang.
              </p>

              <table id="datatable-buttons" class="table table-bordered dt-responsive nowrap" style="border-collapse: collapse; border-spacing: 0; width: 100%;">
                  <thead>
                  <tr>
                      <th class="text-center">Tanggal</th>
                      <th class="text-center">Nama Barang</th>
                      <th class="text-center">Stok Awal</th>
<!--                      <th class="text-center">Barang Terjual</th>-->
                      <th class="text-center">Stok Barang</th>
<!--                      <th class="text-center">Nama Supplier</th>-->
                  </tr>
                  </thead>
                  <tbody>
                  <?php foreach($stok as $lap): ?>
                  <tr>
                    <?php $tgl = explode('/',$lap['tanggal_selesai']) ?>
										<td class="text-center"><?= $tgl[2].'/'.$tgl[1].'/'.$tgl[0] ?></td>

                      <td><?= $lap['nama_produk_pemesanan'] ?></td>
                      <td class="text-center">
                      <?php
                        if(strpos($lap['AWAL'], ',') == true):
                          $resultSisa = explode(',',$lap['AWAL']); rsort($resultSisa); echo $resultSisa[0];
                        else:
                          echo $lap['AWAL'];
                        endif;
                      ?>
                      </td>
<!--                      <td class="text-center">--><?//= $lap['QTY'] ?><!--</td>-->
                      <td class="text-center">
                      <?php  
                        if(strpos($lap['SISA'], ',') == true):
                          $resultSisa = explode(',',$lap['SISA']); sort($resultSisa); echo $resultSisa[0]; 
                        else:
                          echo $lap['SISA'];
                        endif;
                      ?>
                      </td>
<!--                      <td class="text-center">--><?//= ucwords($lap['nama_supplier_order']) ?><!--</td>-->
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
<script src="<?= base_url('apaxy/libs/datatables.net/js/jquery.dataTables.min.js') ?>"></script>
<script src="<?= base_url('apaxy/libs/datatables.net-bs4/js/dataTables.bootstrap4.min.js') ?>"></script>
<!-- Buttons examples -->
<script src="<?= base_url('apaxy/libs/datatables.net-buttons/js/dataTables.buttons.min.js') ?>"></script>
<script src="<?= base_url('apaxy/libs/datatables.net-buttons-bs4/js/buttons.bootstrap4.min.js') ?>"></script>
<script src="<?= base_url('apaxy/libs/jszip/jszip.min.js') ?>"></script>
<script src="<?= base_url('apaxy/libs/pdfmake/build/pdfmake.min.js') ?>"></script>
<script src="<?= base_url('apaxy/libs/pdfmake/build/vfs_fonts.js') ?>"></script>
<script src="<?= base_url('apaxy/libs/datatables.net-buttons/js/buttons.html5.min.js') ?>"></script>
<script src="<?= base_url('apaxy/libs/datatables.net-buttons/js/buttons.print.min.js') ?>"></script>
<script src="<?= base_url('apaxy/libs/datatables.net-buttons/js/buttons.colVis.min.js') ?>"></script>
  <!-- Responsive examples -->
  <script src="<?= base_url('apaxy/libs/datatables.net-responsive/js/dataTables.responsive.min.js') ?>"></script>
  <script src="<?= base_url('apaxy/libs/datatables.net-responsive-bs4/js/responsive.bootstrap4.min.js') ?>"></script>
  <!-- Datatable init js -->
  <script src="<?= base_url('apaxy/js/pages/datatables.init.js') ?>"></script>
<?= $this->endsection() ?>