<!DOCTYPE html>
<html>
    <head>
        <title>Petnet - Explore</title>
        <meta charset="utf-8">
        <meta name="author" content="Nicholas Ken Ywahara 31606954">
        <meta name="author" content="Osniel Lopes Teixeira - TIA 316.1940-1"/>
        <link href="https://fonts.googleapis.com/css?family=Poppins" rel="stylesheet">
        <script type="text/javascript">
            //Fundo aleatório
            var banner= new Array()
            banner[0]="https://media.giphy.com/media/26h0q9kT1eULfuNWg/giphy.gif"
            banner[1]="https://media.giphy.com/media/l0K4apzqsMv8K4jSw/giphy.gif"
            banner[2]="https://media.giphy.com/media/mVQ8oOQcPafL2/giphy.gif"
            banner[3]="https://media.giphy.com/media/3o7ZeDOrdy24GKFkOY/giphy.gif"
            banner[4]="https://media.giphy.com/media/GqrLv648FAFkk/giphy.gif"
            banner[5]="https://media.giphy.com/media/3oAt1M3UrBAsn3WvRK/giphy.gif"
            banner[6]="https://media.giphy.com/media/26ufmXyNfm329F1hm/giphy.gif"
            banner[7]="https://media.giphy.com/media/l41YuupcfDs5bSOGI/giphy.gif"
            var random=Math.floor(8*Math.random());
            document.write("<style>");
            document.write("article {");
            document.write(' background:url("' + banner[random] + '");');
            document.write(" }");
            document.write("</style>");
        </script>
        <link rel="stylesheet" type="text/css" href="explorar_logado.css">
    </head>
    <body>
        <header>
            <a href="https://petnet-osniel.c9users.io/timeline.php" id="petnet">PetNet</a>
            <form>
                <input type="text" name="pesquise" id="pesquise" placeholder="Pesquisar"/>
            </form>
        </header>  
        <?php include "posts_explore.php" ?>
    </body>
</html>