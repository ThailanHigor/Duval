<html>
<head>
	<link rel="icon" href="img/aw.ico" type="image/x-icon" />
	<link rel="shortcut icon" href="img/aw.ico" type="image/x-icon" />

		<title>Depósito Duval</title>
			<meta charset="UTF-8">
			<link rel="stylesheet" href="css/config.css">
			<link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
			<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
			<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
			<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
			<script src="js/angular/angular.js" type="text/javascript"></script>
			<script src="js/script.js" type="text/javascript"></script>
</head>
<body ng-app='durval'>

<div id="logo" align="center">
	<img src="img/b2.png" width="300">
</div>


<div class="w3-container" align="center">
<h2>Bem-vindo, Usuário.</h2>
<p>Para iniciar suas atividades, basta clicar no botão abaixo.</p>

<button onclick="document.getElementById('id01').style.display='block'" class="w3-button w3-black">Atividades</button>

<div id="id01" class="w3-modal">
 <div class="w3-modal-content w3-card-4 w3-animate-zoom">
  <header class="w3-container w3-orange"> 
   <span onclick="document.getElementById('id01').style.display='none'" 
   class="w3-button w3-orange w3-xlarge w3-display-topright">&times;</span>
   <h2>Área Geral</h2>
  </header>

  	<div class="w3-bar w3-border-bottom">

	   <button class="tablink w3-bar-item w3-button" onclick="openCity(event, 'Estoque')">Estoque</button>
	   <button class="tablink w3-bar-item w3-button"   onclick="openCity(event, 'Produtos')">Cadastro de Produtos</button>
	   <button class="tablink w3-bar-item w3-button" onclick="openCity(event, 'Fornecedores')">Cadastro de Fornecedores</button>
	   <button class="tablink w3-bar-item w3-button" onclick="openCity(event, 'Meus Produtos')">Meus Produtos</button>
   	</div>

	<!-- DIV MEU ESTOQUE-->
	  <div id="Estoque" class="w3-container city">
	   <h4>Meu<strong> Estoque</strong></h4>
	   <div align="left" style="width:25%;" ng-controller='meuEstoque'>
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
		           		<input type='submit' class="btn btn-success btn-sm" ng-click='aumentaEstProd(prodMeuEstoque,qtdMeuEstoque)' value='Incluir'/>
		           		 <button type="reset" ng-click='diminuiEstProd(prodMeuEstoque,qtdMeuEstoque)' class="btn btn-danger btn-sm"><i class="fa fa-ban"></i> Subtrair</button>
		         	</div>

		        </div>
		    </div>
			<br>
	 	</div>
	  </div>
	<!-- FIM MEU ESTOQUE-->

	<!-- DIV CADASTRO DE  PRODUTOS-->
	 <div id="Produtos" class="w3-container city">
	   <h4>Cadastro de <strong>Produtos</strong></h4>
	  
	   <div align="left" style="width:25%;" ng-controller='cadastroDeProdutos'>

			<div class="col-lg-14">
			    <div class="card">

		           <div class="card-body card-block">
			            <form action="" method="" class="form-horizontal">
							<div class="form-group">
							    <div class="col col-md-12">
								<input class="form-control" placeholder="Código" ng-model='prodCod' type="text">
							</div>
							</div>
							<div class="form-group">
							    <div class="col col-md-12">
								<input class="form-control " placeholder="Produto" ng-model='prodNome' type="text">
							</div>
							</div>
							<div class="form-group">
							    <div class="col col-md-12">
								<input class="form-control" placeholder="Valor" ng-model='prodValor' type="number">
							</div>
							</div>
							<div class="form-group">
							    <div class="col col-md-12">
								<select class="form-control" ng-mouseover='preencheForn()'  ng-model='prodForn' type="text">
								<option ng-repeat='x in comboForn'  value='{{x.id}}'>{{x.nome}}</option>
								</select>
								</div>
							</div>
			            </form>
		           </div>

		          	<div class="card-footer">
		          		<input type='submit' class="btn btn-success btn-sm" ng-click='cadastraProduto(prodCod,prodNome,prodValor,prodForn)' value='Cadastrar'/>

		            	<button type="reset" class="btn btn-danger btn-sm" ng-click='limpaCampos()'><i class="fa fa-ban"></i> Limpar</button>
		         	</div>

		        </div>
		    </div>
			<br>
	  </div>
	 </div>
	<!-- FIM CADASTRO-->
	 

	<!-- DIV BUSCA DOS MEUS PRODUTOS-->
	 <div id="Meus Produtos" class="w3-container city" ng-controller='meusProdutos'>
	    <h4>Meus <strong>Produtos</strong></h4>
	   
	    <!-- FORMULARIO DE BUSCA -->
		    <div class="card-header" style="display:block;">
		        <div style="float: left;">
					<input type="text"  ng-model='fornBusca' name="fornBuscar" placeholder="Produto">
					<button ng-click='buscaProduto(fornBusca)'>Buscar</button>
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
			        <th>Valor</th>
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
					<td scope="col">{{x.valor}}</td>
					<td scope="col">{{x.idforn}}</td>
					<td scope='col'> <input type="submit" value='alterar' ng-model='all'/></td>
					<td scope='col'><button ng-click = excluiProduto(x.ID_Pdt)>Excluir</button></td>
					</tr>
				</tbody>
		  </table>

			<br>
	  	</div>
	 </div>
	<!-- FIM DIV BUSCA DOS MEUS PRODUTOS-->


	<!-- CADASTRO DE FORNECEDORES --> 
	 <div id="Fornecedores" class="w3-container city">
	   <h4>Cadastro de <strong>Fornecedores</strong></h4>

	   <div align="left" style="width:25%;" ng-controller='cadastroDeFornecedores'>
			<div class="col-lg-14">
			    <div class="card">
		        	<div class="card-body card-block">
			            <form action="" method="" class="form-horizontal">
							<div class="form-group">
							    <div class="col col-md-12">
								<input class="form-control " ng-model='fornNome' placeholder="Nome" type="text">
							</div>
							</div>
							<div class="form-group">
							    <div class="col col-md-12">
								<input class="form-control " ng-model='fornCidade' placeholder="Cidade" type="text">
							</div>
							</div>
							<div class="form-group">
							    <div class="col col-md-12">
								<input class="form-control " ng-model='fornUF' placeholder="UF" type="text">
							</div>
							</div>
							<div class="form-group">
							    <div class="col col-md-12">
								<input class="form-control " ng-model='fornCNPJ' placeholder="CNPJ" type="text">
							</div>
							</div>
		            	</form>
		         	</div>

		          	<div class="card-footer">
			         	<input type='submit' ng-click='cadastraFornecedor(fornNome,fornCidade,fornUF,fornCNPJ)' class="btn btn-success btn-sm" value='Cadastrar'/>

		           		<button type="reset" class="btn btn-danger btn-sm">
		              	<i class="fa fa-ban"></i> Limpar</button>
		         	</div>
		        </div>
		    </div>

			<br>
	  	</div>

	 </div>
	<!-- FIM CADASTRO DE FORNECEDORES -->


	</div>

</div>

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
<div id="caixa" class="modal fade" role="dialog">
  <div class="modal-dialog">

    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h4 class="modal-title">Modal Header</h4>
      </div>
      <div class="modal-body">
        <p>Some text in the modal.</p>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
      </div>
    </div>

  </div>
</div>