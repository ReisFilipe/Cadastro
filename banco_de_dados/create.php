<?php
session_start();
include_once '../class/conexao.class.php';

$pdo = Database::conexao();

$nome 	  = filter_input(INPUT_POST, 'nome', FILTER_SANITIZE_SPECIAL_CHARS);
$email    = filter_input(INPUT_POST, 'email', FILTER_VALIDATE_EMAIL);
$telefone = filter_input(INPUT_POST, 'tel', FILTER_SANITIZE_NUMBER_INT);

$querySelect = $pdo->prepare("select email from tb_clientes ");
$querySelect->execute();
$array_emails = [];

while($emails = $querySelect->fetch(PDO::FETCH_ASSOC)):
	$emails_existentes = $emails['email'];
	array_push($array_emails, $emails_existentes);
endwhile;

if(in_array($email, $array_emails)):
	$_SESSION['msg'] = "<p class='center red-text'>".'Já existe um cliente cadastrado com esse e-mail'."</p>";

	header("Location:../");
else:

	$querInsert = $pdo->prepare("insert into tb_clientes values(default, :nome, :email, :telefone)");

	$querInsert->bindValue(':nome', $nome, PDO::PARAM_STR);
	$querInsert->bindValue(':email', $email, PDO::PARAM_STR);
	$querInsert->bindValue(':telefone', $telefone, PDO::PARAM_STR);
	
	$querInsert->execute();

	$affected_rows = $querInsert->rowCount();
	
	if($affected_rows > 0 ):
		$_SESSION['msg'] = "<p class='center green-text'>".'Cadastro efetuado com suscesso!'."</p>";
		header("Location:../");
	endif;
endif;
