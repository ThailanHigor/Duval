<?php
//DUVAL
	require_once("db_conexao.php");
	$op = $_GET['op'];
	
	//REALIZA CADASTRO DE PRODUTOS
	if($op == 'cadastraProduto'){
	
		$cod = $_GET['cod'];
		$nome = $_GET['nome'];
		$valor = $_GET['valor'];
		$forn = $_GET['forn'];
		$qtd = 0;
 		$sql = "INSERT INTO produtos(codigo,nome,quantidade,valor,idforn) values('$cod',
 			'$nome','$qtd','$valor','$forn')";

 		$conector->query($sql)or die("Erro ao Cadastrar.");
	//FIM cadastro	

	}elseif ($op =='comboForn') {
		$sql = "select * from fornecedores";
		
		$busca = $conector->query($sql);

		$quantidade = mysqli_num_rows($busca);
		if ($quantidade > 0) {
			while($row = $busca->fetch_assoc()){
     		$json[] = $row;
     		
     	};
     		$dados['dados'] = $json;
			echo json_encode($dados);
		}
	}elseif ($op =='buscaProdutos') {
		$nome = $_GET['nome'];
		$sql = "select * from produtos where nome like '%$nome%'";
		
		$busca = $conector->query($sql);

		$quantidade = mysqli_num_rows($busca);

		if ($quantidade > 0) {
			while($row = $busca->fetch_assoc()){
     		$json[] = $row;
     		
     	};
     		$dados['dados'] = $json;
			echo json_encode($dados);
		}
	} elseif ($op =='MeuEstProd') {
		$sql = "select id,nome,quantidade from produtos";
		
		$busca = $conector->query($sql);

		$quantidade = mysqli_num_rows($busca);

		if ($quantidade > 0) {
			while($row = $busca->fetch_assoc()){
     		$json[] = $row;
     		
     	};
     		$dados['dados'] = $json;
			echo json_encode($dados);
		}
	}elseif ($op =='aumentaEst') {
		$prod = $_GET['prod'];
		$qtd = $_GET['qtd'];
	
 		$sql = "UPDATE produtos SET quantidade =quantidade+'$qtd' where id='$prod'";

 		$conector->query($sql)or die("Erro ao Cadastrar.");
	}elseif ($op =='diminuiEst') {
		$prod = $_GET['prod'];
		$qtd = $_GET['qtd'];
	
 		$sql = "UPDATE produtos SET quantidade =quantidade-'$qtd' where id='$prod'";

 		$conector->query($sql)or die("Erro ao Cadastrar.");
	}
?>