function add_like(id_filme){
	$('#filme_'+id_filme+'_like').html('<img src="../images/loading.gif" />');
	
	$.post('../init/add_like.php', {filme_id:id_filme}, function(dados){
		if(dados == 'sucesso'){
			alert("O conteúdo foi adicionado!")
			get_like(id_filme);
			location.href="../php/conteudos.php";
		}else{
			alert("Você já votou neste artigo de valor: "+id_filme);
			location.href="../php/processa_login.php";
		}
	});
}

function get_like(id_filme){
	$.post('../init/get_like.php', {filme_id: id_filme}, function(valor){
		$('#filme_'+id_filme+'_like').text(valor); //Este é o valor da quantidade de likes dado no post
	});
}
function un_like(id_filme, id_user){
	$('#filme_'+id_filme+'_like').html('<img src="../images/loading.gif" />');

	$.post('../init/un_like.php', {filme_id: id_filme, user_id: id_user}, function(valor){
		if(valor == 'sucesso'){
			alert("O conteúdo foi removido!")
			location.href="../php/conteudos.php"; 
		}else{
			alert("Desculpe, ocorreu algum erro: "+id_filme);
			location.href="../php/processa_login.php";
		}
	});
}