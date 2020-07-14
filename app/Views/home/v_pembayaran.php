<?= $this->extend('layouts/main_home') ?>  

<?= $this->section('title') ?>
<?= $title ?> - <?= APP_NAME ?>
<?= $this->endSection() ?>

<?= $this->section('content') ?>

  <div class="py-5">
    <div class="container">
      <div class="row">
        <div class="col-md-12">
          <h3>Detail Pesanan</h3>
        </div>
      </div>
      <div class="row">
        <div class="col-md-4">
          <ul class="list-group">
            <li class="list-group-item d-flex justify-content-between align-items-center"> Payung Pantai <span class="badge badge-primary badge-pill" contenteditable="true">2</span> </li>
            <li class="list-group-item d-flex justify-content-between align-items-center"> Payung Golf <span class="badge badge-primary badge-pill">2</span> </li>
            <li class="list-group-item d-flex justify-content-between align-items-center"> Payung Hujan Biasa <span class="badge badge-primary badge-pill">1</span> </li>
          </ul>
        </div>
        <div class="col-md-4">
          <form class="">
            <div class="form-group"> <label>Alamat Pengiriman</label> <input type="email" class="form-control" placeholder="Jalan Nusa Indah . . ."> </div>
            <div class="form-group mb-0"> <label>Pengiriman</label> </div>
            <div class="row">
              <div class="col-md-6">
                <div class="form-check-inline">
                  <label class="form-check-label">
                    <input type="radio" class="form-check-input" name="optradio">Dalam Kota (DIY) </label>
                </div>
              </div>
              <div class="col-md-6">
                <div class="form-check-inline">
                  <label class="form-check-label">
                    <input type="radio" class="form-check-input" name="optradio">Luar Kota </label>
                </div>
              </div>
            </div>
          </form>
          <div class="form-group"> <label>Total Bayar</label> <input type="password" class="form-control" placeholder="Rp. 200.000" readonly=""> </div>
        </div>
        <div class="col-md-4">
          <form class="">
            <div class="form-group">
              <label for="sel1">Metode Pembayaran :</label>
              <select class="form-control" id="sel1">
                <option>Bank BRI</option>
                <option>Uang Cash</option>
              </select>
            </div>
          </form>
          <div class="row">
            <div class="col-md-12 d-flex justify-content-center"><button type="submit" class="btn btn-primary">Pesan Sekarang</button></div>
          </div>
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