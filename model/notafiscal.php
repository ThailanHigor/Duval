<?php
	require_once("db_conexao.php");
	$op = $_GET['op'];


	if($op == 'produtosNF'){
	
 		$sql = "INSERT INTO produtos_nf(produto_NF,quantidade,) values('$id',
 			'$qtd','$nf')";

 		$conector->query($sql)or die("Erro ao Cadastrar.");
	//FIM cadastro	

	}elseif($op =='NotaFiscal'){
		$id = $_GET['id'];
		$qtd = $_GET['qtd'];
		$nf = $_GET['nf'];
		$forn = $_GET['forn'];
		$sql = "INSERT INTO nota_fiscal(cod_NF,fornecedor) values('$nf','$forn')";

 		$conector->query($sql)or die("Erro ao Cadastrar.");

	}elseif($op =='buscaNF'){

		$nf = $_GET['nf'];
		$forn = $_GET['forn'];
		$sql = "SELECT id_NF from nota_fiscal where cod_NF='$nf'";

 		$busca = $conector->query($sql);

		$quantidade = mysqli_num_rows($busca);
		if ($quantidade > 0) {
			while($row = $busca->fetch_assoc()){
     		$json[] = $row;
     		
     	};
     		$dados['dados'] = $json;
			echo json_encode($dados);
		}
	}elseif($op =='insereProdNF'){
		$prod = $_GET['prod'];
		$qtd = $_GET['qtd'];
		$id_nf = $_GET['id_nf'];
		
		$sql = "INSERT INTO produtos_nf(produto_NF,quantidade,id_NF) values('$prod','$qtd','$id_nf')";

 		$conector->query($sql)or die("Erro ao Cadastrar.");

	}


?>