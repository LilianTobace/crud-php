<?php
session_start();
include_once("connect.php");

$id = $_SESSION['id'];
$id = filter_input(INPUT_GET, 'id', FILTER_SANITIZE_NUMBER_INT);
if(!empty($id)){
	$result_users = "DELETE FROM users WHERE id='$id'";
	$resultado_users = mysqli_query($link, $result_users);
	if(mysqli_affected_rows($link)){
		$_SESSION['mensagem'] = "<p style='color:green; text-align: center; font-weight: bold;'>Usuário apagado com sucesso!</p>";
		header("Location: index.php");
	}else{
		
		$_SESSION['mensagem'] = "<p style='color:red; text-align: center; font-weight: bold;'>Erro o usuário não foi apagado com sucesso!</p>";
		header("Location: index.php");
	}
}else{	
	$_SESSION['mensagem'] = "<p style='color:red; text-align: center; font-weight: bold;'>Necessário selecionar um usuário!</p>";
	header("Location: index.php");
}
