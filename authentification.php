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
        <h1>Authentification :</h1>
        
        <form action="authentification.php" method="POST">
            Email : <input type="email" name="email" value="" />
            <br><br>
             
            Password :<input type="password" name="password" value="" />
            <br><br>
             
            
             
           
           <input type="submit" value="Authentification" name="actionauth" />
           <input type="reset" value="Annuler" />
        </form>
        <?php
        include_once 'Tvoyageur.php';
        if(isset($_POST['actionauth'])){
            $email=$_POST['email'];
            $pass=$_POST['password'];
            
            $n=Tvoyageur::authentification($email, $pass);
            if($n!=0){
                session_start();
                $_SESSION['slog']=$email;
                ?>
                <script>
                window.location='reservation.php';
                </script>
                <?php
            }else{
                echo "<h1 style='color: red'>login ou pass incorrect !!</h1>";
            }
            }
        ?>
    </body>
</html>
