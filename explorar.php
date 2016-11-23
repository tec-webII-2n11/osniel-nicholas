<!DOCTYPE html>
<html lang="pt-br">
    <head>
        <title>Petnet - Explore</title>
        <meta charset="utf-8">
        <meta name="author" content="Nicholas Ken Ywahara 31606954">
        <meta name="author" content="Osniel Lopes Teixeira - TIA 316.1940-1"/>
        <link href="https://fonts.googleapis.com/css?family=Poppins" rel="stylesheet">
        <?php
             include 'conecta_mysql.php';
            $sql = "SELECT * FROM posts WHERE verificado=1";
            $resultado = mysqli_query($conexao,$sql)or die("Impossivel executar a query: ".$conexao->error);
            if ($resultado) {
                $i = 0;
                while ($row = mysqli_fetch_array($resultado)){
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
                    $posts[$i][] = $row['usuario'];
                    $i++;
                }
            }
            foreach ($posts as $i => $v) {
                $posts[$i]= implode("/",$v);
            }
            $posts = implode("-",$posts);
        ?>
        <link rel="stylesheet" type="text/css" href="explorar.css">
    </head>
    <body onload='adicionaArticlesIniciais()'>
        <header>
            <a href="https://petnet-osniel.c9users.io/index.php" id="petnet">PetNet</a>
            <form>
                <input type="text" name="pesquise" id="pesquise" placeholder="Pesquisar"/>
            </form>
        </header>
        <section>
            <?php
            if(!isset($_COOKIE['usuario'])){
            ?>    
            <p id="bemvindo">Bem vindo ao PetNet,</p>
            <p id="welcome"> aqui você poderá compartilhar os melhores momentos do seu bichinho para todos verem, seja ele papagaio, periguito, arraia, porco, tamaduá, gato, lebre, tartaruga ou um cachorro.<br/>Todos os bichinhos tem lugar aqui.</p>
            <hr id="barra">
            <script type="text/javascript">
                function adicionaArticle(i){
                    var x = document.createElement('ARTICLE');
                    if(i%2==0){
                        x.style.float= 'left';
                    }else{
                        x.style.float= "right";
                    }
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
                    var img = document.createElement('img');
                    img.src = "imagens/" + posts[i][1];
                    
                    
                    //adiciona os elementos ao article
                    x.appendChild(n);

                    x.appendChild(d);
                    x.appendChild(document.createElement('br'));
                    x.appendChild(img);
                    document.getElementById('posts').appendChild(x);
                    
                }</script>
            <?php
            }else{
            ?>
            <p id="bemvindo">Explore</p>
            <script type="text/javascript">
                function adicionaArticle(i){
                    var x = document.createElement('ARTICLE');
                    if(i%2==0){
                        x.style.float= 'left';
                    }else{
                        x.style.float= "right";
                    }
                    x.id = "post"+String(i);
                    //cria o formulário para seguir
                    var form = document.createElement('form');
                    form.action = 'seguir.php';
                    form.method = 'POST';
                    var seguir = document.createElement('input');
                    seguir.type = 'submit';
                    seguir.value= '+seguir';
                    form.appendChild(seguir);
                    var id = document.createElement('input');
                    id.type = 'hidden';
                    id.value = posts[i][5];
                    id.name = 'id';
                    form.appendChild(id);
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
                    x.appendChild(form);
                    x.appendChild(d);
                    x.appendChild(document.createElement('br'));
                    if(posts[i][1]!='noimage'){
                    x.appendChild(img);
                    }
                    document.getElementById('posts').appendChild(x);
                    
                }</script>
            <?php
            }
            ?>
            <section id="posts">
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
                
                function adicionaArticlesIniciais(){
                    for(i=0;i<3;i++){
                        adicionaArticle(i,posts);
                    }
                }
                var marca = 20;
                var posicao = 0;
                window.onscroll = function() {maisUmArticle()};
                function maisUmArticle() {
                    posicao = document.body.scrollTop;
                    if(posicao>marca){
                        adicionaArticle(i);
                        i++;
                        marca = marca + 100
                    }
                }
                    
            </script>
            </section>
        </section>
    </body>
</html>