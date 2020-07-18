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

                <h4 class="header-title">Tambahkan Produk</h4>
                <p class="card-title-desc">Menambahkan data Produk ke Toko.</p>
                <form action="<?= base_url('admin/tambah_produk') ?>" method="POST" enctype="multipart/form-data">
                <div class="form-group row">
                    <label for="example-text-input" class="col-md-2 col-form-label">Nama Payung</label>
                    <div class="col-md-10">
                        <input class="form-control" type="text" name="nama" >
                    </div>
                </div>
                <div class="form-group row">
                    <label for="example-text-input" class="col-md-2 col-form-label">Harga Payung</label>
                    <div class="col-md-10">
                        <input class="form-control" type="number" name="harga" >
                    </div>
                </div>
                <div class="form-group row">
                    <label for="example-text-input" class="col-md-2 col-form-label">Gambar Payung</label>
                    <div class="col-md-10">
                        <input class="form-control" type="file" name="gambar" >
                    </div>
                </div>
                <div class="form-group row">
                    <label for="example-text-input" class="col-md-2 col-form-label">Keterangan Payung</label>
                    <div class="col-md-10">
                        <textarea class="form-control" type="text" name="keterangan" > </textarea>
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
  <div class="col-12">
      <div class="card">
          <div class="card-body">

              <h4 class="header-title">Pilih Supplier Toko</h4>
              <p class="card-title-desc">Mengatur supplier pada Poko.</p>
              <form action="<?= base_url('admin/update_supplier_produk') ?>" method="POST">
              <div class="form-group row">

                  <label class="col-md-2 col-form-label">Pilih</label>
                  <div class="col-md-10">
                      <select class="form-control" name="supplier">
                      
                      <?php if(count($suppliers) > 0): ?>
                        <?php foreach($suppliers as $sup): ?>
                          <option value="<?= $sup['supplier_id'] ?>" <?= ($selected[0]['fk_supplier'] == $sup['supplier_id'])? 'selected' : '' ?>>Stok : <?= $sup['stok'].' - '.$sup['nama_supplier'] ?></option>
                        <?php endforeach; ?>
                    <?php endif; ?>
                      </select>
                  </div>
                
              </div>
              <div class="form-group d-flex justify-content-center">
                  <button type="submit" name="submit" class="btn btn-primary mt-3 mt-sm-0">Submit</button>
                </div>
              </form>
              </div>
      </div>
  </div>
</div>

<div class="row">
  <div class="col-12">
      <div class="card">
          <div class="card-body">

              <h4 class="header-title"><?= $title ?></h4>
              <p class="card-title-desc">Menampilkan data Produk pada toko.
              </p>

              <table id="datatable" class="table table-bordered dt-responsive nowrap" style="border-collapse: collapse; border-spacing: 0; width: 100%;">
                  <thead>
                  <tr>
                      <th>ID</th>
                      <th>Nama</th>
                      <th>Harga</th>
                      <th>Foto</th>
                      <th class="text-center">Stok</th>
                      <th>Keterangan</th>
                      <th class="text-center">Aksi</th>
                  </tr>
                  </thead>
                  <tbody>
                  <?php if($products != null): ?>
                  <?php foreach($products as $produk): ?>
                  <tr>
                      <td><?= $produk['product_id'] ?></td>
                      <td><?= $produk['nama_produk'] ?></td>
                      <td><?= $produk['harga_produk'] ?></td>
                      <td><a target="_blank" href="<?= base_url('produk/'.$produk['gambar_produk']) ?>"><?= $produk['gambar_produk'] ?></a></td>
                      <td class="text-center"><?= $produk['stok'] ?></td>
                      <td><?= $produk['keterangan_produk'] ?></td>
                      <td class="text-center">
                        <div class="button-items">
                          <a class="btn btn-danger" href="<?= base_url('admin/hapus_produk/'.$produk['product_id']) ?>" 
                            onclick="return confirm('Yakin ingin menghapus produk ini ?');"
                            role="button">Hapus</a>
                          <a class="btn btn-primary" href="<?= base_url('admin/edit_produk/'.$produk['product_id']) ?>"
                            role="button">Edit</a>
                        </div>
                      </td>
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