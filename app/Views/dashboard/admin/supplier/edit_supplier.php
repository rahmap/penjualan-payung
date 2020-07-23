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
<li class="breadcrumb-item"><a href="javascript: void(0);">Supplier</a></li>
<li class="breadcrumb-item active">Data Supplier</li>
<?= $this->endSection() ?>

<?= $this->section('content') ?>
<div class="row">
    <div class="col-lg-12 d-flex justify-content-center">
        <div class="card">
            <div class="card-body">
                <h4 class="header-title">Update Supplier</h4>
                <p class="card-title-desc">Mengupdate Data Supplier Toko.</p>

                <form class="form-inline" action="<?= base_url('admin/edit_supplier/'.$supplier['supplier_id']) ?>" method="POST">
                    <label class="sr-only" for="inlineFormInputName2">Name Supplier</label>
                    <input type="text" name="nama" class="form-control mt-3 mt-sm-0 mr-sm-3" value="<?= $supplier['nama_supplier'] ?>" placeholder="Nama Supplier">

                    <button type="submit" name="submit" class="btn btn-primary mt-3 mt-sm-0">Submit</button>
                </form>
            </div>
        </div>
    </div>
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