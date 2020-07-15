<?= $this->extend('layouts/main_home') ?>

<?= $this->section('title') ?>
<?= $title ?> - <?= APP_NAME ?>
<?= $this->endSection() ?>

<?= $this->section('content') ?>
<div class="text-center py-5">
	<div class="container">
		<div class="row my-5 justify-content-center">
			<div class="col-md-9">
				<h1>Title example</h1>
				<p class="lead text-muted">Something short and leading about the collection below—its contents, the creator, etc. Make it short and sweet, but not too short so folks don't simply skip over it entirely.</p>
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
		<p>Album template is based on Bootstrap © examples.&nbsp; <br>New to Bootstrap? <a href="#">Visit the homepage</a> or read our <a href="#">getting started guide</a>.</p>
	</div>
</footer>
<?= $this->endSection() ?>
<script>
    $('.pagination').removeClass('pagination').addClass('page-numbers');
</script>