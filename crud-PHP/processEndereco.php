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
	
		$mysqli->query("INSERT INTO tb_enderecos (titulo, logradouro, numero, complemento, bairro, cidade, estado, cep) VALUES('$titulo', '$logradouro', '$numero', '$complemento', '$bairro', '$cidade', '$estado', '$cep')") 
			or die($mysqli->error);

		$_SESSION['message'] = "Endereço Salvo!";
		$_SESSION['msg_type'] = "success";
		header("location: endereco.php");
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
			$complemento = $endereco['complemento'];
			$bairro = $endereco['bairro'];
			$cidade = $endereco['cidade'];
			$estado = $endereco['estado'];
			$cep = $endereco['cep'];
		}
	}

	if (isset($_POST['update'])) {
		$id = $_POST['campoId'];
		$titulo = $_POST['campoTitulo'];
		$logradouro = $_POST['campoLogradouro'];
		$numero = $_POST['campoNumero'];
		$complemento = $_POST['campoComplemento'];
		$bairro = $_POST['campoBairro'];
		$cidade = $_POST['campoCidade'];
		$estado = $_POST['campoEstado'];
		$cep = $_POST['campoCep'];

		$mysqli->query("UPDATE tb_enderecos SET titulo='$titulo', logradouro='$logradouro', numero='$numero', complemento='$complemento', bairro='$bairro', cidade='$cidade', estado='$estado', cep='$cep' WHERE id_endereco = $id") or die($mysqli->error);

		$_SESSION['message'] = "Endereço Atualizado!";
		$_SESSION['msg_type'] = "warning";
		header("location: endereco.php");
	}

	if (isset($_GET['delete'])){
		$id = $_GET['delete'];
		$mysqli->query("DELETE FROM tb_enderecos WHERE id_endereco = $id") or die($mysqli->error());

		$_SESSION['message'] = "Endereco Deletado!";
		$_SESSION['msg_type'] = "danger";
		header("location: endereco.php");
	}
?>