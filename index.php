<?php
session_start();
require_once "includes/functions.php";

// Retrieve all stories
$stories = getDb()->query("select * from stories order by story_id");

?>
<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style/index.css">
    <link rel="stylesheet" href="style/swiper.min.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <title>aStory</title>
</head>
<body>
    <header class="header">
    <div class="blob"></div>
        <div class="arrow">
            <a href="#section2">
            <span></span>
            <span></span></a>
        </div>
    </header>
    <section class="post-header" id="section2">
        <div class="square">
            <span></span>
            
            <div class="content">
                <h2>Bienvenue sur aStory !</h2>
                <p>Laissez-vous transporter dans des univers atypique grâce à nos histoires spécialement conçues pour maximiser votre expérience du récit.</p>
                <a href="#slider-container">Voir les histoires</a>
            </div>
        </div>
    </section>
    <section class="slider-container" id="slider-container">
        
        <nav class="navbar navbar-expand-sm bg-dark navbar-dark" role="navigation">
            <a class="navbar-brand" href="index.php" class="brandName">aStory</a>
            <ul class="nav navbar-nav ms-auto">
            <?php if(userIsConnected()){?>
                    <li class="nav-item dropdown">
                        <a href="#" class="nav-link dropdown-toggle" data-bs-toggle="dropdown">Bienvenue, <?= $_SESSION['login']?></a>
                        <div class="dropdown-menu dropdown-menu-end">
                        <?php
                            if(userIsAdmin()){?>
                               <a href="addHistoire.php" class="dropdown-item">Ajouter une histoire</a>
                               <div class="dropdown-divider"></div>
                        <?php }?>
                            <a href="deconnexion.php" class="dropdown-item">Se déconnecter</a>
                        </div>
                    </li>
                </ul>

                <?php } else { ?> 
                    <li class="nav-item dropdown">
                        <a href="#" class="nav-link dropdown-toggle" data-bs-toggle="dropdown">Non connecté</a>
                        <div class="dropdown-menu dropdown-menu-end">
                            <a href="login.php" class="dropdown-item">S'identifier</a>
                        </div>
                    </li>
                <?php } ?>
            </ul>
            
        </nav>

        <!-- Swiper -->
    <div class="swiper-container mySwiper">
        <div class="swiper-wrapper">
            <!--slider-->.
            <?php foreach($stories as $story){
             ?>  
             <?php if(userIsAdmin() || $story['displayStory'] == 1){ ?>
            <div class="swiper-slide">
                
            <div class="slider-box">
                <div class="slider-img">
                    <img src="images/<?=$story['story_image']?>" alt="photo de <?=$story['story_title']?>">

                </div>
                <div class="slider-details">
                    <strong><?= $story['story_title']?></strong>
                    <!--La description-->
                    <p><?=$story['story_description']?>
                    </p>
                    
                    <div class="card-btns">
                        <?php if(userIsConnected()){?>
                            <a href="story.php?sto_id=<?= $story['story_id']?>&sce_id=1" class="play-btn">Joue dès maintenant</a>
                        <?php }
                        else {?>
                            <a href="login.php" class="play-btn">S'authentifier</a>
                        <?php }?>
                    </div>
                    <?php 
                    if(userIsAdmin()){?>
                        <div class="card-btns">
                            <a href="modifierHistoire.php?sto_id=<?=$story['story_id']?>" class="play-btn">Modifier l'histoire</a>
                        </div>
                        <div class="card-btns">
                            <a href="script_deleteHistoire.php?sto_id=<?=$story['story_id']?>" class="play-btn">Supprimer l'histoire</a>
                        </div>

                        <div class="card-btns">
                            <a href="script_displayHistoire.php?sto_id=<?=$story['story_id']?>" class="play-btn"><?php if($story['displayStory'] == 1) { ?>
                                Cacher
                            <?php } else { ?>
                                Afficher
                            <?php }?>
                            l'histoire</a>
                        </div>
                        <div class="card-btns">
                            <p>Nombre de parties jouées : <?=$story['stats_played']?> | </p>
                            <p>Parties gagnées : <?=$story['stats_win']?> | </p>
                            <p>Parties perdues : <?= $story['stats_death']?></p>
                        </div>
                    </form>
                    <?php }?>
                </div>
            </div>
            </div>
            <?php
            }
        }
            ?>
        </div>
        <div class="swiper-pagination"></div>
      </div>

    </section>

    <!--swiper.min.js-->
    <script type="text/javascript" src="js/swiper.min.js"></script>
    
    <!-- Initialize Swiper -->
    <script>
        var swiper = new Swiper(".mySwiper", {
          effect: "coverflow",
          grabCursor: true,
          centeredSlides: true,
          slidesPerView: "auto",
          coverflowEffect: {
            rotate: 50,
            stretch: 0,
            depth: 100,
            modifier: 1,
            slideShadows: false,
          },
          pagination: {
            el: ".swiper-pagination",
          },
        });
      </script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.10.2/dist/umd/popper.min.js" integrity="sha384-7+zCNj/IqJ95wo16oMtfsKbZ9ccEh31eOz1HGyDuCQ6wgnyJNSYdrPa03rtR1zdB" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.min.js" integrity="sha384-QJHtvGhmr9XOIpI6YVutG+2QOK9T+ZnN4kzFN1RtK3zEFEIsxhlmWl5/YESvpZ13" crossorigin="anonymous"></script>
</body>
</html>