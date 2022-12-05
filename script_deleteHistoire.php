<?php
session_start();
require_once('includes/functions.php');

$idStory = $_GET['sto_id'];
//solution
$delete = getDb()->prepare("delete from solution where story_id=?");
$delete->execute(array($idStory));
//scenario
$delete = getDb()->prepare("delete from scenario where story_id=?");
$delete->execute(array($idStory));
//stories
$delete = getDb()->prepare("delete from stories where story_id=?");
$delete->execute(array($idStory));

header("Location:index.php#slider-container");

