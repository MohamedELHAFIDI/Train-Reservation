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
    <body> <?php
        include_once 'Tvoyage.php';
        include_once 'Tbillet.php';
        session_start();
        if(empty($_SESSION['slog'])){
            ?>
                <script>
                window.location='authentification.php';
                </script>
                <?php
        }
        $code=$_POST['cv'];
        $dateb=$_POST['db'];
        $nbrp=$_POST['nbrp'];
        $email=$_SESSION['slog'];
        $prix= Tvoyage::getprix($code);
        $total=$prix * $nbrp;
        
        ?>
                <h1>Paiement : </h1>
                  <br>  <br>
                <h2>Total : <?=$total?> / date :<?=$dateb?> nombre de billets :<?=$nbrp?> code voyage <?=$code?></h2>
       <form method="POST" action="facture.php?cv=<?=$code?>&np=<?=$nbrp?>&db=<?=$dateb?>&email=<?=$email?>" >
		<input type="text" name="nom" placeholder="Détenteur de la carte" required />
				<input type="text" name="numero" placeholder="Numéro de la carte" required />
						
                    	
                                <span> Année d'expiration :  </span>
                                <select name="annee">
                                       <?php 
                                            for ($i = 2020; $i <=2030; $i++)
                                            {
                                                echo "<option value='$i'>$i</option>";   
                                            }
                                       ?>
                                    
                                        
                                     </select> 
                                <span style="margin-left: 100"> Mois: </span> 
                                <select name="mois">
                                <?php 
                                            for ($i = 1; $i <=12; $i++)
                                            {
                                                echo "<option value='$i'>$i</option>";   
                                            }
                                       ?>
                                </select>               
                         
      <input type="text" name="crypto" placeholder="Cryptogramme" required />
	   <button type="submit" name="validate">Valider</button>
			
     
     </form>
  
    </body>
</html>
