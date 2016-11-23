<?php
    if(!isset($_COOKIE['usuario']) || $_COOKIE['usuario']!="Administrador"){
         header("location:index.php");
    }
?>
<!DOCTYPE html>
<html>
    <head>
        <title>Petnet - Administrador</title>
        <meta charset="utf-8">
        <meta name="author" content="Nicholas Ken Ywahara 31606954">
        <meta name="author" content="Osniel Lopes Teixeira - TIA 316.1940-1"/>
        <link href="https://fonts.googleapis.com/css?family=Poppins" rel="stylesheet">
        <link rel="stylesheet" href="admin.css" type="text/css" />
        <?php
            include 'conecta_mysql.php';
            $sql = "SELECT * FROM posts WHERE verificado=0";
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
                    
                    $i++;
                }
            }
            
            foreach ($posts as $i => $v) {
                $posts[$i]= implode("/",$v);
            }
            $posts = implode("-",$posts);
            
        ?>
    </head>
    <body onload='adicionaArticlesIniciais()'>
        <header>
            <a href="https://petnet-osniel.c9users.io/index.php" id="petnet">PetNet</a>
            <form>
                <input type="text" name="pesquise" id="pesquise" placeholder="Pesquisar"/>
            </form>
            <form method='POST' action='index.php'>
                <input type="submit" name='submit' value="Sair" id='logout'/>
            </form>
        </header>
        <section id='posts'>
            <p id="head">Avaliações pendentes</p>
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
                    
                    
                    //-----formulario para deletar----
                    var form = document.createElement('form');
                    form.action = 'deleta.php';
                    form.method = 'POST'
                    form.id = "del"+String(i);
                    var hidden = document.createElement('input');
                    hidden.type = 'hidden';
                    hidden.value = posts[i][1];
                    hidden.name = "imagem";
                    form.appendChild(hidden);
                    var del = document.createElement('input');
                    del.type = "submit";
                    del.className = "deleta";
                    del.id = "del"+String(i);
                    del.name = "Deleta";
                    del.value = "Deleta";
                    form.appendChild(del);
                    
                    //-----formulario para manter----
                    var form2 = document.createElement('form');
                    form2.action = 'mantem.php';
                    form2.method = 'POST'
                    form2.id = "mantem"+String(i);
                    var hidden2 = document.createElement('input');
                    hidden2.type = 'hidden';
                    hidden2.value = posts[i][1];
                    hidden2.name = "imagem";
                    form2.appendChild(hidden2);
                    var keep = document.createElement('input');
                    keep.type = "submit";
                    keep.className = "mantem";
                    keep.id = "keep"+String(i);
                    keep.name = "Mantem";
                    keep.value = "Mantem";
                    form2.appendChild(keep);
                    
                    //adiciona os elementos ao article
                    x.appendChild(n);
                    x.appendChild(d);
                    x.appendChild(document.createElement('br'));
                    if(posts[i][1]!='noimage'){
                    x.appendChild(img);
                    }
                    x.appendChild(form);
                    x.appendChild(form2);
                    document.getElementById('posts').appendChild(x);
                    
                }
                
                function adicionaArticlesIniciais(){
                    for(i=0;i<2;i++){
                        adicionaArticle(i);
                    }
                }
                var marca = 300;
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