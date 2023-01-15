<?php

require_once 'classes/Card.php';
require_once './import/score.php';
require_once './import/level.php';
require_once './import/Creation_card.php';
require_once './function/unset.php';

session_start();




if(isset($_POST['startgame'])){
    if($_POST['lvl'] == "easy"){
        lvlShuffle($faceUpArrayEasy);
    }
    elseif($_POST['lvl'] == "medium"){
        lvlShuffle($faceUpArrayMedium);
    }else {
        lvlShuffle($faceUpArrayHard);
    }

}
if(isset($_POST['restartgame'])){
    unsetGame();
}

if (!isset($_SESSION['indexShowed']))
    $_SESSION['indexShowed'] = array();
if (!isset($_SESSION['signal']))
    $_SESSION['signal'] = -1;

if (isset($_SESSION['signal']) && $_SESSION['signal'] == 1){
    $_SESSION['signal'] = 0;
    $_SESSION['start'][$_SESSION['indexShowed'][0]]->retournerCarte($_SESSION['start'][$_SESSION['indexShowed'][0]]);
    $_SESSION['start'][$_SESSION['indexShowed'][1]]->retournerCarte($_SESSION['start'][$_SESSION['indexShowed'][1]]);
    unset($_SESSION['indexShowed']);
    $_SESSION['indexShowed'] = array();

}
else if(count($_SESSION['indexShowed']) == 2){
    $_SESSION['found']=1;
    unset($_SESSION['indexShowed']);
    @$_SESSION['foundcards']++; 
    $_SESSION['indexShowed'] = array();

}

if(isset($_POST['submit'])){
array_push($_SESSION['indexShowed'],$_POST['index']);

$_SESSION['start'][$_POST['index']]->tournerCarte($_SESSION['start'][$_POST['index']]);


$_SESSION['clickcounter']=$_SESSION['clickcounter']+1;

}



if(isset($_SESSION['found'])){
    foundCard();
} 

/* var_dump($_SESSION['indexShowed']); */
?>


<!doctype html>
<html lang="fr">
<head>
    <meta charset="utf-8">
    <title>Memory game</title>
    <link rel="stylesheet" href="style.css">
    <link rel="stylesheet" href="memory.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link rel="stylesheet" href="styles.css">
</head>
<body>

<!-- H E A D E R -->
<?php include_once('./import/header.php'); ?>
<!-- H E A D E R - E N D -->
<!-- C O N T E N T -->

<main>
    <article class="">
        <section class="">
            <div class="container">
                <div class="dislpay_deck">
                    <div class="form_level">
                        <form action="" class="form-lvl" method="post">
                            <label for="lvl">Choisir un niveau :</label>
                                <select id="lvl" name="lvl">
                                    <option value="easy">Facile</option>
                                    <option value="medium">Moyen</option>
                                    <option value="hard">Difficile</option>
                                </select>
                            <button type="submit" name="startgame" id="btn_start_game">Démarrer</button>
                            <div class="alert alert-danger">
                                <p>Nombre de coup: <?= $_SESSION['clickcounter'];?></p>
                                <P>Votre Score: <?php if (isset($_SESSION['indexShowed'][0]));?></P>
                            </div>
                        </form>
                    </div>
                    <div class="table-memory">
                        <?php if(isset($_SESSION['start'])) {
                                foreach($_SESSION['start'] as $key => $value) { ?>
                                    <?php   if ($value->_retourner == 2) {    ?>
                                            <img src="<?= $value -> _face; ?>" width="160px" class="image_display_memory">
                                    <?php }else { ?>
                                            <form action="" method='post' class="display_card_form">
                                                <input type="hidden" name="retourner" value="<?= $value->_retourner ?>" class="image_display_memory"/>
                                                <input type="hidden" name="identifiant" value="<?= $value->_identifiant ?>"class="image_display_memory"/>
                                                <input type="hidden" name="index" value="<?= $key ?>" class="image_display_memory"/>
                                                <button type="submit" name="submit" class="memory_display_card">
                                                        <div class="image-container">
                                                            <img src="<?= $value -> _back; ?>" width="160px"  class="img-responsive" id="image_display_memory">
                                                        </div>
                                                </button>
                                            </form>
                                    <?php
                                            if (isset($_POST['index']))
                                                    $_SESSION['start'][$_POST['index']]->foundPairs($_SESSION['start'][$_POST['index']]);
                                            }
                                        }
                                    }
                                ?>
                        </div>
                        <div class="row">
                            <form action="" method="post">
                                <button type="submit" name="restartgame" id="btn_restart_game">Restart game</button>
                            </form>
                        </div>
                </div>
                </div>
            </section>
    </article>
</main>
<!-- C O N T E N T  E N D -->
<!-- F O O T E R -->
<?php include_once('./import/footer.php'); ?>
<!-- F O O T E R - E N D -->
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js" integrity="sha384-oBqDVmMz9ATKxIep9tiCxS/Z9fNfEXiDAYTujMAeBAsjFuCZSmKbSSUnQlmh/jp3" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.min.js" integrity="sha384-mQ93GR66B00ZXjt0YO5KlohRA5SY2XofN4zfuZxLkoj1gXtW8ANNCe9d5Y3eG5eD" crossorigin="anonymous"></script>
    <script src="https://kit.fontawesome.com/8b26d30613.js" crossorigin="anonymous"></script>
</body>
</html>