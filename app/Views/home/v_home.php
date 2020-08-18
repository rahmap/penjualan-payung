<?= $this->extend('layouts/main_home') ?>

<?= $this->section('title') ?>
<?= $title ?> - <?= APP_NAME ?>
<?= $this->endSection() ?>

<?= $this->section('content') ?>
<div class="py-5 text-center text-white h-100 align-items-center d-flex" 
style="background-image: linear-gradient(rgba(0, 0, 0, 0.75), rgba(0, 0, 0, 0.75)), 
url(&quot;https://hips.hearstapps.com/hmg-prod.s3.amazonaws.com/images/best-umbrellas-1563507664.png?crop=1.00xw:1.00xh;0,0&resize=1200:*&quot;); 
background-position: center center, center center; background-size: cover, cover; background-repeat: repeat, repeat;" >
    <div class="container py-5">
      <div class="row">
        <div class="mx-auto col-lg-8 col-md-10">
          <h1 class="display-3 mb-4"><?= APP_NAME ?></h1>
          <p class="lead mb-5">Toko Payung Legendaris, menjual payung berkualitas.</p>
        </div>
      </div>
    </div>
  </div>
<div class="py-4 bg-light">
	<div class="container">
		<div class="row">
		<?php foreach($products as $pro): ?>
			<div class="col-md-4 p-3">
				<div class="card box-shadow">
					<a href="<?= base_url('detail/'.strtolower(str_replace(' ','-',$pro['nama_produk']))) ?>">
						<img class="card-img-top" src="<?= base_url('produk/'.$pro['gambar_produk']) ?>">
					</a>
					<div class="card-body">
						<p class="lead"><b><?= $pro['nama_produk'] ?></b></p>
						<p class="card-text"><?= $pro['keterangan_produk'] ?></p>
						<div class="d-flex justify-content-between align-items-center">
							<div class="btn-group">
								<a href="<?= base_url('detail/'.strtolower(str_replace(' ','-',$pro['nama_produk']))) ?>"><button type="button" class="btn btn-sm btn-outline-secondary">Detail</button></a>
							</div> <h6 class="heading"><b>Rp <?= number_format($pro['harga_produk'], 0, ',', '.') ?></b></h6>
						</div>
					</div>
				</div>
			</div>
		<?php endforeach; ?>
		</div>
	</div>
</div>
<footer class="text-muted py-2">
	<div class="container">
		<p><?= APP_NAME ?> © 2020.&nbsp; <br>Toko Payung Legendaris, menjual payung berkualitas. Made by <b><a href="#"><?= CREATOR ?></a></b></p>
	</div>
</footer>
<?= $this->endSection() ?>
<script>
    $('.pagination').removeClass('pagination').addClass('page-numbers');
</script>