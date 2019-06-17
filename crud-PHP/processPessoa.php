<?php

	session_start();

	$id = 0;
	$edit = false;
	$nome = '';
	$rg = '';
	$cpf = '';
	$mae = '';

	$mysqli = new mysqli('localhost', 'root', '123456', 'dbphp') or die(mysqli_error($mysqli));

	if (isset($_POST['save'])) {
		$nome = $_POST['campoNome'];
		$rg = $_POST['campoRg'];
		$cpf = $_POST['campoCpf'];
		$mae = $_POST['campoMae'];
	
		$mysqli->query("INSERT INTO tb_pessoas (nome, rg, cpf, nome_mae) VALUES('$nome', '$rg', '$cpf', '$mae')") 
			or die($mysqli->error);

		$_SESSION['message'] = "Pessoa Salva!";
		$_SESSION['msg_type'] = "success";
		header("location: index.php");
	}

	if (isset($_GET['edit'])) {
		$id = $_GET['edit'];
		$edit = true;
		$busca = $mysqli->query("SELECT * FROM tb_pessoas WHERE id_pessoa = $id") or die($mysqli->error());
		if (count($busca) == 1){
			$pessoa = $busca->fetch_array();
			$nome = $pessoa['nome'];
			$rg = $pessoa['rg'];
			$cpf = $pessoa['cpf'];
			$mae = $pessoa['nome_mae'];
		}
	}

	if (isset($_POST['update'])) {
		$id = $_POST['campoId'];
		$nome = $_POST['campoNome'];
		$rg = $_POST['campoRg'];
		$cpf = $_POST['campoCpf'];
		$mae = $_POST['campoMae'];

		$mysqli->query("UPDATE tb_pessoas SET nome='$nome', rg='$rg', cpf='$cpf', nome_mae='$mae' WHERE id_pessoa = $id") or die($mysqli->error);

		$_SESSION['message'] = "Pessoa Atualizada!";
		$_SESSION['msg_type'] = "warning";
		header('location: index.php');
	}

	if (isset($_GET['delete'])){
		$id = $_GET['delete'];
		$mysqli->query("DELETE FROM tb_pessoas WHERE id_pessoa = $id") or die($mysqli->error());

		$_SESSION['message'] = "Pessoa Deletada!";
		$_SESSION['msg_type'] = "danger";
		header('location: index.php');
	}

	/*class StmtPessoa extends Conexao
	{
		
		public function getPessoas() {

			$stmt = $conn->prepare("SELECT * FROM tb_pessoas ORDER BY nome"); //preparando o comando a ser enviado
			$stmt->execute(); //execute o comando preparado

			$resultados = $stmt->fetchAll(PDO::FETCH_ASSOC); //fetchAll() == fatia todos as linhas, já realiza a organização dos dados sozinho. PDO::FETCH_ASSOC == diminui a quantidade de informações, retira o índice do banco, traz apenas as informações necessárias.

			var_dump($resultados);

			foreach ($resultados as $row => $value) {

				foreach ($row as $key => $value) {
					echo '<strong>'.$key.'</strong>'.$value.'<br>';
				}
				echo '----------------------------------------------';
			}
		}


		public function addPessoa($nome, $rg, $cpf, $nomeMae) {

			$stmt = $conn->prepare("INSERT INTO tb_pessoas(nome, rg, cpf, nome_mae) VALUES (:NOME, :RG, :CPF, :MAE)");

			$stmt->bindParam(":NOME", $nome); //após definidos os valores, passe os apelidos q serão utilizados p/ eles, neste caso, a variavel $nome será passada através do "apelido" :NOME
			$stmt->bindParam(":RG", $rg);
			$stmt->bindParam(":CPF", $cpf);
			$stmt->bindParam(":MAE", $nomeMae);

			$stmt->execute(); //executando o comando preparado

			echo 'Pessoa Cadastrada!';
		}
	
		public function editPessoa($id, $nome, $rg, $cpf, $nomeMae) {

			$stmt = $conn->prepare("UPDATE tb_pessoas SET nome = :NOME, rg = :RG, cpf = :CPF, nome_mae = :MAE WHERE id_pessoa = :ID");

			$stmt->bindParam(":ID", $id);
			$stmt->bindParam(':NOME', $nome);
			$stmt->bindParam(':RG', $rg);
			$stmt->bindParam(':CPF', $cpf);
			$stmt->bindParam(':MAE', $nomeMae);
			$stmt->execute();

			echo 'Pessoa Atualizada!';
		}

		public function deletePessoa($id) {
			
			$stmt = $conn->prepare("DELETE FROM tb_pessoas WHERE id_pessoa = :ID");

			$stmt->bindParam(":ID", $id);
			$stmt->execute();

			echo 'Pessoa Apagada!';
		}
	
	}
	*/