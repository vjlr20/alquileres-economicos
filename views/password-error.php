<?php
    if (isset($_SESSION['username'])) {
        require_once 'views/inicio.php';
    }
?>

<link rel="stylesheet" href="static/css/signin.css">

<style>
	.bd-placeholder-img {
		font-size: 1.125rem;
		text-anchor: middle;
		-webkit-user-select: none;
		-moz-user-select: none;
		user-select: none;
	}

	@media (min-width: 768px) {
		.bd-placeholder-img-lg {
			font-size: 3.5rem;
		}
	}
</style>

<main class="form-signin text-center">
	<div class="text-center">
        <h3>Error al reestablecer contraseña</h3>
        <br>
        <p>Al parecer las contraseñas ingresadas no coinciden.</p>
    </div>
    <div class="mt-3">
		<div class="text-center">
			<a href="index.php?page=reestablecer" class="link">Intentar reestablecer contraseña nuevamente</a>
		</div>
	</div>
    <p class="mt-5 mb-3 text-muted">&copy; <?php echo date('Y'); ?></p>
</main>

