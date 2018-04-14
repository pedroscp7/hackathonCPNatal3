<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<title>Litologia</title>
	<!-- Tell the browser to be responsive to screen width -->
	<meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
	<!-- Bootstrap 3.3.7 -->
	<link rel="stylesheet" href="<?php echo base_url() ?>assets/bootstrap/css/bootstrap.min.css">
	<!-- Font Awesome -->
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.5.0/css/font-awesome.min.css">
	<!-- Ionicons -->
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/ionicons/2.0.1/css/ionicons.min.css">
	<!-- Theme style -->
	<link rel="stylesheet" href="<?php echo base_url() ?>assets/dist/css/AdminLTE.min.css">
	
</head>
<body class="hold-transition login-page" style="max-height: 470px">
	<div class="login-box">
		<div class="login-logo">
			<a href="<?php echo base_url() ?>assets/index2.html"><b>Lit</b>ologia</a>
		</div>
		<div class="login-box-body">

			<form action="" method="post">
				<?php echo validation_errors('<p class="bg-danger">','</p>'); ?>
				<?php if(isset($_SESSION['error'])): ?>
					<p class="bg-danger" align="center"> <?php echo $_SESSION['error']; ?></p>
				<?php endif; ?>

				<div class="form-group has-feedback">
					<label>Login</label>
					<input type="text" class="form-control" name="login" value="" placeholder="User" required>
					<span class="glyphicon glyphicon-user form-control-feedback"></span>
				</div>

				<div class="form-group has-feedback">
					<label>Senha</label>
					<input type="password" class="form-control" name="senha" placeholder="Password" required>
					<span class="glyphicon glyphicon-lock form-control-feedback"></span>
				</div>

				<div class="row">
					<div class="col-xs-4">
						<button type="submit" class="btn btn-primary btn-block btn-flat">Entrar</button>
					</div>
				</div>
			</form>
		</div>
	</div>

	<!-- jQuery 2.2.3 -->
	<script src="<?php echo base_url() ?>assets/plugins/jQuery/jquery-2.2.3.min.js"></script>
	<!-- Bootstrap 3.3.7 -->
	<script src="<?php echo base_url() ?>assets/bootstrap/js/bootstrap.min.js"></script>

</body>
</html>
