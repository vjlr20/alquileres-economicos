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
	<form id="login-form" method="POST" action="core/auth.php">
		<input type="hidden" name="action" id="action" value="login">
		<img class="mb-4" src="static/img/alquileres_economicos_logo.png" alt="" width="140" height="107">
		<h1 class="h4 mt-3 mb-4 fw-normal">Por favor, identifíquese</h1>
		<div class="form-floating">
			<input type="text" class="form-control" id="username" name="username" placeholder="name@example.com">
			<label for="floatingInput">Usuario</label>
		</div>
		<div class="form-floating">
			<input type="password" class="form-control" name="password" id="password" placeholder="Password">
			<label for="floatingPassword">Contraseña</label>
		</div>
		<button class="w-100 btn btn-lg btn-primary" type="submit">Iniciar Sesión</button>
	</form>
	<div class="mt-3">
		<div class="text-center">
			<a href="index.php?page=reestablecer" class="link">Reestablecer contraseña</a>
		</div>
	</div>
	<p class="mt-5 mb-3 text-muted">&copy; <?php echo date('Y'); ?></p>
</main>

