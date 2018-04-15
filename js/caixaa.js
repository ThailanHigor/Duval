var app = angular.module('caixa',[]);


app.controller('listaProd', function ($scope,$http,$window) {
	$scope.listaprod = [];
	$scope.listavenda = [];
	$scope.valorTotal= 0;
	$scope.troco = 0;
	$scope.aux = 0
	$scope.idcorrenteVenda = 0;
	$scope.totalAtual = 0

	//REFERENTE AO CAIXA E ABERTURA
	$scope.buscaValorAtual = function(){
		$http.get('model/caixamodel.php?op=buscaSaldoDisp').
		then(function success(response){
		$scope.totalat = response.data.dados;
		console.log($scope.totalat[0]['valor_atual'])
		$scope.totalAtual = $scope.totalat[0]['valor_atual'];
			
		})
	}

	$scope.atualizaValorAtual = function(){
		$http.get('model/caixamodel.php?op=atualizaValAtual'+
			'&atual='+$scope.valorTotal).
			then(function success(response){
			$scope.buscaValorAtual();
		})
	}

	$scope.fecharCaixa = function(){
		fechar = confirm("DESEJA REALMENTE FECHAR O CAIXA?");
		if(fechar){
			$http.get("model/caixamodel.php?op=fecharCaixa"+
			'&vfinal='+$scope.totalAtual).
			then(function success(response){
				console.log('Fechado');

				$.jAlert({
			    'title': 'Sucesso!',
			    'content': '<h4>Caixa Fechado!</h4><br>'+
			    			'<b>Valor Final: </b>'+$scope.totalAtual+'<br>'+
			    			'<b>Lucro dia: 0</b>',
			    'theme': 'green',
			    'btns': { 'text': '<a class="badge badge-success" href="index.php">fechar' }
			  			});
			})

		}		
	}

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
		if($scope.pgt != null && $scope.valorPago != null && $scope.listavenda.length>0 &&
			$scope.valorPago >= $scope.valorTotal){
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
			$.jAlert({
			    'title': 'Erro!',
			    'content': '<h4>Atenção!</h4><br>'+
			    			'Campos Vazios, Inválidos ou<br> O Valor Pago é menor que o Total',
			    'theme': 'red',
			    'btns': { 'text': 'fechar' }
			  			});

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
		$scope.atualizaValorAtual();
		$.jAlert({
			    'title': 'Sucesso!',
			    'content': '<h5>Venda realizada com sucesso!</h5><br>'+
			    			'<b>Código da venda: </b>'+$scope.idcorrenteVenda+'<br>'+
			    			'<b>Total: </b>'+$scope.valorTotal+'<br>'+
			    			'<b>Troco: </b>'+$scope.troco+'<br>'
			    			,
			    'theme': 'green',
			    'btns': { 'text': 'fechar' }
			  });
		$scope.limpaCampos();
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


app.controller('devolucao',function($scope,$http){
	$scope.idvenda = '';
	$scope.data = '';
	$scope.pag = '';
	$scope.devol = '';
	$scope.notaCurrent = []

	$scope.buscarNota = function(idnota){
		if(idnota!= '' && idnota !=null){
			$http.get('model/notafiscal.php?op=buscaNota'+
			'&idnota='+idnota).
			then(function success(response){
			$scope.notas = response.data.dados;
			$scope.notaCurrent = $scope.notas;
			if($scope.notas.length != 0){
				$scope.idvenda = response.data.dados[0]['id_Venda'];
				$scope.data =response.data.dados[0]['data_Venda']; 
				$scope.pag = response.data.dados[0]['form_pgmto'];

				if(response.data.dados[0]['devolvido'] == 1){
					$scope.devol ='Sim' ;	
				}else{
					$scope.devol = 'Não';
				}
				console.log('nota buscada com sucesso');
				console.log($scope.notas);
			}else{
				$scope.numNota='';
				$.jAlert({
			    'title': 'Erro! Nota Inválida',
			    'content': '<h5>Esta venda não existe!<h5>',
			    'theme': 'red',
			    'btns': { 'text': 'fechar' }
				})
				$scope.fechar();
				console.log('Venda nao encontrada');
			}
		})

		}else{
			$.jAlert({
			    'title': 'Erro! Campo Vazio',
			    'content': '<h5>Campo de busca Vazio!<h5>',
			    'theme': 'red',
			    'btns': { 'text': 'fechar' }
			})
			$scope.fechar()
			$scope.numNota='';

		}


	}

	$scope.fechar = function(){
		$scope.idvenda = '';
		$scope.data = '';
		$scope.pag = '';
		$scope.devol = '';
	 	$scope.numNota='';
		$scope.notas = [];
		$scope.notaCurrent = [];
	}

	$scope.devolveNota = function(){
		if ($scope.devol =='Não') {

		$.confirm({
		    title: 'Atenção!',
		    content: 'Confirma a devolução desta venda?',
		    buttons: {
		        confirmar: function () {
		           	$http.get('model/caixamodel.php?op=devolveNota'+
					'&id='+$scope.idvenda).
					then(function success(){
					$scope.aumentaEstoque()
					})
		        },
		        cancelar: function () {
		            $.alert('Cancelado!');
		            $scope.numNota='';
		        },
		    }
		});
		}else{
		$.jAlert({
			    'title': 'Erro! Nota inválida',
			    'content': '<h5>Esta nota já foi devolvida<br>Verifique os dados novamente!<h5>',
			    'theme': 'red',
			    'btns': { 'text': 'fechar' }
			})
			$scope.fechar();
		}

	}

	$scope.aumentaEstoque = function(){
		for (var i = 0; i < $scope.notaCurrent.length; i++) {
			$http.get('model/caixamodel.php?op=aumentaEst'+
			'&prod='+$scope.notaCurrent[i]['prod_venda']+
			'&qtd='+$scope.notaCurrent[i]['qtd_venda']).
			then(function success(){

				})
			}
	
			$.jAlert({
			    'title': 'Sucesso!',
			    'content': '<h5>Nota devolvida com sucesso!<h5>',
			    'theme': 'green',
			    'btns': { 'text': 'fechar' }
			 })
		
			$scope.fechar()
		}
})
