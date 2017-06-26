<?php session_start() ?>
<!DOCTYPE html>
<html>
    <?php 
        $titre= $_GET["titre"];
        $_SESSION['edit_titre'] = $titre;
        $bdd = new PDO('mysql:host=localhost;dbname=filmbay;charset=utf8', 'root', 'mvb94');
        $infos_films = $bdd->prepare('SELECT * FROM film WHERE titre = ?');
        $infos_films->execute(array($titre));
        $donnees = $infos_films->fetch();
    ?>
    <head>
        <title>film details</title>
        <meta charset="UTF-8">
        <link rel="stylesheet" href="stylefilm.css"/>
        <link rel="stylesheet" href="bootstrap/css/bootstrap.css"/>
    </head>                 
    <?php include 'BayHeader.php'; ?>
    <body>
        <main class=" container-fluid col-xs-8 col-xs-offset-2">
            <div id="entete" class="container-fluid row ">
                <div id='img' class="col-xs-4"><img src=<?php echo $donnees['lienimage'];?>></div>
                <div id='titre' class="col-xs-8"><?php echo $donnees['titre'] ?></div>
            </div>
            
            <div id="details" class="row container-fluid">
                
                    <div id="desc" class="col-xs-4">
                        <span>
                        <?php echo $donnees['realisateur'].'<br>';
                          echo $donnees['année'].'<br>';
                          echo $donnees['acteurs'];
                            ?>
                        </span>
                        <div class="col-xs-12" id='lien'>LIEN ALLOCINE</div>
                    </div>
                
                <div id='synopsis' class="col-xs-8">
                Combining AND, OR and NOT

You can also combine the AND, OR and NOT operators.

The following SQL statement selects all fields from "Customers" where country is "Germany" AND city must be "Berlin" OR "München" (use parenthesis to form complex expressioeee eeeeeeeeeee eeeeeeeee eeee eeeeeeeeeeeeeeeee eeeeeeeeee eeeeeeeeeeee eeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeee eeeeeeeeeee eeeeeeeeeee eeeeeeeeeee eeeeeeeee eeeeeeee eeeeeeeeeeens):
                </div>
            </div>
        </main>
        <?php echo 'modifFilm.php?titre='.$titre; ?>
       
        
    </body>
    <div class="row col-xs-12"><?php echo '<a href ="modifFilm.php?titre='.$titre.'"> modifications sur le film enculé</a>'; ?></div>
    <div class="row col-xs-12"><a href="filmk.php">Cliquez ici pour retourner au menu principal</a></div>
    <?php include 'BayFooter.php'; ?>
</html>

