<?php
session_start();

	if(!isset($_SESSION['usuario'])){
		session_destroy();
		header("Location: login.php");
	}
?>

<html>
	<head>
		<title>PERFIL ADMINISTRADOR</title>
		<meta charset="utf-8">
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<link href="css/bootstrap.min.css" rel="stylesheet" type="text/css">
		<link href="css/css.css" rel="stylesheet" type="text/css"> <!-- cssgeneral -->
		<link href="css/bootstrap-yeti-theme.css" rel="stylesheet"type="text/css">
		<link href="css/font-awesome.min.css" rel="stylesheet" type="text/css">
		<link href="css/site.css" rel="stylesheet" type="text/css">    
		<link href="css/bootstrap-datetimepicker.css" rel="stylesheet"type="text/css">
		<script src="js/jquery-1.11.3.min.js" type="text/javascript"></script>
		<script src="js/bootstrap.min.js" type="text/javascript"></script>
		<script src="js/momentjs-with-locale.js" type="text/javascript"></script>
		<script src="js/bootstrap-datetimepicker.min.js" type="text/javascript"></script>
		<script src="js/site.js" type="text/javascript"></script>
	</head>
	<style>
		/* para cambiar el color del contenido*/
		.jumbotron {
			  background-color: #C39BD3; /* cambio */
			  color: #fff;
			  padding: 100px 25px;
			  font-family: Montserrat, sans-serif;
		  }
		
		#perfil{
			font-size: 5px;
		}
	</style>

	<body id="myPage" data-spy="scroll" data-target=".navbar" data-offset="60">
		<nav class="navbar navbar-default navbar-fixed-top">
			<div class="container">
			
				
				<div class="navbar-header">
					<button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#myNavbar" >
						<span class="icon-bar"></span>
						<span class="icon-bar"></span>
						<span class="icon-bar"></span>
					</button>	
					
					<a class="navbar-brand" href="admin_perfil.php">LOGISTICA</a>
					
				</div>
				
				<div class="collapse navbar-collapse" id="myNavbar">
					<ul class="nav navbar-nav navbar-right">
							
							<li><a href="admin_empleados.php">EMPLEADOS</a></li>
							<li><a href="admin_viajes.php">VIAJES</a></li>
							<!--<li><a href="">REPORTES</a></li>-->
							<li><a href="admin_flota.php">FLOTA</a></li>
							<li><a href="salir.php">SALIR</a></li>
					
					</ul>
				</div>
				
			
			</div>
		</nav>

		<div class="jumbotron text-center">
			
			<h3 class="text-left"> HOLA ADMIN </h3>

		 <h3>DATOS DE PERFIL</h3>

			<?PHP  
				include("sql_abm.php");
				$link= Conectarse();
				$result=mysqli_query($link,"SELECT nombre,apellido,dni,area FROM Empleado WHERE usuario='".$_SESSION['usuario']."'");
				$output=array();
				/*
				$query="SELECT nombre,apellido,dni,area FROM Empleado WHERE usuario='".$_SESSION['usuario']."'"; //consulta tabla empleados para traer la info del logueado
				$result=mysqli_query($conexion,$query);	
				*/
				while($fila=mysqli_fetch_array($result)){
					echo"<p>Nombre:".$fila["nombre"]."</p>";
					echo"<p>Apellido:".$fila["apellido"]."</p>";
					echo"<p>Dni:".$fila["dni"]."</p>";
					echo"<p>Area: ".$fila["area"]."</p>";
				} 
			?>
      
		
		</div>
		
	</body>

</html>