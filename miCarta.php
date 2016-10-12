<?php
require_once __DIR__.'/includes/config.php';
require_once __DIR__.'/includes/Usuario.php';
require_once __DIR__.'/includes/Objeto.php';

$user= new \equipo\Usuario();
$obj = new \equipo\Objeto();


?>
<!DOCTYPE HTML>
<hmtl>
	<head>
		<title> Principal </title>
	
		<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
		<meta http-equiv="Content-Type" content="text/html; charset= utf-8"/>
		<script>
			$(document).ready(function(){
			    $("#botonCerrar").click(function(){
					$(location).attr('href',"./cerrarSesion.php");
			    });
			});
		</script>
		
	</head>
	
<body>
	<?php		
	require ('views/cerrarSesion.php');
	if(isset($_SESSION['nombre'])){
		echo $_SESSION['nombre'];
		$nick = $_SESSION['nombre'];
	}
	else
		header("Location:./");

	?>
		
		<!-- === CONTENIDO === -->
		<div id="contenedor">
			<p><h1>Mi carta</h1></p>
			<?php
				$misObjetos = $obj->recuperarCarta($nick);
				if(empty($misObjetos)){
			?>	
					<p><h2>Todavía no has añadido ningún objeto</h2></p>
			<?php
				}
				else{
					$obj->pintarObjetos($misObjetos);
			?>
					<button type="button" onclick="location.href = './anadirObjeto.php'" >Añadir</button>
			<?php
				}

			?>
		</div> <!-- FIN Contenedor -->
	
	</body>
</html>