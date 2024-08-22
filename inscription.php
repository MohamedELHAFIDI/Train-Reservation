<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
<html>
    <head>
        <meta charset="UTF-8">
        <title></title>
    </head>
    <body>
        <?php
        // put your code here
        ?>
          <h1>Inscription :</h1>
        <form action="inscription.php" method="POST">
            Email : <input type="email" name="email" value="" />
            <br><br>
             
            Password :<input type="password" name="password" value="" />
            <br><br>
             
            Nom :<input type="text" name="nom" value="" />
            
           <br><br>
             
           Prenom :<input type="text" name="prenom" value="" />
           <br><br>
             
           Date naissance :<input type="date" name="dn" value="" />
           <br><br>
             
           Telephone :<input type="text" name="tele" value="" />
           <br><br>
           <input type="submit" value="Inscription" name="actioninscription" />
           <input type="reset" value="Annuler" />
        </form>
        <?php
        include_once 'Tvoyageur.php';
        if(isset($_POST['actioninscription'])){
            $email=$_POST['email'];
            $pass=$_POST['password'];
            $nom=$_POST['nom'];
            $prenom=$_POST['prenom'];
            $dn=$_POST['dn'];
            $telephone=$_POST['tele'];
            $n= Tvoyageur::inscription($email, $pass, $nom, $prenom, $dn, $telephone);
            if($n!=0){
                echo 'Merci de votre inscription !!';
            }
            }
        ?>
        </body>
</html>
