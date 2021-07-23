<!DOCTYPE html>
<html lang="pt-br">
  <head>
    <meta charset="utf-8" />
	<meta name="viewport" content="width=device-width, initial-scale=1" />
    <meta http-equiv="X-UA-Compatible" content="ie=edge"/>
	<link rel="stylesheet"  href="../css/estilo.css"/>
	<title>PHP project</title>
  </head>
  <body>
	<div id="entrar">
	<h1>PHP</h1>
		<?php
			require 'connect.php'; 
			$dbcont = 'conteudos';
			$dbcliente = 'cadcliente';
			
			//Conexões
			$connect1 = abrirConexao($dbcont);
			
			$connect1->close();
		?>
	</div>
  </body>
</html>