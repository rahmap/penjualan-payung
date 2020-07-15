<!DOCTYPE html>
<html>

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <!-- PAGE settings -->
  <link rel="icon" href="https://templates.pingendo.com/assets/Pingendo_favicon.ico">
  <title><?= $this->renderSection('title') ?></title>
  <meta name="description" content="Penjualan Payung">
  <meta name="keywords" content="Penjulan Payung">
  <meta name="author" content="Rian">
  <!-- CSS dependencies -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css" type="text/css">
  <link rel="stylesheet" href="<?= base_url('assets/home/wireframe.css') ?>">
  <script src="https://cdn.jsdelivr.net/npm/sweetalert2@9"></script>
  <?= $this->renderSection('outCSS') ?>
</head>

<body>
<?= (session()->has('message'))? session()->message : '' ?>
<div class="collapse bg-dark" id="navbarHeader" style="">
  <div class="container">
    <div class="row">
      <div class="col-md-7 py-4">
        <h4>About</h4>
        <p class="text-info">Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.</p>
      </div>
      <div class="col-md-3 offset-md-1 py-4">
        <h4>Contact</h4>
        <ul class="list-unstyled">
          <li>
            <a href="#" class="text-secondary">Follow on Twitter</a>
          </li>
          <li>
            <a href="#" class="text-secondary">Like on Facebook</a>
          </li>
          <li>
            <a href="#" class="text-secondary">Email me</a>
          </li>
        </ul>
      </div>
    </div>
  </div>
</div>
<nav class="navbar navbar-expand-md navbar-dark bg-dark">
  <div class="container"> <button class="navbar-toggler navbar-toggler-right border-0" type="button" data-toggle="collapse" data-target="#navbar12">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbar12"> <a class="navbar-brand d-none d-md-block" href="<?= route_to('home') ?>">
        <i class="fa d-inline fa-lg fa-circle"></i>
        <b> <?= APP_NAME ?></b>
      </a>
      <ul class="navbar-nav mx-auto">
        <li class="nav-item"> <a class="nav-link" href="#">Features</a> </li>
        <li class="nav-item"> <a class="nav-link" href="#">Pricing</a> </li>
        <li class="nav-item"> <a class="nav-link" href="#">About</a> </li>
      </ul>
      <ul class="navbar-nav">
      <?php if(session()->has('user_id')){ ?>
        <?php if(session()->role == 'ADMIN'): ?>
        <li class="nav-item"> <a class="nav-link text-primary" href="<?= route_to('dashboard-admin') ?>">Dashboard</a> </li>
        <?php else: ?>
        <li class="nav-item"> <a class="nav-link text-primary" href="<?= route_to('dashboard-member') ?>">Dashboard</a> </li>
        <?php endif; ?>
        <li class="nav-item"> <a class="nav-link text-primary" href="<?= route_to('logout') ?>">Logout</a> </li>
      <?php } else { ?>
        <li class="nav-item"> <a class="nav-link" href="<?= route_to('login') ?>">Log in</a> </li>
        <li class="nav-item"> <a class="nav-link text-primary" href="<?= route_to('register') ?>">Register</a> </li>
      <?php } ?>
        
      </ul>
    </div>
  </div>
</nav>

<?= $this->renderSection('content') ?>

<script src="https://code.jquery.com/jquery-3.5.1.min.js" ></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>
<?= $this->renderSection('outJS') ?>
</body>

</html>