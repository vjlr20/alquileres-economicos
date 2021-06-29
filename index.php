<?php 
	session_start(['name' => 'alquileres-admin']);
?>
<!DOCTYPE html>
<html lang="es" dir="ltr">
	<head>
		<meta charset="UTF-8">
		<meta name="viewport" content="width=device-width, initial-scale=1.0">
		<meta http-equiv="X-UA-Compatible" content="ie=edge">
		<title>Alquileres económicos</title>
		<link rel="icon" type="image/png" href="static/img/favicon-white.png">
		<link rel="stylesheet" href="static/css/bootstrap.min.css">
		<link rel="stylesheet" href="static/css/jquery.dataTables.min.css">
		<link rel="stylesheet" href="vendors/material-design-iconic-font/css/material-design-iconic-font.min.css">
		<link rel="stylesheet" href="static/css/style.css">
	</head>
	<body>
		<?php
			if (isset($_SESSION['user'])) {
				require_once 'views/main.php';
			} else {
				require_once 'views/login.php';
			}
		?>
		<script src="static/js/bootstrap.bundle.min.js"></script>
		<script src="static/js/jquery-3.6.0.min.js"></script>
		<script src="static/js/jquery.dataTables.min.js"></script>
		<script>
            $(document).ready(function () {
                $('#myTable').DataTable();
            });
        </script>
	</body>
</html>
