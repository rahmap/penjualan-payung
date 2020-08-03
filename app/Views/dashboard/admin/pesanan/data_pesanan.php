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

              <table id="datatable-buttons" class="table table-striped table-bordered dt-responsive nowrap" style="border-collapse: collapse; border-spacing: 0; width: 100%;">
                  <thead>
                  <tr>
                      <th>Nomer</th>
                      <th>ID</th>
                      <th>Nama Pembeli</th>
                      <th  class="text-center">Jenis Pesanan</th>
                      <th>Waktu</th>
                      <th>Total Harga Barang</th>
                      <th class="text-center">Ongkir</th>
                      <th class="text-center">Bukti Pembayaran</th>
                      <th>Status</th>
                      <th>Keterangan</th>
                      <th class="text-center">Aksi</th>
                  </tr>
                  </thead>
                  <tbody>
                  <?php foreach($pesanan as $pes): ?>
                  <tr>
                      <td ><?= $pes['order_id'] ?></td>
                      <td><?= $pes['order_unique_id'] ?></td>
                      <td><?= $pes['user_name'] ?></td>
                      <td  class="text-center"><?= ($pes['user_password'] == null)? '<span class="badge badge-light">Offline</span>' : '<span class="badge badge-info">Online</span>' ; ?></td>
                      <td><?= date('Y/m/d H:i', (int) $pes['waktu_pesanan']) ?></td>
                      <td>Rp <?= number_format($pes['harga_total'], 0, ',', '.') ?></td>
                      <td>Rp <?= number_format((int)$pes['ongkir'], 0, ',', '.') ?></td>
                      <td class="text-center"><?= ($pes['bukti_pembayaran'] != NULL)? '<span class="badge badge-primary">Sudah Ada</span>' : '<span class="badge badge-dark">Belum Ada</span>' ; ?></td>
                      <?php $warna; if($pes['status_pemesanan'] == 'pending'){ $warna = 'warning'; } else if($pes['status_pemesanan'] == 'success'){ $warna='success'; } else { $warna='danger'; } ?>
                      <td><?= '<span class="badge badge-'.$warna.'">'.$pes['status_pemesanan'].'</span>' ?></td>
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