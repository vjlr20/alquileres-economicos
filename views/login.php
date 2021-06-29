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
	<form>
		<img class="mb-4" src="static/img/alquileres_economicos_logo.png" alt="" width="140" height="107">
		<h1 class="h4 mt-3 mb-4 fw-normal">Por favor, identifíquese</h1>
		<div class="form-floating">
			<input type="email" class="form-control" id="floatingInput" placeholder="name@example.com">
			<label for="floatingInput">Usuario</label>
		</div>
		<div class="form-floating">
			<input type="password" class="form-control" id="floatingPassword" placeholder="Password">
			<label for="floatingPassword">Contraseña</label>
		</div>
		<button class="w-100 btn btn-lg btn-primary" type="submit">Iniciar Sesión</button>
		<p class="mt-5 mb-3 text-muted">&copy; <?php echo date('Y'); ?></p>
	</form>
</main>
