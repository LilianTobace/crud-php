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
    <link href="css/bootstrap.min.css" rel="stylesheet">
    <link href="css/style.css" rel="stylesheet">
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
            <h3 class="page-header h3View">Visualização detalhada</h3>
            <br />
            <hr />
            <div class="row">
                <div class="col-md-4">
                    <p><strong>ID</strong></p>
                    <p><?php echo $vetor['id']; ?></p>
                </div>
                
                <div class="col-md-4">
                    <p><strong>Nome</strong></p>
                    <p><?php echo $vetor['nome']; ?></p>
                </div>
                
                <div class="col-md-4">
                    <p><strong>Data de Nascimento</strong></p>
                    <p><?php echo date("d/m/Y", strtotime($vetor['data_nasc']));?></p>
                </div>

                <div class="col-md-4">
                    <p><strong>Telefone</strong></p>
                    <p><?php echo $vetor['telefone']; ?></p>
                </div>
                
                <div class="col-md-4">
                    <p><strong>Endereço</strong></p>
                    <p><?php echo $vetor['endereco']; ?></p>
                </div>
                
                <div class="col-md-4">
                    <p><strong>Número</strong></p>
                    <p><?php echo $vetor['numero']; ?></p>
                </div>
                
                <div class="col-md-4">
                    <p><strong>Bairro</strong></p>
                    <p><?php echo $vetor['bairro']; ?></p>
                </div>
                
                <div class="col-md-4">
                    <p><strong>Cidade</strong></p>
                    <p><?php echo $vetor['cidade']; ?></p>
                </div>
                
                <div class="col-md-4">
                    <p><strong>E-mail</strong></p>
                    <p><?php echo $vetor['email']; ?></p>
                </div>
            
                <div class="col-md-4">
                    <p><strong>Usuário</strong></p>
                    <p><?php echo $vetor['username']; ?></p>
                </div>

                <div class="col-md-4">
                    <p><strong>Senha</strong></p>
                    <p><?php echo $vetor['senha']; ?></p>
                </div>
            </div>
        <br />
        <div class="col-md-12" align="center">
            <a href="index.php" class="btn btn-primary">Fechar</a>
        </div>
    </body>
</html>