var app = angular.module("productos_app", []);

app.controller('producto_controller', function($scope, $http, $httpParamSerializerJQLike){
	$scope.categorias = [];
	$scope.productos = [];
	$scope.producto_nuevo = {};
	$scope.producto_editar = {};

	/*
		Tipo: Funcion
		Descripcion: Obtener datos de un webservice para listar categorias en un select
	*/
	$scope.listar_categorias = function (){
		$http({
			url: SERVER + "index.php/Services_Categoria/api_listar",
			method: 'POST',
			data: $httpParamSerializerJQLike(),
			headers: {
				'Content-Type': 'application/x-www-form-urlencoded'
			}
		}).then(function successCallback(response) {
			$scope.categorias = response.data;
			if(response.data.length > 0){
				$scope.producto_nuevo.categoria = $scope.categorias[0].id
			}
		}, function errorCallback(response) {
			
		});
	}

	/*
		Tipo: Funcion
		Descripcion: Obtener datos de un webservice para listar productos en una tabla
	*/
	$scope.listar_productos = function (){
		$http({
			url: SERVER + "index.php/Services_Producto/api_listar",
			method: 'POST',
			data: $httpParamSerializerJQLike(),
			headers: {
				'Content-Type': 'application/x-www-form-urlencoded'
			}
		}).then(function successCallback(response) {
			$scope.productos = response.data;
		}, function errorCallback(response) {
			
		});
	}
	$scope.listar_productos();

	/*
		Tipo: Funcion
		Descripcion: Obtener datos de un webservice de un producto seleccionado
	*/
	$scope.consultar_producto = function (id){
		$http({
			url: SERVER + "index.php/Services_Producto/api_consultar",
			method: 'POST',
			data: $httpParamSerializerJQLike({id_producto: id}),
			headers: {
				'Content-Type': 'application/x-www-form-urlencoded'
			}
		}).then(function successCallback(response) {
			$scope.listar_categorias();
			$scope.producto_editar.id = response.data.id;
			$scope.producto_editar.nombre = response.data.nombre;
			$scope.producto_editar.descripcion = response.data.descripcion;
			$scope.producto_editar.costo = parseFloat(response.data.costo);
			$scope.producto_editar.categoria = response.data.id_categoria;
		}, function errorCallback(response) {
			
		});
	}

	/*
		Tipo: Funcion
		Descripcion: Enviar datos a webservice para crear un producto
	*/
	$scope.crear_producto = function (){
		$http({
			url: SERVER + "index.php/Services_Producto/api_crear",
			method: 'POST',
			data: $httpParamSerializerJQLike($scope.producto_nuevo),
			headers: {
				'Content-Type': 'application/x-www-form-urlencoded'
			}
		}).then(function successCallback(response) {
			alert("¡Producto creado con exito!")
			location.reload();
		}, function errorCallback(response) {
			
		});
	}

	/*
		Tipo: Funcion
		Descripcion: Enviar datos a webservice para editar un producto
	*/
	$scope.editar_producto = function (){
		$http({
			url: SERVER + "index.php/Services_Producto/api_editar",
			method: 'POST',
			data: $httpParamSerializerJQLike($scope.producto_editar),
			headers: {
				'Content-Type': 'application/x-www-form-urlencoded'
			}
		}).then(function successCallback(response) {
			alert("¡Producto actualizado con exito!")
			location.reload();
		}, function errorCallback(response) {
			
		});
	}

	/*
		Tipo: Funcion
		Descripcion: Enviar datos a webservice para borrar un producto
	*/
	$scope.borrar_producto = function (id){
		var confirmar = window.confirm("¿Desea borrar el producto?");
		if(confirmar){
			$http({
				url: SERVER + "index.php/Services_Producto/api_borrar",
				method: 'POST',
				data: $httpParamSerializerJQLike({id_borrar: id}),
				headers: {
					'Content-Type': 'application/x-www-form-urlencoded'
				}
			}).then(function successCallback(response) {
				alert("¡Producto borrado con exito!")
				location.reload();
			}, function errorCallback(response) {
				
			});
		}
		
	}

	

	/*
		Tipo: Funcion
		Descripcion: Enviar datos a webservice para cerrar una sesion
	*/
	$scope.cerrar_Sesion = function (id){
		var confirmar = window.confirm("¿Desea cerrar sesión?");
		if(confirmar){
			$http({
				url: SERVER + "index.php/Services_Usuario/api_cerrar_sesion",
				method: 'POST',
				data: $httpParamSerializerJQLike(),
				headers: {
					'Content-Type': 'application/x-www-form-urlencoded'
				}
			}).then(function successCallback(response) {
				window.location.href = SERVER;
			}, function errorCallback(response) {
				
			});
		}
		
	}

})