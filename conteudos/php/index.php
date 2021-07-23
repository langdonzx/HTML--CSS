<?php
	session_start();
	
	if(!isset($_SESSION["autenticado"])){
		header("Location: ../login.html");
	}else{
		header("Location: conteudos.php");
	}
?>