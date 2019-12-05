<?php 
session_start();
include_once("connect.php");
?>
<html lang="pt-br"> 
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
    <link href="css/bootstrap.min.css" rel="stylesheet">
    <link href="css/style.css" rel="stylesheet">
    <script src="js/bootstrap.min.js"></script>
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <nav class="navbar navbar-inverse navbar-fixed-top navView">
            <div class="container-fluid">
                <div class="navbar-header">
                    <a class="navbar-brand aCrud" href="#">Crud PHP</a>
                </div>
            </div>
        </nav> 
    </head>
	<body>
		<div id="main" class="container-fluid">
			<?php if (isset($_SESSION['mensagem'])){
				echo $_SESSION['mensagem'];
				unset($_SESSION['mensagem']);
			}
			?>
			<h3 class="page-header h3Add">Novo Cadastro</h3>
			<hr />
			<br />
			<form action="insert.php" method="POST">
				<div class="row">
					<div class="form-group col-md-4">
						<label for="nome">Nome:</label>
						<input type="text" class="form-control" name="nome" placeholder="Nome Sobrenome">
					</div>
					<div class="form-group col-md-2">
						<label for="data_nasc">Data de Nascimento: </label>
						<input type="date" class="form-control" name="data_nasc">
					</div>
					<div class="form-group col-md-2">
						<label for="telefone">Telefone: </label>
						<input type="number" class="form-control " name="telefone" placeholder="(00) 0000-0000">
					</div>
					<div class="form-group col-md-4">
						<label for="endereco">Endereço: </label>
						<input type="text" class="form-control" name="endereco" placeholder="Rua: X">
					</div>
				</div>
				<div class="row">	
					<div class="form-group col-md-1">
						<label for="numero">Nº:</label>
						<input type="number" class="form-control" name="numero" placeholder="00">
					</div>
					<div class="form-group col-md-3 bairro">
						<label for="bairro">Bairro:</label>
						<input type="text" class="form-control" name="bairro" placeholder="Bairro X">
					</div>
					<div class="form-group col-md-4">
						<label for="cidade">Cidade: </label>
						<input type="text" class="form-control" name="cidade" placeholder="Cidade X">
					</div>
					<div class="form-group col-md-4">
						<label for="email">E-mail: </label>
						<input type="email" class="form-control" name="email" placeholder="email@email.com">
					</div>
				</div>
				<div class="row">
					<div class="form-group col-md-6">
						<label for="username">Usuário: </label>
						<input type="text" class="form-control" name="username">
					</div>
					<div class="form-group col-md-6">
						<label for="senha">Senha: </label>
						<input type="password" class="form-control" inamed="senha" placeholder="*****">
					</div>
				</div>
				<br />
				<div class="row">
					<div class="col-md-12"  align="center">
						<button type="submit" class="btn btn-primary">Cadastrar</button>
					</div>
				</div>
			</form>
		</div>
	</body>
</html>