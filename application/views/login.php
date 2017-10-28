<div id="container" ng-app="usuarios_app" ng-controller="usuario_controller">
	<h1>Inicio de Sesión</h1>

	<div id="body">
		<form id="" ng-submit="enviar_login()" method="post">
			<label>Usuario:</label>
			<input type="text" ng-model="usuario.email" class="form-control" required>

			<label>Clave:</label>
			<input type="password" ng-model="usuario.clave" class="form-control" required>

			<br/>
			<button type="submit" class="btn btn-primary">Entrar</button>
		</form>
		
	</div>

	<p class="footer">&nbsp;</p>
</div>