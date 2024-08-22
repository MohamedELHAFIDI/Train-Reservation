<?php
include_once 'Dataaccess.php';
/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of Tbillet
 *
 * @author pc
 */
class Tbillet {
    // 1-methode check credit carte :
    
      public static function checkcreditcard($nom,$num,$anne,$mois,$crypto)
    {
       $req="select * from Cartebancaire where num_carte='$num' and "
              . "detenteur ='$nom' and anneeexp='$anne' and moisexp='$mois' and "
              . "crypto ='$crypto'";
     $cur=  Dataaccess::selection("select * from Cartebancaire where numcarte='$num' and "
              . "detenteur ='$nom' and anneeexp='$anne' and moisexp='$mois' and "
              . "crypto ='$crypto' ");
      
      
        $nbr=    $cur->rowCount();
        return $nbr;
   
    }
    
    //2- save billet
    
    
    
    public static function savebillet($cv,$db,$email)
    {
        $req="insert into billet(codevoyage,datebillet,email) values('$cv','$db','$email')";
   
        
     $n=   Dataaccess::miseajour($req);
        
        return $n;
    }
    
    
    
}
