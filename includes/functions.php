<?php
function getDb(){
    $host = "xxx";
    $dbname = "xxx";
    $username = "xxx";
    $password = "xxx";

   try {
       $bdd = new PDO("mysql:host=" . $host .";dbname=".$dbname.";charset=utf8",$username,$password);
   } catch(Exception $e){
       die("Erreur : " . $e->getMessage());
   }
   return $bdd;
}

function userIsConnected(){
    return isset($_SESSION['login']);
}

function userIsAdmin(){
    if($_SESSION['is_admin']==1){
        return true;
    } else {
        return false;
    }
    
}
//test si le pseudo existe déjà ou pas
function notExists($login){
    $req = "SELECT * FROM `utilisateur` WHERE login=:unlogin";
    $res = $BDD->prepare($req);
    $res->execute(array(
        "unlogin" => $login
        )
    );
    $num=$res->rowCount();
    if($num=0){
        return true;
    }
    return false;
}