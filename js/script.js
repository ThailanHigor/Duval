var app = angular.module('durval',[]);


app.controller('cadastroDeProdutos', function($scope,$http) {
	$scope.cadastraProduto= function(cod,nome,valor,forn){
	$http.get("model/produtos.php?cod="+cod+"&nome="
					+nome+"&valor="+valor+"&forn="
					+forn+"&op=cadastraProduto").
       				then(function success(response){
          			console.log("Produto Cadastrado com Sucesso");


		})
	}

	$scope.preencheForn = function(){
		$http.get("model/produtos.php?op=comboForn").
			then(function success(response){
				console.log('Combo de Fornecedores atualizada');
				$scope.comboForn = response.data.dados;
			})
	}

	$scope.limpaCampos = function(){
		console.log('Campos limpos com sucesso');
		$scope.prodCod = null;
		$scope.prodNome = null;
		$scope.prodValor = null;
		$scope.prodForn = null;
	}
})


app.controller('cadastroDeFornecedores',function($scope,$http){
	$scope.cadastraFornecedor = function(nome,cidade,uf,cnpj){
		$http.get("model/fornecedores.php?nome="+nome+"&cidade="+cidade+"&uf="
					+uf+"&cnpj="+cnpj+"&op=cadastraFornecedor").
       				then(function success(response){
          			console.log("Fornecedor Cadastrado com Sucesso");

		})
	}
})


app.controller('meusProdutos',function($scope,$http){
	$scope.buscaProduto = function(nome){
		$http.get('model/produtos.php?op=buscaProdutos'+'&nome='+nome).
			then(function success(response){
				console.log('Produtos buscado com sucesso');
				$scope.meusprodutos = response.data.dados;
			})

	}


	$scope.atualizaProd = function(cod){

		}
})

app.controller('meuEstoque',function($scope,$http){
	$scope.buscaProdutos = function(){
		$http.get('model/produtos.php?op=MeuEstProd').
			then(function success(response){
				console.log('Produtos buscado com sucesso');
				$scope.comboMeuEstoque = response.data.dados;
			})
	}
	$scope.aumentaEstProd = function(prod,qtd){
		$http.get('model/produtos.php?op=aumentaEst'+'&prod='+prod+'&qtd='+qtd).
			then(function success(response){
				console.log('Quantidade do produto aumentada');
			})
	}

	$scope.diminuiEstProd = function(prod,qtd){
		$http.get('model/produtos.php?op=diminuiEst'+'&prod='+prod+'&qtd='+qtd).
			then(function success(response){
				console.log('Quantidade do produto diminuida');
			})
	}

	$scope.alteraProd = function(prod,qtd){
		$http.get('model/produtos.php?op=diminuiEst'+'&prod='+prod+'&qtd='+qtd).
			then(function success(response){
				console.log('Quantidade do produto diminuida');
			})
	}




	/*
	$scope.incluirProduto = function(nf,id,qtd,forn){
				
		$http.get('model/notafiscal.php?op=NotaFiscal'+'&id='+id+
			'&qtd='+qtd+
			'&nf='+nf+'&forn='+forn).
			then(function success(response){
				console.log('nota fiscal inserida');
				$scope.buscaNF(nf,forn,id,qtd);		
			});
	}

	$scope.buscaNF = function(nf,forn,id,qtd){
		$http.get('model/notafiscal.php?op=buscaNF'+
			'&nf='+nf+'&forn='+forn).
			then(function success(response){
				console.log('nota buscada com sucesso');
				$scope.mydados = response.data.dados;
				console.log($scope.mydados[0]['id_NF']);
				$scope.insereProduto(id,qtd,$scope.mydados[0]['id_NF']);	
			});

	}

	$scope.insereProduto = function(id,qtd,id_nf){
		$http.get('model/notafiscal.php?op=insereProdNF'+
			'&prod='+id+'&qtd='+qtd+'&id_nf='+id_nf).
			then(function success(response){
				console.log('produtos inseridos com sucesso na NF');
	
			});

	}
	*/
});




