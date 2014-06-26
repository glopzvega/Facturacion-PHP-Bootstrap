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

	<div class="navbar navbar-inverse navbar-fixed-top">
		<div class="navbar-inner">
			<div class="container-fluid">
				<a class="brand" href="#">Facturacion</a> <a class="btn btn-navbar"
					data-toggle="collapse" data-target=".nav-collapse"> <span
					class="icon-bar"></span> <span class="icon-bar"></span> <span
					class="icon-bar"></span>
				</a>

				

				<ul class="nav">
					<li class="dropdown"><a class="dropdown-toggle"
						data-toggle="dropdown" href="javascript:;"> Aplicacion <b
							class="caret"></b>
					</a>
						<ul class="dropdown-menu dropdown-menu-inverse">
							<li><a class="opcionMenu" href="#facturas"> <i
									class="icon-list-alt"></i> Facturas
							</a></li>
							<li><a class="opcionMenu" href="#clientes"> <i
									class="icon-list-alt"></i> Clientes
							</a></li>
							<li><a class="opcionMenu" href="#productos"> <i
									class="icon-list-alt"></i> Productos
							</a></li>
						</ul></li>
				</ul>

				<ul class="nav pull-right">

					<li class="dropdown">					
						
						<a class="dropdown-toggle"
							data-toggle="dropdown" href="javascript:;"> <?php echo $_SESSION["login"]["nombre"]; ?> <b
								class="caret"></b>
						</a>
						
						<ul class="dropdown-menu dropdown-menu-inverse">
							<li>
								<a class="opcionMenu" href="#perfil"
									style="text-align: right"> Mi Cuenta 
									<i class="icon-user"></i>
								</a>
							</li>
							
							<li>
								<a class="" href="controlador.php?action=login&method=salir"
									style="text-align: right"> Salir 
									<i class="icon-off"></i>
								</a>
							</li>
						</ul>
					
					</li>
				</ul>
			</div>
		</div>
	</div>
	
<!-- Main Container -->

	<div class="container-fluid">
		<div class="row-fluid">


<!-- Menu Left -->

			<div class="span2 ">
				<div class="well sidebar-nav">
					<ul class="nav nav-list">
						<li class="nav-header">Vistas Principales</li>
						<li class="active">
							<a href="#clientes" class="opcionMenu"><i class="icon-user"></i>Clientes</a></li>						
						<li class="">
							<a href="#productos" class="opcionMenu"><i class="icon-tag"></i> Productos</a></li>
												
						<li class="divider"></li>						
						
						<li class=""><a href="#facturas" class="opcionMenu"><i class="icon-plus"></i> Facturas</a></li>												
												
					</ul>
				</div>
			</div>
			
<!-- Module Loader -->	 
		
			<div id="moduleContainer" class="span10" >				
				<div class="tabbable span12">
					<ul class="nav nav-tabs" id="TabModuleContainer"></ul>					
					<div class="tab-content"></div>					
				</div>
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
	<script src="web/js/app.js"></script>
</body>
</html>