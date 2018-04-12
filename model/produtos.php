<?php
//DUVAL
	require_once("db_conexao.php");
	$op = $_GET['op'];
	
	//REALIZA CADASTRO DE PRODUTOS
	if($op == 'cadastraProduto'){
	
		$cod = $_GET['cod'];
		$nome = $_GET['nome'];
		$precoCompra = $_GET['precoCompra'];
		$precoVenda = $_GET['precoVenda'];
		$forn = $_GET['forn'];
		$qtd = 0;

 		$sql = "INSERT INTO produtos(codigo,nome,quantidade,precoCompra,precoVenda,idforn) values('$cod','$nome','$qtd','$precoCompra','$precoVenda','$forn')";

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
		$sql = "select * from produtos where LOWER(nome) like LOWER('%$nome%') or codigo like '%$nome%'";
		
		$busca = $conector->query($sql);

		$quantidade = mysqli_num_rows($busca);

		if ($quantidade > 0) {
			while($row = $busca->fetch_assoc()){
     		$json[] = $row;
     		
     	};
     		$dados['dados'] = $json;
			
		}else{
			$dados['dados'] = [];
		}
		echo json_encode($dados);
	}elseif ($op =='MeuEstProd') {
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
	}elseif ($op =='excluiprod') {
		$cod = $_GET['cod'];
		
	
 		$sql = "DELETE FROM produtos where codigo='$cod'";

 		$conector->query($sql)or die("Erro ao Cadastrar.");
	}elseif ($op =='atualizaProd') {
		$id = $_GET['id'];
		$cod = $_GET['cod'];
		$nome = $_GET['nome'];
		$precoCompra = $_GET['precoCompra'];
		$precoVenda = $_GET['precoVenda'];
	
		
	
 		$sql = "UPDATE produtos SET codigo = '$cod', nome = '$nome', precoCompra = '$precoCompra', precoVenda = '$precoVenda' WHERE id = '$id'";

 		$conector->query($sql)or die("Erro ao Cadastrar.");
	}
?>