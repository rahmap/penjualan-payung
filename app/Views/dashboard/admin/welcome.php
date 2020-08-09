<?= $this->extend('layouts/main_dashboard') ?>

<?= $this->section('title') ?>
<?= $title ?>
<?= $this->endSection() ?>

<?= $this->section('outCSS') ?>

<?= $this->endSection() ?>

<?= $this->section('pageName') ?>
<?= $title ?>
<?= $this->endSection() ?>

<?= $this->section('breadcrumb') ?>
<li class="breadcrumb-item"><a href="#"><?= APP_NAME ?></a></li>
<li class="breadcrumb-item"><a href="javascript: void(0);">Welcome</a></li>
<li class="breadcrumb-item active">Main</li>
<?= $this->endSection() ?>

<?= $this->section('content') ?>
	<div class="row">
		<div class="col-sm-6 col-xl-3">
			<div class="card">
				<div class="card-body">
					<div class="media">
						<div class="media-body">
							<h5 class="font-size-14">Pesanan</h5>
						</div>
						<div class="avatar-xs">
							<span class="avatar-title rounded-circle bg-primary">
									<i class="dripicons-box"></i>
							</span>
						</div>
					</div>
					<h4 class="m-0 align-self-center"><?= $pesanan['PESANAN'] ?></h4>
					<p class="mb-0 mt-3 text-muted">Menampilkan jumlah pesanan selesai</p>
				</div>
			</div>
		</div>

		<div class="col-sm-6 col-xl-3">
			<div class="card">
				<div class="card-body">
					<div class="media">
						<div class="media-body">
							<h5 class="font-size-14">Pendapatan</h5>
						</div>
						<div class="avatar-xs">
							<span class="avatar-title rounded-circle bg-primary">
									<i class="dripicons-briefcase"></i>
							</span>
						</div>
					</div>
					<h4 class="m-0 align-self-center">Rp <?=  number_format($pendapatan['UANG'], 0, ',', '.') ?></h4>
					<p class="mb-0 mt-3 text-muted">Menampilkan pendapatan toko</p>
				</div>
			</div>
		</div>

		<div class="col-sm-6 col-xl-3">
			<div class="card">
				<div class="card-body">
					<div class="media">
						<div class="media-body">
							<h5 class="font-size-14">Produk</h5>
						</div>
						<div class="avatar-xs">
							<span class="avatar-title rounded-circle bg-primary">
									<i class="dripicons-tags"></i>
							</span>
						</div>
					</div>
					<h4 class="m-0 align-self-center"><?= $barang['BARANG'] ?></h4>
					<p class="mb-0 mt-3 text-muted">Menampilkan jumlah produk tersedia</p>
				</div>
			</div>
		</div>

		<div class="col-sm-6 col-xl-3">
			<div class="card">
				<div class="card-body">
					<div class="media">
						<div class="media-body">
							<h5 class="font-size-14">Produk Terjual</h5>
						</div>
						<div class="avatar-xs">
							<span class="avatar-title rounded-circle bg-primary">
									<i class="dripicons-cart"></i>
							</span>
						</div>
					</div>
					<h4 class="m-0 align-self-center"><?= $barang_terjual['BARANG_TERJUAL'] ?></h4>
					<p class="mb-0 mt-3 text-muted">Menampilkan jumlah barang terjual</p>
				</div>
			</div>
		</div>

	</div>
<?= $this->endSection() ?>

<?= $this->section('outJS') ?>

<?= $this->endsection() ?>