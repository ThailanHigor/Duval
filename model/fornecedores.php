<?php 

	require_once("db_conexao.php");
	$op = $_GET['op'];


	if($op == 'cadastraFornecedor'){
	
		$nome = $_GET['nome'];
		$rep = $_GET['rep'];
		$rua = $_GET['rua'];
		$bairro = $_GET['bairro'];
		$numero = $_GET['numero'];
		$cidade = $_GET['cidade'];
		$uf = $_GET['uf'];
		$complemento = $_GET['complemento'];
		$cep = $_GET['cep'];
		$cnpj = $_GET['cnpj'];
		$ie = $_GET['ie'];
		$tel1 = $_GET['tel1'];
		$tel2 = $_GET['tel2'];
		$email = $_GET['email'];

 		$sql = "INSERT INTO fornecedores (nome,representante,rua,bairro,numero,cidade,
 										 uf,complemento,cep,cnpj,inscricaoEstadual,
 										 telefone1,telefone2,email) 
 				VALUES ('$nome', '$rep', '$rua', '$bairro','$numero', '$cidade',
 						'$uf', '$complemento', '$cep', '$cnpj', '$ie',
 						'$tel1', '$tel2', '$email')";

 		$conector->query($sql)or die("Erro ao Cadastrar.");


	}elseif($op == 'buscaFornecedor'){
	
		$nome = $_GET['nome'];

 		$sql = "SELECT * FROM fornecedores where nome like '%$nome%'";

		$busca = $conector->query($sql);

		$quantidade = mysqli_num_rows($busca);

		if ($quantidade > 0) {
			while($row = $busca->fetch_assoc()){
     		$json[] = $row;
     		
     	};
     		$dados['dados'] = $json;
			echo json_encode($dados);
		}

	}elseif ($op =='excluirForn') {
		$id = $_GET['id'];
		
	
 		$sql = "DELETE FROM fornecedores where id='$id'";

 		$conector->query($sql)or die("Erro ao Cadastrar.");
	}

?>