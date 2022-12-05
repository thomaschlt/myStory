<!doctype html>
  <html>
  <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="stylesheet" href="style/index.css">
        <link rel="stylesheet" href="style/swiper.min.css">
        <link rel="stylesheet" href="style/addStory.css">
        <title>aStory</title>
    </head>
    <body>
    <div class="container">
    <h1>Ajout d'une histoire</h1>
    <form action="script_addHistoire.php" method="POST" enctype="multipart/form-data">
        <label for="fname">Titre de l'histoire</label>
        <input type="text" id="title" name="sto_title" placeholder="Insérer le titre de l'histoire" required>

        <label for="sujet">Auteur</label>
        <input type="text" id="author" name="sto_author" placeholder="Insérer l'auteur de l'histoire" required>

        <label for="emailAddress">Année de parution</label>
        <input id="yearP" type="number" name="sto_year" placeholder="Année de parution" required>

        <label for="image">Image :</label>
        <input type="file" id="imageSto" name="sto_image">

        <label for="subject">Description</label>
        <textarea id="subject" name="sto_description" placeholder="Description de l'histoire" style="height:200px" required></textarea>

        <button type="submit" name="ajout">Ajouter l'histoire</button>
    </form>
    </div>
    </body>
    </html>