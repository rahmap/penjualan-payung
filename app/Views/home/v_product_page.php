<?= $this->extend('layouts/main_home') ?>  

<?= $this->section('title') ?>
<?= $title ?> - <?= APP_NAME ?>
<?= $this->endSection() ?>

<?= $this->section('content') ?>
  <div class="py-5">
    <div class="container">
      <div class="row">
        <div class="col-md-12">
          <h2 class="py-2"><b><?= $produk['nama_produk'] ?></b></h2>
        </div>
      </div>
      <div class="row">
        <div class="col-md-6" style=""><img class="img-fluid d-block" src="<?= base_url('produk/'.$produk['gambar_produk']) ?>"></div>
        <div class="col-md-6" style="">
          <div class="row">
            <div class="col-md-12">
              <p class=""><?= $produk['keterangan_produk'] ?>.</p>
            </div>
          </div>
          <h1>Rp <?= number_format($produk['harga_produk'], 0, ',', '.') ?></h1><br>
          <h6 class="">Stok : <?= (session()->has('sisa_stok'))? session()->sisa_stok : $produk['stok']; ?></h6>
          <form class="form-inline py-3" action="<?= base_url('home/tambah_keranjang') ?>" method="POST">
            <div class="form-group">
              <input type="number" required max="<?= (session()->has('sisa_stok'))? session()->sisa_stok : $produk['stok']; ?>" class="form-control mr-3" name="jumlah" placeholder="Jumlah"> 
              <input type="number" required  value="<?= $produk['product_id'] ?>" class="form-control mr-3" hidden name="id_payung"> 
              <input type="number" required value="<?= $produk['harga_produk'] ?>"  class="form-control mr-3" hidden name="harga_payung"> 
              <input type="text" required value="<?= $produk['nama_produk'] ?>" class="form-control mr-3" hidden name="nama_payung"> 
              <input type="number" required value="<?= $produk['stok'] ?>" class="form-control mr-3" hidden name="stok_awal"> 
              <input type="text" required value="<?= $produk['nama_supplier'] ?>" class="form-control mr-3" hidden name="nama_supplier_order"> 
              <input type="text" required value="<?= ucwords(str_replace('-',' ',$produk['nama_produk'])) ?>" class="form-control mr-3" hidden name="slug_payung"> 
            </div>
              <button type="submit" name="submit" class="btn btn-primary ">Tambah Ke Keranjang</button>
          </form>
        </div>
      </div>
    </div>
  </div>
 <?= $this->endSection() ?>