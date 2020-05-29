<!DOCTYPE html>
<html lang="en">

<head>
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
  <link rel="stylesheet" href="<?= base_url() ?>assets/css/style.css">
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <title><?= $title ?></title>
</head>

<body bgcolor="#000000">
<!-- Sidebar -->
  <div class="wrapper d-flex align-items-stretch">
    <nav id="sidebar">
      <div class="p-4 pt-5">
        <a href="#" class="img logo rounded-circle mb-5" style="background-image: url(images/logo.jpg);"></a>
        <div class="profile-usertitle">
          <div class="profile-usertitle-name"><?php echo $this->session->userdata('user'); ?></div>
          <div class="profile-usertitle-status"><span class="indicator label-success"></span>Online</div>
        </div>
        <div class="clear"></div>
      <div class="divider"></div>
      <a href="#" sidebar></a>
      <ul class="list-unstyled components mb-5">
        <li class="active">
          <a href="#homeSubmenu" data-toggle="collapse" aria-expanded="false" class="dropdown-toggle">Home</a>
          <ul class="collapse list-unstyled" id="homeSubmenu">
            <li>
              <a href="<?= base_url()?>user/guitar">Guitar</a>
            </li>
            <li>
              <a href="<?= base_url()?>user/piano">Piano</a>
            </li>
            <li>
              <a href="<?= base_url()?>user/bass">Bass</a>
            </li>
            <li>
              <a href="<?= base_url() ?>user/violin">Violin</a>
            </li>
          </ul>
        </li>
        <li>
          <a href="<?= base_url() ?>login/logout">Logout</a>
        </li>
  </div>
  </nav>
  <!-- End Sidebar -->

  <!-- Page Content  -->
  <div id="content" class="p-4 p-md-5">
      <!-- Navbar -->
    <nav class="navbar sticky-top  navbar-dark bg-dark">
      <button type="button" id="sidebarCollapse" class="btn btn-dark">
        <i class="fa fa-bars"></i>
        <span class="sr-only">Toggle Menu</span>
      </button>
      <a class="navbar-brand" href="<?= base_url()?>user/guitar">Music Shop</a>
      <form class="form-inline my-2 my-lg-0" action="" method="POST">
        <input class="form-control mr-sm-2" type="search" placeholder="Search" name="keyword">
        <button class="btn btn-outline-success my-2 my-sm-0" type="submit">Search</button>
      </form>
    </nav>
    <!-- End Navbar -->