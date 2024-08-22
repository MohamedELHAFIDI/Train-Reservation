<?php
ob_start();// 1------debut du flux à convertir
include('html2pdf/html2pdf.class.php');
    $cv=$_GET['cv'];
    $db=$_GET['db'];
    $nbp=$_GET['np'];
    $email=$_GET['email'];
 // impression des billets :
      for ($i = 1; $i<= $nbp; $i++) 
      
      {
           echo "  <h1>Billet :  $i </h1>";
  
           echo "  <h2>Voyage  :  $cv </h2>";
           
           echo "  <h3>date voyage   :  $db </h3>";
          
          echo " <hr>";  
     }
 $content=ob_get_clean();                 // 2--------fin du flux HTML
 $html2pdf = new HTML2PDF('P','A4','fr');   // 3---instancier un objet HTML2PDF
 $html2pdf->WriteHTML($content);         // 4---ecriture du contenu 
 $html2pdf->Output('billet.pdf');       // 5-generer le fichier PDF

        

