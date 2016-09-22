<!DOCTYPE html>
<html lang="pt-br">
    <head>
        <title>Petnet - Explore</title>
        <meta charset="utf-8">
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
        <style type="text/css">
            *{
                font-family: 'Poppins', sans-serif;
            }
            body{
                background-color: #F2F2F2;
                margin: 0px;
            }
            header{
                width: 100%;
                height: 50px;
                margin: 0px;
                background-color: LightBlue;
            }
            #petnet{
                position: absolute;
                left: 50%;
                text-decoration: none;
                color: white;
                font-size: 30px;
                background-color: LightBlue;
                margin-left: -48px
            }
            #bemvindo{
                font-size: 25px;
                text-align: center;
                margin: 2% 0px 0px 0px;
            }
            #welcome{
                font-size: 15px;
                width: 52.5%;
                height: 100px;
                text-align: center;
                margin: 0% 23.75% 0% 23.75%;
            }
            #barra{
                width: 30%;
            }
            #posts{
                margin-left: 8%;
            }
            article{
                float: left;
                width: 300px;
                height: 300px;
                background-color: white;
                margin: 3% 3% 3% 3%;
                border-radius: 3px;
                border: solid 1px #E6E6E6;
            }
            .blabla{
                width: 300px;
                height: 300px;
                background-color: white;
                float: left;
                margin: 3% 3% 3% 3%;
                border-radius: 3px;
                border: solid 1px #E6E6E6;
            }
        </style>
    </head>
    <body>
        <header>
            <a href="https://petnet-osniel.c9users.io/login.php" id="petnet">PetNet</a>
        </header>
        <section>
            <p id="bemvindo">Bem vindo ao PetNet,</p><p id="welcome"> aqui você poderá compartilhar os melhores momentos do seu bichinho para todos verem, seja ele papagaio, periguito, arraia, porco, tamaduá, gato, lebre, tartaruga ou um cachorro.<br/>Todos os bichinhos tem lugar aqui.</p>
            <hr id="barra">
        </section>
        <?php include "posts_explore.php" ?>
    </body>
</html>