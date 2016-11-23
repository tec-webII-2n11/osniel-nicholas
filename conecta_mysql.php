<?php
    $conexao = new mysqli("127.0.0.1","osniel","","petnet");
    if(mysqli_connect_errno()){
        echo "Não foi possivel conectar: ".mysqli_connect_error();
    }
?>