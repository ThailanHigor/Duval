<?php
	require_once("db_conexao.php");
	$op = $_GET['op'];


	if($op == 'cadastraNota'){
		
		$nf = $_GET['numnf'];
		$forn = $_GET['fornNF'];
		// INSERE A NOTA E GERA UM ID PARA NOTA
 		$sql = "INSERT INTO nota_fiscal(cod_NF,fornecedor) values('$nf',
 			'$forn')";

 		$conector->query($sql)or die("Erro ao Cadastrar Nota.");

 		//REALIZA A BUSCA DO ID GERADO DESTA NOTA
 		$sql2 = "SELECT id_NF FROM nota_fiscal 
 				WHERE cod_NF ='$nf' and fornecedor='$forn' ";

 		$resultadoID = $conector->query($sql2);

     	$quantidade = mysqli_num_rows($resultadoID);
		if ($quantidade > 0) {
			while($row = $resultadoID->fetch_assoc()){
     		$json[] = $row;
     		
     		};

     		$dados['dados'] = $json;
			echo json_encode($dados);
		}
	//FIM cadastro	
	}elseif($op =='prodsNota'){
		$prodID = $_GET['prod'];
		$qtd = $_GET['qtd'];
		$nf = $_GET['idnf'];

		//cadastra produtos referentes a nota fiscal lançada
		$sql = "INSERT INTO produtos_nf(produto_NF,quantidade,id_NF) 
				values('$prodID','$qtd','$nf')";

 		$conector->query($sql)or die("Erro ao Cadastrar.");

 		//aumenta quantidade dos produtos
 		$sql2 = "UPDATE produtos SET quantidade =quantidade+'$qtd' where id='$prodID'";

 		$conector->query($sql2)or die("Erro ao Cadastrar.");

	}elseif ($op =='buscaNota') {
		$idnota = $_GET['idnota'];
		$sql = "SELECT * FROM venda
				INNER JOIN produtos_venda ON
				venda.id_Venda = produtos_venda.id_Venda
				INNER JOIN produtos ON
				produtos_venda.prod_venda = produtos.id
				WHERE venda.id_Venda='$idnota' 
				";

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
	}


?>