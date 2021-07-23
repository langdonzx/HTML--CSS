<!DOCTYPE html>
<html lang="pt-br">
  <head>
    <meta charset="utf-8" />
	<meta name="viewport" content="width=device-width, initial-scale=1" />
    <meta http-equiv="X-UA-Compatible" content="ie=edge"/>
	<link rel="stylesheet"  href="../css/estilo.css"/>
	<title>PHP project</title>
	<style>
		textarea{
			border-style: none;
			opacity: 0.75;
			width: 850px;
			height: 370px;
			text-indente: 10px;
			border-radius: 3px;
			position: relative;
			top: 15px;
			background-color: #dedede;
			padding: 5px;
			text-align: justify;
			font: normal 13pt Helvetica;
			trasition: opacity 5s;
		}
		textarea:hover{
			opacity: 1;
		}
	</style>
  </head>
  <body>
	<div id="entrar">
	<h1>Crie aqui um conteúdo</h1>
	</div>
		<?php
			require 'connect.php'; 
			$dbcliente = 'cadcliente'; 
			
			//Conexões
			$connect1 = abrirConexao($dbcliente);
			
			$artigo = " ";
			
			function postar($texto){
				return "$texto";
			}
			
			echo "<textarea id='artigo' name='artigo' value='$artigo'></textarea>";
			
			$r = postar($artigo);
			
			echo "$r";
			
			$connect1->close();
		?>
	<div id="entrar">
		<input type="button" value="POSTAR" id="botao" onclick="postar()"/>
	</div>
  </body>
</html>