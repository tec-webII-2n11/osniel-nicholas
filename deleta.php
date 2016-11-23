<?php 
$imagem = $_POST['imagem'];
include "conecta_mysql.php";
$sql = "DELETE FROM posts WHERE imagem='".$imagem."'";
$resultado = mysqli_query($conexao,$sql) or die ("Não foi possível executar essa query".mysql_error());
if($resultado){
    header("location:admin.php");
}else{
    echo "Não executado";
}
?>
