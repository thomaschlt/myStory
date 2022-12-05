<?php
session_start();
require_once('includes/functions.php');

$textS = htmlspecialchars($_POST['textSce']);
$questionS = htmlspecialchars($_POST['questSce']);
$textSol1 = htmlspecialchars($_POST['sol1']);
$textSol2 = htmlspecialchars($_POST['sol2']);


echo $_SESSION['idSol1'];
$modifParagraphe = getDb()->prepare("update scenario set scenario_text=?, scenario_question=?, solution1=?, solution2=? where scenario_id=? && story_id=?");
try{
    $modifParagraphe->execute(array($textS, $questionS, $textSol1, $textSol2, $_SESSION['story_id']));
} catch(Exception $e){
    $e->getMessage();
}

$modifSol1 = getDb()->prepare("update solution set solution_text=?, where scenario_id=? && story_id=?");
try {
    $modifSol1->execute(array($textSol1, $idS,$_SESSION['story_id']));

} catch(Exception $e){
    $e->getMessage();
}

$modifSol2 = getDb()->prepare("update solution set solution_text=? where scenario_id && story_id=?");
try {
    $modifSol2->execute(array($textSol2, $_SESSION['story_id']));

} catch(Exception $e){
    $e->getMessage();
}
?>