<!DOCTYPE html>
<html lang="en">
<head>
	
	<!-- start: Meta -->
	<meta charset="utf-8">
	<title>Registro</title>
	<meta name="description" content="Metro Admin Template.">
	<meta name="author" content="Łukasz Holeczek">
	<meta name="keyword" content="Metro, Metro UI, Dashboard, Bootstrap, Admin, Template, Theme, Responsive, Fluid, Retina">
	<!-- end: Meta -->
	
	<!-- start: Mobile Specific -->
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<!-- end: Mobile Specific -->
	
	<!-- start: CSS -->
	<link id="bootstrap-style" href="{{asset('backend/css/bootstrap.min.css')}}" rel="stylesheet">
	<link href="{{asset('backend/css/bootstrap-responsive.min.css')}}" rel="stylesheet">
	<link id="base-style" href="{{asset('backend/css/style.css')}}" rel="stylesheet">
	<link id="base-style-responsive" href="{{asset('backend/css/style-responsive.css')}}" rel="stylesheet">
	<link href='http://fonts.googleapis.com/css?family=Open+Sans:300italic,400italic,600italic,700italic,800italic,400,300,600,700,800&amp;subset=latin,cyrillic-ext,latin-ext' rel='stylesheet' type='text/css'>
	<!-- end: CSS -->
		
	<!-- start: Favicon -->
	<link rel="shortcut icon" href="{{URL::to('backend/img/favicon.ico')}}">
	<!-- end: Favicon -->
	
	<style type="text/css">
		body { background: url({{URL::to('backend/img/bg-login.jpg')}}) !important; }
	</style>
		
</head>

<body>
	<div class="container-fluid-full">
		<div class="row-fluid">				
			<div class="row-fluid">
				<div class="login-box">
					<div class="icons">
						<a href="index.html"><i class="halflings-icon home"></i></a>
						<a href="#"><i class="halflings-icon cog"></i></a>
					</div>
					<p class="alert-danger">
					<?php
						$messege=Session::get('messege');
							if($messege) {
								echo $messege;
								Session::put('messege',null);
							}
					?>
					</p>
					<h2>Registro de usuario</h2>
					<form class="form-horizontal" action="/usuario" method="POST">
						{{ csrf_field() }}
						<fieldset>							
							<div class="input-prepend" title="Username">
								<span class="add-on"><i class="halflings-icon user"></i></span>
								<input class="input-large span10" name="name" id="name" type="text" placeholder="Nombre y apellido"/>
							</div>
							<div class="clearfix"></div>
							
							<div class="input-prepend" title="username">
								<span class="add-on"><i class="halflings-icon user"></i></span>
								<input class="input-large span10" name="username" id="username" type="text" placeholder="Nombre de usuario"/>
							</div>
							<div class="clearfix"></div>

							<div class="input-prepend" title="email">
								<span class="add-on"><i class="halflings-icon user"></i></span>
								<input class="input-large span10" name="email" id="email" type="text" placeholder="Correo electrónico"/>
							</div>
							<div class="clearfix"></div>

							<div class="input-prepend" title="Password">
								<span class="add-on"><i class="halflings-icon lock"></i></span>
								<input class="input-large span10" name="password" id="password" type="password" placeholder="Contraseña"/>
							</div>
							<div class="clearfix"></div>

							<div class="input-prepend" title="Password">
								<span class="add-on"><i class="halflings-icon lock"></i></span>
								<input class="input-large span10" name="admin_password" id="password2" type="password" placeholder="Repita la Contraseña"/>
							</div>
							<div class="clearfix"></div>

							<div class="button-login">	
								<a href="/login" class="btn btn-primary">Atrás</a>
								<button type="submit" class="btn btn-primary">Registrar</button>
							</div>
							<div class="clearfix"></div>
					</form>	
				</div><!--/span-->
			</div><!--/row-->
		</div><!--/.fluid-container-->
	</div><!--/fluid-row-->

<!-- start: JavaScript-->
	<script src="{{asset('backend/js/jquery-1.9.1.min.js')}}"></script>
	<script src="{{asset('backend/js/jquery-migrate-1.0.0.min.js')}}"></script>	
	<script src="{{asset('backend/js/jquery-ui-1.10.0.custom.min.js')}}"></script>	
	<script src="{{asset('backend/js/modernizr.js')}}"></script>	
	<script src="{{asset('backend/js/bootstrap.min.js')}}"></script>	
	<script src="{{asset('backend/js/jquery.cookie.js')}}"></script>	
	<script src="{{asset('backend/js/excanvas.js')}}"></script>		
	<script src="{{asset('backend/js/jquery.uniform.min.js')}}"></script>
	<script src="{{asset('backend/js/custom.js')}}"></script>	
<!-- end: JavaScript-->

</body>
</html>
