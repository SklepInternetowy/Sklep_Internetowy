'use strict';

var myCtrls = angular.module('myCtrls', ['ngRoute'] );


myCtrls.controller( 'navigation', [ '$scope', '$location' , function($scope, $http){

	//$location- pozwala znaleźć ścieżke która aktualnie jest dostępna

	//console.log($location.path());

	$scope.isActive=function(path){
		return $location.path()===path;
	};

}]);

myCtrls.controller( 'products', [ '$scope', '$http' , function($scope, $http){

	$http.get('model/products.json').
	success(function(data){

		$scope.products=data;

	}).error(function(){

		console.log('Błąd pobrania pliku json')
	});

	$scope.delete=function(product, $index){

		//TODO: połączyć z API

		$scope.products.splice($index, 1);
		//spilce stosujemy na zbiorach danych
		//splice- natywna funkcja javascript słóży do usuwania/dodawani
		//ma trzy parametry: 
		//1-w którym indeksie zacząć 
		//2-ile elementów chce usunąć
		//3-dodatkowe parametry

		console.log(product);
	}

}]);

myCtrls.controller( 'productEdit', [ '$scope', '$http', '$routeParams' , function($scope, $http, $routeParams){
	$http.get('model/products.json').
	success(function(data){
		var products=data;
		$scope.product=products[$routeParams.id];
	}).error(function(){
		console.log('Błąd pobrania pliku json')
	});

	$scope.saveChanges=function(product){

		//TODO: połączyć z API

		console.log(product);
		console.log($routeParams.id);
	}
}]);

myCtrls.controller( 'productCreate', [ '$scope', '$http', function($scope, $http){
	$scope.createProduct=function(){
		//TODO: przesłać dane przez api
		console.log($scope.product);
	}
}]);


myCtrls.controller( 'users', [ '$scope', '$http', function($scope, $http){

	$http.get('model/users.json').
	success(function(data){

		$scope.users=data;

	}).error(function(){

		console.log('Błąd pobrania pliku json')
	});

	$scope.delete=function(user, $index){
		$scope.users.splice($index, 1);
		//TODO: połączyć z API	
	}

}]);

myCtrls.controller( 'userEdit', [ '$scope', '$http', '$routeParams' , function($scope, $http, $routeParams){
	$http.get('model/users.json').
	success(function(data){
		var users=data;
		$scope.user=users[$routeParams.id];
	}).error(function(){
		console.log('Błąd pobrania pliku json')
	});

	$scope.saveChanges=function(user){

		//TODO: połączyć z API

		console.log(user);
		console.log($routeParams.id);
	}
}]);

myCtrls.controller( 'userCreate', [ '$scope', '$http', function($scope, $http){
	$scope.createUser=function(){
		//TODO: przesłać dane przez api
		console.log($scope.user);
	}
}]);