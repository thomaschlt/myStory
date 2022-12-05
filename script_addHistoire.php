<?php
session_start();
require_once "includes/functions.php";

if(isset($_POST['ajout'])){
    $title = htmlspecialchars($_POST['sto_title']);
    $author = htmlspecialchars($_POST['sto_author']);
    $yearP = htmlspecialchars($_POST['sto_year']);
    $description = htmlspecialchars($_POST['sto_description']);


    $tmpFile = $_FILES['sto_image']['tmp_name'];
    if (is_uploaded_file($tmpFile)) {
    $image = basename($_FILES['sto_image']['name']);
    $uploadedFile = "images/$image";
    move_uploaded_file($_FILES['sto_image']['tmp_name'], $uploadedFile);
    }

    $req = "INSERT INTO stories(story_title=?, story_description=?, story_writer=?, story_year=?, story_image=?, stats_death=?, stats_played=?, stats_win=?, displayStory=?)";
    $query = getDb()->prepare($req);
    try {
        $query->execute(array($title,$description, $author,$yearP, $image, 0,0,0,1));
    } catch(Exception $e){
        $e->getMessage();
    }

    $idStory = 0;
    $req = "SELECT * FROM stories";
    $resultat = getDb()->query($req);
    $tab = $resultat->fetchAll();
    foreach($tab as $key=>$ligne){
        if($ligne["story_title"] == $_POST['sto_title'] && $ligne["story_description"] == $_POST['sto_description'] && $ligne["story_writer"] == $_POST['sto_author'] && $ligne["story_year"] == $_POST['sto_year']){
            $idStory = $ligne['story_id'];
        }
    }
    $_SESSION["idStory"]=$idStory;
    header("Location:addParagraphe.php");
}