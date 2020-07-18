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
<li class="breadcrumb-item"><a href="javascript: void(0);">Profile</a></li>
<li class="breadcrumb-item active">Data Profile</li>
<?= $this->endSection() ?>

<?= $this->section('content') ?>
<div class="row">
    <div class="col-lg-12 d-flex justify-content-center">
        <div class="card">
            <div class="card-body">
                <h4 class="header-title">Update Profile</h4>
                <p class="card-title-desc">Mengupdate Data Profile.</p>

                <form class="form-inline" action="<?= base_url('admin/update_profile') ?>" method="POST">
                    <label class="sr-only" for="inlineFormInputName2">Nama</label>
                    <input type="text" name="" readonly class="form-control mt-3 mt-sm-0 mr-sm-3" value="<?= session()->user_name ?>">

                    <label class="sr-only" for="inlineFormInputName2">Email</label>
                    <input type="email" name="" readonly class="form-control mt-3 mt-sm-0 mr-sm-3" value="<?= session()->user_email ?>">

                    <label class="sr-only" for="inlineFormInputName2">Password</label>
                    <input type="password" placeholder="Password Baru" minlength="8" required name="password" class="form-control mt-3 mt-sm-0 mr-sm-3">

                    <label class="sr-only" for="inlineFormInputName2">Password Konfirmasi</label>
                    <input type="password" minlength="8"  placeholder="Konfirmasi Password" required name="password1" class="form-control mt-3 mt-sm-0 mr-sm-3">

                    <button type="submit" name="submit" class="btn btn-primary mt-3 mt-sm-0">Update</button>
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