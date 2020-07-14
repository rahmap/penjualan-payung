<?= $this->extend('layouts/main_home') ?>

<?= $this->section('title') ?>
<?= $title ?> - <?= APP_NAME ?>
<?= $this->endSection() ?>

<?= $this->section('content') ?>
  <div class="py-5" style="">
    <div class="container">
      <div class="row">
        <div class="col-md-6"><img class="img-fluid d-block" src="https://static.pingendo.com/img-placeholder-1.svg"></div>
        <div class="col-md-6">
          <form class="" action="<?= base_url('auth/login') ?>" method="POST">
            <div class="form-group"> <label>Email</label> <input type="email" class="form-control <?= (\Config\Services::validation()->getError('email'))? 'is-invalid' : '' ; ?>" name="email" placeholder="Masukkan email"> <small class="form-text text-muted">Email yang sudah anda daftarkan di <?= APP_NAME ?>.</small> 
            <div class="invalid-feedback">
                <?= \Config\Services::validation()->getError('email'); ?>
							</div>
            </div>
            <div class="form-group"> <label>Password</label> <input type="password" name="password" class="form-control <?= (\Config\Services::validation()->getError('password'))? 'is-invalid' : '' ; ?>" placeholder="Masukkan password"> 
              <div class="invalid-feedback">
                <?= \Config\Services::validation()->getError('password'); ?>
							</div>
            </div> <button type="submit" name="submit" class="btn btn-primary">Submit</button>
          </form>
        </div>
      </div>
    </div>
  </div>
  <?= $this->endSection() ?>
