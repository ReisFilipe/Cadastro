<?php

require_once 'class/conexao.class.php';

$pdo = Database::conexao();

$querySelect = $pdo->prepare("select id, nome, email, telefone from tb_clientes;");
$querySelect->execute();


while($registros = $querySelect->fetch(PDO::FETCH_ASSOC)):
	$id 	  = $registros['id'];
	$nome     = $registros['nome'];
	$email    = $registros['email'];
	$telefone = $registros['telefone'];

	echo '<tr>';
	echo '<td>'.$nome.'</td><td>'.$email.'</td><td>'.$telefone.'</td>';
	echo '<td><a href="editar.php?id='.$id.'"><i class="material-icons">edit</i></a></td>';
	echo '<td><a href="banco_de_dados/delete.php?id='.$id.' "><i class="material-icons">delete</i></a></td>';
	echo '</tr>';

endwhile;
