<?= $this->extend('layouts/main_home') ?>  

<?= $this->section('title') ?>
<?= $title ?> - <?= APP_NAME ?>
<?= $this->endSection() ?>

<?= $this->section('content') ?>

  <div class="py-5">
    <div class="container">
      <div class="row">
        <div class="col-md-12">
          <h3><b>Detail Pesanan</b></h3>
        </div>
      </div>
      <div class="row">
        <div class="col-md-4">
          <ul class="list-group">
            <?php foreach($cart as $c): ?>
            <li class="list-group-item d-flex justify-content-between align-items-center"> <?= $c['name'] ?> <small><i>Rp <?= number_format($c['price'], 0, ',', '.') ?></i></small> <span class="badge badge-primary badge-pill" contenteditable="true"><?= $c['qty'] ?></span> </li>
            <?php endforeach; ?>
          </ul>
        </div>
        <div class="col-md-4">
          <form class="" action="<?= route_to('payment_action') ?>" method="POST">
            <div class="form-group"> <label>Alamat Pengiriman</label> <textarea name="alamat" type="text" class="form-control" > </textarea></div>
            <div class="form-group mb-0"> <label>Pengiriman</label> </div>
            <div class="row">
              <div class="col-md-6">
                <div class="form-check-inline">
                  <label class="form-check-label">
                    <input type="radio" class="form-check-input" value="Dalam Kota" checked name="pengiriman">Dalam Kota (DIY) </label>
                </div>
              </div>
              <div class="col-md-6">
                <div class="form-check-inline">
                  <label class="form-check-label">
                    <input type="radio" class="form-check-input" value="Luar Kota" name="pengiriman">Luar Kota </label>
                </div>
              </div>
            </div>
            <br>
          <div class="form-group"> <label>Total Bayar</label> <input type="text" class="form-control" placeholder="Rp <?= number_format($total, 0, ',', '.') ?>" readonly=""> </div>
        </div>
        <div class="col-md-4">
            <div class="form-group">
              <label for="sel1">Metode Pembayaran :</label>
              <select class="form-control" name="bayar" id="sel1">
                <option value="BRI">Bank BRI</option>
                <option value="CASH">Uang Cash</option>
              </select>
            </div>
            <div class="form-group"> <label>Nomer Telefon</label> <input type="text" name="phone" class="form-control"></div>
            <div class="row">
              <div class="col-md-12 d-flex justify-content-center"><button type="submit" name="submit" class="btn btn-primary">Pesan Sekarang</button></div>
            </div>
          </form>
        </div>
      </div>
    </div>
  </div>
  <div class="py-5">
    <div class="container">
      <div class="row">
        <div class="col-md-12">
          <h4 class=""><b>Informasi</b>&nbsp;<span class="badge badge-pill badge-warning">!</span></h4>
          <p class="">Nomer Rekening BRI : <b>0943-2787-6456-3454 </b><br>Jika Metode Pembayaran Uang Cash, maka pembayaran dilakukan langsung ke Toko.<br>Pengiriman Luar Kota Yogyakarta mendapatkan biaya Flat sebesar Rp. 100.000, jika dalam Kota Yogyakarta akan gratis.</p>
        </div>
      </div>
    </div>
  </div>
<?= $this->endSection() ?>