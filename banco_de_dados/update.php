<?php
session_start();
include_once '../class/conexao.class.php';
$pdo = Database::conexao();

$id = $_SESSION['id'];

$nome = filter_input(INPUT_POST, 'nome', FILTER_SANITIZE_SPECIAL_CHARS);
$email = filter_input(INPUT_POST, 'email', FILTER_VALIDATE_EMAIL);
$telefone = filter_input(INPUT_POST, 'tel', FILTER_SANITIZE_NUMBER_INT);

$queryUpdate = $pdo->prepare("update tb_clientes set nome= :nome, email= :email, telefone= :telefone where id = :id ");
$queryUpdate->bindValue(':id', $id, PDO::PARAM_STR);
$queryUpdate->bindValue(':nome', $nome, PDO::PARAM_STR);
$queryUpdate->bindValue(':email', $email, PDO::PARAM_STR);
$queryUpdate->bindValue(':telefone', $telefone, PDO::PARAM_STR);
$queryUpdate->execute();

$affected_rows = $queryUpdate->rowCount();

if($affected_rows > 0):
    header("Location: ../consultas.php");
endif;
