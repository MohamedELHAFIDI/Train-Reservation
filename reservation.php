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
        include_once 'Tvoyage.php';
        session_start();
        if(empty($_SESSION['slog'])){
            ?>
                <script>
                window.location='authentification.php';
                </script>
                <?php
        }
        ?>
                  <h1>Reservation En ligne  :</h1>
                <form action="reservation.php" method="POST">
            Ville de depart : <select name="vd">
                <?php
                $cur1= Tvoyage::chargervd();
                while ($row = $cur1->fetch()) {
                    echo"<option value='$row[0]'>$row[0]</option>";
                }
                $cur1->closeCursor();
                ?>
            </select>
            <br><br>
             
            Ville d'arrivée :<select name="va">
                <?php
                $cur2= Tvoyage::chargerva();
                while ($row = $cur2->fetch()) {
                    echo"<option value='$row[0]'>$row[0]</option>";
                }
                $cur2->closeCursor();
                ?>
            </select>
            <br><br>
             
            
             
           
           <input type="submit" value="Rechercher" name="actionrechercher" />
           
        </form>
        <?php
        if(isset($_POST['actionrechercher'])){
            $vd=$_POST['vd'];
            $va=$_POST['va'];
            $cur3= Tvoyage::trajetParVille($vd, $va);
            $n=$cur3->rowCount();
            if($n!=0){
                echo "<table border='2'>";
                echo "<tr>";
                echo "<th>Code</th>";
                echo "<th>Hdepart</th>";
                echo "<th>Vdepart</th>";
                echo "<th>Harrivée</th>";
                echo "<th>Varrivée</th>";
                echo "<th>prix</th>";
                echo "<th>reservation</th>";
                echo "</tr>";
                while ($row = $cur3->fetch()) {
                    echo "<tr>";
                    echo "<form action='paiement.php' method='POST'>";
                   
 echo "<td><input type='text' readonly name='cv' value='$row[0]'/></td>";
                    
                    
                    
                    echo "<td>$row[1]</td>";
                    echo "<td>$row[2]</td>";
                    echo "<td>$row[3]</td>";
                    echo "<td>$row[4]</td>";
                    echo "<td>$row[5]</td>";
                    echo "<td>";
                    echo "<input type='date'  name='db' />";
                    echo "<select name='nbrp'>";
                    for ($i = 1; $i <=20; $i++) {
                        echo"<option value='$i'>$i</option>";
                    }
                    echo "</select>";
                    echo "<input type='submit'  name='actionbook' value='reserver' />";
                    echo "</td>";
                    echo "</form>";
                    echo "</tr>";
                }
                $cur3->closeCursor();
                echo "</table>";
            }else{
                echo "PAS DE TRAJET !!";
            }
            }
        ?>
        
    </body>
</html>
