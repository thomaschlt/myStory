<?php
session_start();
require_once "includes/functions.php";
$req = getDb()->prepare("select * from scenario where story_id=?");
$req->execute(array($_SESSION['sto_id']));
$scenarios = $req->fetchAll();

$req2 = getDb()->prepare("select * from solution where story_id=?");
$req2->execute(array($_SESSION['sto_id']));
$solutions = $req2->fetchAll();

$continue = true;
if(!isset($_SESSION['cpt'])){
    $_SESSION['cpt'] = 1;
} else {
    $_SESSION['cpt'] = $_SESSION['cpt'] + 1;
    if($_SESSION['cpt'] < count($scenarios)){
        $continue = false;
        echo $_SESSION['cpt'];
    } else {
        echo "salut";
        unset($_SESSION['cpt']); 
    }

}
?>
  <!doctype html>
  <html>
  <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="stylesheet" href="style/styleT.css">
        <link rel="stylesheet" href="style/swiper.min.css">
        <link rel="stylesheet" href="style/addStory.css">
        <title>aStory</title>
    </head>
    <body>
    <div class="container">
    <h1>Modification d'un scénario</h1>
    <h2>Scénario pour l'histoire n°<?=$_SESSION['sto_id']?></h2>
    <form id="form" action="script_modifParagraphe.php" method="POST">
        <label for="sujet">Identifiant du scénario</label>
        <?=$_SESSION['cpt']+1?><br/><br/>

        <label for="scenario">Texte du scénario</label>
        <textarea id="scenario" name="textSce" placeholder="Insérer le scénario" style="height:100px" required><?=$scenarios[$_SESSION['cpt']]['scenario_text']?></textarea>


        <div id="paragrapheSuivant" style="display:block">

            <label for="solution">Question du scénario</label>
            <input type="text" id="question" name="questSce" placeholder="Insérer la question du scénario (ex : Que faire ?)" value="<?=$scenarios[$_SESSION['cpt']]['scenario_question']?>" required>
            <label for="solution">Solution 1</label>
            <input type="text" id="solution1" name="sol1" placeholder="Insérer le texte de la première solution" value=>
            <label for="solution">Solution 2</label>
            <input type="text" id="solution2" name="sol2" placeholder="Insérer le texte de la seconde solution" value="">

        </div>
        
        <?php if($continue == true){ ?>
            <button type="submit" id ="btn" name="suivant" value="Envoyer">Continuer</button>
            
        <?php } ?>
            <a href="index.php#slider-container"><button type="submit" id ="btn" name="finir" value="Finir">Terminer la modification</button></a>
        </form>
    </div>
    </body>
    </html>