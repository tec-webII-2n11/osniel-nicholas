<!DOCTYPE html>
<html>
    <head>
        <meta name="author" content="Nicholas Ken Ywahara 31606954"> 
        <meta charset="UTF-8">
        <title>PetNet - Cadastro</title>
        <link href="https://fonts.googleapis.com/css?family=Poppins" rel="stylesheet">
        <link rel="stylesheet" type="text/css" href="cadastro.css">
    </head>
    <body id="tudo">
        <header>
            <a href="https://petnet-osniel.c9users.io/login.php" id="petnet">PetNet</a>
            <form id="conteudo">
                <input type="button" value="Ja tenho Cadastro!" id="cadastro" onclick="location.href='login.php'">
              </form>
        </header>
    <article id="corpo">
    <div id="borda">
    <p id="p">Crie Uma Conta</p>
    <form id="conteudo1">
    <label for="nome">Nome:</label>    
    <input type="text" name="nome" id="nome" placeholder="Nome Completo"> 
    <br>    
    <br>    
    <label for="email">E-mail</label>
    <input type="email" name="email" id="email" placeholder="Coloque seu Email"> 
    <br>
    <br>    
    <label for="password">Password</label>
    <input type="password" name="password" id="password" placeholder="Digite uma Senha">
    <br>
    <br> 
    <label for="passwordverif">Password</label>
    <input type="password" name="passwordverif" id="passwordverif" placeholder="Digite a senha novamente">
    <br>
  
    <p>Aniversario</p>
        <select name="Dia">
            <option value="Dia">Dia</option>
            <option value="01">01</option>
            <option value="02">02</option>
            <option value="03">03</option>
            <option value="04">04</option>     
            <option value="05">05</option> 
            <option value="06">06</option>
            <option value="07">07</option>
            <option value="08">08</option>
            <option value="09">09</option>
            <option value="10">10</option>
            <option value="11">11</option>
            <option value="12">12</option>
            <option value="13">13</option>
            <option value="14">14</option>
            <option value="15">15</option>
            <option value="16">16</option>
            <option value="17">17</option>
            <option value="18">18</option>
            <option value="19">19</option>
            <option value="20">20</option>
            <option value="21">21</option>
            <option value="22">22</option>
            <option value="23">23</option>
            <option value="24">24</option>
            <option value="25">25</option>
            <option value="26">26</option>
            <option value="27">27</option>
            <option value="28">28</option>
            <option value="29">29</option>
            <option value="30">30</option>
            <option value="31">31</option>
        </select> 
        <select name="Mês">
            <option value="Mês">Mês</option>
            <option value="Jan">Jan</option>
            <option value="Fev">Fev</option>
            <option value="Mar">Mar</option>
            <option value="Abr">Abr</option>     
            <option value="Maio">Maio</option> 
            <option value="Jun">Jun</option>
            <option value="Jul">Jul</option>
            <option value="Ago">Ago</option>
            <option value="Set">Set</option>
            <option value="Out">Out</option>
            <option value="Nov">Nov</option>
            <option value="Dez">Dez</option>
        </select> 
        <select name="Ano">
            <option value="Ano">Ano</option>
            <option value="2016">2016</option>
            <option value="2015">2015</option>
            <option value="2014">2014</option>
            <option value="2013">2013</option>
            <option value="2012">2012</option>
            <option value="2011">2011</option>
            <option value="2010">2010</option>
            <option value="2009">2009</option>
            <option value="2008">2008</option>
            <option value="2007">2007</option>
            <option value="2006">2006</option>
            <option value="2005">2005</option>
            <option value="2004">2004</option>
            <option value="2003">2003</option>
            <option value="2002">2002</option>
            <option value="2001">2001</option>
            <option value="2000">2000</option>
            <option value="1999">1999</option>
            <option value="1998">1998</option>
            <option value="1997">1997</option>
            <option value="1996">1996</option>
            <option value="1995">1995</option>
            <option value="1994">1994</option>
            <option value="1993">1993</option>
            <option value="1992">1992</option>
            <option value="1991">1991</option>
            <option value="1990">1990</option>
            <option value="1989">1989</option>
            <option value="1988">1988</option>
            <option value="1987">1987</option>
            <option value="1986">1986</option>
            <option value="1985">1985</option>
            <option value="1984">1984</option>
            <option value="1983">1983</option>
            <option value="1982">1982</option>
            <option value="1981">1981</option>
            <option value="1980">1980</option>
        </select> 
        <br>
        <br>
    <input type="radio" id="masculino" name="sexo"> 
    <label for="masculino"> Masculino</label>    
        
    <input type="radio" id="feminino" name="sexo">
    <label for="feminino"> Feminino</label>    
    <br>
    <br>    
    <input type="checkbox" id="marqueaqui" name="marqueaqui">
    <label for="marqueaqui">
Concordo com os Termos de Uso e Política de Privacidade.</label>  
    <br>
    <br>  
    <p>Clique em cadastrar-se para finalizar o cadastro</p>     
    <input type="button" value="Cadastrar-se" id="cadastro1" onclick="location.href='timeline.php'">
    </form> 
    </div>        
    </article>    
</body>
</html>
