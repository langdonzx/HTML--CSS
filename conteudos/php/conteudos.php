<!DOCTYPE HTML>
<html>
	<head>
		<title>Sistema de Likes com PHP e Javascript</title>
		<link href="../css/style.css" rel="stylesheet" type="text/css" />
		<script type="text/javascript" src="../js/jquery.js"></script>
		<script type="text/javascript" src="../js/funcoes.js"></script>
	</head>
	<body>
		<?php 
			session_start();
			if(!isset($_SESSION["autenticado"]))
			{
				header("Location: ../login.html");
			}
			include_once "../funcoes/conexao.php";
			include_once "../funcoes/funcoes.php";
			
			$myname = $_SESSION["user"]; //Obt�m o o login do usu�rio
			$mypass = $_SESSION["pass"]; //Obt�m a senha
			
		?>
		<div id="entrar">
		<?php 
		
			$dados_user = get_dados_usuario($myname, $mypass); //Chamada a fun��o que que usa os dados do usu�rio em um array
			
			if(count($dados_user) == 0){ //Verifica se os dados existem
				echo "Desculpe! N�o foram encontrados os dados desse usu�rio";
			}else{
				foreach($dados_user as $dados){
					echo "<h3>Bem vindo(a)! � se��o de conte�dos, $myname.<br/>Seu ID �: ".$dados['user_id']."</h3>";
					$_SESSION["id_usuario"] = $dados["user_id"];
				}
			}
			
		?>
		<?php 
			$resultados = get_filmes();
			
			
			if(count($resultados) == 0){ //Verifica se a quantidade de conte�dos � igual a zero
				echo 'Desculpe, mais n�o foram encontrados filmes';
			}else{
				echo '<ul>';
				foreach($resultados as $filmes){ //Foreach para mostrar todos os artigos do banco
					echo $filmes['user_liked'];
		?>
		<li>
		<p><?php echo "<img src='../".$filmes['url_imagens']."' />"; ?><p>
		<p><?php echo $filmes['titulo'];?></p> 
			<p>
			<?php if($filmes['user_liked'] == 0){?>
				<a href="#" class="like" onclick="javascript:add_like(<?php echo $filmes['id_filme'];?>);">Adicionar</a> 
			<?php  }else{?>
				<a href="#" class="like" onclick="javascript:un_like(<?php echo $filmes['id_filme'];?>, <?php echo $_SESSION['id_usuario'];?>);">Unlike</a> 
			<?php } ?>
			<span id="filme_<?php echo$filmes['id_filme'];?>_like"><?php echo $filmes['likes'];?></span> gostaram disto!</p>
		</li>
		<?php
				}
				echo '</ul>';
			}
		?>
		<a href="deslogar.php">Sair(logoff)</a>
		<div>
	</body>
</html>