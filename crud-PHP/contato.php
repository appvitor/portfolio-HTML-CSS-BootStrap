<!DOCTYPE html>
<html lang="pt-br">
<head>
	<meta charset="utf-8">
	<title>CRUD - PHP</title>
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
	<link rel="stylesheet" type="text/css" href="style.css">
</head>
<body>
	<?php require_once 'processContato.php'; ?>
	<?php
		$mysqli = new mysqli('localhost', 'root', '123456', 'dbphp') or die(mysqli_error($mysqli));
		$tablePessoas = $mysqli->query("SELECT * FROM tb_contatos") or die($mysqli->error);

		function pre_r($tabela) {
			echo '<pre>';
			print_r($tabela);
			echo "</pre>";
		}
	?>
	<?php if (isset($_SESSION['message'])): ?>
		<div class="alert alert-<?=$_SESSION['msg_type']?>">
			<?php
				echo $_SESSION['message'];
				unset($_SESSION['message']);
			?>
		</div>
	<?php endif ?>
	<h1>CRUD - CONTATOS</h1>
	<nav class="navbar navbar-light">
		<ul class="navbar-nav flex-row">
			<li class="nav-item">
				<a href="index.php" class="nav-link mr-4">HOME</a>
			</li>
			<li class="nav-item">
				<a href="endereco.php" class="nav-link">ENDEREÇOS</a>
			</li>
		</ul>
	</nav>
	<div class="container">
		<div class="row d-flex justify-content-around align-items-center mt-3">
			<h3>NÃO INICIADO</h3>
		</div>
	</div>

	<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
	<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
</body>
</html>