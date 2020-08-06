<?= $this->extend('layouts/main_dashboard') ?>

<?= $this->section('title') ?>
<?= $title ?>
<?= $this->endSection() ?>

<?= $this->section('outCSS') ?>

<?= $this->endSection() ?>

<?= $this->section('pageName') ?>
<?= $title ?>
<?= $this->endSection() ?>

<?= $this->section('breadcrumb') ?>
  <li class="breadcrumb-item"><a href="#"><?= APP_NAME ?></a></li>
  <li class="breadcrumb-item"><a href="javascript: void(0);">Produk</a></li>
  <li class="breadcrumb-item active">Tambah Stok Produk</li>
<?= $this->endSection() ?>

<?= $this->section('content') ?>
  <div class="row">
    <div class="col-12">
      <div class="card">
        <div class="card-body">

          <h4 class="header-title">Tambah Stok Produk</h4>
          <p class="card-title-desc">Menambah Stok Produk ke Toko.</p>
          <form action="<?= base_url('admin/tambah_stok') ?>" method="POST" enctype="multipart/form-data">
            <div class="form-group row">

              <label class="col-md-2 col-form-label">Produk</label>
              <div class="col-md-10">
                <select class="form-control" required name="produk" id="produk">

                  <?php if(count($produks) > 0): ?>
                      <option value=""> - Pilih -</option>
                    <?php foreach($produks as $pro): ?>
                      <option value="<?= $pro['product_id'] ?>" data-stok="<?= $pro['stok'] ?>"><?= $pro['nama_produk'] ?></option>
                    <?php endforeach; ?>
                  <?php endif; ?>
                </select>
              </div>

            </div>
            <div class="form-group row">
              <label for="example-text-input" class="col-md-2 col-form-label">Stok Payung</label>
              <div class="col-md-10">
                <input class="form-control" type="number" id="stok" disabled name="" value="">
              </div>
            </div>
            <div class="form-group row">
              <label for="example-text-input" class="col-md-2 col-form-label">Jumlah Penambahan Stok</label>
              <div class="col-md-10">
                <input class="form-control" required type="number" name="jumlah" value="" id="jumlah">
              </div>
            </div>
            <div class="form-group d-flex justify-content-center">
              <button type="submit" onclick="return confirm('Yakin ingin menambah stok produk ini ?');" name="submit" class="btn btn-primary mt-3 mt-sm-0">Submit</button>
            </div>
          </form>
        </div>
      </div>
    </div>
    <!-- end col -->
  </div>
<?= $this->endSection() ?>

<?= $this->section('outJS') ?>
	<script>
		$(document).ready(function () {
			$('#produk').on('change', function () {
				$('#stok').val($(this).find(':selected').data('stok'));
				console.log($(this).find(':selected').data('stok'))
      })
    })
	</script>
<?= $this->endsection() ?>