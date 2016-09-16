<html>
    <head>
        <title>Petnet - Login</title>
        <meta charset="UTF-8">
        <meta name="author" content="Osniel Lopes Teixeira - TIA 316.1940-1">
        <link href="https://fonts.googleapis.com/css?family=Poppins" rel="stylesheet">
        <script type="text/javascript">
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
            document.write("body {");
            document.write(' background:url("' + banner[random] + '");');
            document.write(" }");
            document.write("</style>");
        </script>
        <style type="text/css">
            *{
                color: white;
            }
            body{
                background-size:cover;
            }
            input{
                position: relative;
                left: 600px;
                top: 300px;
            }   
            p{
                position: absolute;
                left: 50%;
                top: 20%;
                margin-left: -80px;
                color: white;
                font-family: 'Poppins', sans-serif;
                font-size: 50px;
            }
            #entrar{
                position: absolute;
                left: 50%;
                top: 30%;
                margin-top: 50px;
                margin-left: -100px;
                width: 200px;
                height: 37px;
                border-radius: 5px;
                background-color: cornflowerblue;
                border: 0px;
            }
            #cadastrar{
                position: absolute;
                left: 50%;
                top: 30%;
                margin-top: 100px;
                margin-left: -100px;
                width: 200px;
                height: 37px;
                border-radius: 5px;
                background-color: lightblue;
                border: 0px;
            }
        </style>
    </head>
    	
<body>
	<p>PetNet</p>  
    <input name="" type="button" value="Entrar" id="entrar">
    <input name="" type="button" value="Cadastrar-se" id="cadastrar">
</body>
</html>