<?php
	
require_once("db_conexao.php");
$op = $_GET['op'];
date_default_timezone_set('America/Sao_Paulo');


if ($op =='buscaProdutos') {
	$nome = $_GET['nome'];

	$sql = "SELECT * FROM produtos where LOWER(nome) like LOWER('%$nome%')";
	
	$busca = $conector->query($sql);

	$quantidade = mysqli_num_rows($busca);

	if ($quantidade > 0) {
		while($row = $busca->fetch_assoc()){
 		$json[] = $row;
 		
 	};
 		$dados['dados'] = $json;
		echo json_encode($dados);
	}
}elseif ($op =='registraVenda') {
	$valorT = $_GET['valorT'];
	$fpg = $_GET['fpg'];
	$data = date('Y-m-d H:i');
	$auxdata = $data;

	$sql = "INSERT INTO venda(data_Venda,valor_total_venda,form_pgmto) 
			values('$data','$valorT','$fpg')";

 	$conector->query($sql)or die("Erro ao Cadastrar.");

 	//REALIZA A BUSCA DO ID GERADO DESTA VENDA
	$sql2 = "SELECT id_Venda FROM venda 
			WHERE data_Venda ='$auxdata' and 
				  valor_total_venda ='$valorT' and 
				  form_pgmto= '$fpg'";

	$resultadoID = $conector->query($sql2);

 	$quantidade = mysqli_num_rows($resultadoID);
	if ($quantidade > 0) {
		while($row = $resultadoID->fetch_assoc()){
 		$json[] = $row;
 		
 		};

 		$dados['dados'] = $json;
		echo json_encode($dados);
	}
}elseif ($op =='prodsVenda') {
	$prod = $_GET['prod'];
	$qtd = $_GET['qtd'];
	$idV = $_GET['idV'];

	$sql = "INSERT INTO produtos_venda(prod_venda,qtd_venda,id_Venda) 
			values('$prod','$qtd','$idV')";

 	$conector->query($sql)or die("Erro ao Cadastrar.");

}elseif ($op =='atualizaEst') {
		$prod = $_GET['prod'];
		$qtd = $_GET['qtd'];
	
 		$sql = "UPDATE produtos SET quantidade =quantidade-'$qtd' where id='$prod'";

 		$conector->query($sql)or die("Erro ao Cadastrar.");

}






?>