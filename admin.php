<!DOCTYPE html>
<html>
    <head>
        <title>Petnet - Administrador</title>
        <meta charset="utf-8">
        <meta name="author" content="Nicholas Ken Ywahara 31606954">
        <meta name="author" content="Osniel Lopes Teixeira - TIA 316.1940-1"/>
        <link href="https://fonts.googleapis.com/css?family=Poppins" rel="stylesheet">
        <link rel="stylesheet" href="admin.css" type="text/css" />
    </head>
    <body>
        <header>
            <a href="https://petnet-osniel.c9users.io/login.php" id="petnet">PetNet</a>
            <form>
                <input type="text" name="pesquise" id="pesquise" placeholder="Pesquisar"/>
            </form>
        </header>
        <section>
            <p id="head">Avaliações pendentes</p>
            <?php include "article_admin.php" ?>
            <?php include "article_admin.php" ?>
            <?php include "article_admin.php" ?>
            <?php include "article_admin.php" ?>
            <?php include "article_admin.php" ?>
            <?php include "article_admin.php" ?>
            <?php include "article_admin.php" ?>
        </section>
    </body>
</html>