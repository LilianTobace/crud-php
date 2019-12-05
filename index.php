<?php 
session_start();
include_once("connect.php");
?>
<html lang="pt-br"> 
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
    <link href="css/bootstrap.min.css" rel="stylesheet">
    <link href="css/style.css" rel="stylesheet">
    <script src="js/bootstrap.min.js"></script>
    <script src="js/index.js"></script>
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
        <?php if (isset($_SESSION['mensagem'])){
				echo $_SESSION['mensagem'];
                unset($_SESSION['mensagem']);
                unset($_SESSION['id']);
			}
	    ?>
        <div id="main" class="container-fluid">
            <div id="top" class="row">
                <div class="col-md-3">
                    <h2>Listagem</h2>
                </div>
        
                <div class="col-md-6">
                    <div class="input-group">
                        <input class="form-control busca" id="myInput" type="text" placeholder="Busca">
                    </div>
                </div> 
            
                <div class="col-md-3">
                    <a href="add.php" class="btn btn-primary">Novo Item</a>
                </div>
            </div>
        
            <br />
            <div id="list" class="row"> 
                <div class="table-responsive col-md-12">
                    <table class="table table-striped" cellspacing="0" cellpadding="0">
                        <thead> 
                            <tr class="trCrud">
                                <th>ID</th>
                                <th>Nome</th>
                                <th>Data de Nascimento</th>
                                <th>Telefone</th>
                                <th>E-mail</th>
                                <th class="actions">Ações</th>
                            </tr>
                        </thead>
                        <tbody  id="myTable">
                            <?php
                            $result_users = "SELECT * FROM users";
                            $resultado_users = mysqli_query($link, $result_users);
                            while($vetor = mysqli_fetch_assoc($resultado_users)){
                            // $consulta = mysqli_query($link, "SELECT * FROM users");
                            // while($vetor = mysqli_fetch_array($consulta)){
                                $id = $vetor['id'];
                                $nome = $vetor['nome'];
                                $data_nasc = $vetor['data_nasc'];
                                $telefone = $vetor['telefone'];
                                $email = $vetor['email'];
                            ?>
                            <tr class="trCrud" id="trCrud">
                                <td><?php echo $id ?></td>
                                <td><?php echo $nome ?></td>
                                <td><?php echo date("d/m/Y", strtotime($data_nasc));?></td>
                                <td><?php echo $telefone ?></td>
                                <td><?php echo $email ?></td>
                                <td class="actions">
                                <?php
                                    echo "<a class='btn btn-success btn-xs' href='view.php?id=".$vetor['id']."'>Visualizar</a>&nbsp;";
                                    echo "<a class='btn btn-warning btn-xs editar' href='edit.php?id=".$vetor['id']."'>Editar</a>&nbsp;";
                                    echo "<a class='btn btn-danger btn-xs' data-toggle='modal' data-target='#delete-modal".$vetor['id']."'>Excluir</a>&nbsp;";
                                    echo "<a class='btn btn-secondary btn-xs' data-toggle='modal' data-target='#upload-modal".$vetor['id']."'>Upload</a>";
                                ?>        
                                    <!-- Modal excluir -->
                                    <div class="modal fade" id="delete-modal<?=$vetor["id"];?>" tabindex="-1" role="dialog" aria-labelledby="modalLabel">
                                        <div class="modal-dialog" role="document">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <h4 class="modal-title" id="modalLabel">Excluir Item</h4>
                                                    <button type="button" class="close" data-dismiss="modal" aria-label="Fechar"><span aria-hidden="true">&times;</span></button>
                                                </div>
                                                <div class="modal-body">
                                                    <p class="modalText"> Deseja realmente excluir este item? </p>
                                                </div>
                                                <div class="modal-footer">
                                                    <?php
                                                    echo "<button type='button' class='btn btn-success'><a href='delete.php?id=".$vetor['id']."'>Sim</a></button><br />";
                                                    ?>
                                                    <button type="button" class="btn btn-danger" data-dismiss="modal">Não</button>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                    <!-- Modal upload -->
                                    <div class="modal fade" id="upload-modal<?=$vetor["id"];?>" tabindex="-1" role="dialog" aria-labelledby="modalLabel">
                                        <div class="modal-dialog" role="document">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <h4 class="modal-title" id="modalLabel">Upload de arquivo(s)</h4>
                                                    <button type="button" class="close" data-dismiss="modal" aria-label="Fechar"><span aria-hidden="true">&times;</span></button>
                                                </div>
                                                <div class="modal-body">
                                                    <p class="modalText"> Selecione o(s) arquivo(s) que você deseja realizar upload. </p>
                                                </div>
                                                <div class="modal-footer">
                                                    <form action="upload.php" method="POST" enctype="multipart/form-data">
                                                        <input name="file[]" type="file" multiple="multiple" />
                                                        <input name="users_id" type="hidden" value="<?php echo $vetor['id'] ?>"/>
                                                        <input name="submit" type="submit" value="Enviar">
                                                    </form>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </td>
                            </tr>
                            <?php
                            }
                            ?>
                        </tbody>
                    </table>
                </div>
            </div>
            <div class="col-md-12 ">
                <ul class="pagination paginacao justify-content-center"">
                    <li class="disabled"><a>&lt; Anterior</a></li>
                    <li class="disabled"><a>1</a></li>
                    <li><a href="#">2</a></li>
                    <li class="next"><a href="#" rel="next">Próximo &gt;</a></li>
                </ul>        
            </div>
        </div>
    </body>
</html>