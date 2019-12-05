<?php
session_start();
include_once("connect.php");

$nome = filter_input(INPUT_POST, 'nome', FILTER_SANITIZE_STRING);
$data_nasc = filter_input(INPUT_POST, 'data_nasc', FILTER_SANITIZE_STRING);
$telefone = filter_input(INPUT_POST, 'telefone', FILTER_SANITIZE_STRING);
$endereco = filter_input(INPUT_POST, 'endereco', FILTER_SANITIZE_STRING);
$numero = filter_input(INPUT_POST, 'numero', FILTER_SANITIZE_STRING);
$bairro = filter_input(INPUT_POST, 'bairro', FILTER_SANITIZE_STRING);
$cidade = filter_input(INPUT_POST, 'cidade', FILTER_SANITIZE_STRING);
$email = filter_input(INPUT_POST, 'email', FILTER_SANITIZE_EMAIL);
$username = filter_input(INPUT_POST, 'username', FILTER_SANITIZE_STRING);
$senha = filter_input(INPUT_POST, 'senha', FILTER_SANITIZE_STRING);

$result_users = "INSERT INTO users (nome, data_nasc, telefone, endereco, numero, bairro, cidade, email, username, senha) VALUES ('$nome', '$data_nasc', '$telefone', '$endereco', '$numero', '$bairro', '$cidade', '$email', '$username', '$senha')";
$resultado_crud = mysqli_query($link, $result_users);

if(mysqli_insert_id($link)){
	$_SESSION['mensagem'] = "<p style='color:green; text-align: center; font-weight: bold;'>Usuário cadastrado com sucesso!</p>";
	header("Location: index.php");
}else{
	$_SESSION['mensagem'] = "<p style='color:red; text-align: center; font-weight: bold;'>Usuário não foi cadastrado com sucesso!</p>";
	header("Location: add.php");
}
?>

