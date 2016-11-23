<?php
    $email = $_POST['email'];
    $senha = $_POST['senha'];
    include 'conecta_mysql.php';
    $stmt = mysqli_prepare($conexao,"SELECT id,nome,email,senha FROM perfil WHERE email=?");
    if($stmt){
        mysqli_stmt_bind_param($stmt,'s',$email);
        mysqli_stmt_execute($stmt);
        mysqli_stmt_bind_result($stmt,$id,$nome,$remail,$rsenha);
        while(mysqli_stmt_fetch($stmt)){
           
        }
        
    
    mysqli_stmt_close($stmt);
    } else {
    trigger_error('Statement failed : ' . mysqli_stmt_error($stmt), E_USER_ERROR);
    }
    if(!isset($remail) || $remail=="" || $remail==' '){
    ?>
        <!DOCTYPE html>
<html lang="pt-br"> 
    <head>
        <title>Petnet - Login</title>
        <meta charset="utf-8">
        <meta name="author" content="Nicholas Ken Ywahara 31606954">
        <meta name="author" content="Osniel Lopes Teixeira - TIA 316.1940-1"/>
        <link href="https://fonts.googleapis.com/css?family=Poppins" rel="stylesheet">
        <script type="text/javascript">
            //Fundo aleatório
            var banner= new Array();
            banner[0]="https://media.giphy.com/media/26h0q9kT1eULfuNWg/giphy.gif";
            banner[1]="https://media.giphy.com/media/l0K4apzqsMv8K4jSw/giphy.gif";
            banner[2]="https://media.giphy.com/media/mVQ8oOQcPafL2/giphy.gif";
            banner[3]="https://media.giphy.com/media/3o7ZeDOrdy24GKFkOY/giphy.gif";
            banner[4]="https://media.giphy.com/media/GqrLv648FAFkk/giphy.gif";
            banner[5]="https://media.giphy.com/media/3oAt1M3UrBAsn3WvRK/giphy.gif";
            banner[6]="https://media.giphy.com/media/26ufmXyNfm329F1hm/giphy.gif";
            banner[7]="https://media.giphy.com/media/l41YuupcfDs5bSOGI/giphy.gif";
            banner[8]="https://media.giphy.com/media/xT1XGXm20TnY1cNPDG/giphy.gif";
            var random=Math.floor(8*Math.random());
            document.write("<style>");
            document.write("body {");
            document.write(' background:url("' + banner[random] + '");');
            document.write(" }");
            document.write("</style>");
        </script>
        <link rel="stylesheet" href="/index_verifica.css" type="text/css" />
    </head>
    	
<body>
    
	<p id='petnet'>PetNet</p>  
	<form method="POST" action="index_verifica.php">
        <input type="email" name="email" id="email" placeholder="E-mail"/>
        <input type="password" name="senha" id="senha" placeholder="Senha"/>
        <p id="errosenha">E-mail inválido</p>
        <input name="Login" type="submit" value="Login" id="login">    
	</form>
    <nav>
        <a href="https://petnet-osniel.c9users.io/explorar.php"><p id="explore">Explore</p></a>
        <img src="seta.png" id="seta" alt="seta para a direita">
    </nav>
</body>
</html>
<?php
    }
    elseif(!isset($_POST['senha']) || $senha=="" || $senha==" " || $rsenha!=sha1($senha)){
?>
<!DOCTYPE html>
<html lang="pt-br"> 
    <head>
        <title>Petnet - Login</title>
        <meta charset="utf-8">
        <meta name="author" content="Nicholas Ken Ywahara 31606954">
        <meta name="author" content="Osniel Lopes Teixeira - TIA 316.1940-1"/>
        <link href="https://fonts.googleapis.com/css?family=Poppins" rel="stylesheet">
        <script type="text/javascript">
            //Fundo aleatório
            var banner= new Array();
            banner[0]="https://media.giphy.com/media/26h0q9kT1eULfuNWg/giphy.gif";
            banner[1]="https://media.giphy.com/media/l0K4apzqsMv8K4jSw/giphy.gif";
            banner[2]="https://media.giphy.com/media/mVQ8oOQcPafL2/giphy.gif";
            banner[3]="https://media.giphy.com/media/3o7ZeDOrdy24GKFkOY/giphy.gif";
            banner[4]="https://media.giphy.com/media/GqrLv648FAFkk/giphy.gif";
            banner[5]="https://media.giphy.com/media/3oAt1M3UrBAsn3WvRK/giphy.gif";
            banner[6]="https://media.giphy.com/media/26ufmXyNfm329F1hm/giphy.gif";
            banner[7]="https://media.giphy.com/media/l41YuupcfDs5bSOGI/giphy.gif";
            banner[8]="https://media.giphy.com/media/xT1XGXm20TnY1cNPDG/giphy.gif";
            var random=Math.floor(8*Math.random());
            document.write("<style>");
            document.write("body {");
            document.write(' background:url("' + banner[random] + '");');
            document.write(" }");
            document.write("</style>");
        </script>
        <link rel="stylesheet" href="/index_verifica.css" type="text/css" />
    </head>
    	
<body>
    
	<p id='petnet'>PetNet</p>  
	<form method="POST" action="<?php echo $_SERVER['PHP_SELF']?>">
        <input type="email" name="email" id="email" value='<?php echo $_POST["email"]; ?>'/>
        <input type="password" name="senha" id="senha" placeholder="Senha"/>
        <p id="errosenha">Senha inválida</p>
        <input name="Login" type="submit" value="Login" id="login">    
	</form>
    <nav>
        <a href="https://petnet-osniel.c9users.io/explorar.php"><p id="explore">Explore</p></a>
        <img src="seta.png" id="seta" alt="seta para a direita">
    </nav>
</body>
</html>
<?php
    }
    elseif($remail=='admin@petnet.com' && $rsenha==sha1('admin123')){
        setcookie('usuario',$nome);
        setcookie('id',$id);
        header("location:admin.php");
    }
    else{
        setcookie('usuario',$nome);
        setcookie('id',$id);
        header("location:timeline.php");
    }
?>