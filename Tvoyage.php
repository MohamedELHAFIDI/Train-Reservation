<?php
include_once 'Dataaccess.php';
/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of Tvoyage
 *
 * @author pc
 */
class Tvoyage {
    // methode 1 charger ville depart :
    public static function chargervd(){
       $req="select distinct(villedepart) from voyage "; 
       $cur=Dataaccess::selection($req);
       
       return $cur;
   
    }
    // methode 2 charger ville d'arrivée :
    public static function chargerva(){
       $req="select distinct(villearrivee) from voyage "; 
       $cur=Dataaccess::selection($req);
       
       return $cur;
   
    }
    //3 methode rechercher par ville:
    public static function trajetParVille($vd,$va){
       $req="select * from voyage where villedepart ='$vd' and villearrivee='$va'"; 
       $cur=Dataaccess::selection($req);
       
       return $cur;
   
    }
    //4 methode getprix :
    public static function getprix($cv){
       $req="select prixvoyage from voyage where codevoyage ='$cv'"; 
       $cur=Dataaccess::selection($req);
       $prix=0;
       while ($row = $cur->fetch()) {
                    $prix=$row[0];
                }
                $cur->closeCursor();
       return $prix;
   
    }
}
