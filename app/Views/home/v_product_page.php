<?= $this->extend('layouts/main_home') ?>  

<?= $this->section('title') ?>
<?= $title ?> - <?= APP_NAME ?>
<?= $this->endSection() ?>

<?= $this->section('content') ?>
  <div class="py-5">
    <div class="container">
      <div class="row">
        <div class="col-md-12">
          <h2 class="py-2">Payung Pantai</h2>
        </div>
      </div>
      <div class="row">
        <div class="col-md-6" style=""><img class="img-fluid d-block" src="https://static.pingendo.com/img-placeholder-1.svg"></div>
        <div class="col-md-6" style="">
          <div class="row">
            <div class="col-md-12">
              <p class="">Paragraph. Then, my friend, when darkness overspreads my eyes, and heaven and earth seem to dwell in my soul and absorb its power, like the form of a beloved mistress, then I often think with longing.</p>
            </div>
          </div>
          <h1>Rp 90.000<br></h1>
          <h6 class="">Stok : 10</h6>
          <form class="form-inline py-3">
            <div class="form-group">
              <input type="email" class="form-control mr-3" id="inputmailinline" placeholder="Jumlah"> </div>
            <button type="submit" class="btn btn-primary ">Tambah Ke Keranjang</button>
          </form>
        </div>
      </div>
    </div>
  </div>
 <?= $this->endSection() ?>