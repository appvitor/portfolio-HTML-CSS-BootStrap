<!DOCTYPE html>
<html lang="pt-br">
<head>
	<meta charset="utf-8">
	<title>CRUD - PHP</title>
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
	<link rel="stylesheet" type="text/css" href="style.css">
</head>
<body>
	<?php require_once 'processEndereco.php'; ?>
	<?php
		$mysqli = new mysqli('localhost', 'root', '123456', 'dbphp') or die(mysqli_error($mysqli));
		$tableEnderecos = $mysqli->query("SELECT * FROM tb_enderecos") or die($mysqli->error);

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
	<h1>CRUD - ENDEREÇOS</h1>
	<nav class="navbar navbar-light">
		<ul class="navbar-nav flex-row">
			<li class="nav-item">
				<a href="index.php" class="nav-link mr-4">HOME</a>
			</li>
			<li class="nav-item">
				<a href="contato.php" class="nav-link">CONTATOS</a>
			</li>
		</ul>
	</nav>
	<div class="container">
		<div class="row d-flex justify-content-around align-items-center mt-3">
			<form action="processEndereco.php" method="POST">
				<div class="form-group">
					<input type="hidden" name="campoId" value="<?php echo $id; ?>">
					<label>Titulo</label>
					<input type="text" class="form-control" name="campoTitulo" value="<?php echo $titulo; ?>">
					<label>Logradouro</label>
					<input type="text" class="form-control" name="campoLogradouro" value="<?php echo $logradouro; ?>">
					<label>Numero</label>
					<input type="number" class="form-control" name="campoNumero" value="<?php echo $numero; ?>">
					<label>Complemento</label>
					<input type="text" class="form-control" name="campoComplemento" value="<?php echo $complemento; ?>">
					<label>Bairro</label>
					<input type="text" class="form-control" name="campoBairro" value="<?php echo $bairro; ?>">
					<label>Cidade</label>
					<input type="text" class="form-control" name="campoCidade" value="<?php echo $cidade; ?>">
					<label>Estado</label>
					<input type="text" class="form-control" name="campoEstado" value="<?php echo $estado; ?>">
					<label>CEP</label>
					<input type="number" class="form-control" name="campoCep" value="<?php echo $cep; ?>">
					<?php if ($edit == true) : ?>
							<button type="submit" class="btn btn-info mt-4" name="update">ALTERAR</button>
						<?php else: ?>
							<button type="submit" class="btn btn-primary mt-4" name="save">CADASTRAR</button>
					<?php endif; ?>
				</div>
			</form>
			<div class="row justify-content-center align-items-center mt-3">
				<table class="table">
					<thead>
						<tr>
							<th>TITULO</th>
							<th>LOGRADOURO</th>
							<th>NUMERO</th>
							<th>COMPLEMENTO</th>
							<th>BAIRRO</th>
							<th>CIDADE</th>
							<th>ESTADO</th>
							<th>CEP</th>
							<th colspan="2"></th>
						</tr>
					</thead>
					<?php while ($endereco = $tableEnderecos->fetch_assoc()): ?> 
						<tr>
							<td><?php echo $endereco['titulo'] ?></td>
							<td><?php echo $endereco['logradouro'] ?></td>
							<td><?php echo $endereco['numero'] ?></td>
							<td><?php echo $endereco['complemento'] ?></td>
							<td><?php echo $endereco['bairro'] ?></td>
							<td><?php echo $endereco['cidade'] ?></td>
							<td><?php echo $endereco['estado'] ?></td>
							<td><?php echo $endereco['cep'] ?></td>
							<td>
								<a href="endereco.php?edit=<?php echo $endereco['id_endereco']; ?>"
									class="btn btn-info">EDIT</a>
								<a href="endereco.php?delete=<?php echo $endereco['id_endereco']; ?>"
									class="btn btn-danger">DELETE</a>
							</td>
						</tr>
					<?php endwhile ?>
				</table>
			</div>
		</div>
	</div>

	<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
	<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
</body>
</html>