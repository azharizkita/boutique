<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?><!DOCTYPE html>
<html lang="en">
	<head>
		<meta charset="UTF-8">
		<meta name="viewport" content="width=device-width, initial-scale=1.0">
		<meta http-equiv="X-UA-Compatible" content="ie=edge">
		<title>Boutique</title>
		<script src="<?php echo base_url('assets/js/')?>jquery.js"></script>
		<script src="<?php echo base_url('assets/js/')?>popper.js"></script>
		<script src="<?php echo base_url('assets/js/')?>bootstrap.min.js"></script>
    <link href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet"
		  integrity="sha384-wvfXpqpZZVQGK6TAh5PVlGOfQNHSoD2xbE+QkPxCAFlNEevoEH3Sl0sibVcOQVnN" crossorigin="anonymous">
		<link rel="stylesheet" href="<?php echo base_url('assets/css/')?>bootstrap.min.css">
  </head>
  <style>
        .floating:hover,
        .floating:focus {
            box-shadow: 0 0.5em 0.5em -0.4em var(--hover);
            transform: translateY(-0.25em);
            transition: 0.25s;
        }
        html {
	position: relative;
	min-height: 100%;
}

body {
	/* Margin bottom by footer height */
	margin-bottom: 0px;
}

.footer {
	position: absolute;
	bottom: 0;
	width: 100%;
	height: 0px;
	background-color: #f5f5f5;
}
    </style>
<body>

<nav class="navbar navbar-expand-lg navbar-light bg-light sticky-top">
  <a class="navbar-brand" href="">Boutique</a>
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>

  <div class="collapse navbar-collapse" id="navbarSupportedContent">
    <ul class="navbar-nav mr-auto">
      <li class="nav-item active">
        <a class="nav-link" href="<?php echo $this->session->userdata('user_priv')?>">Home</a>
      </li>
      <?php if ($this->session->userdata('user_priv')=="Pelanggan") {
        ?>
      <li class="nav-item">
        <a class="nav-link" href="boutique">Galeri pakaian</a>
      </li>
        <?php
      }?>

    </ul>
    <form class="form-inline my-2 my-lg-0">
    <div class="input-group">
    <span class="input-group-text"><?php echo $this->session->userdata("user_nama") ?></span>
    <div class="input-group-append">
    <a class="nav-link btn btn-outline-danger" href="./<?php echo $this->session->userdata("user_priv"); ?>/logout">Logout<span class="sr-only">(current)</span></a>
    </div>
    </form>
    </div>
  </div>
</nav>

<div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel">
  <ol class="carousel-indicators">
    <li data-target="#carouselExampleIndicators" data-slide-to="0" class="active"></li>
    <li data-target="#carouselExampleIndicators" data-slide-to="1"></li>
    <li data-target="#carouselExampleIndicators" data-slide-to="2"></li>
  </ol>
  <div class="carousel-inner">
    <div class="carousel-item active">
      <img class="d-block w-100" src="<?php echo base_url('assets/images/header/')?>1.jpeg" alt="First slide">
      <div class="carousel-caption d-none d-md-block" style="background: rgba(0,0,0,0.75)">
      <h5>Kunjungi website kami setiap hari!</h5>
      <p>Nantikan ide-ide baru dan keren yang kami kumpulkan dari user kami setiap harinya!</p>
      </div>
    </div>
    <div class="carousel-item">
      <img class="d-block w-100" src="<?php echo base_url('assets/images/header/')?>2.jpeg" alt="Second slide">
      <div class="carousel-caption d-none d-md-block" style="background: rgba(0,0,0,0.75)">
      <h5>Quality over Quantitiy</h5>
      <p>Kami selalu mementingkan kepuasan pelanggan, sehingga kami selalu memantau kualitas bahan yang digunakan.</p>
      </div>
    </div>
    <div class="carousel-item">
      <img class="d-block w-100" src="<?php echo base_url('assets/images/header/')?>3.jpeg" alt="Third slide">
      <div class="carousel-caption d-none d-md-block" style="background: rgba(0,0,0,0.75)">
      <h5>Penjahit Profesional</h5>
      <p>Para penjahit kami tentunya sudah sangat berpengalaman dalam mengolah bahan menjadi pakaian yang keren!</p>
      </div>
    </div>
  </div>
  <a class="carousel-control-prev" href="#carouselExampleIndicators" role="button" data-slide="prev">
    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
    <span class="sr-only">Previous</span>
  </a>
  <a class="carousel-control-next" href="#carouselExampleIndicators" role="button" data-slide="next">
    <span class="carousel-control-next-icon" aria-hidden="true"></span>
    <span class="sr-only">Next</span>
  </a>
</div>
<hr>