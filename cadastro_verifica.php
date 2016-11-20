<?php
    if(isset($_POST['cadastrar'])){
        $nome = $_POST['nome'];
        $email = $_POST['email'];
        include "conecta_mysql.php";
        $sql = "SELECT * FROM perfil";
        $resultado = mysqli_query($conexao,$sql)or die("Impossivel executar a query: ".mysqli_error());
        $emailJaExiste = 0;
        if ($resultado) {
            while ($row = mysqli_fetch_array($resultado)){
                if($row['email']==$email){
                    $emailJaExiste++;
                }
            }
        }
        $senha = $_POST['password'];
        $verifsenha = $_POST['passwordverif'];
        $dia = $_POST['Dia'];
        $mes = $_POST['Mês'];
        $ano = $_POST['Ano'];
        $sexo = $_POST['sexo'];
        $termos = $_POST['marqueaqui'];
        if(!isset($nome) || $nome==" " || strlen($nome)==0 || !isset($email) || strlen($email)==0 || $emailJaExiste>0 || !isset($senha) || strlen($senha)<8 || $senha!=$verifsenha || !isset($dia) || $dia=="Dia" || !isset($mes) || $mes=="Mês" || !isset($ano) || $ano=="Ano" || !isset($sexo) || !isset($termos)){
?>
            <!DOCTYPE html>
            <html>
                <head>
                    <meta name="author" content="Nicholas Ken Ywahara 31606954"> 
                    <meta name="author" content="Osniel Lopes Teixeira - TIA 316.1940-1"/>
                    <meta charset="UTF-8">
                    <title>PetNet - Cadastro</title>
                    <link href="https://fonts.googleapis.com/css?family=Poppins" rel="stylesheet">
                    <link rel="stylesheet" type="text/css" href="cadastro_verifica.css">
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
                        document.write("#gif {");
                        document.write(' background:url("' + banner[random] + '");');
                        document.write(" }");
                        document.write("</style>");
                    </script>
                </head>
            <body id="tudo">
                <header>
                    <a href="https://petnet-osniel.c9users.io/index.php" id="petnet">PetNet</a>
                    <form id="conteudo">
                        <input type="button" value="Ja tenho Cadastro!" id="cadastro" onclick="location.href='index.php'">
                     </form>
                </header>
                <article id="corpo">
                    <article id="gif"></article>
                    <div id="borda">
                        <p id="p" class='espacamento'>Crie Uma Conta</p>
                        <form id="conteudo1" method="POST" action="<?php echo $_SERVER['PHP_SELF']?>">
                            <?php   
                                    if(!isset($nome) || $nome==" " || strlen($nome)==0){
                            ?>
                            <label for="nome" class='espacamento'>Nome</label>   
                            <input type="text" name="nome" id="nome" placeholder="Nome Completo" class='espacamento'> 
                            <p class='aviso'>Preencha este campo.</p>
                            <?php
                                    }
                                    else{
                            ?>
                            <label for="nome" class='espacamento'>Nome</label>   
                            <input type="text" name="nome" id="nome" value='<?php echo $nome ?>' class='espacamento' style='margin-right:250px;'> 
                            <?php
                                    }
                            ?>
                            <?php
                                    if(!isset($email) || strlen($email)==0){
                            ?>
                            <label for="email" class='espacamento'>E-mail</label>
                            <input type="email" name="email" id="email" class='espacamento' placeholder="Coloque seu Email" > 
                            <p class='aviso'>Preencha este campo.</p>
                            <?php
                                    }
                                    elseif ($emailJaExiste>0){
                            ?>
                            <label for="email" class='espacamento'>E-mail</label>
                            <input type="email" name="email" id="email" class='espacamento' placeholder="Coloque seu Email" style='margin-right:0px;'> 
                            <p class='aviso' style='margin-left:0px;'>Este email já está cadastrado</p>
                            <?php                    
                                    }else{
                                         
                            ?>
                            <label for="email" class='espacamento'>E-mail</label>
                            <input type="email" name="email" id="email" class='espacamento' value='<?php echo $email ?>'> 
                            <?php   }
                            ?>
                            <br>
                            <?php
                                    if(!isset($senha) || strlen($senha)<8){
                            ?>
                            <label for="password" class='espacamento'>Password</label>
                            <input type="password" name="password" id="password" class='espacamento' placeholder="Digite uma Senha" maxlength=10>
                            <p class='aviso' id='avisosenha'>A senha deve conter 8 caracteres no mínimo.</p>
                            <label for="passwordverif" class='espacamento'>Password</label>
                            <input type="password" name="passwordverif" id="passwordverif" class='espacamento' placeholder="Digite a senha novamente" maxlength=10>
                            <?php
                                    }elseif ($senha!=$verifsenha || !isset($verifsenha)) {
                            ?>
                            <label for="password" class='espacamento'>Password</label>
                            <input type="password" name="password" id="password" class='espacamento' placeholder="Digite uma Senha" maxlength=10>
                            <label for="passwordverif" class='espacamento' id='labelpasswordverif'>Password</label>
                            <input type="password" name="passwordverif" id="passwordverif" style="position: relative; top: 35px; left: -308px" class='espacamento' placeholder="Digite a senha novamente" maxlength=10>
                            <p class='aviso' id='avisosenhaverif'>As senhas digitadas diferem.</p>
                            <?php
                                    }else{
                            ?>
                            <label for="password" class='espacamento'>Password</label>
                            <input type="password" name="password" id="password" class='espacamento' style='margin-right:300px;' value='<?php echo $senha ?>'>

                            <label for="passwordverif" class='espacamento' >Password</label>
                            <input type="password" name="passwordverif" id="passwordverif" class='espacamento' value='<?php echo $verifsenha ?>'>
                            <?php
                                    }
                            ?>
                            <p class='espacamento'>Data de nascimento</p>
                            <?php
                                    if(!isset($dia) || $dia=="Dia" || !isset($mes) || $mes=="Mês" || !isset($ano) || $ano=="Ano"){
                            ?>
                            <select name="Dia" class='espacamento'>
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
                            <select name="Mês" class='espacamento'>
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
                            <select name="Ano" class='espacamento'>
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
                            <p class='aviso' id='avisonascimento'>Indique corretamente sua data de nascimento.</p>
                            <?php
                                    }else{
                            ?>
                            <select name="Dia" class='espacamento'>
                                <option value="Dia">Dia</option>
                                <option value="01" <?php if ($dia == '01'){echo "selected";}?>>01</option>
                                <option value="02" <?php if ($dia == '02'){echo "selected";}?>>02</option>
                                <option value="03" <?php if ($dia == '03'){echo "selected";}?>>03</option>
                                <option value="04" <?php if ($dia == '04'){echo "selected";}?>>04</option>     
                                <option value="05" <?php if ($dia == '05'){echo "selected";}?>>05</option> 
                                <option value="06" <?php if ($dia == '06'){echo "selected";}?>>06</option>
                                <option value="07" <?php if ($dia == '07'){echo "selected";}?>>07</option>
                                <option value="08" <?php if ($dia == '08'){echo "selected";}?>>08</option>
                                <option value="09" <?php if ($dia == '09'){echo "selected";}?>>09</option>
                                <option value="10" <?php if ($dia == '10'){echo "selected";}?>>10</option>
                                <option value="11" <?php if ($dia == '11'){echo "selected";}?>>11</option>
                                <option value="12" <?php if ($dia == '12'){echo "selected";}?>>12</option>
                                <option value="13" <?php if ($dia == '13'){echo "selected";}?>>13</option>
                                <option value="14" <?php if ($dia == '14'){echo "selected";}?>>14</option>
                                <option value="15" <?php if ($dia == '15'){echo "selected";}?>>15</option>
                                <option value="16" <?php if ($dia == '16'){echo "selected";}?>>16</option>
                                <option value="17" <?php if ($dia == '17'){echo "selected";}?>>17</option>
                                <option value="18" <?php if ($dia == '18'){echo "selected";}?>>18</option>
                                <option value="19" <?php if ($dia == '19'){echo "selected";}?>>19</option>
                                <option value="20" <?php if ($dia == '20'){echo "selected";}?>>20</option>
                                <option value="21" <?php if ($dia == '21'){echo "selected";}?>>21</option>
                                <option value="22" <?php if ($dia == '22'){echo "selected";}?>>22</option>
                                <option value="23" <?php if ($dia == '23'){echo "selected";}?>>23</option>
                                <option value="24" <?php if ($dia == '24'){echo "selected";}?>>24</option>
                                <option value="25" <?php if ($dia == '25'){echo "selected";}?>>25</option>
                                <option value="26" <?php if ($dia == '26'){echo "selected";}?>>26</option>
                                <option value="27" <?php if ($dia == '27'){echo "selected";}?>>27</option>
                                <option value="28" <?php if ($dia == '28'){echo "selected";}?>>28</option>
                                <option value="29" <?php if ($dia == '29'){echo "selected";}?>>29</option>
                                <option value="30" <?php if ($dia == '30'){echo "selected";}?>>30</option>
                                <option value="31" <?php if ($dia == '31'){echo "selected";}?>>31</option>
                            </select> 
                            <select name="Mês" class='espacamento'>
                                <option value="Mês">Mês</option>
                                <option value="Jan" <?php if ($mes == 'Jan'){echo "selected";}?>>Jan</option>
                                <option value="Fev" <?php if ($mes == 'Fev'){echo "selected";}?>>Fev</option>
                                <option value="Mar" <?php if ($mes == 'Mar'){echo "selected";}?>>Mar</option>
                                <option value="Abr" <?php if ($mes == 'Abr'){echo "selected";}?>>Abr</option>     
                                <option value="Maio" <?php if ($mes == 'Maio'){echo "selected";}?>>Maio</option> 
                                <option value="Jun" <?php if ($mes == 'Jun'){echo "selected";}?>>Jun</option>
                                <option value="Jul" <?php if ($mes == 'Jul'){echo "selected";}?>>Jul</option>
                                <option value="Ago" <?php if ($mes == 'Ago'){echo "selected";}?>>Ago</option>
                                <option value="Set" <?php if ($mes == 'Set'){echo "selected";}?>>Set</option>
                                <option value="Out" <?php if ($mes == 'Out'){echo "selected";}?>>Out</option>
                                <option value="Nov" <?php if ($mes == 'Nov'){echo "selected";}?>>Nov</option>
                                <option value="Dez" <?php if ($mes == 'Dez'){echo "selected";}?>>Dez</option>
                            </select> 
                            <select name="Ano" class='espacamento' style='margin-right:450px;'>
                                <option value="Ano">Ano</option>
                                <option value="2016" <?php if ($ano == '2016'){echo "selected";}?>>2016</option>
                                <option value="2015" <?php if ($ano == '2015'){echo "selected";}?>>2015</option>
                                <option value="2014" <?php if ($ano == '2014'){echo "selected";}?>>2014</option>
                                <option value="2013" <?php if ($ano == '2013'){echo "selected";}?>>2013</option>
                                <option value="2012" <?php if ($ano == '2012'){echo "selected";}?>>2012</option>
                                <option value="2011" <?php if ($ano == '2011'){echo "selected";}?>>2011</option>
                                <option value="2010" <?php if ($ano == '2010'){echo "selected";}?>>2010</option>
                                <option value="2009" <?php if ($ano == '2009'){echo "selected";}?>>2009</option>
                                <option value="2008" <?php if ($ano == '2008'){echo "selected";}?>>2008</option>
                                <option value="2007" <?php if ($ano == '2007'){echo "selected";}?>>2007</option>
                                <option value="2006" <?php if ($ano == '2006'){echo "selected";}?>>2006</option>
                                <option value="2005" <?php if ($ano == '2005'){echo "selected";}?>>2005</option>
                                <option value="2004" <?php if ($ano == '2004'){echo "selected";}?>>2004</option>
                                <option value="2003" <?php if ($ano == '2003'){echo "selected";}?>>2003</option>
                                <option value="2002" <?php if ($ano == '2002'){echo "selected";}?>>2002</option>
                                <option value="2001" <?php if ($ano == '2001'){echo "selected";}?>>2001</option>
                                <option value="2000" <?php if ($ano == '2000'){echo "selected";}?>>2000</option>
                                <option value="1999" <?php if ($ano == '1999'){echo "selected";}?>>1999</option>
                                <option value="1998" <?php if ($ano == '1998'){echo "selected";}?>>1998</option>
                                <option value="1997" <?php if ($ano == '1997'){echo "selected";}?>>1997</option>
                                <option value="1996" <?php if ($ano == '1996'){echo "selected";}?>>1996</option>
                                <option value="1995" <?php if ($ano == '1995'){echo "selected";}?>>1995</option>
                                <option value="1994" <?php if ($ano == '1994'){echo "selected";}?>>1994</option>
                                <option value="1993" <?php if ($ano == '1993'){echo "selected";}?>>1993</option>
                                <option value="1992" <?php if ($ano == '1992'){echo "selected";}?>>1992</option>
                                <option value="1991" <?php if ($ano == '1991'){echo "selected";}?>>1991</option>
                                <option value="1990" <?php if ($ano == '1990'){echo "selected";}?>>1990</option>
                                <option value="1989" <?php if ($ano == '1989'){echo "selected";}?>>1989</option>
                                <option value="1988" <?php if ($ano == '1988'){echo "selected";}?>>1988</option>
                                <option value="1987" <?php if ($ano == '1987'){echo "selected";}?>>1987</option>
                                <option value="1986" <?php if ($ano == '1986'){echo "selected";}?>>1986</option>
                                <option value="1985" <?php if ($ano == '1985'){echo "selected";}?>>1985</option>
                                <option value="1984" <?php if ($ano == '1984'){echo "selected";}?>>1984</option>
                                <option value="1983" <?php if ($ano == '1983'){echo "selected";}?>>1983</option>
                                <option value="1982" <?php if ($ano == '1982'){echo "selected";}?>>1982</option>
                                <option value="1981" <?php if ($ano == '1981'){echo "selected";}?>>1981</option>
                                <option value="1980" <?php if ($ano == '1980'){echo "selected";}?>>1980</option>
                            </select> 
                            <?php
                                    }
                            ?>
                            <?php
                                    if(!isset($sexo)){
                            ?>
                            <input type="radio" id="masculino" class='espacamento' name="sexo" value="masculino"> 
                            <label for="masculino" class='espacamento'> Masculino</label>    
                                
                            <input type="radio" id="feminino" name="sexo" class='espacamento' value="feminino">
                            <label for="feminino" class='espacamento'> Feminino</label>
                            
                            <p class='aviso' id='avisosexo'>Preencha este campo</p>
                            <?php
                                    }else{
                            ?>
                            <input type="radio" id="masculino" class='espacamento' name="sexo" value="masculino" <?php if($sexo=="masculino"){echo "checked";} ?>> 
                            <label for="masculino" class='espacamento'> Masculino</label>    
                                
                            <input type="radio" id="feminino" name="sexo" class='espacamento' value="feminino" <?php if($sexo=="feminino"){echo "checked";} ?>>
                            <label for="feminino" class='espacamento' style='margin-right:350px;'> Feminino</label>
                            <?php
                                    }
                            ?> 
                              
                            <?php
                                    if(!isset($termos)){
                            ?>           
                            <input type="checkbox" id="marqueaqui" name="marqueaqui" class='espacamento'>
                            <label for="marqueaqui" class='espacamento'>Concordo com os Termos de Uso e Política de Privacidade.</label> 
                            <p class='aviso' style='margin-bottom:20px;'>Você deve marcar essa caixa.</p>
                            <?php
                                    }else{
                            ?>            
                            <input type="checkbox" id="marqueaqui" name="marqueaqui" class='espacamento' <?php if (isset($termos)) echo "checked" ?>>
                            <label for="marqueaqui" class='espacamento'>Concordo com os Termos de Uso e Política de Privacidade.</label>      
                            <?php
                                    }
                            ?>
                               
                            <p class='espacamento'>Clique em cadastrar-se para finalizar o cadastro</p>     
                            <input type="submit" value="Cadastre-se" name='cadastrar' id="cadastro1" class='espacamento'>
                        </form> 
                    </div>        
                </article>
            </body>
            </html>
    <?php
        }else{
            include "cadastro_banco.php";
            mysqli_close($conexao);
        }
    }
    ?>