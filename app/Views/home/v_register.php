<?= $this->extend('layouts/main_home') ?>

<?= $this->section('title') ?>
<?= $title ?> - <?= APP_NAME ?>
<?= $this->endSection() ?>

<?= $this->section('content') ?>
<div class="py-5">
	<div class="container">
		<div class="row">
			<div class="col-md-6">
				<div class="col-md-12">
					<form class="" action="<?= base_url('auth/register') ?>" method="POST">
						<div class="form-group"> <label>Nama</label> <input type="text" name="nama" class="form-control <?= (\Config\Services::validation()->getError('nama'))? 'is-invalid' : '' ; ?>" placeholder="Masukkan nama">
							<div class="invalid-feedback">
                <?= \Config\Services::validation()->getError('nama'); ?>
							</div>
						</div>
						<div class="form-group"> <label>Email</label> <input type="email" name="email" class="form-control <?= (\Config\Services::validation()->getError('email'))? 'is-invalid' : '' ; ?>" placeholder="Masukkan email">
							<div class="invalid-feedback">
                <?= \Config\Services::validation()->getError('email'); ?>
							</div>
						</div>
						<div class="form-group"> <label>Kabupaten</label> <input type="text" name="kabupaten" class="form-control <?= (\Config\Services::validation()->getError('kabupaten'))? 'is-invalid' : '' ; ?>" placeholder="Masukkan kabupaten">
							<div class="invalid-feedback">
                <?= \Config\Services::validation()->getError('kabupaten'); ?>
							</div>
						</div>
						<div class="form-group"> <label>Alamat Lengkap</label> <textarea type="text" name="alamat" class="form-control <?= (\Config\Services::validation()->getError('alamat'))? 'is-invalid' : '' ; ?>"> </textarea>
							<div class="invalid-feedback">
                <?= \Config\Services::validation()->getError('alamat'); ?>
							</div>
						</div>
						<div class="form-group"> <label>Password</label> <input type="password" name="password" class="form-control <?= (\Config\Services::validation()->getError('password'))? 'is-invalid' : '' ; ?>" placeholder="Masukkan password">
							<div class="invalid-feedback">
                <?= \Config\Services::validation()->getError('password'); ?>
							</div>
						</div>
						<div class="form-group"> <label>Password Konfirmasi</label> <input type="password" name="password1" class="form-control <?= (\Config\Services::validation()->getError('password1'))? 'is-invalid' : '' ; ?>" placeholder="Masukkan password konfirmasi">
							<div class="invalid-feedback">
                <?= \Config\Services::validation()->getError('password1'); ?>
							</div>
						</div>
						<button type="submit" name="submit" class="btn btn-primary">Submit</button>
					</form>
				</div>
			</div>
			<div class="col-md-6"><img class="img-fluid d-block" src="https://static.pingendo.com/img-placeholder-1.svg"></div>
		</div>
	</div>
</div>
<?= $this->endSection() ?>
