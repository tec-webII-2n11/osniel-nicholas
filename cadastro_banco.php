<?php
    $nome=$_POST['nome'];
    $email=$_POST['email'];
    $senha=sha1($_POST['password']);
    $nascimento=$_POST['Dia']."-".$_POST['Mês']."-".$_POST['Ano'];
    $sexo=$_POST['sexo'];
    include "conecta_mysql.php";
    $sql = "INSERT INTO perfil (nome,email,senha,nascimento,genero,amigos)
    VALUES ('".$nome."','".$email."','".$senha."','".$nascimento."','".$sexo."','nenhum')";
    $resultado = mysqli_query($conexao,$sql)or die("Não foi possivel executar a SQL: ".$conexao->error);
    if(!$conexao->error){
        setcookie('usuario',$nome);
        $sql = 'SELECT id FROM perfil WHERE email="'.$email.'"';
        $resultado = mysqli_query($conexao,$sql) or die('Impossível executar a query:'.$conexao->error);
        if($resultado){
            while ($row = mysqli_fetch_array($resultado)){
                setcookie('id',$row[id]);
            }
        }

        header("location:timeline.php");
        
    }
?>