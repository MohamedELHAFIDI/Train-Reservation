<?php
include_once 'Tbillet.php';
     $nom=$_POST['nom'];
     $numc=$_POST['numero'];
     $anneexp=$_POST['annee'];
     $moisexp=$_POST['mois'];
     $crypto=$_POST['crypto'];
    $v= Tbillet::checkcreditcard($nom, $numc, $anneexp, $moisexp, $crypto);
    // carte valide $v !=0
    if($v!=0)
    {
    $cv=$_GET['cv'];
    $db=$_GET['db'];
    $nbp=$_GET['np'];
    $email=$_GET['email'];
    $n=0;
    for ($i = 0; $i< $nbp; $i++) {
    $n+= Tbillet::savebillet($cv, $db, $email) ;   
    }
   // if($n==$nbp)
  //  {
        
  header("location:pdf.php?cv=$cv&np=$nbp&db=$db&email=$email");
      
                             
   // }
    }
    else{
        echo 'invalide card !!!';
    }