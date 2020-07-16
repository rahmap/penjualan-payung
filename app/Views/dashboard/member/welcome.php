<?= $this->extend('layouts/main_dashboard_member') ?>

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

<?= $this->endSection() ?>

<?= $this->section('outJS') ?>

<?= $this->endsection() ?>