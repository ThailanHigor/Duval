<html>	
<head>
	<!--Icone-->
		<link rel="icon" href="img/aw.ico" type="image/x-icon" />
		<link rel="shortcut icon" href="img/aw.ico" type="image/x-icon" />
		<title>ARTWEB - Sistema de Gestão Comercial</title>
		<meta charset="UTF-8">
	<!--Links-->
		<link rel="stylesheet" href="css/config.css">	
		<link rel="stylesheet" type="text/css" href="css/Bootstrap/bootstrap.css">
		<link rel="stylesheet" href="css/w3.css">
		<link rel="stylesheet" href="css/bootstrap/bootstrap3.3.7.css">
		<link rel="stylesheet" href="css/jAlert.css">
		<link rel="stylesheet" href="css/jquery-confirm.css">

	<!--Script-->
		<script type="text/javascript" src="js/angular/angular.js"></script>
		<script type="text/javascript" src="js/caixaa.js"></script>
		<script src="js/ajax.js"></script>
		<script src="js/jAlert.js"></script>
		<script src="js/jquery-confirm.js"></script>
		<style type="text/css">
			.Buscarnota{
				margin-left:0px; 
				margin-top: 0px; 
				width: 200px;
				height: 35px;
			}
			.tbinfo{
				font-size:15px;
				margin-left: 100px;
				margin-top:20px;
				width:675px;
			}
			.listprod{
				height: 42%;
				overflow-y: auto;
				position:relative;
				margin-top:-20px;
			}
			.ok{
				background-color: green;
				color: white;
			}
			.erro{
				background-color: red;
				color: white;
			}
		</style>
</head>

<body ng-app='caixa'>
	<div ng-controller='listaProd' ng-init='buscaValorAtual()'>

<!-- DIV DE EXIBIÇÃO DO CAIXA-->
	<div class="col-lg-6">
        <div class="card" style="position:relative;top:10px;">
            <div class="card-header" style="display:block;width:100%;height:65%;" >
            	<div style="float: left;">
					<div id="Caixa" class="w3-container city"><!--PAINEL DO CAIXA-->
						<h4>Lista de <strong>Produtos</strong></h4><p>
							<div class="col-lg-6-header" style="display:block;">
								<div style="float: left;left:2.5%;">
									<input type="text" ng-model='prodCaixa' placeholder="Produto" autofocus>
									<button ng-click='buscarProduto(prodCaixa)' id="meuBotao">Buscar</button><!--NÃO TIRAR O ID-->
								</div>
							</div>
						<p><br>

						<div class="card-body" style="height: 320px;overflow-y: auto;">
							<table class="table table-bordered" style="font-size:15px;">
								<thead>
									<tr>
										<th scope="col">Código</th>
										<th scope="col">Produto</th>
										<th scope="col">Quantidade</th>
										<th scope="col">Valor Unitário</th>
										<th scope="col">Venda</th>
									</tr>
								</thead>
								<tbody>
									<tr ng-repeat="x in listaprod">
										<td scope="col">{{x.codigo}}</td>
										<td scope="col">{{x.nome}}</td>
										<td scope="col"><input type="number" ng-model='qtd' min='1' placeholder="1" style="width:80px;"></td>
										<td scope="col">{{x.precoVenda}}</td>
										<td scope='col'><input type='submit' class="btn btn-success btn-sm" ng-click='insereProdVenda(
										x.id,x.nome,x.precoVenda,qtd)' value='Adicionar'/></td>
									</tr>
								</tbody>
								
							</table>
						</div>

					</div>

				</div>
				</p>
				</br>
			</div>

        </div>
    </div>
<!-- FIM DE EXIBIÇÃO DO CAIXA-->        
               
<!-- DIV DE EXIBIÇÃO DO PEDIDO-->
	<div class="col-lg-6">
	    <div class="card" style="position:relative;top:10px;">
	        <div class="card-header" style="display:block;width:100%;height:65%;">
	        	<div style="float: left;">
					<div id="Caixa" class="w3-container city"><!--PAINEL DO CAIXA-->
						<h4>Pedido do<strong> Cliente</strong></h4><p>
						
						<div class="card-body" style="height: 280px;overflow-y: auto;position:relative;top:30px;">
							<table class="table table-bordered" style="font-size:15px;">
								<thead>
									<tr>
										<th scope="col">Produto</th>
										<th scope="col">Quantidade</th>
										<th scope="col">Valor Unitário</th>
										<th scope="col">Valor Total</th>
										<th scope="col">Venda</th>
									</tr>
								</thead>
									<tr ng-repeat="y in listavenda">
										<td scope="col">{{y.nome}}</td>
										<td scope="col">{{y.qtd}}</td>
										<td scope="col">{{y.preco}}</td>
										<td scope="col">{{y.vT}}</td>
										<td scope='col'><input  type='submit' class="btn btn-danger btn-sm" ng-click= 'retiraProduto($index)' value='Retirar'/></td>

									</tr>			
							</table>
						
						</div>

					</div>

					<div style="position:absolute;top:88%;margin-left:43%;width:100%;">
							<h4>Valor Total:
							<font size="5" color="red">
							<input type="text" ng-model='valorTotal' placeholder="R$00.00" disabled style="width:38%;"> 
							</font>
					</div>
				</div>

            </div>
        </div>
    </div>
<!-- FIM DE EXIBIÇÃO DO PEDIDO-->
    
<!-- DIV EXIBIÇÃO SALDO DISPONIVEL -->
	<div class="col-lg-6">
        <div class="card" style="position:relative;top:20px;">
            <div class="card-header" style="display:block;width:100%;height:26%;">
            	<div style="float: left;">
					<div id="Caixa" class="w3-container city"><!--PAINEL DO CAIXA-->
						<h4>Saldo disponível no <strong>Caixa</strong></h4><p>
							<div class="col-lg-6-header" style="display:block;">
								<font size="30" color="green"><input type="text" ng-model='totalAtual' disabled size="19">
								</font>
								<button type="reset" style="position:relative;top:7px;" class="btn btn-danger btn-sm" ng-click='fecharCaixa()'>Fechar Caixa</button>
								<button type="reset" style="position:relative;top:7px;" onclick="document.getElementById('id02').style.display='block'" class="btn btn-warning btn-sm">Devolução</button>
								<button type="reset" style="position:relative;top:7px;" onclick="document.getElementById('id03').style.display='block'" class="btn btn-info btn-sm">Notas Fiscais</button>
							</div>
					</div>
				</div>
			</div>
		</div>
	</div>
<!-- FIM EXIBIÇÃO SALDO DISPONIVEL -->

<!-- DIV EXIBIÇÃO FORMA DE PAGAMENTO -->
	<div class="col-lg-6">
        <div class="card" style="position:relative;top:20px;">
            <div class="card-header" style="display:block;width:100%;height:26%;">
            	<div style="float: left;">
					<div id="Caixa" class="w3-container city"><!--PAINEL DO CAIXA-->
						<h4>Forma de<strong> Pagamento</strong></h4>
							<form> 
								<input type="radio"  name="formadepagamento" value='Dinheiro'  ng-model='pgt'> Dinheiro
								<input type="radio" name="formadepagamento" value='Cartao' ng-model='pgt'> Cartão
								<input type="radio" name="formadepagamento"  value='Outro' ng-model='pgt' checked > Outro 
							</form>
							<h4>Pago:<font size="4" color="green"><input ng-model='valorPago' ng-change="calculaTroco(valorPago)" type="number"></font></h4>
							<h4>Troco:
							<font size="4" color="red"><input type="text" ng-model='troco' disabled></font>
							<input type='submit' ng-click='finalizaVenda(pgt)' class="btn btn-success btn-sm" value='Finalizar pedido'/>
						</h4>
					</div>
				</div>
			</div>
		</div>
	</div>
<!-- FIM FORMA DE PAGAMENTO -->
	
<!-- DEVOLUÇÃO -->	
	<div id="id02" class="w3-modal" ng-controller='devolucao'>
		<div class="w3-modal-content w3-card-4 w3-animate-zoom">
		  <header class="w3-container w3-white"> 
			   <span onclick="document.getElementById('id02').style.display='none'" 
			   class="w3-button w3-white w3-xlarge w3-display-topright" ng-click='fechar()'>&times;</span>
				<div align="center">
					<h3>Devolução de Produtos</h3>
					<hr>
				</div>
				<div class="card-body card-block">
					<form class="form-horizontal">
						<!-- BUSCA NOTA -->
							<div class="form-group" style="position:relative;left:1%;">
								<div class="col col-md-4">Número de Nota Fiscal:
								<input  autofocus class="form-control" placeholder="Insira o número da nota" style="width: 200px;" type="text" ng-model='numNota'>
								<button type="reset" class="btn btn-success btn-sm Buscarnota" ng-click='buscarNota(numNota)'>Buscar</button>

							</div>
						<!-- FIM BUSCA -->

						<!-- INFORMACOES DA VENDA -->
							<table class="table table-bordered tbinfo" >
								<thead>
									<tr>
										<th style="width: 50px;">Venda:</th>
										<td  style="width: 150px;" scope="col">{{idvenda}}</td>
										<th>Data:</th>
										<td style="width: 250px;" scope="col">{{data}}</td>
									</tr>
				
									<tr>
										<th style="width: 50px;">Pagamento:</th>
										<td style="width: 150px;" scope="col">{{pag}}</td>
										<th>Devolvida:</th>
										<td style="width: 250px;" ng-class="devol=='Não' ? 'ok': devol=='Sim' ? 'erro':''" scope="col">{{devol}}</td>

									</tr>
					
								</thead>			
							</table>
						<!-- FIM INFO -->
						</div>
					<!-- LISTAGEM DOS PRODUTOS DA VENDA -->
						<div class="card-body listprod">

							
							<table class="table table-bordered" style="font-size:15px;">
								<thead>
									<tr>
										<th scope="col">Produto</th>
										<th scope="col">Quantidade</th>
										<th scope="col">Valor Unitário</th>
									
									</tr>
								</thead>
								<tbody>	
									<tr ng-repeat="y in notas">
										<td ng-class="devol=='Não' ? 'ok' : 'erro'" scope="col">{{y.nome}}</td>
										<td ng-class="devol=='Não' ? 'ok' : 'erro'"  scope="col">{{y.qtd_venda}}</td>
										<td ng-class="devol=='Não' ? 'ok' : 'erro'"  scope="col">{{y.precoVenda}}</td>

									</tr>	
								</tbody>			
							</table>
								
						</div>
					<!-- FIM DA LISTAGEM -->
									
						<div class="form-group">
							<center>
							    <div class="col col-md-12">
								<button type="reset" class="btn btn-info btn-sm devolver" ng-click='devolveNota()'>Efetuar Devolução</button>
								</div>
							</center>
						</div>
					</form>
				</div>
					        				
		</div>
	</div>
	
<!-- FIM DEVOLUÇÃO -->	

	</div>
	</div>

</body>
</html>


<SCRIPT TYPE="text/javascript">
$(document).keypress(function(e) {
    if(e.which == 13) $('#meuBotao').click();
});
</SCRIPT>