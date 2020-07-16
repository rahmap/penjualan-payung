<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <link rel="shortcut icon" href="<?= base_url('') ?>/apaxy/images/favicon.ico">
    <title>Dashboard - <?= $this->renderSection('title') ?></title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta content="Website Cloting Modern" name="description" />
    <meta content="<?= CREATOR ?>" name="author" />
    <!-- App favicon -->
    <link rel="shortcut icon" href=" <?= base_url('favicon.ico') ?>">

    <!-- Bootstrap Css -->
    <link href=" <?= base_url('apaxy/css/bootstrap.min.css') ?>" rel="stylesheet" type="text/css" />
    <!-- Icons Css -->
    <link href="<?= base_url('apaxy/css/icons.min.css') ?>" rel="stylesheet" type="text/css" />

    <?= $this->renderSection('outCSS') ?>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@9"></script>
    <!-- App Css-->
    <link href="<?= base_url('apaxy/css/app.min.css') ?>" rel="stylesheet" type="text/css" />
</head>

<body data-topbar="colored">
<?= (session()->has('message'))? session()->message : '' ?>
    <!-- Begin page -->
    <div id="layout-wrapper">

        <header id="page-topbar">
            <div class="navbar-header">
                <div class="d-flex">
                    <!-- LOGO -->
                    <div class="navbar-brand-box">
                        <a href="<?= base_url('/') ?>" class="logo logo-dark">
                            <span class="logo-sm">
                                <img src="<?= base_url('apaxy/images/logo-sm-dark.png') ?>" alt="" height="22">
                            </span>
                            <span class="logo-lg">
                                <img src="<?= base_url('apaxy/images/logo-dark.png') ?>" alt="" height="20">
                            </span>
                        </a>

                        <a href="<?= base_url('/') ?>" class="logo logo-light">
                            <span class="logo-sm">
                                <img src="<?= base_url('apaxy/images/logo-sm-light.png') ?>" alt="" height="22">
                            </span>
                            <span class="logo-lg">
                                <img src="<?= base_url('apaxy/images/logo-light.png') ?>" alt="" height="20">
                            </span>
                        </a>
                    </div>

                    <button type="button" class="btn btn-sm px-3 font-size-24 header-item waves-effect"
                        id="vertical-menu-btn">
                        <i class="mdi mdi-backburger"></i>
                    </button>

                    <!-- App Search-->
                </div>

                <div class="d-flex">

                    <div class="dropdown d-inline-block d-lg-none ml-2">
                        <button type="button" class="btn header-item noti-icon waves-effect"
                            id="page-header-search-dropdown" data-toggle="dropdown" aria-haspopup="true"
                            aria-expanded="false">
                            <i class="mdi mdi-magnify"></i>
                        </button>
                    </div>


                    <div class="dropdown d-none d-lg-inline-block ml-1">
                        <button type="button" class="btn header-item noti-icon waves-effect" data-toggle="fullscreen">
                            <i class="mdi mdi-fullscreen"></i>
                        </button>
                    </div>


                    <div class="dropdown d-inline-block">
                        <button type="button" class="btn header-item waves-effect" id="page-header-user-dropdown"
                            data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            <img class="rounded-circle header-profile-user"
                                src="<?= base_url('apaxy/images/users/avatar-1.jpg') ?>" alt="Header Avatar">
                            <span class="d-none d-sm-inline-block ml-1"><?= session()->user_nama ?></span>
                            <i class="mdi mdi-chevron-down d-none d-sm-inline-block"></i>
                        </button>
                        <div class="dropdown-menu dropdown-menu-right">
                            <!-- item-->
                            <a class="dropdown-item" href="#"><i
                                    class="mdi mdi mdi-settings-outline font-size-16 align-middle mr-1"></i> Pengaturan</a>
                            <div class="dropdown-divider"></div>
                            <a class="dropdown-item" href="<?= route_to('logout') ?>"><i
                                    class="mdi mdi-logout font-size-16 align-middle mr-1"></i> Logout</a>
                            <form id="logout-form" action="" method="POST" style="display: none;">
                            </form>
                        </div>
                    </div>

                </div>
            </div>
        </header>

        <!-- ========== Left Sidebar Start ========== -->
        <div class="vertical-menu">

            <div data-simplebar class="h-100">

                <!--- Sidemenu -->
                <div id="sidebar-menu">
                    <!-- Left Menu Start -->
                    <ul class="metismenu list-unstyled" id="side-menu">
                        <li class="menu-title">Menu</li>

                        <li>
                            <a href="<?= route_to('dashboard-member') ?>" class="waves-effect">
                                <i class="mdi mdi-view-dashboard"></i>
                                <span
                                    class="badge badge-pill badge-success float-right"></span>
                                <span>Dashboard</span>
                            </a>
                        </li>
                        <li>
                            <a href="<?= route_to('dashboard-member') ?>" class="waves-effect">
                                <i class="mdi mdi-view-dashboard"></i>
                                <span
                                    class="badge badge-pill badge-success float-right"></span>
                                <span>Data Pemesanan</span>
                            </a>
                        </li>

                        <li>
                            <a href="javascript: void(0);" class="waves-effect">
                                <i class="mdi mdi mdi-settings-outline"></i>
                                <span>Pengaturan</span>
                            </a>
                        </li>


                    </ul>

                </div>
                <!-- Sidebar -->
            </div>
        </div>
        <!-- Left Sidebar End -->

        <!-- ============================================================== -->
        <!-- Start right Content here -->
        <!-- ============================================================== -->
        <div class="main-content">

            <div class="page-content">
                <div class="container-fluid">

                    <!-- start page title -->
                    <div class="row">
                        <div class="col-12">
                            <div class="page-title-box d-flex align-items-center justify-content-between">
                                <h4 class="mb-0 font-size-18"><?= $this->renderSection('pageName','Dashboard') ?></h4> 

                                <div class="page-title-right">
                                    <ol class="breadcrumb m-0">
                                        <?= $this->renderSection('breadcrumb') ?>
                                    </ol>
                                </div>

                            </div>
                        </div>
                    </div>
                    <!-- end page title -->
                    <?= $this->renderSection('content') ?>
                </div> <!-- container-fluid -->
            </div>
            <!-- End Page-content -->


            <footer class="footer">
                <div class="container-fluid">
                    <div class="row">
                        <div class="col-sm-6">
                            <?= date('Y', time()) ?> © <a href="#">
                                <?= APP_NAME ?></a>
                        </div>
                        <div class="col-sm-6">
                            <div class="text-sm-right d-none d-sm-block">
                                Crafted with <i class="mdi mdi-heart text-danger"></i> by <a
                                    href="<?= CREATOR_LINK ?>"><?= CREATOR ?></a>
                            </div>
                        </div>
                    </div>
                </div>
            </footer>
        </div>
        <!-- end main content-->

    </div>
    <!-- END layout-wrapper -->


    <!-- Right bar overlay-->
    <div class="rightbar-overlay"></div>

    <!-- JAVASCRIPT -->
    <script src="<?= base_url('apaxy/libs/jquery/jquery.min.js') ?>"></script>
    <script src="<?= base_url('apaxy/libs/bootstrap/js/bootstrap.bundle.min.js') ?>"></script>
    <script src="<?= base_url('apaxy/libs/metismenu/metisMenu.min.js') ?>"></script>
    <script src="<?= base_url('apaxy/libs/simplebar/simplebar.min.js') ?>"></script>
    <script src="<?= base_url('apaxy/libs/node-waves/waves.min.js') ?>"></script>

    <?= $this->renderSection('outJS') ?>

    <script src="<?= base_url('apaxy/js/app.js') ?>"></script>
</body>

</html>