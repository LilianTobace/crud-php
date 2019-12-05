<?php
include_once("connect.php");
session_start();

$submit = filter_input(INPUT_POST, 'submit', FILTER_SANITIZE_STRING);
if ($submit) {
    $file = $_FILES['file'];
    $total = count($file['name']);
    for( $i=0;$i<$total; $i++) {
        $users_id = filter_input(INPUT_POST, 'users_id', FILTER_SANITIZE_NUMBER_INT);
        $caminho = $file['name'][$i];
        $sql = "INSERT INTO arquivo (users_id, caminho) VALUES ('".$users_id ."','".$caminho."')";
        $i++;
    }
    $inserir = mysqli_query($link, $sql);
    if(mysqli_affected_rows($link) != 0){
        if(move_uploaded_file($_FILES['file'], $diretorio.$caminho)){
            $_SESSION['mensagem'] = "<p style='color:green;'>Dados salvo com sucesso e upload da imagem realizado com sucesso</p>";
            header("Location: index.php");
        }else{
            $_SESSION['mensagem'] = "<p style='color:green;'>Dados salvo com sucesso.</p>";
            header("Location: index.php");
        }        
    }else{
        $_SESSION['mensagem'] = "<p style='color:red;'>Erro ao salvar os dado</p>";
        header("Location: index.php");
    }
}else{
    $_SESSION['mensagem'] = "<p style='color:red;'>Erro ao salvar os dados</p>";
    header("Location: index.php");
}
?>