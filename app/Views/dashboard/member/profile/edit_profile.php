<?= $this->extend('layouts/main_dashboard_member') ?>

<?= $this->section('title') ?>
<?= $title ?>
<?= $this->endSection() ?>

<?= $this->section('outCSS') ?>

	<link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-beta.1/dist/css/select2.min.css" rel="stylesheet" />

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
<div class="col-lg-12 "> <!--    d-flex justify-content-center-->
        <div class="card">
            <div class="card-body">
                <h4 class="header-title">Update Profile</h4>
                <p class="card-title-desc">Mengupdate Data Profile.</p>

                <form class="form-inline" action="<?= base_url('dashboard/update_profile') ?>" method="POST">
                    <label class="sr-only" for="inlineFormInputName2">Nama</label>
                    <input type="text" name="" readonly class="form-control mt-3 mt-sm-0 mr-sm-3" value="<?= session()->user_name ?>">

                    <label class="sr-only" for="inlineFormInputName2">Kabupaten</label>
                    <input type="text" name="kabupaten" hidden class="form-control mt-3 mt-sm-0 mr-sm-3" value="<?= $data_pribadi['user_kabupaten'] ?>">
                    
                    <label class="sr-only" for="inlineFormInputName2">Alamat Lengkap</label>
                    <input type="text" name="alamat" hidden class="form-control mt-3 mt-sm-0 mr-sm-3" value="<?= $data_pribadi['user_alamat'] ?>">

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

<div class="row">
    <div class="col-lg-12">
        <div class="card">
            <div class="card-body">
                <h4 class="header-title">Update Profile</h4>
                <p class="card-title-desc">Mengupdate Data Profile.</p>

                <form class="form-inline" action="<?= base_url('dashboard/updateAlamatKabupaten') ?>" method="POST">
                    



										<select class="form-control m-3" name="provinsi">
                      <?php foreach ($provinsi->rajaongkir->results as $prov): ?>
												<option <?= ( $prov->province == $data_pribadi['user_provinsi'])? 'selected' : '' ; ?> value="<?= $prov->province ?>"><?= $prov->province ?></option>
                      <?php endforeach; ?>
										</select>

									<select class="form-control m-3" name="kabupaten" id="kabupaten">
                    <?php foreach ($kabupaten->rajaongkir->results as $kab): ?>
											<option <?= ($kab->city_name == $data_pribadi['user_kabupaten'])? 'selected' : '' ; ?> value="<?= $kab->city_name ?>"><?= $kab->city_name ?></option>
                    <?php endforeach; ?>
										</select>

									<label class="sr-only" for="inlineFormInputName2">Kecamatan</label>
									<input type="text" name="kecamatan" class="form-control mt-3 mt-sm-0 mr-sm-3" value="<?= $data_pribadi['user_kecamatan'] ?>">
                    <label class="sr-only" for="inlineFormInputName2">Alamat Lengkap (Kelurahan, Desa/Dusun, RT/RW atau Nomer Rumah, Kode Pos)</label>
                    <textarea type="text" name="alamat" class="form-control mt-3 mt-sm-0 mr-sm-3"><?= $data_pribadi['user_alamat'] ?></textarea>

									<input type="text" name="no_hp" class="form-control mt-3 mt-sm-0 mr-sm-3" value="<?= $data_pribadi['user_nomer_hp'] ?>">

                    <button type="submit" name="submit" class="btn btn-primary mt-3 m-2 mt-sm-0">Update</button>
                </form>
            </div>
        </div>
    </div>
</div>
<?= $this->endSection() ?>

<?= $this->section('outJS') ?>
	<script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-beta.1/dist/js/select2.min.js"></script>
	<script>
      $(document).ready(function() {
          const kabupaten = $('#kabupaten')
      		$(kabupaten).select2();

      })
	</script>
<?= $this->endsection() ?>