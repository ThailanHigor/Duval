var app = angular.module('caixa',[]);


app.controller('listaProd', function ($scope,$http) {
	$scope.listaprod = [];
	$scope.listavenda = [];
	$scope.valorTotal= 0;
	$scope.troco = 0;
	$scope.aux = 0
	$scope.idcorrenteVenda = 0


	$scope.buscarProduto = function(nome){

		$http.get('model/caixamodel.php?nome='+nome+'&op=buscaProdutos').
			then(function success(response){
				$scope.listaprod = response.data.dados;
				console.log(response.data.dados)
				
			})
	}

	$scope.insereProdVenda = function(id,nome,preco,qtd){
		if(qtd==null){
			qtd=1;
		}
		var vT = parseFloat((preco * qtd).toFixed(2));
		var temp = {'id':id,'nome':nome,'preco':preco,'qtd':qtd,'vT':vT}
		$scope.listavenda.push(temp);
		console.log($scope.listavenda)


		$scope.aux += vT;
		$scope.valorTotal = $scope.aux.toFixed(2);
		
	}
	$scope.retiraProduto = function(x){
		$scope.aux = $scope.listavenda[x]['vT'];
		$scope.aux = $scope.valorTotal - $scope.aux;
		$scope.valorTotal = $scope.aux.toFixed(2);
		$scope.listavenda.splice(x,1);
		
	}

	$scope.calculaTroco = function(valorpago) {
		$scope.troco = (valorpago - $scope.valorTotal).toFixed(2);
	}

	$scope.finalizaVenda = function(pg){
		if($scope.pgt != null && $scope.valorPago != null && $scope.listavenda.length>0){
			decisao = confirm("DESEJA FINALIZAR A VENDA?");
			if(decisao){
				$http.get("model/caixamodel.php?valorT="+$scope.valorTotal+
				"&fpg="+pg+"&op=registraVenda").
					then(function success(response){
	  			console.log("Registro efetuado");
	  			$scope.idVenda = response.data.dados;
	  			$scope.idcorrenteVenda = $scope.idVenda[0]['id_Venda'];
	  			$scope.registraProdutos();
			})
		}

		}else{
			alert('Campos Vazios ou Inválidos')
		}
	

	}

	$scope.registraProdutos = function(){
		console.log($scope.idcorrenteVenda);
		for (var i =0;i<$scope.listavenda.length; i++) {
			$http.get("model/caixamodel.php?op=prodsVenda"+
			"&prod="+$scope.listavenda[i]['id']+
			"&qtd="+$scope.listavenda[i]['qtd']+
			"&idV="+$scope.idcorrenteVenda).
			then(function success(response){
			
			})

		}
		$scope.atualizaEstoque();
	}

	$scope.atualizaEstoque = function(){
		for (var i =0;i<$scope.listavenda.length; i++) {
			$http.get("model/caixamodel.php?op=atualizaEst"+
			"&prod="+$scope.listavenda[i]['id']+
			"&qtd="+$scope.listavenda[i]['qtd']).
			then(function success(response){

			})

		}
		$scope.limpaCampos();
		alert('VENDA EFETUADA COM SUCESSO!!')
	}

	$scope.limpaCampos = function(){
		$scope.listaprod = [];
		$scope.pgt= null;
		$scope.valorPago = null;
		$scope.listavenda = [];
		$scope.valorTotal= 0;
		$scope.troco = 0;
		$scope.aux = 0
		$scope.idcorrenteVenda = 0
		$scope.prodCaixa = null;
	}
})