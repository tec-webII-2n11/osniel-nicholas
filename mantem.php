<?php
$imagem = $_POST['imagem'];
include 'conecta_mysql.php';
$sql = "UPDATE posts SET verificado=1 WHERE imagem='".$imagem."'";
$resultado = mysqli_query($conexao,$sql) or die("Não foi possível atualizar o post ".mysqli_error());
if($resultado){
    header("location:admin.php");
}else{
    echo "Não executado";
}
?>