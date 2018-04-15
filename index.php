<html>
<head>
	<link rel="icon" href="img/aw.ico" type="image/x-icon" />
	<link rel="shortcut icon" href="img/aw.ico" type="image/x-icon" />

		<title>ARTWEB - Sistema de Gestão Comercial</title>
		<meta name="viewport" content="width=device-width" />
    <title>Index</title>

			<meta charset="UTF-8">
			<link rel="stylesheet" href="css/config.css">
			<link rel="stylesheet" href="css/w3.css">
			<link rel="stylesheet" href="css/bootstrap/bootstrap3.3.7.css">
			<link rel="stylesheet" href="css/jAlert.css">
			<script src="js/angular/angular.js" type="text/javascript"></script>
			<script src="js/ajax.js"></script>
			<script src="js/jAlert.js"></script>
			<script src="js/scriptss.js" type="text/javascript"></script>
</head>
<body ng-app='duval'>

<div id="logo" align="center">
	<img src="img/b2.png" width="300">
</div>


<div class="w3-container" align="center">
	<h2>Bem-vindo, Usuário.</h2>
	<p>Para iniciar suas atividades, basta clicar no botão abaixo.</p>
	<div ng-controller='aberturaCaixa'>
		<a  ng-click='validaCaixa()' onclick="document.getElementById('id02').style.display='block'" class="w3-button w3-black" style="text-decoration:none;border-radius:10px;width:150px;">Caixa</a>
	<button onclick="document.getElementById('id01').style.display='block'" class="w3-button w3-black" style="border-radius:10px;">Painel de Controle</button>

		<div ng-show='abertura'>
		<div id="id02" class="w3-modal">
 <div class="w3-modal-content w3-card-4 w3-animate-zoom" style="width:600px;">
  <header class="w3-container w3-orange"> 
	   <span onclick="document.getElementById('id02').style.display='none'" 
	   class="w3-button w3-orange w3-xlarge w3-display-topright">&times;</span>
			<div align="center">
				<div class="col-lg-14">
				    <div class="card">
				    <h1>Abertura de Caixa</h1>
			          <div class="card-body card-block">
				            <form class="form-horizontal">
								<div class="form-group">
								    <div class="col col-md-12">
									<input class="form-control" placeholder="Valor Abertura" ng-model='vAt' min='0' style="width:30%;" type="number" >
								</div>
								</div>
								<div class="form-group">
									<center>
								    <div class="col col-md-12">
									<button type="reset" class="btn btn-success btn-sm" ng-click='abrirCaixa(vAt)'><i class="fa fa-ban"></i> Abrir Caixa</button>
									</div>
									</center>

								</div>
				            </form>
			           </div>


			        </div>
				</div>
				
		  </div>
		</div>
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
						
								Quantidade: <input class="form-control" min='0' placeholder='0' ng-model='qtdMeuEstoque' type="number">

							</div>

							</div>
			            </form>
		          	</div>
		         	<div class="card-footer" align="center">
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
	  
	   <div align="left" style="width:50%;height:350px;" >

			<div class="col-lg-14">
			    <div class="card">

		           <div class="card-body card-block">
			            <form class="form-horizontal">
							<div class="form-group">
							    <div class="col col-md-12">Código:
								<input class="form-control" placeholder="Insira o código do produto" ng-model='prodCod' maxlength="15" type="text" autofocus>
							</div>
							</div>
							<div class="form-group">
							    <div class="col col-md-12">Nome:
								<input class="form-control " placeholder="Insira o nome do Produto" ng-model='prodNome' type="text" >
							</div>
							</div>
							<div class="form-group">
							    <div class="col col-md-6">Valor de Compra:
								<input class="form-control" placeholder="Insira o preço de compra" ng-model='prodValorCompra' min='0' type="number" >
							</div>

							    <div class="col col-md-6">Valor de Venda:
								<input class="form-control" placeholder="Insira o preço de venda" ng-model='prodValorVenda' min='0' type="number" >
							</div>
							</div>
							<div class="form-group">
							    <div class="col col-md-12">Fornecedor:
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
		        <div style="float: left;" ng-show='exibeMeusProd' >
					<input type="text"  ng-model='formBusca' name="fornBuscar" placeholder="Produto" autofocus>
					<button ng-click='buscaProduto(formBusca)'>Buscar</button>
								
				</div>

		    </div>
		<!-- FIM FORMULARIO-->  


	   	<div class="container" style="width:100%;"> 

	   		<div ng-show='exibeMeusProd'>
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
						<td scope='col'><button ng-click='preencheAlterarMeusProd(x.id,x.codigo,x.nome,x.quantidade,x.precoCompra,x.precoVenda,
						x.idforn)'>Alterar</button></td>
						<td scope='col'><button ng-click ="excluirProd(x.codigo,x.nome)">Excluir</button></td>
						</tr>
					</tbody>
			  	</table>
		  	</div>

		  	<div ng-show='editMeusProd'>
		  		<div align="left" style="width:50%;" >

					<div class="col-lg-14">
					    <div class="card">

				           <div class="card-body card-block">
					            <form class="form-horizontal">
									<div class="form-group">
									    <div class="col col-md-6">Código:
										<input class="form-control" placeholder="Código" ng-model='altCod' type="text" >
									</div>

									    <div class="col col-md-6">Nome:
										<input class="form-control " placeholder="Produto" ng-model='altNome' type="text" >
									</div>
									</div>
									<div class="form-group">
									    <div class="col col-md-6">Preço de Compra:
										<input class="form-control" placeholder="Preço de Compra" ng-model='altPCompra' type="number" >
									</div>

									    <div class="col col-md-6">Preço de Venda:
										<input class="form-control" placeholder="Preço de Venda" ng-model='altPVenda' type="number" >
									</div>
									</div>
									<div class="form-group">
									    <div class="col col-md-6">Quantidade:
										<input class="form-control" readonly placeholder="Quantidade" ng-model='altQtd' type="number" >
									</div>

									    <div class="col col-md-6">Fornecedor:
											<input class="form-control" readonly placeholder="Fornecedor" ng-model='altForn' type="text" >
										</div>
									</div>
										<div class="card-footer">
											<button  class="btn btn-success btn-sm" ng-click='alterarProduto(altCod,altNome,altPCompra,altPVenda)' value='Cadastrar'>Atualizar</button>
											<button type="reset" class="btn btn-danger btn-sm" ng-click='altProdVoltar()'><i class="fa fa-ban"></i> Cancelar</button>
										</div>
					            </form>
				           </div>


				        </div>
						    </div>
					<br>
			  </div>
		  	
		  	</div>

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
					<input type="text"  ng-model='fornBusca' name="fornBuscar" placeholder="Nome" autofocus>
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
					    <th>ID</th>
					    <th>Nome</th>
					    <th>Representante</th>
					    <th>Mais Informações</th>
					    <th>Editar</th>
					    <th>Excluir</th>
					  </tr>
					</thead>
					<tbody>
						<tr ng-repeat="x in meusfornecedores">
						<td scope="col">{{x.id}}</td>
						<td scope="col">{{x.nome}}</td>
						<td scope="col">{{x.representante}}</td>
						<td scope="col"><button 
						ng-click='verEndereco(x.nome,x.representante,x.rua,x.bairro,x.numero,x.cidade,x.uf,x.complemento,x.cep,x.cnpj,x.inscricaoEstadual,x.telefone1,x.telefone2,x.email)'>Visualizar</button></td>
						<td scope='col'> <button ng-click='preencheAlteraForn(
						x.id,x.nome,x.representante,x.rua,x.bairro,x.numero,
						x.cidade,x.uf,x.complemento,x.cep,x.cnpj,x.inscricaoEstadual,x.telefone1,x.telefone2,x.email)'>Alterar</button></td>
						<td scope='col'><button ng-click = excluirForn(x.id)>Excluir</button></td>
						</tr>
					</tbody>
				</table>
			</div>
			<!-- DIV DETALHAMENTO DO ENDERECO -->
			<div ng-show='verEnd' align="left">		

			            <form  class="form-horizontal">
							<div class="form-group">
							    <div class="col col-md-6">Fornecedor:
								<input class="form-control" type="text" value="{{verNome}}" disabled>
								</div>
		
							    <div class="col col-md-6">Representante:
								<input class="form-control " value="{{verRep}}" type="text" disabled>
								</div>
							</div>

							<div class="form-group">
							    <div class="col col-md-4">Rua:
								<input class="form-control " value="{{verRua}}" type="text" disabled>

								</div>
								<div class="col col-md-5">Bairro:
								<input class="form-control " value="{{verBairro}}" type="text" disabled>

								</div>
								<div class="col col-md-3">Número:
								<input class="form-control " value="{{verNum}}" type="text" disabled>

								</div>
							</div>

							<div class="form-group">
							    <div class="col col-md-4">Cidade:
									<input class="form-control " value="{{verCid}}" type="text" disabled>
								</div>
								<div class="col col-md-2">UF:
									<input class="form-control " value="{{verUF}}" type="text" disabled>

								</div>

							    <div class="col col-md-2">Complemento:
								<input class="form-control " value="{{verNome}}" type="text" disabled>
								</div>

							    <div class="col col-md-4">CEP:
								<input class="form-control " value="{{verCep}}" type="text" disabled>
								</div>
							</div>

							<div class="form-group">
							    <div class="col col-md-6">CNPJ:
								<input class="form-control " value="{{verCNPJ}}" type="text" disabled>
								</div>

							    <div class="col col-md-6">IE:
								<input class="form-control " value="{{verIE}}" type="text" disabled>
								</div>
							</div>				

							<div class="form-group">
							    <div class="col col-md-3">Telefone 1:
								<input class="form-control " value="{{verTel1}}" type="text" disabled>
								</div>

								<div class="col col-md-3">Telefone 2:
								<input class="form-control " value="{{verTel2}}" type="text" disabled>
								</div>
	
							    <div class="col col-md-6">E-mail:
								<input class="form-control " value="{{verEmail}}" type="text" disabled>
							</div>
							
							</div>						
		            	</form>
						
				<button ng-click='verFornVoltar()' class="btn btn-info" style="position:relative;left:46.3%;width:80px;">Voltar</button>
			
			</div>

			<div ng-show='alteraForn'>
				   <div align="left" style="width:70%;height:72%;" >
			<div class="col-lg-14">
			    <div class="card">
		        	<div class="card-body card-block">
			            <form  class="form-horizontal">
							<div class="form-group">
							    <div class="col col-md-6">Nome:
								<input class="form-control " ng-model='altFNome' type="text" maxlength="50">
								</div>
		
							    <div class="col col-md-6">Representante:
								<input class="form-control " ng-model='altFRep'  type="text" maxlength="100">
								</div>
							</div>

							<div class="form-group">
							    <div class="col col-md-6">Rua:
								<input class="form-control " ng-model='altFRua'  type="text" maxlength="50">

								</div>
								<div class="col col-md-4">Bairro:
								<input class="form-control " ng-model='altFBairro'  type="text" maxlength="70">

								</div>
								<div class="col col-md-2">Número:
								<input class="form-control " ng-model='altFNumero' type="number" maxlength="10">

								</div>
							</div>

							<div class="form-group">
							    <div class="col col-md-6">Cidade:
									<input class="form-control " ng-model='altFCidade' type="text" maxlength="30">
								</div>
								<div class="col col-md-2">UF:
									<input class="form-control " ng-model='altFUF' type="text" maxlength="2">

								</div>
								
							    <div class="col col-md-4">Complemento:
								<input class="form-control " ng-model='altFComplemento' type="text" maxlength="100">
								</div>
							</div>

							<div class="form-group">
							    <div class="col col-md-4">CEP:
								<input class="form-control " ng-model='altFCEP'  type="text" maxlength="30">
								</div>

							    <div class="col col-md-4">CNPJ:
								<input class="form-control " ng-model='altFCNPJ'  type="text" maxlength="50">
								</div>

							    <div class="col col-md-4">Inscrição Estadual:
								<input class="form-control " ng-model='altFIE'  type="text" maxlength="30">
								</div>
							</div>				

							<div class="form-group">
							    <div class="col col-md-3">Telefone:
								<input class="form-control " ng-model='altFTel1'  type="text" maxlength="30">
								</div>

								<div class="col col-md-3">Telefone:
								<input class="form-control " ng-model='altFTel2' type="text" maxlength="30">
								</div>
	
							    <div class="col col-md-6">E-mail:
								<input class="form-control " ng-model='altFEmail' type="text" maxlength="100">
							</div>
							
							</div>						
							<div class="card-footer" align="center">
								<button class="btn btn-success btn-sm"
								ng-click='atualizaForn(altFNome,altFRep,altFRua,
								altFBairro,altFNumero,altFCidade,altFUF,
								altFComplemento,altFCEP,altFCNPJ,
								altFIE,altFTel1,altFTel2,altFEmail)'>Confirmar</button>
								<button type="reset" class="btn btn-danger btn-sm" ng-click='altFornVoltar()'><i class="fa fa-ban"></i> Cancelar</button>
							</div>
		            	</form>
		         	</div>
		        </div>
		    </div>

			<br>
	  	</div>
			</div>

			<br>
	  	</div>
	 </div>
	<!-- FIM DIV BUSCA DOS MEUS FORNECEDORES-->
	
	<!-- ENTRADA DE MERCADORIAS --> 
	 <div id="EntradadeMercadorias" class="w3-container city" ng-controller='entradaDeMercadorias'>
	   <h4>Entrada de <strong>Mercadorias</strong></h4>
	    <div class="alert alert-success"  ng-show ='alertEntradaMer' role="alert">
  		<strong>{{msgEntradaMer}}</strong>
		</div>

		<div align="left" style="width:25%;">
			<div class="col-lg-14">
			    <div class="card">
			    	<!-- DADOS DA NOTA FISCAL-->
		        	<div class="card-body card-block">
			            <form action="" method="" class="form-horizontal" style="position:relative;right:120%;top:27px;";>
							<div class="form-group">
							    <div class="col col-md-12">Nota Fiscal:
								<input class="form-control " ng-model='entNumNF' placeholder="Número de Nota Fiscal" type="text">
							</div>
							</div>
							<div class="form-group">
							    <div class="col col-md-12">Fornecedor:
									<select class="form-control" ng-mouseover='preencheFornEntrada()' ng-model='codFornNF' type="text">
									<option ng-repeat='x in comboFornEntrada'  value='{{x.id}}'>{{x.nome}}</option>
								</select>

								</div>
							</div>	
		            	</form>
		         	</div>
					
	   				<!-- Inserção de produtos -->
					<div class="col-lg-6-header" style="display:block;">
						<div style="float: left;left:2.5%;position:relative;top:-111px;height:0px;left:30%;">
							<div class="form-group">
								Produto:
								<select class="form-control" ng-mouseover='buscaProdutosEntrada()' style="width:300px;" ng-model='prodEntrada' type="text">
									<option ng-repeat='x in comboEntMer' value='{{x.id}}@{{x.nome}}'>{{x.nome}}</option>
								</select>
								<input   class="form-control" ng-model='entradaMerQtd' type="number" style="width:115px;position:relative;top:-34px;left:102%;" placeholder="Quantidade">
							</div>
							<input type='submit' style="position:relative;top:-81px;left:142%;" class="btn btn-success btn-sm" ng-click='preencheLista(prodEntrada,entradaMerQtd)' value='+'/>
						</div>
					</div>


						<div class="card-body" style="position:relative;height: 190px;overflow-y: auto;width:500px;top:-28px;left:30%;">
							<table class="table table-bordered" style="font-size:15px;">
								<thead>
									<tr>
										<th scope="col">Produto</th>
										<th scope="col">Quantidade</th>
									</tr>
								</thead>
								<tbody>
									<tr ng-repeat="x in listaEntrada">
										<td scope="col">{{x.produto}}</td>
										<td scope="col">{{x.quantidade}}</td>
									</tr>
								</tbody>
							</table>
						</div>
						<input type='submit' style="position:relative;top:2px;" class="btn btn-success btn-sm" ng-click='cadastraEntrada(entNumNF,codFornNF)' value='Finalizar Operação'/>
						<input type='submit' style="position:relative;top:2px;"
						class="btn btn-danger btn-sm" ng-click='cancelaEntrada()' value='Cancelar'/>
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
	   <div align="left" style="width:80%;height:300px;" >
			<div class="col-lg-14">
			    <div class="card">
		        	<div class="card-body card-block">
			            <form  class="form-horizontal">
							<div class="form-group">
							    <div class="col col-md-6">
								<input class="form-control " ng-model='FNome' placeholder="Nome" type="text" >
								</div>
		
							    <div class="col col-md-6">
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
							    <div class="col col-md-4">
									<input class="form-control " ng-model='FCidade' placeholder="Cidade" type="text" >
								</div>
								<div class="col col-md-2">
									<input class="form-control " ng-model='FUF' placeholder="UF" type="text" >

								</div>

							    <div class="col col-md-2">
								<input class="form-control " ng-model='FComplemento' placeholder="Complemento" type="text" >
								</div>

							    <div class="col col-md-4">
								<input class="form-control " ng-model='FCEP' placeholder="CEP" type="text" >
								</div>
							</div>

							<div class="form-group">
							    <div class="col col-md-6">
								<input class="form-control " ng-model='FCNPJ' placeholder="CNPJ" type="text" >
								</div>

							    <div class="col col-md-6">
								<input class="form-control " ng-model='FIE' placeholder="Inscrição Estadual" type="text" >
								</div>
							</div>				

							<div class="form-group">
							    <div class="col col-md-3">
								<input class="form-control " ng-model='FTel1' placeholder="Telefone1" type="text" >
								</div>

								<div class="col col-md-3">
								<input class="form-control " ng-model='FTel2' placeholder="Telefone2" type="text" >
								</div>
	
							    <div class="col col-md-6">
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
