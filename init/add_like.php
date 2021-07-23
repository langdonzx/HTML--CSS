<?php
	session_start();
	if(!isset($_SESSION["autenticado"]))
	{
		header("Location: ../login.html");
	}
	sleep(2);
	include_once "../funcoes/conexao.php";
	include_once "../funcoes/funcoes.php";
	$id_filme = (int)$_POST['filme_id'];
	$id_usuario = (int)$_SESSION['id_usuario'];
	
	if(!verificar_clicado($id_filme, $id_usuario)){
		if(adicionar_like($id_filme, $id_usuario)){
			echo 'sucesso';
			
		}else{
			echo 'erro';
		}
	}else{
		echo 'erro';
	}
?>