<?php
    
    include 'conecta_mysql.php';
    $sql = "SELECT amigos FROM perfil WHERE id='".$_COOKIE['id']."'";
    $resultado = mysqli_query($conexao,$sql)or die("Impossivel executar a query: ".$conexao->error);
    if ($resultado) {
        $row = mysqli_fetch_array($resultado);
        $row = $row['amigos'];
        echo $_COOKIE['id']." - ".$_POST['id']." - ".$row." - ";
        if( $row=='nenhum' || $row == 0){
            $row = $_POST['id'];
            echo 'novo amigo ';
        }else{
            $row = $row."-".$_POST['id'];
            $row = explode("-",$row);
            $row = array_unique($row);
            $row = implode("-",$row);
        }
        echo $row." - ";
        $sql = "UPDATE perfil set amigos='".$row."' WHERE id='".$_COOKIE['id']."'";
        $novoResultado = mysqli_query($conexao,$sql)or die("Impossivel executar a query: ".$conexao->error);
        if($novoResultado){
            echo 'inserido com sucesso!';
        }else{
            echo 'erro ao tentar inserir amigo';
        }
    }else{
        echo 'no result';
    }
    echo "<br><a href='explorar.php'>Voltar</a>"
    
?>