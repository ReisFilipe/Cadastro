<?php

include_once '../class/conexao.class.php';

$pdo = Database::conexao();

$id = filter_input(INPUT_GET, 'id', FILTER_SANITIZE_SPECIAL_CHARS );

$queryDelete = $pdo->prepare("delete from tb_clientes where id= :id ");
$queryDelete->bindValue(':id', $id, PDO::PARAM_STR);
$queryDelete->execute();

$affected_rows = $queryDelete->rowCount();

if($affected_rows > 0):
        header("Location: ../consultas.php");
endif;