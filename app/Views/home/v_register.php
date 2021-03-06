<?= $this->extend('layouts/main_home') ?>

<?= $this->section('title') ?>
<?= $title ?> - <?= APP_NAME ?>
<?= $this->endSection() ?>

<?= $this->section('outCSS') ?>
<link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-beta.1/dist/css/select2.min.css" rel="stylesheet" />
<?= $this->endSection() ?>

<?= $this->section('content') ?>
<div class="py-5">
	<div class="container">
		<div class="row">
			<div class="col-md-6">
				<div class="col-md-12">
					<form class="" action="<?= base_url('auth/register') ?>" method="POST">
						<div class="form-group"> <label>Nama</label> <input value="<?= set_value('nama') ?>" required type="text" name="nama" class="form-control <?= (\Config\Services::validation()->getError('nama'))? 'is-invalid' : '' ; ?>" placeholder="Masukkan nama">
							<div class="invalid-feedback">
                <?= \Config\Services::validation()->getError('nama'); ?>
							</div>
						</div>
						<div class="form-group"> <label>Email</label> <input value="<?= set_value('email') ?>" required type="email" name="email" class="form-control <?= (\Config\Services::validation()->getError('email'))? 'is-invalid' : '' ; ?>" placeholder="Masukkan email">
							<div class="invalid-feedback">
                <?= \Config\Services::validation()->getError('email'); ?>
							</div>
						</div>
						<div class="form-group"> <label>Nomer HP</label> <input value="<?= set_value('no_hp') ?>" required type="number" name="no_hp" class="form-control <?= (\Config\Services::validation()->getError('no_hp'))? 'is-invalid' : '' ; ?>" placeholder="Contoh : 08984329425">
							<div class="invalid-feedback">
                <?= \Config\Services::validation()->getError('no_hp'); ?>
							</div>
						</div>
						<div class="form-group"> <label>Provinsi</label>
							<select required name="provinsi" class="form-control <?= (\Config\Services::validation()->getError('provinsi'))? 'is-invalid' : '' ; ?>" id="provinsi">
								<?php foreach ($provinsi->rajaongkir->results as $prov): ?>
									<option data-id_prov="<?= $prov->province_id ?>" value="<?= $prov->province ?>"><?= $prov->province ?></option>
								<?php endforeach; ?>
							</select>
							<div class="invalid-feedback">
                <?= \Config\Services::validation()->getError('provinsi'); ?>
							</div>
						</div>
						<div class="form-group"> <label>Kabupaten</label>
							<select required name="kabupaten" class="form-control <?= (\Config\Services::validation()->getError('kabupaten'))? 'is-invalid' : '' ; ?>" id="kabupaten">

							</select>
							<div class="invalid-feedback">
                <?= \Config\Services::validation()->getError('kabupaten'); ?>
							</div>
						</div>
						<div class="form-group"> <label>Kecamatan</label> <input value="<?= set_value('kecamatan') ?>" required type="text" name="kecamatan" class="form-control <?= (\Config\Services::validation()->getError('kecamatan'))? 'is-invalid' : '' ; ?>" placeholder="Masukkan kecamatan">
							<div class="invalid-feedback">
								<?= \Config\Services::validation()->getError('kecamatan'); ?>
							</div>
						</div>
						<div class="form-group"> <label>Kelurahan, Desa/Dusun, RT/RW, Kode Pos</label> <textarea required type="text" name="alamat" class="form-control <?= (\Config\Services::validation()->getError('alamat'))? 'is-invalid' : '' ; ?>"> </textarea>
							<div class="invalid-feedback">
                <?= \Config\Services::validation()->getError('alamat'); ?>
							</div>
						</div>
						<div class="form-group"> <label>Password</label> <input required type="password" name="password" class="form-control <?= (\Config\Services::validation()->getError('password'))? 'is-invalid' : '' ; ?>" placeholder="Masukkan password">
							<div class="invalid-feedback">
                <?= \Config\Services::validation()->getError('password'); ?>
							</div>
						</div>
						<div class="form-group"> <label>Password Konfirmasi</label> <input required type="password" name="password1" class="form-control <?= (\Config\Services::validation()->getError('password1'))? 'is-invalid' : '' ; ?>" placeholder="Masukkan password konfirmasi">
							<div class="invalid-feedback">
                <?= \Config\Services::validation()->getError('password1'); ?>
							</div>
						</div>
						<button type="submit" name="submit" class="btn btn-primary">Submit</button>
					</form>
				</div>
			</div>
			<div class="col-md-6"><img class="img-fluid d-block" src="https://media.wired.com/photos/5eb9d17e48074637267906e0/1:1/w_1799,h_1799,c_limit/Gear-Feature-Blunt-Coupe-SOURCE-Blunt.jpg"></div>
		</div>
	</div>
</div>
<?= $this->endSection() ?>

<?= $this->section('outJS') ?>
<script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-beta.1/dist/js/select2.min.js"></script>
<script>
	$(document).ready(function() {
      const kabupaten = $('#kabupaten');
      const provinsi = $('#provinsi');
      const BASE_URL = "<?php echo base_url() ?>";

			$(kabupaten).select2();
      getKabupatenByIDProv()

      $(provinsi).on('change', function () {
          getKabupatenByIDProv()
      })

			function getKabupatenByIDProv() {
          $.ajax({
              url: BASE_URL + '/auth/getKabupatenRO/'+ provinsi.find(':selected').data('id_prov'),
              dataType: "json",
              success: function(result) {
                  $(kabupaten).children('option').remove();

                  $(kabupaten).append(result.rajaongkir.results.map(function (sObj) {
                      return '<option value="' +
                          sObj.city_name + '">' +
                          sObj.city_name + '</option>'
                  }));
              }
          });
      }
	});
</script>
<?= $this->endSection() ?>
