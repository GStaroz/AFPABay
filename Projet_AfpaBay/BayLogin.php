<?php 
session_start();
//$_SESSION['ID']=NULL;
?>
<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
<html>
    <?php
        try
            {
            $bdd = new PDO('mysql:host=localhost;dbname=filmbay;charset=utf8', 'root', 'mvb94');
            $bdd ->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_WARNING);
            }catch (Exception $e)
            {
             die('Erreur : ' . $e->getMessage());}
        if (isset($_POST['newuserID']) AND isset($_POST['newpassword']) AND isset($_POST['newuserage'])){
         $NewID = filter_var($_POST['newuserID'], FILTER_SANITIZE_STRING);
         $NewPW = filter_var($_POST['newpassword'], FILTER_SANITIZE_STRING);
         $cryptedPW = password_hash($NewPW, PASSWORD_BCRYPT);
         
         
         $NewAge = filter_var($_POST['newuserage'],FILTER_SANITIZE_NUMBER_INT);
         
         
         
        if (!empty($NewID) AND !empty($NewPW) AND !empty($NewAge)){
            try {
            $IDexistant = $bdd->prepare('SELECT Identifiant FROM Users WHERE Identifiant = :newID');
            $IDexistant->bindValue(':newID', $NewID);
            $IDexistant->execute();
            $OldID = $IDexistant->fetch();
            echo $OldID['Identifiant'].'<br/>';
            } catch (Exception $ex) {
               die(); 
            }
            if ($NewID !== $OldID['Identifiant']){
                
            $NewInsert = $bdd->prepare('INSERT INTO Users (Identifiant, Password, Age) VALUES (:Identifiant, :Password, :Age)');
            $NewInsert->bindValue(':Identifiant', $NewID, PDO::PARAM_STR);
            $NewInsert->bindValue(':Password', $cryptedPW, PDO::PARAM_STR);
            $NewInsert->bindValue(':Age', $NewAge, PDO::PARAM_INT);
            $NewInsert->execute();
            echo 'utilisateur bien enregistré';
                
            } else { echo 'identifiant deja existant';}
            
            } else { 
                echo 'champs non remplis';
            }
        }
        
           
    ?>
    <head>
        <meta charset="UTF-8">
        <title>Login page</title>
        <link rel="stylesheet" href="bootstrap/css/bootstrap.css"/>
    </head>
    <?php include 'BayHeader.php'; ?>
    <h2 class="h2">Loging Screen</h2>
    <body>
        <div class="">
            <form class="col-xs-offset-4 col-xs-4" method="post" action="BayLogin.php">
                <div class="input-group ">
                    <span class="input-group-addon"><i class="glyphicon glyphicon-user"></i></span>
                    <input type="text" class="form-control" name="ID" placeholder="Identifiant">
                </div>
                <div class="input-group">
                    <span class="input-group-addon"><i class="glyphicon glyphicon-lock"></i></span>
                    <input type="password" class="form-control" name="password" placeholder="mot de passe"> 
                </div>
                <button type="submit" class="btn btn-success btn-lg btn-block"><span class="glyphicon glyphicon-check"></span></button>
            </form>
            <div  class="row container col-xs-offset-3 col-xs-6" id="regformdiv">
                <button id='register' class="col-xs-offset-3 col-xs-6 btn btn-lg btn-warning">Créer un compte utilisateur</button>
                <form method="post" action="BayLogin.php" id="register_form" class="">
                    
                </form>
                <script src="Registerbay.js"></script>
            </div>    
        </div>
        <?php
         if(isset($_POST) && !empty($_POST['ID']) && !empty($_POST['password'])){
             try{
             $stmt = $bdd->prepare('SELECT * FROM Users WHERE Identifiant = :loginid');
             $stmt->bindValue(':loginid', $_POST['ID']);
             $stmt->execute();}
             catch (Exception $e){
             die('Erreur : '.$e->getMessage());
             }
             $donnees = $stmt->fetch(PDO::FETCH_ASSOC);
             $pass = filter_var(FILTER_SANITIZE_STRING, $donnees['Password']);
             if (password_verify($_POST['password'], $donnees['Password'])){
                 $_SESSION['ID'] = $donnees['Identifiant'];
                 $_SESSION['mdp'] = $donnees['Password'];
                 header('Location: filmk.php');
             }else {
                    echo '<p class="col-xs-12">mauvais identifiant ou mot de passe</p>';
                    }
         }else{
          echo'<p class="col-xs-12">Vous avez oublié de remplir un champ.</p>';
             }
            
             
             
        ?>
        
        
    </body>
    
    
</html>
