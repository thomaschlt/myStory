<?php 
session_start();
require_once('includes/function.php');
include('story.php');

$req = "select * from choix where usr_id=? and story_id";
$prep = getDb()->prepare($req);
$prep = execute(array($_SESSION['id_user'],  $_SESSION['sto_id']));

//déjà un chemin pour cette histoire
if($prep->rowCount()==0){
    $verif = "insert into `choix`(story_id, usr_id, id_lastParagraph) values (?,?,?)";
    $prep = getDb()->prepare($verif);
    $prep->execute(array($_SESSION['sto_id'], $_SESSION['id_user'], $sce_id));
}
else {
    $ligne = $prep->fetch();
    if($ligne['id_lastParagraph'] != $sce_id){

        }
    }

?>