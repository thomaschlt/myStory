<?php
session_start();
require_once "includes/functions.php";

if(isset($_POST['suivant']) || isset($_POST['finir'])){
    //Pour scenario
    $id = htmlspecialchars($_POST['idSce']);
    $text = htmlspecialchars($_POST['textSce']);
    $etat = htmlspecialchars($_POST['suiteSce']);
    $question = htmlspecialchars($_POST['questSce']);
    $idSolution1 = htmlspecialchars($_POST['idSol1']);
    $idSolution2 = htmlspecialchars($_POST['idSol2']);

    //Pour solution
    $solution1 = htmlspecialchars($_POST['sol1']);
    $solution2 = htmlspecialchars($_POST['sol2']);
    $continuation1 = htmlspecialchars($_POST['nextSce1']);
    $continuation2 = htmlspecialchars($_POST['nextSce2']);


    if($etat == "continuer"){
        //insertion du scénario
        $query = getDb()->prepare("insert into `scenario`(story_id, scenario_id, scenario_text, scenario_question, solution1, solution2) values (?,?,?,?,?,?)");
        try {
            $query->execute(array($_SESSION['idStory'], $id, $text, $question, $idSolution1, $idSolution2));
        }
        catch(Exception $e){
            $e->getMessage();
        }
        //insertion de la première proposition
        $req1 = getDb()->prepare("insert into `solution`(story_id, solution_id, solution_text, continuation) values (?,?,?,?)");
        try {
            $req1->execute(array($_SESSION['idStory'], $idSolution1, $solution1, $continuation1));
        } catch(Exception $e){
            $e->getMessage();
        }
        //insertion de la deuxième proposition
        $req2 = getDb()->prepare("insert into `solution`(story_id, solution_id, solution_text, continuation) values (?,?,?,?)");
        try {
            $req2->execute(array($_SESSION['idStory'], $idSolution2, $solution2, $continuation2));
        } catch(Exception $e){
            $e->getMessage();
        }
    }
    else {
        $query = getDb()->prepare("insert into `scenario`(story_id, scenario_id, scenario_text, scenario_question, solution1, solution2) values (?,?,?,?,?,?)");
        try{
            $query->execute(array($_SESSION['idStory'], $id, $text, $etat,0,0));
        }
        catch(Exception $e){
            $e->getMessage();
        }
    }


    if(isset($_POST['suivant'])){
        header("Location:addParagraphe.php");
    }elseif(isset($_POST['finir'])){
        header("Location:index.php#slider-container");
    }
}
?>