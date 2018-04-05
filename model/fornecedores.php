<?php 

	require_once("db_conexao.php");
	$op = $_GET['op'];


	if($op == 'cadastraFornecedor'){
	
		$nome = $_GET['nome'];
		$cidade = $_GET['cidade'];
		$uf = $_GET['uf'];
		$cnpj = $_GET['cnpj'];
 		$sql = "INSERT INTO fornecedores(nome,cidade,uf,cnpj) values('$nome','$cidade','$uf','$cnpj')";

 		$conector->query($sql)or die("Erro ao Cadastrar.");
	//FIM cadastro	

	}

?>