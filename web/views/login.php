<!DOCTYPE html>
<html>
<head>
<title>Facturacion</title>

<meta name="viewport" content="width=device-width, initial-scale=1.0">
<link rel="stylesheet" href="web/css/bootstrap.min.css" media="screen" />
<link rel="stylesheet" href="web/css/bootstrap-responsive.min.css"
	media="screen" />

<style>
body {
	padding-top: 60px;
}

.main-hero {
	margin: 30px;
}

.footer {
	background-color: #f5f5f5;
	height: 60px;
}
</style>

</head>
<body>

	<?php 

	if(isset($_GET["login"]) && $_GET["login"] == 0){
	
		echo "Datos de Acceso Incorrectos";
	}
	
	?>

	<div class="navbar navbar-inverse navbar-fixed-top">
		<div class="navbar-inner">
			<div class="container-fluid">
				<a class="brand" href="#">Facturacion</a> <a class="btn btn-navbar"
					data-toggle="collapse" data-target=".nav-collapse"> <span
					class="icon-bar"></span> <span class="icon-bar"></span> <span
					class="icon-bar"></span>
				</a>
				

				
				<div class="nav-collapse in collapse" >

					<form action="controlador.php" id="formLogin" class="navbar-form pull-right">

						<input type="hidden" name="action" value="login">
						<input type="hidden" name="method" value="entrar">
						<input type="text" class="span2" name="username"
							placeholder="username" required="required"> <input type="password" class="span2"
							name="password" placeholder="password" required="required">
						<!-- <button type="submit" class="btn"> Entrar </button>-->

						<div class="btn-group">
							<button class="btn">Entrar</button>
							<button class="btn dropdown-toggle" data-toggle="dropdown">
								<span class="caret"></span>
							</button>

							<ul class="dropdown-menu pull-right">
								<li><a href="javascript:;"><i class="icon-check"></i>
										Registrarse</a></li>
							</ul>
						</div>
					</form>
				</div>

			</div>
		</div>
	</div>

	<div class="container-fluid">
		<div class="row-fluid">
			<div class="hero-unit">
				<h1>Sistema de Facturacion</h1>
				<p>Sistema para el control de sus facturas de Venta, lleve el
					control de sus facturas, clientes y productos de manera efectiva</p>
				<p>
					<a class="btn btn-primary btn-large">Conseguir una cuenta</a>
				</p>
			</div>
		</div>
	</div>

	<div class="container-fluid">
		<div class="row-fluid">
			<div class="span4">
				<h2>Facturas</h2>
				<p>Genere sus facturas a partir de los datos registrados en el
					sistema</p>
				<p>
					<a class="btn btn-success" href="#">Detalles &raquo;</a>
				</p>
			</div>

			<div class="span4">
				<h2>Productos</h2>
				<p>Registro de los datos de los productos en su catalogo,
					Identifique sus productos por nombre, tipo, precio, etc.</p>
				<p>
					<a class="btn btn-success" href="#">Detalles &raquo;</a>
				</p>
			</div>

			<div class="span4">
				<h2>Clientes</h2>
				<p>Registre los datos de sus clientes para generar facturas de sus
					ventas</p>
				<p>
					<a class="btn btn-success" href="#">Detalles &raquo;</a>
				</p>
			</div>
		</div>
	</div>

	<div class="row_fluid">&nbsp;</div>

	<div class="footer">
		<div class="container-fluid">

			<div class="row-fluid">&nbsp;</div>

			<p class="muted ">
				<a href="">Desarrollado por Gerardo A Lopez</a>
			</p>
		</div>
	</div>


	<script src="web/js/jquery.js"></script>
	<script src="web/js/bootstrap.min.js"></script>
	<script src="web/js/login.js"></script>
</body>
</html>