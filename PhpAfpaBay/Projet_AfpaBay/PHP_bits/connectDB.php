<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
  
            
                    

            try
        {
            $bdd = new PDO('mysql:host=localhost;dbname=afpabase;charset=utf8', 'root', 'TX489Idiots');
            $bdd ->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_WARNING);
        }catch (Exception $e)
        {
        die('Erreur : ' . $e->getMessage( ));}








?>