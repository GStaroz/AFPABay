<?php
session_start();
include 'connectDB.php';
$stmt = $bdd -> prepare ('DELETE FROM film WHERE titre = :titre');
$stmt-> bindValue(':titre', $_SESSION['edit_titre']);
$stmt-> execute();
header('Location: ../filmk.php')
/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

?>