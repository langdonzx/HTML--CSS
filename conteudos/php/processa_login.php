<?php

	include_once "../funcoes/conexao.php";
	include_once "../funcoes/funcoes.php";

	$nome = $_POST["nome"];
	$senha = $_POST["senha"];
	
	$dados_user = get_dados_usuario($nome, $senha);
	if(count($dados_user) == 0){
		echo "Nenhum usuário correspondente!";
		header("Location: ../login.html");
	}else{
		
	}foreach($dados_user as $dados){
		$_SESSION["id_usuario"] = $dados["user_id"];
		if($_POST["nome"]==$dados["nome_user"] && $_POST["senha"]==$dados["senha"]){
			session_start();
			$_SESSION["autenticado"] = true;
			$_SESSION["user"] = $_POST["nome"];
			$_SESSION["pass"] = $_POST["senha"];
			
			
			header("Location: conteudos.php");
		}else{
			echo "Dados Inválidos!";
			header("Location: ../login.html");
		}
	}
?>