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
	$scope.alteraForn =  false;
	$scope.alertMeusFornecedores = false;
	$scope.idcorrente = 0

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
				$scope.meusfornecedores= [];
				$scope.msgMeusForns = 'Fornecedor excluído com sucesso!'
			  })

	}

	$scope.preencheAlteraForn = function(id,Nome,Rep,Rua,Bairro,Numero,Cidade,
		UF,Complemento,CEP,CNPJ,IE,Tel1,Tel2,Email){
		//mensagem topo de alteracao
		$scope.alertMeusFornecedores = true;
		$scope.msgMeusForns = 'Você esta alterando o fornecedor: '+ Nome;

		//alternancia de divs e
		$scope.verForn = false;
		$scope.verEnd = false;
		$scope.alteraForn = true;

		//capturando campos e preenchendo
		$scope.idcorrente = id;
		$scope.altFNome = Nome;
		$scope.altFRep = Rep;
		$scope.altFRua = Rua;
		$scope.altFBairro = Bairro;
		$scope.altFNumero = parseInt(Numero);
		$scope.altFCidade = Cidade;
		$scope.altFUF = UF;
		$scope.altFComplemento = Complemento;
		$scope.altFCEP = CEP;
		$scope.altFCNPJ = CNPJ;
		$scope.altFIE = IE;
		$scope.altFTel1 = Tel1;
		$scope.altFTel2 = Tel2;
		$scope.altFEmail = Email;

	}

	$scope.atualizaForn = function(Nome,Rep,Rua,Bairro,Numero,Cidade,
		UF,Complemento,CEP,CNPJ,IE,Tel1,Tel2,Email){
		if(Nome != '' && Rep != '' && Rua != '' && Bairro!= '' && Numero != null &&
		Cidade != '' && UF != '' && Complemento != '' && CEP != '' && CNPJ != '' && 
		IE != '' && Tel1 != '' && Tel2 != '' && Email != ''){
			$http.get("model/fornecedores.php?id="+$scope.idcorrente+"&nome="
			+Nome+"&rep="+Rep+"&bairro="+Bairro+"&num="+Numero+"&rua="+Rua
			+"&cidade="+Cidade+"&uf="+UF+"&comp="+Complemento
			+"&cep="+CEP+"&cnpj="+CNPJ+"&ie="+IE
			+"&tel1="+Tel1+"&tel2="+Tel2+"&email="+Email+"&op=atualizaForn").
				then(function success(response){
  				console.log("Produto Atualizado com Sucesso");
  				$scope.verForn = true;
				$scope.alteraForn = false;
  				$scope.alertMeusFornecedores = true;
  				$scope.idcorrente = 0;
  				$scope.msgMeusForns = 'Os dados do produto ' +Nome+ ' foram alterados com sucesso!';
  				$scope.meusfornecedores = [];
			})
		}else{
			$scope.alertMeusFornecedores = true;
			$scope.msgMeusForns = 'Erro ao atualizar! Campo(s) inválido(s) ou vazio(s)';

			}
	}


	$scope.altFornVoltar = function(){
		$scope.alertMeusFornecedores = false; 
		$scope.verForn = true;
		$scope.alteraForn = false;
		$scope.meusfornecedores = [];
		$scope.idcorrente = 0;
		$scope.altFNome = null;
		$scope.altFRep = null;
		$scope.altFRua = null;
		$scope.altFBairro = null;
		$scope.altFNumero = null;
		$scope.altFCidade = null;
		$scope.altFUF = null;
		$scope.altFComplemento = null;
		$scope.altFCEP = null;
		$scope.altFCNPJ = null;
		$scope.altFIE = null;
		$scope.altFTel1 = null;
		$scope.altFTel2 = null;
		$scope.altFEmail = null;
	}

})

app.controller('meusProdutos',function($scope,$http){
	$scope.alertMeusProdutos = false; 
	$scope.editMeusProd = false;
	$scope.exibeMeusProd = true;
	$scope.idcorrente = 0;

	$scope.buscaProduto = function(nome){
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


	$scope.preencheAlterarMeusProd = function(id,cod,nome,qtd,pCompra,pVenda,forn){
		$scope.alertMeusProdutos = true;
		$scope.MeusProdutosMensagem = 'Você está alterando o produto: '+nome; 
		$scope.editMeusProd = true;
		$scope.exibeMeusProd = false;
		$scope.altCod= cod;
		$scope.altNome= nome;
		$scope.altPCompra= parseFloat(pCompra);
		$scope.altPVenda= parseFloat(pVenda);
		$scope.altQtd= parseFloat(qtd);
		$scope.altForn= forn;
		$scope.idcorrente = id;

	}

	$scope.alterarProduto = function(cod,nome,pCompra,pVenda){
		if(cod != '' && nome != '' && pCompra != null && pVenda != null){
			$http.get("model/produtos.php?id="+$scope.idcorrente+"&cod="
			+cod+"&precoCompra="+pCompra+"&precoVenda="+pVenda
			+"&nome="+nome+"&op=atualizaProd").
				then(function success(response){
  				console.log("Produto Cadastrado com Sucesso");
  				$scope.editMeusProd = false;
				$scope.exibeMeusProd = true;
  				$scope.alertMeusProdutos = true;
  				$scope.idcorrente = 0;
  				$scope.MeusProdutosMensagem = 'Os dados do produto ' +nome+ ' foram alterados com sucesso!';
  				$scope.meusprodutos = [];
			})
		}else{
			$scope.alertMeusProdutos = true;
			$scope.MeusProdutosMensagem = 'Erro ao atualizar! Campo(s) inválido(s) ou vazio(s)';

		}

	}

	$scope.altProdVoltar = function(){
		$scope.alertMeusProdutos = false; 
		$scope.editMeusProd = false;
		$scope.exibeMeusProd = true;
		$scope.meusprodutos = [];
		$scope.altCod= null;
		$scope.altNome= null;
		$scope.altPCompra= null;
		$scope.altPVenda= null;
		$scope.altQtd= null;
		$scope.altForn= null;
		$scope.idcorrente = 0	;
	}


	$scope.excluirProd = function(cod,nome) {
		$http.get('model/produtos.php?op=excluiprod'+'&cod='+cod).
			then(function success(response) {
				console.log('Produto excluido com sucesso')
				$scope.alertMeusProdutos= true;
				$scope.MeusProdutosMensagem = 'O Produto '+nome+' foi excluido com sucesso';
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

app.controller('entradaDeMercadorias',function($scope,$http){
	$scope.listaEntrada = [];
	$scope.idcorrenteNF=0;
	$scope.alertEntradaMer = false;


	$scope.preencheFornEntrada = function(){
		$http.get("model/produtos.php?op=comboForn").
			then(function success(response){
				console.log('Combo de Fornecedores atualizada');
				$scope.comboFornEntrada = response.data.dados;
			})
	}

	$scope.buscaProdutosEntrada = function(){
		$http.get("model/produtos.php?op=MeuEstProd").
			then(function success(response){
				console.log('Combo de Produtos atualizada');
				$scope.comboEntMer = response.data.dados;
			})
	}
	//AÇÃO DE NOTA FISCAL
	$scope.preencheLista = function(prod,qtd){
		if(prod != null && qtd != null){
			var temp = prod.split("@")
			var a = {'id':temp[0],'produto':temp[1],'quantidade':qtd}
			$scope.listaEntrada.push(a);
			$scope.alertEntradaMer = false;
		}else{
			$scope.alertEntradaMer = true;
			$scope.msgEntradaMer = 'Você precisa informar o produto e sua quantidade!'
		}


	}
	//CADASTRA NOTA FISCAL COM NUMERO E FORNECEDOR
	$scope.cadastraEntrada = function(numNF,fornNF){
		if(numNF != null && fornNF !=null && $scope.listaEntrada.length > 0){
			$http.get("model/notafiscal.php?op=cadastraNota"+
			"&numnf="+numNF+"&fornNF="+fornNF).
			then(function success(response){
				console.log('Nota Fiscal Cadastrada');
				$scope.id = response.data.dados;
				$scope.idcorrenteNF = $scope.id[0]['id_NF'];
				//PEGA O ID QUE FOI GERADO A PARTIR DO INSERT DA NF
				$scope.cadastraProdNotas();

			})
		}else{
			$scope.alertEntradaMer = true;
			$scope.msgEntradaMer = 'Campos Inválidos ou Vazios!'
		}

	}
	//CADASTRA OS PRODUTOS REFERENTES A NOTA QUE FOI LANCADA
	$scope.cadastraProdNotas = function(){
		for (var i =0;i<$scope.listaEntrada.length; i++) {
			$http.get("model/notafiscal.php?op=prodsNota"+
			"&prod="+$scope.listaEntrada[i]['id']+
			"&qtd="+$scope.listaEntrada[i]['quantidade']+
			"&idnf="+$scope.idcorrenteNF).
			then(function success(response){

			})

		}
		$scope.limpaCamposEntrada();
		$scope.alertEntradaMer = true;
		$scope.msgEntradaMer = 'Nota fiscal cadastrada e quantidade dos Produtos alterada'

	}
	$scope.cancelaEntrada = function(){
		$scope.limpaCamposEntrada();
		$scope.alertEntradaMer = true;
		$scope.msgEntradaMer = 'Entrada de nota fiscal Cancelada!'

	}

	$scope.limpaCamposEntrada = function(){
		$scope.entNumNF = null;
		$scope.codFornNF = null;
		$scope.prodEntrada = null;
		$scope.entradaMerQtd = null;
		$scope.listaEntrada = [];

	}
})


app.controller('aberturaCaixa',function($scope,$http,$window){
	$scope.abertura = false;

	$scope.validaCaixa = function(){
		$http.get("model/caixamodel.php?op=validaCaixa").
			then(function success(response){
				console.log('Validado');
				$scope.caixaDia = response.data.dados;
				if($scope.caixaDia.length <= 0){
					alert('Voce precisa abrir o caixa hoje!')
					$scope.abertura = true;
				}else{
					$window.location.href = 'caixa.php'
				}
			})
	}
})
