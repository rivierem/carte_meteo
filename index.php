<!doctype html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Météo</title>

	<!-- CSS -->
	<link rel="stylesheet" href="css/bootstrap.min.css">
	<link rel="stylesheet" href="css/bootstrap-theme.min.css">
	<link rel="stylesheet" href="css/meteo.css">

	<!-- JS -->
	<script src="http://code.jquery.com/jquery-latest.min.js"></script>
	<script type="text/javascript">
	$(document).ready(function{
		// $('')
	});
	</script>
</head>
<body>
	<header class="container">
		<h1>Météo</h1>
	</header>
	<div class="container main_wrapper">
			<!-- <div class="row"> -->
				<div class="col-lg-7">
					<h2>Informations</h2>
					<?php include('parse_xml.php'); ?>
				</div>
				<div classe="container col-lg-5">
					<h2>Carte de la Réunion</h2>
					<hr>
					<?php include('day_list.php'); ?>
					<?php day_list(); ?>
					<hr>
					<div id="map_reunion">
						<?php display_meteo(); ?>
						<!-- <span class="temp_int cilaos">30°</span> -->
					
					</div>
				</div>
			<!-- </div> -->

	</div>
</body>
</html>