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
?>