<?php
	header("Content-type: text/html; charset=utf-8");
	$descricao = $_POST['descricao'];
	echo $descricao;
	$arquivo = $_FILES['arquivo']; //recebe o nome do arquivo que o usuário enviou.     
	$tamanho_maximo=99999999999;
	
			
	// 1. Definir os parâmetros de teste
	$tipos_aceitos = array("image/jpg","image/gif","image/jpeg");
	
	
	// 2. Validar o arquivo enviado
	if($arquivo['error'] != 0) {
		echo '<p style="font-weight:bold;color:red">Erro no Upload do arquivo<br>';
		switch($arquivo['error']) {
		case  UPLOAD_ERR_INI_SIZE:
			echo 'O Arquivo excede o tamanho máximo permitido.';
			break;
		case UPLOAD_ERR_FORM_SIZE:
			echo 'O Arquivo enviado é muito grande.';
			break;
		case  UPLOAD_ERR_PARTIAL:
			echo 'O upload não foi completo.';
			break;
		case UPLOAD_ERR_NO_FILE:
			echo 'Nenhum arquivo foi informado para upload.';
			if(isset($_POST['descricao'])){
				include "conecta_mysql.php";
			    $sql = "INSERT INTO posts (descricao,imagem,usuario,dia)
			    VALUES ('".$descricao."','noimage','".$_COOKIE['id']."','".date("d.M.y")."')";
			    $resultado = mysqli_query($conexao,$sql)or die("Não foi possivel executar a SQL: ".$conexao->error);
			    if(!$conexao->error){
			        echo "Cadastro realizado com sucesso!";
			    }   
				echo "<br><a href='timeline.php'>Voltar</a>";
			}
		}
		echo '</p>';
		exit;
	}
	if($arquivo['size']==0 OR $arquivo['tmp_name']==NULL) {
		echo '<p style="font-weight:bold;color:red">Nenhum arquivo enviado.</p>';
		exit;
	}
	if($arquivo['size']>$tamanho_maximo) {
		echo '<p style="font-weight:bold;color:red">O Arquivo enviado é muito grande
			(Tamanho Máximo = ' . $tamanho_maximo . ' bytes).</p>';
		exit;
	}
	if(array_search($arquivo['type'],$tipos_aceitos)===FALSE) {
		echo '<p style="font-weight:bold;color:red">O Arquivo enviado é do tipo (' . 
				$arquivo['type'] . ') não aceito para upload. 
				Os tipos aceitos são:	</p>';
		echo '<pre>';
		print_r($tipos_aceitos);
		echo '</pre>';
		exit;
	}
	if (!file_exists('imagens')) {  //verifica se não existe a pasta imagem no servidor
		mkdir('imagens',0777,true);//cria a pasta imagem no servidor
	}
	preg_match("/.(gif|bmp|png|jpg|jpeg){1}$/i", $arquivo["name"], $ext);
	$nome_imagem = md5(uniqid(time())) . "." . $ext[1];
	$destino =  "imagens/".$nome_imagem;  //atribui a pasta e o nome do arquivo à variável $destino
	if(move_uploaded_file($arquivo['tmp_name'],$destino)) {
		include "conecta_mysql.php";
	    $sql = "INSERT INTO posts (descricao,imagem,usuario,dia)
	    VALUES ('".$descricao."','".$nome_imagem."','".$_COOKIE['id']."','".date("d.M.y")."')";
	    $resultado = mysqli_query($conexao,$sql)or die("Não foi possivel executar a SQL: ".$conexao->error);
	    if(!$conexao->error){
	        echo "Cadastro realizado com sucesso!";
	    }
		echo  '<p style="font-weight:bold;color:navy">';
		echo 'O Arquivo foi carregado com sucesso para ' .$destino.'!</p>';
		echo "<img src='$destino' border=0>";   //imprime a imagem armazenada no servidor.
		echo "<br><a href='timeline.php'>Voltar</a>";
	}
	
		
	
	else {
		echo '<p style="font-weight:bold;color:red">Ocorreu um erro durante o upload</p>';
	}
	
?>