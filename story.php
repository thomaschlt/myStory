<?php
session_start();
require_once "includes/functions.php";


$sto_id=$_GET['sto_id'];
$sce_id=$_GET['sce_id'];


$stht = getDb()->prepare("select * from stories where story_id=?");
$stht->execute(array($sto_id));
$story = $stht->fetch();

$smth = getDb()->prepare("select * from scenario where story_id=? && scenario_id=?");
$smth->execute(array($sto_id, $sce_id));
$scenario = $smth->fetch();


$slt = getDb()->prepare("select * from solution where story_id=? && solution_id=?");
$slt->execute(array($sto_id, $scenario['solution1']));
$solution1 = $slt->fetch();

$sltt = getDb()->prepare("select * from solution where story_id=? and solution_id=?");
$sltt->execute(array($sto_id, $scenario['solution2']));
$solution2 = $sltt->fetch();

if(!isset($_SESSION['gameStart'])){
    $_SESSION['gameStart'] = 'start';
    $req = getDb()->prepare("update stories set stats_played=? where story_id=?");
    try{
        $req->execute(array($story['stats_played']+1, $sto_id));
    } catch(Exception $e){
        $e->getMessage();
    }
}
if(!isset($_SESSION['gameWin'])){
    $_SESSION['gameWin'] = 'win';
    $req = getDb()->prepare("update stories set stats_win=? where story_id=?");
    try{
        $req->execute(array($story['stats_win']+1, $sto_id));
    } catch (Exception $e){
        $e->getMessage();
    }
}
if(!isset($_SESSION['gameLose'])){
    $_SESSION['gameLose'] = 'lose';
    $req = getDb()->prepare("update stories set stats_death=? where story_id=?");
    try{
        $req->execute(array($story['stats_death']+1, $sto_id));
    } catch (Exception $e){
        $e->getMessage();
    }
}
?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style/styleT.css">
    <link rel="stylesheet" href="style/story.css">
    <title>aStory</title>
</head>
<body>
    <div class="container">
        <h1 class="sto-title"><?= $story['story_title']?></h1>
        <div class="scenario">
            <p><?=$scenario['scenario_text']?></p>
        </div>
        <div class="question">
            <p><?=$scenario['scenario_question']?></p>
        </div>
        <?php if($scenario['solution1'] != 0 && $scenario['solution2'] != 0){ 
            if($scenario['scenario_question'] == "victoire"){
                unset($_SESSION['gameWin']);
            } elseif($scenario['scenario_question'] == "défaite"){
                unset($_SESSION['gameLose']);
            }
            ?>
        <div class="button-container">
        <form action="story.php" method="GET">
            <div>
                <button class="button1" type="submit">
                    <?=$solution1['solution_text']?>
                    <input type="hidden" name="sto_id" value="<?=$sto_id?>">
                    <input type="hidden" name="sce_id" value="<?=$solution1['continuation']?>">
                </button>
            </div>
        </form>

        <form action="story.php" method="GET">
            <div>
                <button class="button2" type="submit">
                    <?=$solution2['solution_text']?>
                    <input type="hidden" name="sto_id" value="<?=$sto_id?>">
                    <input type="hidden" name="sce_id" value="<?=$solution2['continuation']?>">
                </button>
            </div>
        </form>
        </div>
        <?php } else { 
            unset($_SESSION['gameStart']);?>
            <a href="index.php#slider-container"><button class="choice">Voir un résumé de mes choix</button></a>
        <?php }?>
    </div>
</body>
</html>