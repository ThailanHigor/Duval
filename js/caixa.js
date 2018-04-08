var app = angular.module('caixa',[]);


app.controller('listaProd', function ($scope,$http) {
	$scope.listaprod = {};
	$scope.listavenda = [];
	$scope.valorTotal= 0;
	$scope.troco = 0;



	$scope.buscarProduto = function(prod){
		$http.get('model/produtos.php?nome='+prod+'&op=buscaProdutos').
			then(function success(response){
			$scope.listaprod = response.data.dados;
		
			})
	}

	$scope.insereProdVenda = function(qtd){
		if(qtd==null){
			qtd=1;
		}
		$temp=parseFloat(($scope.listaprod[0]['valor']*qtd).toFixed(1));

		$scope.valorTotal += parseFloat($temp);
	
		$scope.listaprod[0]['quantidade'] = qtd;
		$scope.listavenda.push($scope.listaprod[0]); 
		$scope.listaprod = {};

		
		console.log($scope.valorTotal)
	}

	$scope.calculaTroco = function(valorpago) {
		$scope.troco = valorpago - $scope.valorTotal;
	}
})