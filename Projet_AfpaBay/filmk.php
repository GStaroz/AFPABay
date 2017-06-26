<?php session_start() ;
if(empty($_SESSION['ID'])){ header('Location: Baylogin.php');}
?>
<!DOCTYPE html>
<html>
    <?php
    try
        {
        $bdd = new PDO('mysql:host=localhost;dbname=filmbay;charset=utf8', 'root', 'mvb94');
        $reponse = $bdd->query('SELECT * from film');
        $i = 1;
        }catch (Exception $e)
        {
        die('Erreur : ' . $e->getMessage( ));}
    ?>
    <head>
        <title>AFPA bays tests</title>
        <meta charset="UTF-8">
        <link rel="stylesheet" href="bootstrap/css/bootstrap.css"/>
        <link rel="stylesheet" href="stylefilm.css"/>
    </head>
    <?php include 'BayHeader.php'; ?>
    <body class="">
        <div class="recherche col-xs-12">
            <?php 
            $filtre = filter_input(INPUT_GET, 'recherche', FILTER_SANITIZE_STRING);
            if ($filtre){
                $bob = $bdd->prepare('SELECT * FROM film WHERE titre LIKE :recherche');
                $bob->bindValue(':recherche', '%'.$filtre.'%', PDO::PARAM_STR);
                $bob ->execute();    
            }else {
                $bob = $bdd->query('SELECT * FROM film');
            }
            ?>
            <form>
                <div class="input-group col-xs-4 col-xs-offset-8">
                    <input type="text" class="form-control" placeholder="Recherche" name="recherche" value=<?php echo $filtre ?>/>
                  <div class="input-group-btn">
                    <button class="btn btn-default" type="submit">
                      <i class="glyphicon glyphicon-search"></i>
                    </button>
                      
                  </div>
                </div>
            </form> 
        </div>
        
        <div id="main">
            <div id="ul">
                <div class="list-group">
                    <?php
                        if ($bob){ $reponse = $bob;}
                        while ($donnees = $reponse->fetch(PDO::FETCH_ASSOC))
                            { 
                            echo'<a href="filmDetail.php?titre='.$donnees["titre"].'"class="list-group-item col-xs-6 col-lg-3 col-md-6"> <div class="datacontainer col-xs-6 col-lg-6 col-md-6">'.$donnees["titre"].'</div><div class = "datacontainer col-xs-6 col-lg-6 col-md-6"> '.$donnees['année'].'</div></a>';  
                            
                            }
                            echo '</div>';
                    ?>
                
            </div>
            </div>
            <div class="col-xs-12"> <a href="ajoutFilm.php">Cliquez ici pour ajouter un film</a></div>
    </body>
    <?php include 'BayFooter.php'; ?>
</html>
