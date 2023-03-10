<?php
session_start();
include_once('./classes/Connexion.php');

?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link rel="stylesheet" href="styles.css">
    <title>Memory - acceuil</title>
</head>
<body>
<!-- H E A D E R -->
<?php include_once('./import/header.php'); ?>
<!-- H E A D E R - E N D -->
<!-- C O N T E N T -->
    <main>
        <article class="box_white_w_i">
            <section class="wapper_i">
                <div class="container">
                    <div class="row">
                        <div class="warpper_cont_i">
                            <div class="title_i d-flex flex-column justify-content-between">
                                <div class="row">
                                    <div class="col-12">
                                        <h1>Memory</h1>
                                        <div class="row">
                                            <p class="text_middle">Memory est un jeu de cartes qui consiste à retourner deux cartes identiques pour les faire disparaître du jeu. Le but du jeu est de réussir à retourner toutes les cartes du jeu en un minimum de coups.</p>
                                        </div>
                                    </div>
                                </div>
                                <div class="d-flex flex-row justify-content-around" id="color_font_a_i">
                                    <button id="btn_play_i">
                                    <i class="fa-solid fa-play"></i>
                                        <a href="">Jouer</a>
                                    </button>
                                    <button id="btn_scores_i">
                                        <i class="fa-solid fa-table-list"></i>
                                        <a href="">Voir les scores</a>
                                    </button>
                                </div>
                            </div>
                            <div class="img_i">
                                <div class="container_img_i">
                                    <img src="./images/background/amirali-mirhashemian-Qp-UPUet86g-unsplash.jpg" alt="">
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </section>
        </article>
    </main>
<!-- C O N T E N T - E N D -->
<!-- F O O T E R -->
<?php include_once('./import/footer.php'); ?>
<!-- F O O T E R - E N D -->
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js" integrity="sha384-oBqDVmMz9ATKxIep9tiCxS/Z9fNfEXiDAYTujMAeBAsjFuCZSmKbSSUnQlmh/jp3" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.min.js" integrity="sha384-mQ93GR66B00ZXjt0YO5KlohRA5SY2XofN4zfuZxLkoj1gXtW8ANNCe9d5Y3eG5eD" crossorigin="anonymous"></script>
    <script src="https://kit.fontawesome.com/8b26d30613.js" crossorigin="anonymous"></script>
</body>
</html>