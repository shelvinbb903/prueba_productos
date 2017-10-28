
<div class="container" ng-app="productos_app" ng-controller="producto_controller">
	<nav class="navbar navbar-inverse">
		<div class="container-fluid">
		<ul class="nav navbar-nav">
		  <li class="active"><a href="#">Productos</a></li>
		</ul>
		<ul class="nav navbar-nav navbar-right">
				<li><a href="#" ng-click="cerrar_Sesion()"><span class="glyphicon glyphicon-log-in"></span> Salir</a></li>
		</ul>
		</div>
	</nav>

	<div id="container">
	
		<h1>Productos</h1>
		<div class="row">
			<div class="col-md-12" align="right">
				<button type="button" class="btn btn-success" data-toggle="modal" data-target="#modal_crear" ng-click="listar_categorias()"><i class="fa fa-plus fa-1x" aria-hidden="true"></i></button><br/><br/>	
			</div>
			
			<table class="table table-hover">
			    <thead>
			      <tr>
			        <th>Nombre</th>
			        <th>Descripcion</th>
			        <th>Costo</th>
			        <th>Categoria</th>
			        <th>Editar</th> 
			        <th>Borrar</th>
			      </tr>
			    </thead>
			    <tbody>
			      	<tr ng-repeat="(key, value) in productos">
						<td>{{value.nombre}}</td>
						<td>{{value.descripcion}}</td>
						<td>{{value.costo}}</td>
						<td>{{value.descripcion_categoria}}</td>
						<td><i class="fa fa-pencil fa-2x" aria-hidden="true" data-toggle="modal" data-target="#modal_editar" ng-click="consultar_producto(value.id)"></i></td>
						<td><i class="fa fa-trash fa-2x" aria-hidden="true" ng-click="borrar_producto(value.id)"></i></td>
					</tr>
			    </tbody>
		  	</table>

		</div>
	</div>	
	<!-- Modal -->
	<div id="modal_crear" class="modal fade" role="dialog" data-keyboard="false" data-backdrop="static">
		<div class="modal-dialog">

			<!-- Modal content-->
			<div class="modal-content">
				<div class="modal-header">
					<button type="button" class="close" data-dismiss="modal">&times;</button>
					<h4 class="modal-title">Nuevo Producto</h4>
				</div>
				<div class="modal-body">
					<form method="post" ng-submit="crear_producto()" id="">
						<label>Nombre</label>
						<input type="text" class="form-control" ng-model="producto_nuevo.nombre" required>

						<label>Descripción</label>
						<textarea class="form-control" ng-model="producto_nuevo.descripcion" required></textarea>

						<label>Costo</label>
						<input type="number" min="1" class="form-control" ng-model="producto_nuevo.costo" required>

						<label>Categoria</label>
						<select class="form-control" ng-model="producto_nuevo.categoria" required>
							<option value="{{value.id}}" ng-repeat="(key, value) in categorias">{{value.descripcion}}</option>
						</select>
						<br/>
						<button type="submit" class="btn btn-primary">Guardar</button>
					</form>
					
				</div>	
			</div>

		</div>
	</div>

	<!-- Modal -->
	<div id="modal_editar" class="modal fade" role="dialog" data-keyboard="false" data-backdrop="static">
		<div class="modal-dialog">

			<!-- Modal content-->
			<div class="modal-content">
				<div class="modal-header">
					<button type="button" class="close" data-dismiss="modal">&times;</button>
					<h4 class="modal-title">Editar Producto</h4>
				</div>
				<div class="modal-body">
					<form method="post" ng-submit="editar_producto()" id="">
						<label>Nombre</label>
						<input type="text" class="form-control" ng-model="producto_editar.nombre" required>

						<label>Descripción</label>
						<textarea class="form-control" ng-model="producto_editar.descripcion" required></textarea>

						<label>Costo</label>
						<input type="number" min="1" class="form-control" ng-model="producto_editar.costo" required>

						<label>Categoria</label>
						<select class="form-control" ng-model="producto_editar.categoria" required>
							<option value="{{value.id}}" ng-repeat="(key, value) in categorias">{{value.descripcion}}</option>
						</select>
						<br/>
						<button type="submit" class="btn btn-primary">Guardar</button>
					</form>
					
				</div>	
			</div>

		</div>
	</div>
</div>