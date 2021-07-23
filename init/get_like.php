<?php
	session_start();
	if(!isset($_SESSION["autenticado"]))
	{
		header("Location: ../login.html");
	}
	include_once "../funcoes/conexao.php";
	include_once "../funcoes/funcoes.php";
	$id_filme = (int)$_POST['filme_id'];
	$numero_de_likes = retornar_likes($id_filme);
	echo $numero_de_likes;
?>