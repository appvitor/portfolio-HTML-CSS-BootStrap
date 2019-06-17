<?php

	session_start();

	$idEndereco = 0;
	$edit = false;
	$titulo = '';
	$logradouro = '';
	$numero = '';
	$complemento = '';
	$bairro = '';
	$cidade = '';
	$estado = '';
	$cep = '';
	$pessoaId = 0;

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
		$pessoaId = $_POST['campoIdPessoa'];
	
		$mysqli->query("INSERT INTO tb_enderecos (titulo, logradouro, numero, complemento, bairro, cidade, estado, cep, pessoa_id) VALUES('$titulo', '$logradouro', '$numero', '$complemento', '$bairro', '$cidade', '$estado', '$cep', '$pessoaId')") 
			or die($mysqli->error);

		$_SESSION['message'] = "Endereço Salvo!";
		$_SESSION['msg_type'] = "success";
		header("location: endereco.php");
	}

	if (isset($_GET['edit'])) {
		$idEndereco = $_GET['edit'];
		$edit = true;
		$busca = $mysqli->query("SELECT * FROM tb_enderecos WHERE id_endereco = $idEndereco") or die($mysqli->error());
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
			$pessoaId = $endereco['pessoa_id'];
		}
	}

	if (isset($_POST['update'])) {
		$idEndereco = $_POST['campoId'];
		$titulo = $_POST['campoTitulo'];
		$logradouro = $_POST['campoLogradouro'];
		$numero = $_POST['campoNumero'];
		$complemento = $_POST['campoComplemento'];
		$bairro = $_POST['campoBairro'];
		$cidade = $_POST['campoCidade'];
		$estado = $_POST['campoEstado'];
		$cep = $_POST['campoCep'];
		$pessoaId = $_POST['campoIdPessoa'];

		$mysqli->query("UPDATE tb_enderecos SET titulo='$titulo', logradouro='$logradouro', numero='$numero', complemento='$complemento', bairro='$bairro', cidade='$cidade', estado='$estado', cep='$cep', pessoa_id='$pessoaId' WHERE id_endereco = $idEndereco") or die($mysqli->error);

		$_SESSION['message'] = "Endereço Atualizado!";
		$_SESSION['msg_type'] = "warning";
		header("location: endereco.php");
	}

	if (isset($_GET['delete'])){
		$idEndereco = $_GET['delete'];
		$mysqli->query("DELETE FROM tb_enderecos WHERE id_endereco = $idEndereco") or die($mysqli->error());

		$_SESSION['message'] = "Endereco Deletado!";
		$_SESSION['msg_type'] = "danger";
		header("location: endereco.php");
	}
?>