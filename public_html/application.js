'use strict'; //definiujemy zawsze na początku plików js (tryb strict)
//wyłapuje wszelkie błędy które w normalnym trybie nie byłyby widoczne
// w trybie strict będą

var app = angular.module('app', ['ngRoute', 'myCtrls'] ); //inicjalizowanie modułów angulara

//kontroler obsługuje logiczną część działania aplikacji
//wszystkie akcje, funkcje, przekierowania
//zarządza przesyłem danych
//przetwarza wejściowe dane przesłane z widoku
//wysyła zapytania do bazy danych


//konfigurujemy niektóre elementy naszej aplikacji ngRoute
//httpProvider - serwis który pomoże nam śledzić różne zmiany adresów
//i przekierowywać nas pod wpływem różnych zapytań


app.config(['$routeProvider', '$httpProvider' , function($routeProvider, $httpProvider){
	//routeProvider.when()- będzie sprawdzać kiedy coś będzie sie zmieniało
	//w naszej przeglądarce

	//============= Products =============

	$routeProvider.when('/products',{
		controller: 'products',
		templateUrl: 'partials/products.html'
	});

	$routeProvider.when('/product/edit/:id',{
		controller: 'productEdit',
		templateUrl: 'partials/product-edit.html'
	});

	$routeProvider.when('/product/create/',{
		controller: 'productCreate',
		templateUrl: 'partials/product-create.html'
	});

	//============= Default =============

	$routeProvider.otherwise({
		redirectTo: '/home'
	});

	//============= Users ==============

	$routeProvider.when('/users',{
		controller: 'users',
		templateUrl: 'partials/users.html'
	});

	$routeProvider.when('/user/edit/:id',{
		controller: 'userEdit',
		templateUrl: 'partials/user-edit.html'
	});

	$routeProvider.when('/user/create/',{
		controller: 'userCreate',
		templateUrl: 'partials/user-create.html'
	});

	$routeProvider.when('/login',{
		controller: 'login',
		templateUrl: 'partials/login.html'
	});
}]);





// $scope łączy widok z modelem
//jeśli zmodyfikuje jakieś dane w widoku to automatycznie
//jest przekazwyane do kontrolera i modyfikowany jest model
//i w drugą strone
//jeśli zmieniam coś w bazie to automatycznie zmienia się w widoku
//zmienia się treść, model, ale cała reszta bez zmian cssy itd