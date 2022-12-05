<?php
session_start();
require_once('includes/functions.php');

$title = $_POST['sto_title'];
$description = $_POST['sto_description'];
$author = $_POST['sto_author'];
$year = $_POST['sto_year'];
$image = $_POST['sto_image'];
echo "coucou ta tatatataji";

$modification = getDb()->prepare('UPDATE stories SET story_title=? ,story_description=?,story_writer=?,story_year=?,story_image=? WHERE story_id=?');
$modification->execute(array($title, $description, $author, $year, $image, $_SESSION['sto_id']));

$req = getDb()->prepare('SELECT * FROM users WHERE usr_id=?');
$res = $req->execute(array(1));
$ligne = $res->fetch();
echo $ligne['usr_login'];
//header("Location:modifParagraphe.php");