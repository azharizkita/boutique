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
    <link rel="stylesheet" href="<?php echo base_url('assets/css/')?>bootstrap.min.css">
</head>
<body>
<nav class="navbar navbar-expand-lg navbar-light bg-light fixed-top">
	<a class="navbar-brand" style="font-family: 'Anton', sans-serif;" href="<?php echo base_url(); ?>"
	   alt="Klinik Online">Boutique</a>
	<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent"
			aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
		<span class="navbar-toggler-icon"></span>
	</button>

	<div class="collapse navbar-collapse" id="navbarSupportedContent">
		<ul class="navbar-nav mr-auto">
			<li class="nav-item">
				<a class="dropdown-item">Home</a>
			</li>
			<li class="nav-item">
				<a class="dropdown-item">Showcase</a>
			</li>
			<li class="nav-item">
				<a class="dropdown-item">Pesanan</a>
			</li>
		</ul>
		<hr>

		<div class="dropdown">
			<button class="btn btn btn-outline-info dropdown-toggle" type="button" id="dropdownMenu"
					data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
			</button>
			<div class="dropdown-menu animated flipInX" aria-labelledby="dropdownMenu">
				<a class="dropdown-item" href="<?php echo base_url() ?>index.php/logout">Log out</a>
			</div>
		</div>

</nav>