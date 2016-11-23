<?php
if(!isset($_COOKIE['usuario']) || !isset($_COOKIE['id'])){
     header("location:index.php");
}
?><!DOCTYPE html>
<html lang="pt-br">
    <head>
        <title>Petnet - Timeline</title>
        <html xmlns="http://www.w3.org/1999/xhtml" lang="pt-br" xml:lang="pt-br">
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
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
        <?php
            include 'conecta_mysql.php';
            //busca o campo de amigos e o separa em um array
            $sql = "SELECT amigos FROM perfil WHERE id='".$_COOKIE['id']."'";
            $resultado = mysqli_query($conexao,$sql)or die("Impossivel executar a query: ".$conexao->error);
            if ($resultado) {
                $resultado = mysqli_fetch_array($resultado);
                $resultado = $resultado['amigos'];
                $amigos = explode("-",$resultado);
                
                //busca os posts
                $sql = "SELECT * FROM posts WHERE verificado=1";
                $resultado = mysqli_query($conexao,$sql)or die("Impossivel executar a query: ".$conexao->error);
                if ($resultado) {
                    $i = 0;
                    while ($row = mysqli_fetch_array($resultado)){
                        if($row['usuario']!= "" and $row['usuario']!=" "){
                            foreach ($amigos as $user) {
                                if($row['usuario']==$user || $row['usuario']==$_COOKIE['id']){
                                    $posts[$i][] = $row['descricao'];
                                    $posts[$i][] = $row['imagem'];
                                    $sql = "SELECT nome FROM perfil WHERE id='".$row['usuario']."'";
                                    $pesquisa = mysqli_query($conexao,$sql)or die("Impossivel executar a query: ".$conexao->error);
                                    if($pesquisa){
                                        $linha = mysqli_fetch_array($pesquisa);
                                        $posts[$i][]= $linha['nome'];
                                    }else{
                                        echo "erro";
                                    }
                                    $posts[$i][] = $row['dia'];
                                    $posts[$i][] = $row['verificado'];
                                    $i++;
                                }
                            }
                        }
                    }
                }
                foreach ($posts as $i => $v) {
                    $posts[$i]= implode("/",$v);
                }
                $posts = implode("-",$posts);
                
            }
           
            
        ?>
        <link rel="stylesheet" type="text/css" href="timeline.css">
    </head>
    <body onload='adicionaArticlesIniciais()'>
        <header>
            <a href="https://petnet-osniel.c9users.io/index.php" id="petnet">PetNet</a>
            <form>
                <label for="pesquise" class="invisivel">Pesquisar</label>
                <input type="text" name="pesquise" id="pesquise" placeholder="Pesquisar"/>
            </form>
            <form method='POST' action='index.php'>
                <input type="submit" name='submit' value="Sair" id='logout'/>
            </form>
        </header>
        <aside>
            <nav>
                <ul>
                    <li><a class="nav" href="https://petnet-osniel.c9users.io/explorar.php">Explorar</a></li>
                    <li><a class="nav">Mapa</a></li>
                    <li><a class="nav" onclick="novaDenuncia()" id="novaDenuncia">Denuncie</a></li>
                    <li><a class="nav" onclick="novaPostagem()" id="novopost">Nova Postagem</a></li>
                </ul>
            </nav>
            <div id="post" class="invisivel">
                <form method='POST' enctype='multipart/form-data' action="postagem.php">
                    <label for="texto_post" class="invisivel">Texto ou título do post</label>
                    <textarea  id="texto_post" name="descricao" rows="5" cols="34" placeholder="Conte-nos uma historia, nos mostre a foto daquele passeio super bacana."></textarea>
                    <input type="file" name="arquivo" id="file"  class="inputfile">
                    <label for="file">Adicionar foto</label><br/>
                    <input type="submit" name="postar" id="postar" value="Postar!"/>
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
        <section id='posts'>
            <script type="text/javascript">
                var posts, string_array;
                //recebe a string com elementos separados, vindos do PHP
                string_array = '<?php echo $posts; ?>';
                //transforma esta string em um array próprio do Javascript
                posts = string_array.split('-');
                var i;
                for(i=0;i<posts.length;i++){
                    posts[i]=posts[i].split('/');
                }
                //Fundo aleatório
                var random=Math.floor(posts.length*Math.random());
                
                i = 0;
                function adicionaArticle(i){
                    var x = document.createElement('ARTICLE');
                    x.id = "post"+String(i);
                    //cria o nome
                    var n = document.createElement('p');
                    n.className = 'nome';
                    n.appendChild(document.createTextNode(posts[i][2]+", em "+posts[i][3]));
                    //cria a descricao
                    var d = document.createElement('p');
                    d.className = "descricao";
                    d.appendChild(document.createTextNode(posts[i][0]));
                    //cria a imagem
                    if(posts[i][1]!='noimage'){
                        var img = document.createElement('img');
                        img.src = "imagens/" + posts[i][1];
                    }
                    
                    //adiciona os elementos ao article
                    x.appendChild(n);
                    x.appendChild(d);
                    x.appendChild(document.createElement('br'));
                    if(posts[i][1]!='noimage'){
                    x.appendChild(img);
                    }
                    document.getElementById('posts').appendChild(x);
                    
                }
                
                function adicionaArticlesIniciais(){
                    for(i=0;i<5;i++){
                        adicionaArticle(i);
                    }
                }
                var marca = 10;
                var posicao = 0;
                window.onscroll = function() {maisUmArticle()};
                function maisUmArticle() {
                    posicao = document.body.scrollTop;
                    if(posicao>marca){
                        adicionaArticle(i);
                        i++;
                        marca = marca + 440
                    }
                }
                    
            </script>
        </section>
    </body>
</html>