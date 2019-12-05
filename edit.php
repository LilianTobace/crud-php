 <?php 
session_start();
include_once("connect.php");
$id = filter_input(INPUT_GET, 'id', FILTER_SANITIZE_NUMBER_INT);
$_SESSION['id'] = $id;
$result_users = "SELECT * FROM users WHERE id = '$id'";
$resultado_users = mysqli_query($link, $result_users);
$vetor = mysqli_fetch_assoc($resultado_users);
?>
<html lang="pt-br"> 
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
    <link href="css/bootstrap.min.css" rel="stylesheet">
    <link href="css/style.css" rel="stylesheet">
    <script src="js/bootstrap.min.js"></script>
    <script src="js/edit.js"></script>
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
				unset($_SESSION['id']);
			}
			?>
			<h3 class="page-header h3Add">Editar Cadastro</h3>
			<hr />
			<br />
			<form action="update.php" method="POST">
				<div class="row">
					<div class="form-group col-md-4">
						<label for="nome">Nome:</label>
						<input type="text" class="form-control" name="nome" placeholder="Nome Sobrenome" value="<?php echo $vetor['nome']; ?>">
					</div>
					<div class="form-group col-md-2">
						<label for="data_nasc">Data de Nascimento: </label>
						<input type="date" class="form-control" name="data_nasc" value="<?php echo $vetor['data_nasc']; ?>">
					</div>
					<div class="form-group col-md-2">
						<label for="telefone">Telefone: </label>
						<input type="number" class="form-control " name="telefone" placeholder="(00) 0000-0000" value="<?php echo $vetor['telefone']; ?>">
					</div>
					<div class="form-group col-md-4">
						<label for="endereco">Endereço: </label>
						<input type="text" class="form-control" name="endereco" placeholder="Rua: X" value="<?php echo $vetor['endereco']; ?>">
					</div>
				</div>
				<div class="row">	
					<div class="form-group col-md-1">
						<label for="numero">Nº:</label>
						<input type="number" class="form-control" name="numero" placeholder="00" value="<?php echo $vetor['numero']; ?>">
					</div>
					<div class="form-group col-md-3 bairro">
						<label for="bairro">Bairro:</label>
						<input type="text" class="form-control" name="bairro" placeholder="Bairro X" value="<?php echo $vetor['bairro']; ?>">
					</div>
					<div class="form-group col-md-4">
						<label for="cidade">Cidade: </label>
						<input type="text" class="form-control" name="cidade" placeholder="Cidade X" value="<?php echo $vetor['cidade']; ?>">
					</div>
					<div class="form-group col-md-4">
						<label for="email">E-mail: </label>
						<input type="email" class="form-control" name="email" placeholder="email@email.com" value="<?php echo $vetor['email']; ?>">
					</div>
				</div>
				<div class="row">
					<div class="form-group col-md-6">
						<label for="username">Usuário: </label>
						<input type="text" class="form-control" name="username" value="<?php echo $vetor['username']; ?>"> 
					</div>
					<div class="form-group col-md-6">
						<label for="senha">Senha: </label>
						<input type="password" class="form-control" inamed="senha" placeholder="*****" value="<?php echo $vetor['senha']; ?>">
					</div>
				</div>
				<br />
				<div class="row">
					<div class="col-md-12"  align="center">
						<button type="submit" class="btn btn-primary">Editar</button>
					</div>
				</div>
			</form>
		</div>
	</body>
</html>