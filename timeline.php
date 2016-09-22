<!DOCTYPE html>
<html lang="pt-br">
    <head>
        <title>Petnet - Timeline</title>
        <meta charset="utf-8">
        <meta name="author" content="Osniel Lopes Teixeira - TIA 316.1940-1"/>
        <link href="https://fonts.googleapis.com/css?family=Poppins" rel="stylesheet">
        <script type="text/javascript">
            function novaPostagem(){
                document.getElementById("post").className = "";
            }
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
                margin-left: -166px;
            }
            #pesquise{
                position: absolute;
                left: 50%;
                top: 10px;
                margin-left: 10px;
                height: 23px;
                padding-left: 10px;
                border-radius: 3px;
                border: solid 1px #E6E6E6;
            }
            nav{
                position: fixed;
                right: 10px;
                background-color: white;
                width: 20%;
                height: 180px;
                margin: 3% 2% 0 0;
                border-radius: 3px;
                border: solid 1px #E6E6E6;
            }
            article{
                position: relative;
                left: 50%;
                top: 2%;
                background-color: white;  
                border-radius: 3px;
                border: solid 1px #E6E6E6;
                width: 600px;
                height: 400px;
                margin: 3% 0 0 -300px;
            }
            .nav{
                margin-left: 20px;
                margin-top: 30px;
                text-decoration: none;
                color: black;
            }
            ul{
                list-style: none;
            }
            #novopost:hover, #enter, #postar{
                cursor:pointer;
            }
            #post{
                position: fixed;
                top: 280px;
                right: 37px;
                border-radius: 3px;
                border: solid 1px #E6E6E6;
                background-color: white;
                width: 20%;
            }
            textarea{
                resize: none;
                margin: 20px 0 0 20px;
            }
            .inputfile {
            	width: 0.1px;
            	height: 0.1px;
            	opacity: 0;
            	overflow: hidden;
            	position: absolute;
            	z-index: -1;
            }
            #enter{
                margin-left: 20px;
            }
            .invisivel{
                display: none;
            }
            #postar{
                border-radius: 5px;
                background-color: cornflowerblue;
                border: 0px;
                width: 150px;
                height: 30px;
                margin: 10px 0 10px 60px;
                color:white;
            }
        </style>
    </head>
    <body>
        <header>
            <a href="https://petnet-osniel.c9users.io/login.php" id="petnet">PetNet</a>
            <form>
                <input type="text" name="pesquise" id="pesquise" placeholder="Pesquisar"/>
            </form>
        </header>
        <aside>
            <nav>
                <ul>
                    <li><a class="nav" href="https://petnet-osniel.c9users.io/perfil.php">Meu perfil</a></li>
                    <li><a class="nav" href="https://petnet-osniel.c9users.io/explorar_logado.php">Explorar</a></li>
                    <li><a class="nav">Mapa</a></li>
                    <li><a class="nav">Denuncie</a></li>
                    <li><a class="nav" onclick="novaPostagem()" id="novopost">Nova Postagem</a></li>
                </ul>
            </nav>
            <div id="post" class="invisivel">
                <form>
                    <textarea rows="5" cols="34" placeholder="Conte-nos uma historia, nos mostre a foto daquele passeio super bacana."></textarea>
                    <input type="file" name="file" id="file" class="inputfile" /></br>
                    <label for="file" id="enter">Adicionar foto</label></br>
                    <input type="button" name="postar" id="postar" value="Postar!" onclick="history.go(0)"/>
                </form>
            </div>
        </aside>
        <section>
            <article>
                
            </article>
            <article>
                
            </article>
            <article>
                
            </article>
            <article>
                
            </article>
        </section>
    </body>
</html>