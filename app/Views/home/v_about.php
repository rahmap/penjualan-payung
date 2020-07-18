<?= $this->extend('layouts/main_home') ?>

<?= $this->section('title') ?>
<?= $title ?> - <?= APP_NAME ?>
<?= $this->endSection() ?>

<?= $this->section('content') ?>
<div class="text-center py-5">
	<div class="container">
		<div class="row my-5 justify-content-center">
			<div class="col-md-9">
				<h1><?= APP_NAME ?></h1>
				<p class="lead text-muted">Jika Terjadi kesalahan pengiriman barang atau keluh kesah lainnya mengenai pembelian silahkan hubungi : <b>088980894214</b></p>
			</div>
		</div>
	</div>
</div>
<footer class="text-muted py-2">
	<div class="container">
    <p>Nomer Rekening : <br></p>
    <p>BRI : <b>0453543534634534</b></p>
	</div>
</footer>
<?= $this->endSection() ?>
<script>
    $('.pagination').removeClass('pagination').addClass('page-numbers');
</script>