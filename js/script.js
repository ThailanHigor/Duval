var app = angular.module('duval',[]);


app.controller('cadastroDeProdutos', function($scope,$http) {
	$scope.alertCadProd = false;

	$scope.cadastraProduto= function(cod,nome,precoCompra,precoVenda,forn){
		if(cod != null && nome != null && precoCompra != null && precoVenda != null && forn != null){
				$http.get("model/produtos.php?cod="+cod+"&nome="
						+nome+"&precoCompra="+precoCompra+"&precoVenda="+precoVenda+"&forn="
						+forn+"&op=cadastraProduto").
	       				then(function success(response){
	          			console.log("Produto Cadastrado com Sucesso");
	          			$scope.alertCadProd = true;
	          			$scope.msgCadProd = "Produto Cadastrado com Sucesso!";
			})
		}else{
	        $scope.alertCadProd = true;
			$scope.msgCadProd = "Produto Não Cadastrado! Campo(s) inválido(s) ou vazio(s)...";

		}
		$scope.limpaCampos();
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
		$scope.prodValorCompra = null;
		$scope.prodValorVenda = null;
		$scope.prodForn = null;
	}
})


app.controller('cadastroDeFornecedores',function($scope,$http){
	$scope.alertCadForn = false;


	$scope.cadastrarFornecedor = function(Nome,Rep,Rua,Bairro,Numero,Cidade,
		UF,Complemento,CEP,CNPJ,IE,Tel1,Tel2,Email){
		if(Nome != null && Rep != null && Rua != null && Bairro!= null && Numero != null &&
		Cidade!= null && UF != null && Complemento != null && CEP != null && CNPJ != null && 
		IE != null && Tel1 != null && Tel2 != null && Email != null){
			$http.get("model/fornecedores.php?nome="+Nome+"&rep="+Rep
			+"&rua="+Rua+"&bairro="+Bairro
			+"&numero="+Numero+"&cidade="+Cidade
			+"&uf="+UF+"&complemento="+Complemento
			+"&cep="+CEP+"&cnpj="+CNPJ
			+"&ie="+IE+"&tel1="+Tel1
			+"&tel2="+Tel2+"&email="+Email
			+"&op=cadastraFornecedor").
       			then(function success(response){
          			console.log("Fornecedor Cadastrado com Sucesso");
          			$scope.alertCadForn= true;
          			$scope.msgCadForn = "Fornecedor cadastrado com Sucesso!";
		})
		
		}else{
			$scope.alertCadForn= true;
          	$scope.msgCadForn = "Fornecedor Não cadastrado! Campo(s) inválido(s) ou vazio(s)...";
		}

		$scope.limpaCampos();
	}

	$scope.limpaCampos = function(){
		$scope.FNome = null;
		$scope.FRep = null;
		$scope.FRua = null;
		$scope.FBairro = null;
		$scope.FNumero = null;
		$scope.FCidade = null;
		$scope.FUF = null;
		$scope.FComplemento = null;
		$scope.FCEP = null;
		$scope.FCNPJ = null;
		$scope.FIE = null;
		$scope.FTel1 = null;
		$scope.FTel2 = null;
		$scope.FEmail = null;
	}
})


app.controller('meusFornecedores',function($scope,$http){
	$scope.verForn = true;
	$scope.verEnd = false;
	$scope.alertMeusFornecedores = false;

	$scope.buscaFornecedor = function(nome){
		if(nome != null){
			$http.get('model/fornecedores.php?op=buscaFornecedor'+'&nome='+nome).
			  then(function success(response){
				console.log(response.data.dados);
				$scope.meusfornecedores = response.data.dados;
				$scope.alertMeusFornecedores = true;
				if(response.data.dados.length >0){
					$scope.msgMeusForns = 'Foram encontrado(s) '+
					response.data.dados.length+ ' fornecedore(s)';
				}else{
					$scope.msgMeusForns = 'Fornecedor não encontrado';
				}
			})
		}else{
			//se o campo tiver vazio, avisa o usuario e limpa a lista
			$scope.alertMeusFornecedores = true;
			$scope.msgMeusForns = 'Campo vazio! Informe o fornecedor que deseja buscar...';
			$scope.meusfornecedores = [];

		}
		$scope.fornBusca = null;
	}

	$scope.verEndereco = function(nome,rua,bairro,num,cid,uf,comp){
		$scope.alertMeusFornecedores = true;
		$scope.msgMeusForns = 'Detalhes de endereço..';
		$scope.verForn = false;
		$scope.verEnd = true;
		$scope.verNome=nome;
		$scope.verRua= rua;
		$scope.verBairro=bairro;
		$scope.verNum=num;
		$scope.verCid=cid;
		$scope.verUF=uf;
		$scope.verComp=comp;

	}
	$scope.verFornVoltar = function(){
		$scope.alertMeusFornecedores = false;
		$scope.verForn = true;
		$scope.verEnd = false;
		$scope.meusfornecedores=[];
	}

	$scope.excluirForn = function(id){
		$http.get('model/fornecedores.php?op=excluirForn'+'&id='+id).
			then(function success(response){
				console.log('Fornecedor excluido com sucesso');
				$scope.alertMeusFornecedores = true;
				$scope.msgMeusForns = 'Fornecedor excluído com sucesso!'
				$scope.meusfornecedores= [];$scope.alertMeusFornecedores = false;
			  })

	}


})

app.controller('meusProdutos',function($scope,$http){$scope.alertMeusProdutos = false; $scope.buscaProduto = function(nome){
		if(nome != null){
			//se o campo nao tiver vazio
			$http.get('model/produtos.php?op=buscaProdutos'+'&nome='+nome).
			then(function success(response){
				console.log('Produtos buscado com sucesso');
				$scope.meusprodutos = response.data.dados;
				// apos consultar o banco retorna o array
				$scope.alertMeusProdutos = true;
				//testa se o array esta vazio e suas condiçoes para ambos
				if(response.data.dados.length > 0){
					$scope.MeusProdutosMensagem = 'Foram encontrado(s) '+
					response.data.dados.length+ ' produto(s)';
				}else{
					$scope.MeusProdutosMensagem = 'Produto não encontrado';
				}

			})
		}else{
			//se o campo tiver vazio, avisa o usuario e limpa a lista
			$scope.alertMeusProdutos = true;
			$scope.MeusProdutosMensagem = 'Campo vazio! Informe o produto que deseja buscar...';
			$scope.meusprodutos = [];

		}
	$scope.formBusca = null;

	}


	$scope.atualizaProd = function(cod){

		}

	$scope.excluirProd = function(cod) {
		$http.get('model/produtos.php?op=excluiprod'+'&cod='+cod).
			then(function success(response) {
				console.log('Produto excluido com sucesso')
				$scope.alertMeusProdutos= true;
				$scope.MeusProdutosMensagem = 'O Produto foi excluido com sucesso';
				$scope.meusprodutos = [];
				$scope.formBusca = null;

			})
	}
})

app.controller('meuEstoque',function($scope,$http){
	$scope.alertMeuEstoque = false;
	$scope.buscaProdutos = function(){
		$http.get('model/produtos.php?op=MeuEstProd').
			then(function success(response){
				console.log('Produtos buscado com sucesso');
				$scope.comboMeuEstoque = response.data.dados;
			})
	}
	$scope.aumentaEstProd = function(prod,qtd){
		$scope.alertMeuEstoque = false;
		if(prod != null  && qtd != null){
			$http.get('model/produtos.php?op=aumentaEst'+'&prod='+prod+'&qtd='+qtd).
			then(function success(response){
				console.log('Quantidade deste produto foi aumentada em '+qtd);
				$scope.alertMeuEstoque = true;
				$scope.msgMeuEstoque = 'Você ADICIONOU ' +qtd+ ' unidade(s) deste produto em seu estoque';
				
			})
		}else{
			$scope.alertMeuEstoque = true;
			$scope.msgMeuEstoque = 'O Campo de produto e/ou quantidade estão vazio(s) ou inválido(s)'
		}
		$scope.qtdMeuEstoque = null;		
	}

	$scope.diminuiEstProd = function(prod,qtd){
		$scope.alertMeuEstoque = false;
		if(prod != null && qtd != null){
			$http.get('model/produtos.php?op=diminuiEst'+'&prod='+prod+'&qtd='+qtd).
			  then(function success(response){
				console.log('Quantidade do produto diminuida');
				$scope.alertMeuEstoque = true;
				$scope.msgMeuEstoque = 'Você RETIROU ' +qtd+ ' unidade(s) deste produto em seu estoque';
			})
		}else{
			$scope.alertMeuEstoque = true;
			$scope.msgMeuEstoque = 'O Campo de produto e/ou quantidade estão vazio(s) ou inválido(s)'
		}
	
		$scope.qtdMeuEstoque = null;

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





