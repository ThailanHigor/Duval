<html>
<head>
	<link rel="icon" href="img/aw.ico" type="image/x-icon" />
	<link rel="shortcut icon" href="img/aw.ico" type="image/x-icon" />

		<title>ARTWEB - Depósito Duval</title>
			<meta charset="UTF-8">
			<link rel="stylesheet" href="css/config.css">
			<link rel="stylesheet" href="css/w3.css">
			<link rel="stylesheet" href="css/bootstrap/bootstrap3.3.7.css">
			<script src="js/angular/angular.js" type="text/javascript"></script>
			  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
  			<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
			<script src="js/script.js" type="text/javascript"></script>
</head>
<body ng-app='duval'>

<div id="logo" align="center">
	<img src="img/b2.png" width="300">
</div>


<div class="w3-container" align="center">
<h2>Bem-vindo, Usuário.</h2>
<p>Para iniciar suas atividades, basta clicar no botão abaixo.</p>
	<a href="caixa.php" class="w3-button w3-black" style="text-decoration:none">Caixa</a>
<button onclick="document.getElementById('id01').style.display='block'" class="w3-button w3-black">Painel de Controle</button>

<div class="modal fade bd-example-modal-lg" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-lg">
    <div class="modal-content">
      TESTANDO
    </div>
  </div>
</div>

<div id="id01" class="w3-modal">
 <div class="w3-modal-content w3-card-4 w3-animate-zoom">
  <header class="w3-container w3-orange"> 
	   <span onclick="document.getElementById('id01').style.display='none'" 
	   class="w3-button w3-orange w3-xlarge w3-display-topright">&times;</span>
	   <h2>Área Geral</h2>
  </header>

  	<div class="w3-bar w3-border-bottom"><font size="2">
	   <button class="tablink w3-bar-item w3-button" onclick="openCity(event, 'Estoque')">Estoque</button>
	   <button class="tablink w3-bar-item w3-button" onclick="openCity(event, 'EntradadeMercadorias')">Entrada de Mercadorias</button>
	   <button class="tablink w3-bar-item w3-button"   onclick="openCity(event, 'Produtos')">Cadastro de Produtos</button>
	   <button class="tablink w3-bar-item w3-button" onclick="openCity(event, 'Fornecedores')">Cadastro de Fornecedores</button>
	   <button class="tablink w3-bar-item w3-button" onclick="openCity(event, 'MeusProdutos')">Meus Produtos</button>
	   <button class="tablink w3-bar-item w3-button" onclick="openCity(event, 'MeusFornecedores')">Meus Fornecedores</button>
   	</div></font>

	<!-- DIV MEU ESTOQUE-->
	  <div id="Estoque" class="w3-container city" ng-controller='meuEstoque'>
	   <h4>Meu<strong> Estoque</strong></h4>
	    <div class="alert alert-success"  ng-show ='alertMeuEstoque' role="alert">
  		<strong>{{msgMeuEstoque}}</strong>
		</div>
	   <div align="left" style="width:25%;" >
			<br>
			<div class="col-lg-14">
			    <div class="card">
		    
		          	<div class="card-body card-block">
			            <form action="" method="" class="form-horizontal">

							<div class="form-group">
							    <div class="col col-md-12">
							    Produto:
								<select class="form-control" ng-mouseover='buscaProdutos()' ng-model='prodMeuEstoque' type="text">
								<option ng-repeat='x in comboMeuEstoque' value='{{x.id}}'>{{x.nome}}</option>
								</select>
								</div>
						

							</div>
							<div class="form-group">

							    <div class="col col-md-12">
						
								Quantidade: <input class="form-control" placeholder='0' ng-model='qtdMeuEstoque' type="number">

							</div>

							</div>
			            </form>
		          	</div>
		         	<div class="card-footer">
		           		<input type='submit' class="btn btn-success btn-sm" ng-click='aumentaEstProd(prodMeuEstoque,qtdMeuEstoque)' value='Adicionar'/>
		           		 <button type="reset" ng-click='diminuiEstProd(prodMeuEstoque,qtdMeuEstoque)' class="btn btn-danger btn-sm"><i class="fa fa-ban"></i> Remover</button>
		         	</div>

		        </div>
		    </div>
			<br>
	 	</div>
	  </div>
	<!-- FIM MEU ESTOQUE-->

	<!-- DIV CADASTRO DE  PRODUTOS-->
	 <div id="Produtos" class="w3-container city" ng-controller='cadastroDeProdutos'>
	   <h4>Cadastro de <strong>Produtos</strong></h4>
	    <div class="alert alert-success" ng-show='alertCadProd' role="alert">
  		<strong>{{msgCadProd}}</strong>
		</div>
	  
	   <div align="left" style="width:25%;" >

			<div class="col-lg-14">
			    <div class="card">

		           <div class="card-body card-block">
			            <form class="form-horizontal">
							<div class="form-group">
							    <div class="col col-md-12">
								<input class="form-control" placeholder="Código" ng-model='prodCod' type="text" >
							</div>
							</div>
							<div class="form-group">
							    <div class="col col-md-12">
								<input class="form-control " placeholder="Produto" ng-model='prodNome' type="text" >
							</div>
							</div>
							<div class="form-group">
							    <div class="col col-md-12">
								<input class="form-control" placeholder="Preço de Compra" ng-model='prodValorCompra' type="number" >
							</div>
							</div>
							<div class="form-group">
							    <div class="col col-md-12">
								<input class="form-control" placeholder="Preço de Venda" ng-model='prodValorVenda' type="number" >
							</div>
							</div>
							<div class="form-group">
							    <div class="col col-md-12">
								<select class="form-control" ng-mouseover='preencheForn()'  ng-model='prodForn' type="text">
								<option ng-repeat='x in comboForn'  value='{{x.id}}'>{{x.nome}}</option>
								</select>
								</div>
							</div>
								<div class="card-footer">
									<button  class="btn btn-success btn-sm" ng-click='cadastraProduto(prodCod,prodNome,prodValorCompra,prodValorVenda,prodForn)' value='Cadastrar'>Cadastrar</button>
									<button type="reset" class="btn btn-danger btn-sm" ng-click='limpaCampos()'><i class="fa fa-ban"></i> Limpar</button>
								</div>
			            </form>
		           </div>


		        </div>
		    </div>
			<br>
	  </div>
	 </div>
	<!-- FIM CADASTRO-->
	
	<!-- DIV BUSCA DOS MEUS PRODUTOS-->
	 <div id="MeusProdutos" class="w3-container city" ng-controller='meusProdutos'>
	    <h4>Meus <strong>Produtos</strong></h4>
	    <div class="alert alert-success"  ng-show ='alertMeusProdutos' role="alert">
  		<strong>{{MeusProdutosMensagem}}</strong>
		</div>
	   
	    <!-- FORMULARIO DE BUSCA -->
		    <div class="card-header" style="display:block;">
		        <div style="float: left;">
					<input type="text"  ng-model='formBusca' name="fornBuscar" placeholder="Produto">
					<button ng-click='buscaProduto(formBusca)'>Buscar</button>
								
				</div>

		    </div>
		<!-- FIM FORMULARIO-->  


	   	<div class="container" style="width:100%;">  
		  <table class="table" style="font-size:12px;">
			    <thead>
			      <tr>
			        <th>Código</th>
			        <th>Nome</th>
			        <th>Quantidade Atual</th>
			        <th>Preço de Compra</th>
			        <th>Preço de Venda</th>
			        <th>Fornecedor</th>
			        <th>Editar</th>
			        <th>Excluir</th>
			      </tr>
			    </thead>
			    <tbody>
			  		<tr ng-repeat="x in meusprodutos">
					<td scope="col">{{x.codigo}}</td>
					<td scope="col">{{x.nome}}</td>
					<td scope="col">{{x.quantidade}}</td>
					<td scope="col">{{x.precoCompra}}</td>
					<td scope="col">{{x.precoVenda}}</td>
					<td scope="col">{{x.idforn}}</td>
					<td scope='col'> <input type="submit" value='alterar'/></td>
					<td scope='col'><button ng-click ="excluirProd(x.codigo)">Excluir</button></td>
					</tr>
				</tbody>
		  </table>

			<br>
	  	</div>
	 </div>
	<!-- FIM DIV BUSCA DOS MEUS PRODUTOS-->

	<!-- DIV BUSCA DOS MEUS FORNECEDORES-->
	 <div id="MeusFornecedores" class="w3-container city" ng-controller='meusFornecedores'>
	    <h4>Meus <strong>Fornecedores</strong></h4>
	     <div class="alert alert-success"  ng-show ='alertMeusFornecedores' role="alert">
  		<strong>{{msgMeusForns}}</strong>
		</div>
	   
	    <!-- FORMULARIO DE BUSCA -->
		    <div class="card-header" style="display:block;" ng-show='verForn'>
		        <div style="float: left;">
					<input type="text"  ng-model='fornBusca' name="fornBuscar" placeholder="Nome">
					<button ng-click='buscaFornecedor(fornBusca)'>Buscar</button>
				</div>
		    </div>
		<!-- FIM FORMULARIO-->    
		<br>
	   	<div class="container" style="width:100%;">  
	   		<!--DIV EXIBICAO DOS FORNECEDORES -->
			<div  ng-show='verForn'>
				<table class="table" style="font-size:12px;">
					<thead>
					  <tr>
					    <th>Nome</th>
					    <th>Representante</th>
					    <th>Endereço</th>
					    <th>CEP</th>			
					    <th>CNPJ</th>
					    <th>IE</th>
					    <th>Telefone 1</th>
					    <th>Telefone 2</th>
					    <th>E-mail</th>
					    <th>Editar</th>
					    <th>Excluir</th>
					  </tr>
					</thead>
					<tbody>
						<tr ng-repeat="x in meusfornecedores">
						<td scope="col">{{x.nome}}</td>
						<td scope="col">{{x.representante}}</td>
						<td scope="col"><button 
						ng-click='verEndereco(x.nome,x.rua,x.bairro,x.numero,x.cidade,x.uf, x.complemento)'>Visualizar</button></td>
						<td scope="col">{{x.cep}}</td>
						<td scope="col">{{x.cnpj}}</td>
						<td scope="col">{{x.inscricaoEstadual}}</td>
						<td scope="col">{{x.telefone1}}</td>
						<td scope="col">{{x.telefone2}}</td>
						<td scope="col">{{x.email}}</td>
						<td scope='col'> <button>Alterar</button></td>
						<td scope='col'><button ng-click = excluirForn(x.id)>Excluir</button></td>
						</tr>
					</tbody>
				</table>
			</div>
			<!-- DIV DETALHAMENTO DO ENDERECO -->
			<div ng-show='verEnd'>		
				<!-- RODRIGO DO PHRONTY ENDY FAVOR ESTILIZAR-->
				<p>Fornecedor: {{verNome}}</p>
				<p>Cidade: {{verCid}}</p>
				<p>Estado: {{verUF}}</p>
				<p>Bairro: {{verBairro}}</p>
				<p>Número: {{verNum}}</p>
				<p>Rua: {{verRua}}</p>
				<p>Complemento: {{verComp}}</p>
				<br>
				<button ng-click='verFornVoltar()'>Voltar</button>
			
		
			</div>

			<br>
	  	</div>
	 </div>
	<!-- FIM DIV BUSCA DOS MEUS FORNECEDORES-->
	
	<!-- ENTRADA DE MERCADORIAS --> 
	 <div id="EntradadeMercadorias" class="w3-container city">
	   <h4>Entrada de <strong>Mercadorias</strong></h4>

		<div align="left" style="width:25%;">
			<div class="col-lg-14">
			    <div class="card">
		        	<div class="card-body card-block">
			            <form action="" method="" class="form-horizontal" style="position:relative;right:140%;top:27px;";>
							<div class="form-group">
							    <div class="col col-md-12">
								<input class="form-control " ng-model='fornNome' placeholder="Nota Fiscal" type="text">
							</div>
							</div>
							<div class="form-group">
							    <div class="col col-md-12">
								<select class="form-control" ng-mouseover=''  ng-model='prodForn' type="text">
								<option value='Fornecedor'>Fornecedor</option>
								<option></option>
								</select>
								</div>
							</div>	
		            	</form>
		         	</div>
					
		<!-- FIM FORMULARIO-->    
					<div class="col-lg-6-header" style="display:block;">
						<div style="float: left;left:2.5%;position:relative;top:-90px;">
							<div class="form-group">
								Produto:
								<select class="form-control" ng-mouseover='buscaProdutos()' style="width:500px;" ng-model='prodMeuEstoque' type="text">
									<option ng-repeat='x in comboMeuEstoque' value='{{x.id}}'>{{x.nome}}</option>
								</select>
							</div>
								<input type='submit' style="position:relative;top:-47px;left:101%;" class="btn btn-success btn-sm" ng-click='insereProdVenda(qtd)' value='+'/>
						</div>
					</div>
						<div class="card-body" style="position:relative;height: 100px;overflow-y: auto;width:500px;top:-125px;left:7px;">
							<table class="table table-bordered" style="font-size:15px;">
								<thead>
									<tr>
										<th scope="col">Produto</th>
										<th scope="col">Quantidade</th>
									</tr>
								</thead>
								<tbody>
									<tr ng-repeat="x in listaprod">
										<td scope="col">{{x.produto}}</td>
										<td scope="col"><input type="number" ng-model='qtd' min='1' placeholder="1" style="width:80px;"></td>
									</tr>
								</tbody>
							</table>
						</div>
						<input type='submit' style="position:relative;top:10px;left:35px;" class="btn btn-success btn-sm" ng-click='insereProdVenda(qtd)' value='Finalizar Operação'/>
		        </div>
		    </div>
			<br>
	  	</div>

	 </div>
	<!-- FIM ENTRADA DE MERCADORIAS -->
	
	<!-- CADASTRO DE FORNECEDORES --> 
	 <div id="Fornecedores" class="w3-container city" ng-controller='cadastroDeFornecedores' > 
	 <h4>Cadastro de <strong>Fornecedores</strong></h4>
	    <div class="alert alert-success"  ng-show ='alertCadForn' role="alert">
  		<strong>{{msgCadForn}}</strong>
		</div>
	   <div align="left" style="width:40%;height:72%;" >
			<div class="col-lg-14">
			    <div class="card">
		        	<div class="card-body card-block">
			            <form  class="form-horizontal">
							<div class="form-group">
							    <div class="col col-md-12">
								<input class="form-control " ng-model='FNome' placeholder="Nome" type="text" >
								</div>
							</div>

							<div class="form-group">
							    <div class="col col-md-12">
								<input class="form-control " ng-model='FRep' placeholder="Representante" type="text" >
								</div>
							</div>

							<div class="form-group">
							    <div class="col col-md-4">
								<input class="form-control " ng-model='FRua' placeholder="Rua" type="text" >

								</div>
								<div class="col col-md-5">
								<input class="form-control " ng-model='FBairro' placeholder="Bairro" type="text" >

								</div>
								<div class="col col-md-3">
								<input class="form-control " ng-model='FNumero' placeholder="Nº" type="number" >

								</div>
							</div>

							<div class="form-group">
							    <div class="col col-md-8">
									<input class="form-control " ng-model='FCidade' placeholder="Cidade" type="text" >
								</div>
								<div class="col col-md-4">
									<input class="form-control " ng-model='FUF' placeholder="UF" type="text" >

								</div>
							</div>

							<div class="form-group">
							    <div class="col col-md-12">
								<input class="form-control " ng-model='FComplemento' placeholder="Complemento" type="text" >
								</div>
							</div>

							<div class="form-group">
							    <div class="col col-md-12">
								<input class="form-control " ng-model='FCEP' placeholder="CEP" type="text" >
								</div>
							</div>

							<div class="form-group">
							    <div class="col col-md-12">
								<input class="form-control " ng-model='FCNPJ' placeholder="CNPJ" type="text" >
								</div>
							</div>

							<div class="form-group">
							    <div class="col col-md-12">
								<input class="form-control " ng-model='FIE' placeholder="Inscrição Estadual" type="text" >
								</div>
							</div>				

							<div class="form-group">
							    <div class="col col-md-6">
								<input class="form-control " ng-model='FTel1' placeholder="Telefone1" type="text" >
								</div>

								<div class="col col-md-6">
								<input class="form-control " ng-model='FTel2' placeholder="Telefone2" type="text" >
								</div>
							</div>
						
							<div class="form-group">
							    <div class="col col-md-12">
								<input class="form-control " ng-model='FEmail' placeholder="E-mail" type="text" >
							</div>
							
							</div>						
							<div class="card-footer">
								<button class="btn btn-success btn-sm"
								ng-click='cadastrarFornecedor(FNome,FRep,FRua,
								FBairro,FNumero,FCidade,FUF,
								FComplemento,FCEP,FCNPJ,
								FIE,FTel1,FTel2,FEmail)'>Cadastrar</button>
								<button type="reset" class="btn btn-danger btn-sm" ng-click='limpaCampos()'><i class="fa fa-ban"></i> Limpar</button>
							</div>
		            	</form>
		         	</div>
		        </div>
		    </div>

			<br>
	  	</div>

	 </div>
	<!-- FIM CADASTRO DE FORNECEDORES -->



	</div>

</div>

<!-- MODAL -->
<script> 
document.getElementsByClassName("tablink")[0].click();

function openCity(evt, cityName) {
  var i, x, tablinks;
  x = document.getElementsByClassName("city");
  for (i = 0; i < x.length; i++) {
    x[i].style.display = "none";
  }
  tablinks = document.getElementsByClassName("tablink");
  for (i = 0; i < x.length; i++) {
    tablinks[i].classList.remove("w3-light-grey");
  }
  document.getElementById(cityName).style.display = "block";
  evt.currentTarget.classList.add("w3-light-grey");
}
</script>



</body>
</html>



<!-- Modal -->
