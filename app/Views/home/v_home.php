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
			<div class="col-md-4 p-3">
				<div class="card box-shadow">
					<img class="card-img-top" src="https://pingendo.com/assets/photos/wireframe/photo-1.jpg">
					<div class="card-body">
						<p class="card-text">This is a wider card with supporting text below as a natural lead-in to additional content. This content is a little bit longer.</p>
						<div class="d-flex justify-content-between align-items-center">
							<div class="btn-group">
								<button type="button" class="btn btn-sm btn-outline-secondary">View</button>
								<button type="button" class="btn btn-sm btn-outline-secondary">Edit</button>
							</div> <small class="text-muted">9 mins</small>
						</div>
					</div>
				</div>
			</div>
			<div class="col-md-4 p-3">
				<div class="card box-shadow">
					<img class="card-img-top" src="https://pingendo.com/assets/photos/wireframe/photo-1.jpg">
					<div class="card-body">
						<p class="card-text">This is a wider card with supporting text below as a natural lead-in to additional content. This content is a little bit longer.</p>
						<div class="d-flex justify-content-between align-items-center">
							<div class="btn-group">
								<button type="button" class="btn btn-sm btn-outline-secondary">View</button>
								<button type="button" class="btn btn-sm btn-outline-secondary">Edit</button>
							</div> <small class="text-muted">9 mins</small>
						</div>
					</div>
				</div>
			</div>
			<div class="col-md-4 p-3">
				<div class="card box-shadow">
					<img class="card-img-top" src="https://pingendo.com/assets/photos/wireframe/photo-1.jpg">
					<div class="card-body">
						<p class="card-text">This is a wider card with supporting text below as a natural lead-in to additional content. This content is a little bit longer.</p>
						<div class="d-flex justify-content-between align-items-center">
							<div class="btn-group">
								<button type="button" class="btn btn-sm btn-outline-secondary">View</button>
								<button type="button" class="btn btn-sm btn-outline-secondary">Edit</button>
							</div> <small class="text-muted">9 mins</small>
						</div>
					</div>
				</div>
			</div>
			<div class="col-md-4 p-3">
				<div class="card box-shadow">
					<img class="card-img-top" src="https://pingendo.com/assets/photos/wireframe/photo-1.jpg">
					<div class="card-body">
						<p class="card-text">This is a wider card with supporting text below as a natural lead-in to additional content. This content is a little bit longer.</p>
						<div class="d-flex justify-content-between align-items-center">
							<div class="btn-group">
								<button type="button" class="btn btn-sm btn-outline-secondary">View</button>
								<button type="button" class="btn btn-sm btn-outline-secondary">Edit</button>
							</div> <small class="text-muted">9 mins</small>
						</div>
					</div>
				</div>
			</div>
			<div class="col-md-4 p-3">
				<div class="card box-shadow">
					<img class="card-img-top" src="https://pingendo.com/assets/photos/wireframe/photo-1.jpg">
					<div class="card-body">
						<p class="card-text">This is a wider card with supporting text below as a natural lead-in to additional content. This content is a little bit longer.</p>
						<div class="d-flex justify-content-between align-items-center">
							<div class="btn-group">
								<button type="button" class="btn btn-sm btn-outline-secondary">View</button>
								<button type="button" class="btn btn-sm btn-outline-secondary">Edit</button>
							</div> <small class="text-muted">9 mins</small>
						</div>
					</div>
				</div>
			</div>
			<div class="col-md-4 p-3">
				<div class="card box-shadow">
					<img class="card-img-top" src="https://pingendo.com/assets/photos/wireframe/photo-1.jpg">
					<div class="card-body">
						<p class="card-text">This is a wider card with supporting text below as a natural lead-in to additional content. This content is a little bit longer.</p>
						<div class="d-flex justify-content-between align-items-center">
							<div class="btn-group">
								<button type="button" class="btn btn-sm btn-outline-secondary">View</button>
								<button type="button" class="btn btn-sm btn-outline-secondary">Edit</button>
							</div> <small class="text-muted">9 mins</small>
						</div>
					</div>
				</div>
			</div>
		</div>
		<div class="row">
			<div class="col-md-12">
				<ul class="pagination">
					<li class="page-item"> <a class="page-link" href="#"> <span>«</span></a> </li>
					<li class="page-item active"> <a class="page-link" href="#">1</a> </li>
					<li class="page-item"> <a class="page-link" href="#">2</a> </li>
					<li class="page-item"> <a class="page-link" href="#">3</a> </li>
					<li class="page-item"> <a class="page-link" href="#">4</a> </li>
					<li class="page-item"> <a class="page-link" href="#"> <span>»</span></a> </li>
				</ul>
			</div>
		</div>
	</div>
</div>
<footer class="text-muted py-2">
	<div class="container">
		<p>Album template is based on Bootstrap © examples.&nbsp; <br>New to Bootstrap? <a href="#">Visit the homepage</a> or read our <a href="#">getting started guide</a>.</p>
	</div>
</footer>
<?= $this->endSection() ?>