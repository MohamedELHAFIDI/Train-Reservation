<?php
include_once 'Dataaccess.php';
/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of Tvoyageur
 *
 * @author pc
 */
class Tvoyageur {
    //1-methode inscription:
    
    public static function inscription($email,$pass,$nom,$prenom,$dn,$telephone){
       $req="insert into voyageur values('$email','$pass','$nom','$prenom','$dn','$telephone')"; 
       $n=Dataaccess::miseajour($req);
       return $n;
   
    }
     //2-methode authentification:
    public static function authentification($email,$pass){
       $req="select * from voyageur where email='$email' and password='$pass' "; 
       $cur=Dataaccess::selection($req);
       $n=$cur->rowCount();
       return $n;
   
    }
    
}
