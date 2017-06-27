<?php 
session_start();
include 'PHP_bits/toumou.php';
$loginpage = new Login;
?>
<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
<html>
    <?php
    $loginpage->Register();
    ?>
    <head>
        <meta charset="UTF-8">
        <title>Login page</title>
        <link rel="stylesheet" href="bootstrap/css/bootstrap.css"/>
    </head>
    <?php include 'PHP_bits/BayHeader.php'; ?>
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
         $loginpage->sign_in();
        ?>
    </body>
    <?php include 'PHP_bits/BayFooter.php' ?>   
</html>
