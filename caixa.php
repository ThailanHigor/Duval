<html>
<head>
	<!--Icone-->
		<link rel="icon" href="img/aw.ico" type="image/x-icon" />
		<link rel="shortcut icon" href="img/aw.ico" type="image/x-icon" />
		<title>Duval - Caixa</title>
		<meta charset="UTF-8">
	<!--Links-->
		<link rel="stylesheet" href="css/config.css">	
		<link rel="stylesheet" type="text/css" href="css/Bootstrap/bootstrap.css">
		<link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
		<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
	<!--Script-->
		<script type="text/javascript" src="js/angular/angular.js"></script>
		<script type="text/javascript" src="js/caixaa.js"></script>
</head>

<body ng-app='caixa'>
	<div ng-controller='listaProd'>
<!-- DIV DE EXIBIÇÃO DO CAIXA-->
	<div class="col-lg-6">
        <div class="card" style="position:relative;top:10px;">
            <div class="card-header" style="display:block;width:100%;height:65%;" >
            	<div style="float: left;">
					<div id="Caixa" class="w3-container city"><!--PAINEL DO CAIXA-->
						<h4>Lista de <strong>Produtos</strong></h4><p>
							<div class="col-lg-6-header" style="display:block;">
								<div style="float: left;left:2.5%;">
									<input type="text" ng-model='prodCaixa' placeholder="Produto">
									<button ng-click='buscarProduto(prodCaixa)'>Buscar</button>
								</div>
							</div>
						<p><br>

						<div class="card-body" style="height: 320px;overflow-y: auto;">
							<table class="table table-bordered" style="font-size:15px;">
								<thead>
									<tr>
										<th scope="col">Produto</th>
										<th scope="col">Quantidade</th>
										<th scope="col">Valor Unitário</th>
										<th scope="col">Venda</th>
									</tr>
								</thead>
								<tbody>
									<tr ng-repeat="x in listaprod">
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
						<h4>Saldo Disponível no<strong> Caixa</strong></h4><p>
							<div class="col-lg-6-header" style="display:block;">
								<font size="30" color="green"><input type="label" value="R$0,00" disabled size="19">
								</font>
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
	</div>
	</div>
											
	

</body>
</html>