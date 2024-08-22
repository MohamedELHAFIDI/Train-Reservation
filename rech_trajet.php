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
          <h1>Recherche Par Villes :</h1>
        <?php
        // put your code here
        include_once 'Tvoyage.php';
        ?>
        <form action="rech_trajet.php" method="POST">
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
                echo "</tr>";
                while ($row = $cur3->fetch()) {
                    echo "<tr>";
                    for ($i = 0; $i <6; $i++) {
                        echo "<td>$row[$i]</td>";
                    }
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
