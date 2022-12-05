<?php
session_start();
require_once('includes/functions.php');

$sto_id = $_GET['sto_id'];

$req = getDb()->prepare("select * from stories where story_id=?");
$req->execute(array($sto_id));
$story = $req->fetch();
if($story['displayStory'] == 1){
    $modif = getDb()->prepare("update stories set displayStory=? where story_id=?");
    try {
        $modif->execute(array(0, $sto_id));
    } catch(Exception $e) {
        $e->getMessage();
    }

    echo $story['displayStory'];

} else {
    $modif = getDb()->prepare("update stories set displayStory=? where story_id=?");
    try{
        $modif->execute(array(1, $sto_id));
    } catch(Exception $e){
        $e->getMessage();
    }
}

header("Location:index.php");

?>