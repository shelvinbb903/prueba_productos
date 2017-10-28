var app = angular.module("usuarios_app", []);

app.controller('usuario_controller', function($scope, $http, $httpParamSerializerJQLike){
	$scope.usuario = {};

	$scope.enviar_login = function(){
		
		$http({
			url: SERVER + "index.php/Services_Usuario/api_iniciar_sesion",
			method: 'POST',
			data: $httpParamSerializerJQLike($scope.usuario),
			headers: {
				'Content-Type': 'application/x-www-form-urlencoded'
			}
		}).then(function successCallback(response) {
			if(response.data.ESTADO === "OK"){
				window.location.href = SERVER + "index.php/Config_Producto/listado";
			}else{
				alert("El usuario ingresado no existe")
			}
		}, function errorCallback(response) {
			
		});
	}
})