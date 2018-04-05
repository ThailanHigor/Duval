var app = angular.module('caixa',[]);


app.controller('listaProd', function ($scope,$http) {
	$scope.listaprod = {};
	$scope.listavenda = [];

	$scope.buscarProduto = function(prod){
		$http.get('model/produtos.php?nome='+prod+'&op=buscaProdutos').
			then(function success(response){
			$scope.listaprod = response.data.dados;
			console.log($scope.listaprod)
			})
	}

	$scope.insereProdVenda = function(){
		$scope.listavenda.push($scope.listaprod[0]);
		console.log($scope.listavenda);
		$scope.listaprod = {};
	}

})