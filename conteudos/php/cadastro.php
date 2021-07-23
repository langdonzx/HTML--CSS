<!DOCTYPE html>
<html lang="pt-br">
  <head>
    <meta charset="utf-8" />
	<meta name="viewport" content="width=device-width, initial-scale=1" />
    <meta http-equiv="X-UA-Compatible" content="ie=edge"/>
	<title>PHP project</title>
	<style>
		body{
			font: normal 12px Arial;
			text-align: center;
		}
		fieldset{
			width: 500px;
			margin: 5px auto 3px auto;
			font: bold 15px Helvetica;
		}
		input{
			padding: 10px;
			margin: 10px;
			border-style: none;
			border-radius: 3px;
		}
	</style>
  </head>
  <body>
	<fieldset>
		<?php
			include_once "../funcoes/conexao.php";
			
			//Registros
			$nome = $_GET['nome'];
			$email = $_GET['email'];
			$senha = $_GET['senha'];
			$record = mysql_query("INSERT INTO `users` (nome_u, email, senha)
			VALUES('$nome', '$email', '$senha')");
			if($record){
				echo "Seu cadastro foi realizado com sucesso! </br>";
			}else{
				echo "Error!</br>";
			}
			
			//$conn->close();
		?>
		<a href="../cadastro.html">Voltar</a>
		<a href="../login.html">Login</a>
	</fieldset>
  </body>
</html>