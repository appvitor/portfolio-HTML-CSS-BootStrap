<!DOCTYPE html>
<html lang="pt-br">
<head>
	<meta charset="utf-8">
	<title>CRUD - PHP</title>
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
	<style type="text/css">
		body {
			display: flex;
			flex-direction: column;
			align-items: center;
			background-color: #7d3baf;
			font-family: "Segoe UI Black";
			color: white;
		}
	</style>
</head>
<body>
	<?php require_once 'processPessoa.php'; ?>
	<?php
		$mysqli = new mysqli('localhost', 'root', '123456', 'dbphp') or die(mysqli_error($mysqli));
		$tablePessoas = $mysqli->query("SELECT * FROM tb_pessoas") or die($mysqli->error);

		function pre_r($tabela) {
			echo '<pre>';
			print_r($tabela);
			echo "</pre>";
		}
	?>
	<h1>CRUD - PHP</h1>
	<div class="container">
		<div class="row d-flex justify-content-around align-items-center">
			<form action="processPessoa.php" method="POST">
				<div class="form-group">		
					<label>Nome</label>
					<input type="text" class="form-control" name="campoNome">
					<label>RG</label>
					<input type="text" class="form-control" name="campoRg">
					<label>CPF</label>
					<input type="text" class="form-control" name="campoCpf">
					<label>Nome da Mãe</label>
					<input type="text" class="form-control" name="campoMae">
					<button type="submit" class="btn btn-primary mt-4" name="save">SALVAR</button>
				</div>
			</form>
			<div class="row justify-content-center align-items-center">
				<table class="table">
					<thead>
						<tr>
							<th>Nome</th>
							<th>RG</th>
							<th>CPF</th>
							<th>Nome da Mãe</th>
							<th colspan="2"></th>
						</tr>
					</thead>
					<?php while ($pessoa = $tablePessoas->fetch_assoc()): ?> 
						<tr>
							<td><?php echo $pessoa['nome'] ?></td>
							<td><?php echo $pessoa['rg'] ?></td>
							<td><?php echo $pessoa['cpf'] ?></td>
							<td><?php echo $pessoa['nome_mae'] ?></td>
							<td>
								<a href="index.php?edit=<?php echo $pessoa['id']; ?>"
									class="btn btn-info">EDIT</a>
								<a href="index.php?delete=<?php echo $pessoa['id']; ?>"
									class="btn btn-danger">DELETE</a>
							</td>
						</tr>
					<?php endwhile; ?>
				</table>
			</div>
		</div>
	</div>

	<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
	<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
</body>
</html>