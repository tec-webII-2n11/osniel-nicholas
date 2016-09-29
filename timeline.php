<!DOCTYPE html>
<html lang="pt-br">
    <head>
        <title>Petnet - Timeline</title>
        <meta charset="utf-8">
        <meta name="author" content="Nicholas Ken Ywahara 31606954">
        <meta name="author" content="Osniel Lopes Teixeira - TIA 316.1940-1"/>
        <link href="https://fonts.googleapis.com/css?family=Poppins" rel="stylesheet">
        <script type="text/javascript">
            function novaPostagem(){
                document.getElementById("post").className = "";
                document.getElementById("denuncie").className = "invisivel";
            }
            function novaDenuncia(){
                document.getElementById("post").className = "invisivel";
                document.getElementById("denuncie").className = "";
            }
        </script>
        <link rel="stylesheet" type="text/css" href="timeline.css">
    </head>
    <body>
        <header>
            <a href="https://petnet-osniel.c9users.io/login.php" id="petnet">PetNet</a>
            <form>
                <label for="pesquise" class="invisivel">Pesquisar</label>
                <input type="text" name="pesquise" id="pesquise" placeholder="Pesquisar"/>
            </form>
        </header>
        <aside>
            <nav>
                <ul>
                    <li><a class="nav" href="https://petnet-osniel.c9users.io/perfil.php">Meu perfil</a></li>
                    <li><a class="nav" href="https://petnet-osniel.c9users.io/explorar_logado.php">Explorar</a></li>
                    <li><a class="nav">Mapa</a></li>
                    <li><a class="nav" onclick="novaDenuncia()" id="novaDenuncia">Denuncie</a></li>
                    <li><a class="nav" onclick="novaPostagem()" id="novopost">Nova Postagem</a></li>
                </ul>
            </nav>
            <div id="post" class="invisivel">
                <form>
                    <label for="texto_post" class="invisivel">Texto ou título do post</label>
                    <textarea  id="texto_post" rows="5" cols="34" placeholder="Conte-nos uma historia, nos mostre a foto daquele passeio super bacana."></textarea>
                    <input type="file" name="file"  class="inputfile" /><br/>
                    <label for="file" class="enter">Adicionar foto</label><br/>
                    <input type="button" name="postar" id="postar" value="Postar!" onclick="history.go(0)"/>
                </form>
            </div>
            <div id="denuncie" class="invisivel">
                <form enctype="multipart/form-data">
                    <label for="titulo" class="invisivel">Titulo</label>
                    <input type="text" name="titulo" id="titulo" placeholder="Forneça uma breve descrição"/>
                    <label for="descricao_denuncia" class="invisivel">Descrição em detalhes</label>
                    <textarea id="descricao_denuncia" rows="5" cols="34" placeholder="Explique em detalhes a situação a qual o animal está sendo submetido."></textarea>
                    <input type="file" name="file" class="inputfile" /><br/>
                    <label for="file" class="enter">Adicionar foto</label><br/>
                    <input type="checkbox" name="declaracao" id="declaracao"/>
                    <label for="declaracao" id="labeldeclaracao">Declaro que todas as informações dadas possuem valor verdadeiro, ter ciência de que autoridades serão acionadas para verificar o caso e que ao fornecer informações falsas poderei perder meu acesso ao PetNet e responder em processo jurídico</label>
                    <input type="button" name="denunciar" id="denunciar" value="Denunciar" onclick="history.go(0)"/>
                </form>
            </div>
        </aside>
        <section>
            <article>
                <p>Nome usuário</p>
            </article>
            <article>
                <p>Nome usuário</p>
            </article>
            <article>
                <p>Nome usuário</p>
            </article>
            <article>
                <p>Nome usuário</p>
            </article>
        </section>
    </body>
</html>