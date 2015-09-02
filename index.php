<?php

// Inclui o arquivo referente à classe Cliente
require_once 'Cliente.php';

$clientes = [
	new Cliente('1', 'André Gomes', '96472664137', 'Rua Maravilha, 1234', 'São Paulo', 'SP'),
	new Cliente('2', 'Maria Joaquina', '68478146326', 'Av. Sete de Setembro, 123', 'Curitiba', 'PR'),
	new Cliente('3', 'Jayme Palilo', '60976843471', 'Av. Sete de Setembro, 123', 'São José dos Pinhais', 'PR'),
	new Cliente('4', 'Cirilo Jorge', '60976843471', 'Av. Sete de Setembro, 123', 'Curitiba', 'PR'),
	new Cliente('5', 'Paulo Pedrosa', '60976843471', 'Av. Sete de Setembro, 123', 'Curitiba', 'PR'),
	new Cliente('6', 'Maria Teresa', '60976843471', 'Av. Sete de Setembro, 123', 'Londrina', 'PR'),
	new Cliente('7', 'João Cabral', '60976843471', 'Av. Sete de Setembro, 123', 'Curitiba', 'PR'),
	new Cliente('8', 'Pedro Heleno', '60976843471', 'Av. Sete de Setembro, 123', 'Curitiba', 'PR'),
	new Cliente('9', 'Gabriele Cunha', '60976843471', 'Av. Sete de Setembro, 123', 'Curitiba', 'PR'),
	new Cliente('10', 'Madalena Antunes', '60976843471', 'Av. Sete de Setembro, 123', 'Curitiba', 'PR'),
];

// Verifica se o parâmetro ordem foi passado e ordenar o array conforme o resultado
if (isset($_GET['ordem']) && $_GET['ordem'] == 'desc')
	// Ordena o array do maior para o menor (DESC)
	rsort($clientes);
else
	// Ordena o array do menor para o maior (ASC)
	sort($clientes);

?>
<!DOCTYPE html>
<html lang="pt-BR">
<head>
	<meta charset="UTF-8">
	<title>Cadastro de clientes</title>
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<!-- CSS -->
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.min.css">
</head>
<body>
	<div class="container">
		<div class="row">
			<div class="col-xs-12">

				<h1>Cadastro de clientes</h1>
				
				<table class="table table-bordered table-hover">
					<tr>
						<th class="text-center">
							<?php if (isset($_GET['ordem']) && $_GET['ordem'] == 'desc') : ?>
							<a href="?ordem=asc"><span class="glyphicon glyphicon-sort-by-attributes-alt" aria-hidden="true"></span></a>
							<?php else : ?>
							<a href="?ordem=desc"><span class="glyphicon glyphicon-sort-by-attributes" aria-hidden="true"></span></a>
							<?php endif; ?>
						</th>
						<th>Nome</th>
						<th>CPF</th>
						<th>Endereço</th>
						<th>Cidade</th>
						<th>UF</th>


					</tr>
					<?php foreach($clientes as $cliente) : ?>
					<tr data-toggle="modal" data-target="#cliente-<?php echo $cliente->id; ?>">
						<td class="text-center"><?php echo $cliente->id; ?></td>
						<td><?php echo $cliente->nome; ?></td>
						<td><?php echo $cliente->cpf; ?></td>
						<td><?php echo $cliente->endereco; ?></td>
						<td><?php echo $cliente->cidade; ?></td>
						<td><?php echo $cliente->uf; ?></td>
					</tr>
					<?php endforeach; ?>
				</table>
				
			</div>
		</div>
	</div>

	<!-- Os modals são repetidos para utilizar o mínimo de Javascript -->
	<?php foreach($clientes as $cliente) : ?>
	<div class="modal fade" id="cliente-<?php echo $cliente->id; ?>" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
	  <div class="modal-dialog" role="document">
	    <div class="modal-content">
	      <div class="modal-header">
	        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
	        <h4 class="modal-title" id="myModalLabel">Detalhes do cliente</h4>
	      </div>
	      <div class="modal-body">
	        <p><strong>ID: </strong> <?php echo $cliente->id; ?></p>
	        <p><strong>Nome: </strong> <?php echo $cliente->nome; ?></p>
	        <p><strong>CPF: </strong> <?php echo $cliente->cpf; ?></p>
	        <p><strong>Endereço: </strong> <?php echo $cliente->endereco; ?></p>
	        <p><strong>Cidade/UF: </strong> <?php echo $cliente->cidade . '/'. $cliente->uf; ?></p>
	      </div>
	      <div class="modal-footer">
	        <button type="button" class="btn btn-default" data-dismiss="modal">Fechar</button>
	      </div>
	    </div>
	  </div>
	</div>
	<?php endforeach; ?>

	<!-- JavaScript -->
	<script src="https://code.jquery.com/jquery-2.1.4.min.js"></script>
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/js/bootstrap.min.js"></script>
	
</body>
</html>