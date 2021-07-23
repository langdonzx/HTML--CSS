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
			
			$myname = $_SESSION["user"]; //Obtém o o login do usuário
			$mypass = $_SESSION["pass"]; //Obtém a senha
			
		?>
		<div id="entrar">
		<?php 
		
			$dados_user = get_dados_usuario($myname, $mypass); //Chamada a função que que usa os dados do usuário em um array
			
			if(count($dados_user) == 0){ //Verifica se os dados existem
				echo "Desculpe! Não foram encontrados os dados desse usuário";
			}else{
				foreach($dados_user as $dados){
					echo "<h3>Bem vindo(a)! À seção de conteúdos, $myname.<br/>Seu ID é: ".$dados['user_id']."</h3>";
					$_SESSION["id_usuario"] = $dados["user_id"];
				}
			}
			
		?>
		<?php 
			$resultados = get_filmes();
			
			
			if(count($resultados) == 0){ //Verifica se a quantidade de conteúdos é igual a zero
				echo 'Desculpe, mais não foram encontrados filmes';
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