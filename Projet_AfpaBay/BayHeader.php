
<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->

<header class="col-xs-12">
    <div id="divtitre_header" class="">
        <h1 class="">AFPA-Bay ! <?php if (isset($_SESSION['ID'])) {
                                echo '('.$_SESSION['ID'].')';} ?>
        </h1>
    </div>
    <div id="divtitre_logo">
        <img src="logo.jpeg">
    </div>
</header>
    