<?php
session_start();
require_once "includes/functions.php";
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
    <h1>Ajout d'un scénario</h1>
    <h2>Scénario pour l'histoire n°<?=$_SESSION['idStory']?></h2>
    <form id="form" action="script_addParagraphe.php" method="POST">

        <label for="sujet">Identifiant du scénario</label>
        <input type="number" id="idScenario" name="idSce" placeholder="Insérer l'identifiant du scénario" required>

        <label for="scenario">Texte du scénario</label>
        <textarea id="scenario" name="textSce" placeholder="Insérer le scénario" style="height:100px" required></textarea>

        <label for="suite">Etat du scénario</label>
        <select id="list" name="suiteSce" required>
            <option value="continuer">Continuer</option>
            <option value="victoire">Victoire</option>
            <option value="défaite">Défaite</option>
        </select>


        <div id="paragrapheSuivant" style="display:block">

            <label for="solution">Question du scénario</label>
            <input type="text" id="question" name="questSce" placeholder="Insérer la question du scénario (ex : Que faire ?)">

            <label for="solution">Solution 1</label>
            <input type="number" id="idSolution1" name="idSol1" placeholder="Insérer l'id. de la première solution">
            <input type="text" id="solution1" name="sol1" placeholder="Insérer le texte de la première solution">
            <input type="number" id="idNextScenario1" name="nextSce1" placeholder="Insérer l'id. du prochain scénario (i.e celui qui viendra après)">


            <label for="solution">Solution 2</label>
            <input type="text" id="solution2" name="idSol2" placeholder="Insérer l'id. de la seconde solution">
            <input type="text" id="solution2" name="sol2" placeholder="Insérer le texte de la seconde solution">
            <input type="number" id="idNextScenario2" name="nextSce2" placeholder="Insérer l'id. du prochain scénario (i.e celui qui viendra après)">
        </div>
        
        <button type="submit" id ="btn" name="suivant" value="Envoyer">Continuer</button>
        <button type="submit" id ="btn" name="finir" value="Finir">Terminer l'histoire</button>
    </form>
    </div>

    <script>
    let selectedValue = document.getElementById('list');
    let nextDiv = document.getElementById('paragrapheSuivant');
    let element = document.getElementById('btn');
    let form = document.getElementById('form');

    selectedValue.addEventListener("change", () => {

    if(selectedValue.value == "continuer")
    {
        nextDiv.style.display = 'block';
        element.innerHTML = "Ajouter";
        //form.action="addParagraphe.php";
    } 
    else
    {
        nextDiv.style.display = 'none';
        element.innerHTML = "Ajouter la fin de ce scénario";
        //form.action="addParagraphe.php";
    }

    });
    </script>
    </body>
    </html>