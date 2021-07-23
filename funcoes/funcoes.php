<?php
	function get_dados_usuario($nome, $senha){
		$dados = array();
		
		$selecionar = mysql_query("SELECT `id_user`, `nome_u`, `email`, `senha` FROM `users` WHERE `nome_u` = '$nome' AND `senha` = '$senha'");
		
		while($row = mysql_fetch_object($selecionar)){
			$dados[] = array(
				'user_id' => $row->id_user,
				'nome_user' => $row->nome_u,
				'email' => $row->email,
				'senha' => $row->senha
			);
		}
		
		return $dados;
	}
	
	function get_filmes(){
		$filmes = array();
		
		$selecionar = mysql_query("SELECT `filme_id`,`titulo`,`likes`,`url_imagens` FROM `filmes`");
		
		while($row = mysql_fetch_object($selecionar)){
			$usuarioLogado = (int)$_SESSION["id_usuario"];
			$id_fil = $row->filme_id;
			$verificar = mysql_query("SELECT `like_id` FROM `likes` WHERE user_id = '$usuarioLogado' AND filme_id = '$id_fil'");
			$usr_liked = (mysql_num_rows($verificar) == 0) ? '0' : '1';
			$filmes[] = array(
				'id_filme' => $row->filme_id,
				'titulo' => $row->titulo,
				'likes' => $row->likes,
				'url_imagens' => $row->url_imagens,
				'user_liked' => $usr_liked
			);
		}
		
		return $filmes;
	}
	
	function verificar_clicado($id_filme, $id_usuario){
		$id_filme = (int)$id_filme; //Recupera o valor do ID do filme
		$id_usuario = (int)$id_usuario; //Recupera o valor do ID do usuário
		$verificar = mysql_query("SELECT like_id FROM `likes` WHERE user_id = '$id_usuario' AND filme_id = '$id_filme'");
		return (mysql_num_rows($verificar) >= 1) ? true : false;
	}
	
	
	function adicionar_like($id_filme, $id_usuario){
		$id_filme = (int)$id_filme; //Recupera o valor do ID do filme
		$id_usuario = (int)$id_usuario; //Recupera o valor do ID do usuário
		$atualizar_likes_post = mysql_query("UPDATE `filmes` SET likes = likes+1 WHERE filme_id = '$id_filme'"); //Atualiza a quantidade de likes para o filme
		
		if($atualizar_likes_post){ //Verifica se foi atualizado
			$inserir_like = mysql_query("INSERT INTO `likes` (user_id, filme_id) VALUES ('$id_usuario','$id_filme')");
			if($inserir_like){
				return true;
				
			}else{
				return false;
				
			}
		}
	}
	
	function retornar_likes($id_filme){ //
		$id_filme = (int)$id_filme;
		$selecionar_num_likes = mysql_query("SELECT likes FROM `filmes` WHERE filme_id = '$id_filme'"); //Seleciona os likes da tabela filmes no ID do filme
		$fetch_likes = mysql_fetch_object($selecionar_num_likes);
		return $fetch_likes->likes;
	}
	
	function un_like($id_filme, $id_user){

		$delete = mysql_query("DELETE FROM `likes` WHERE `user_id` = '$id_user' AND `filme_id` = '$id_filme'");
		if($delete){
			$update = mysql_query("UPDATE `filmes` SET `likes` = likes-1 WHERE `filme_id` = '$id_filme'");
			if($update){
				return true;
			}else{
				return false;
			}
		}else{
			return false;
		}
	}
?>