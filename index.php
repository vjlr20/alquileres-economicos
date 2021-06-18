<?php 
	session_start(['name' => 'alquileres-admin']);
?>
<!DOCTYPE html>
<html lang="es" dir="ltr">
	<head>
		<meta charset="UTF-8">
		<meta name="viewport" content="width=device-width, initial-scale=1.0">
		<title>Alquileres economicos</title>
		<link rel="stylesheet" href="css/bootstrap.min.css">
		<link rel="stylesheet" href="css/style.css">
	</head>
	<body>
		<?php
			if (isset($_SESSION['user'])) {
				require_once 'views/main.php';
			} else {
				require_once 'views/login.php';
			}
		?>
		<script src="js/bootstrap.bundle.min.js"></script>
	</body>
</html>
