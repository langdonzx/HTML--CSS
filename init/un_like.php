<?php

	session_start();
	if(!isset($_SESSION["autenticado"]))
	{
		header("Location: ../login.html");
	}
	sleep(1);
	include_once "../funcoes/conexao.php";
	include_once "../funcoes/funcoes.php";
	$id_filme = (int)$_POST['filme_id'];
	$id_user = (int)$_POST['user_id'];

	if(un_like($id_filme, $id_user)){
		echo 'sucesso';
	}else{
		echo 'erro';
	}


?>