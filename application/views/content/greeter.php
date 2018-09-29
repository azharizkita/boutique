<html>
<head>
	<title>Boutique</title>
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
	<script src="<?php echo base_url('assets/js/')?>jquery.js"></script>
	<script src="<?php echo base_url('assets/js/')?>popper.js"></script>
	<script src="<?php echo base_url('assets/js/')?>bootstrap.min.js"></script>
	<link rel="stylesheet" href="<?php echo base_url('assets/css/')?>bootstrap.min.css">
	<link rel="stylesheet" href="<?php echo base_url('assets/css/')?>floatingLable.css">

</head>
<body>

<form class="form-signin animated fadeIn"
	  method="POST" action="<?php echo base_url() ?>index.php/greeter/login">
	<div class="text-center mb-4">
		<h1 class="mb-4">Welcome</h1>
		<?php if (isset($error)) {
			echo $error;
		}; ?></div>

	<div class="form-label-group">
		<input id="inputUsername" class="form-control" placeholder="Username" required="" autofocus="" type="text"
			   name="username">
		<label for="inputUsername">Username</label>
		<?php echo form_error('username'); ?>
	</div>

	<div class="form-label-group">
		<input id="inputPassword" class="form-control" placeholder="Password" required="" type="password"
			   name="password">
		<label for="inputPassword">Password</label>
		<?php echo form_error('password'); ?>
	</div>

	<div class="text-center mb-4">
		Don't have an account?
		<button type="button" class="btn btn-link" data-toggle="modal" data-target="#exampleModalCenter">
			Register
		</button>

	</div>
	<button class="btn btn-lg waves-effect btn-primary btn-block" type="submit">Sign in</button>
</form>

<!-- Modal -->
<div class="modal fade" id="exampleModalCenter" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle"
	 aria-hidden="true">
	<div class="modal-dialog modal-dialog-centered" role="document">
		<div class="modal-content">
			<div class="modal-header">
				<h5 class="modal-title" id="exampleModalLongTitle">New account!</h5>
				<button type="button" class="close" data-dismiss="modal" aria-label="Close">
					<span aria-hidden="true">&times;</span>
				</button>
			</div>
			<div class="modal-body">
				<form class="form-signin" method="POST" action="<?php echo base_url() ?>index.php/greeter/register">
					<div class="form-label-group">
						<input id="inputName" class="form-control" placeholder="Name" required="" autofocus=""
							   type="text"
							   name="nameR">
						<label for="inputName">Name</label>
					</div>
					<div class="form-label-group">
						<input id="inputEmail" class="form-control" placeholder="Email" required="" type="email"
							   name="emailR">
						<label for="inputEmail">Email</label>
					</div>
					<div class="form-label-group">
						<input id="inputUsernameR" class="form-control" placeholder="Username" required="" type="text"
							   name="usernameR">
						<label for="inputUsernameR">Username</label>
					</div>

					<div class="form-label-group">
						<input id="inputPasswordR" class="form-control" placeholder="Password" required=""
							   type="password"
							   name="passwordR">
						<label for="inputPasswordR">Password</label>
					</div>
					<button type="Submit" class="btn btn-primary waves-effect">Register</button>
				</form>
			</div>
		</div>
	</div>
</div>

</body>
</html>