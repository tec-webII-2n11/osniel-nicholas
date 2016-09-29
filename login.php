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
            var random=Math.floor(8*Math.random());
            document.write("<style>");
            document.write("body {");
            document.write(' background:url("' + banner[random] + '");');
            document.write(" }");
            document.write("</style>");
            //Funcao para exibir campos de login
            function logar(){
                document.getElementById("cadastrar").className = "invisivel";
                document.getElementById("entrar").className = "invisivel";
                document.getElementById("email").className = "";
                document.getElementById("senha").className = "";
                document.getElementById("login").className = "";
            }
        </script>
        <link rel="stylesheet" href="/login.css" type="text/css" />
    </head>
    	
<body>
    
	<p>PetNet</p>  
    <input type="button" value="Entrar" id="entrar" onclick="logar()">
    <input type="button" value="Cadastre-se" id="cadastrar" onclick="location.href='cadastro.php'">
    <input type="email" name="email" id="email" class="invisivel" placeholder="E-mail"/>
    <input type="password" name="senha" id="senha" class="invisivel" placeholder="Senha"/>
    <input name="Login" type="button" value="Login" id="login" class="invisivel" onclick="location.href='https://petnet-osniel.c9users.io/timeline.php'">
    <nav>
        <a href="https://petnet-osniel.c9users.io/explorar.php"><p id="explore">Explore</p></a>
        <img src="seta.png" id="seta" alt="seta para a direita">
    </nav>
</body>
</html>