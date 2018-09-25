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

<nav class="navbar navbar-expand-lg navbar-light bg-light">
  <a class="navbar-brand" href="#">Boutique</a>
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>
  <div class="collapse navbar-collapse" id="navbarNav">
    <ul class="navbar-nav">
      <li class="nav-item active">
        <a class="nav-link" href="#"><?php echo $this->session->userdata("user_nama") ?> <span class="sr-only">(current)</span></a>
      </li>
    </ul>
  </div>
</nav>