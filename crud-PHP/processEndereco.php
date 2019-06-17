<?php

	session_start();

	$id = 0;
	$edit = false;
	$titulo = '';
	$logradouro = '';
	$numero = '';
	$complemento = '';
	$bairro = '';
	$cidade = '';
	$estado = '';
	$cep = '';

	$mysqli = new mysqli('localhost', 'root', '123456', 'dbphp') or die(mysqli_error($mysqli));

	if (isset($_POST['save'])) {
		$titulo = $_POST['campoTitulo'];
		$logradouro = $_POST['campoLogradouro'];
		$numero = $_POST['campoNumero'];
		$complemento = $_POST['campoComplemento'];
		$bairro = $_POST['campoBairro'];
		$cidade = $_POST['campoCidade'];
		$estado = $_POST['campoEstado'];
		$cep = $_POST['campoCep'];
	
		$mysqli->query("INSERT INTO tb_enderecos (titulo, logradouro, numero, complemento, bairro, cidade, estado, cep) VALUES('$titulo', '$logradouro', '$numero', '$complemento', $bairro, $cidade, $estado, $cep)") 
			or die($mysqli->error);

		$_SESSION['message'] = "Endereço Salvo!";
		$_SESSION['msg_type'] = "success";
		header("location: index.php");
	}

	if (isset($_GET['edit'])) {
		$id = $_GET['edit'];
		$edit = true;
		$busca = $mysqli->query("SELECT * FROM tb_enderecos WHERE id_endereco = $id") or die($mysqli->error());
		if (count($busca) == 1){
			$endereco = $busca->fetch_array();
			$titulo = $endereco['titulo'];
			$logradouro = $endereco['logradouro'];
			$numero = $endereco['numero'];
			$complemento = $endereco['titulo_complemento'];
		}
	}

	if (isset($_POST['update'])) {
		$id = $_POST['campoId'];
		$titulo = $_POST['campoTitulo'];
		$logradouro = $_POST['campoLogradouro'];
		$numero = $_POST['campoNumero'];
		$complemento = $_POST['campoComplemento'];

		$mysqli->query("UPDATE tb_enderecos SET titulo='$titulo', logradouro='$logradouro', numero='$numero', titulo_complemento='$complemento' WHERE id_endereco = $id") or die($mysqli->error);

		$_SESSION['message'] = "endereco Atualizada!";
		$_SESSION['msg_type'] = "warning";
		header('location: index.php');
	}

	if (isset($_GET['delete'])){
		$id = $_GET['delete'];
		$mysqli->query("DELETE FROM tb_enderecos WHERE id_endereco = $id") or die($mysqli->error());

		$_SESSION['message'] = "endereco Deletada!";
		$_SESSION['msg_type'] = "danger";
		header('location: index.php');
	}
?>