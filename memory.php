<?php

require_once 'card.php';
require_once 'score.php';
require_once 'level.php';

session_start();

$lucifer = new Image ("Images/lucifer.png", ".images/cartes/backofcards.png", 1, 1);
$reading = new Image ("Images/reading.png", ".images/cartes/backofcards.png", 2, 1);
$renaissance = new Image ("Images/renaissance.png", ".images/cartes/backofcards.png", 3, 1);
$spring1 = new Image ("Images/spring1.png", ".images/cartes/backofcards.png", 4, 1);
$spring2 = new Image ("Images/spring2.png", ".images/cartes/backofcards.png", 5, 1);
$spring3 = new Image ("Images/spring3.png", ".images/cartes/backofcards.png", 6, 1);
$luciferBis = new Image ("Images/lucifer.png", ".images/cartes/backofcards.png", 7, 1);
$readingBis = new Image ("Images/reading.png", ".images/cartes/backofcards.png", 8, 1);
$renaissanceBis = new Image ("Images/renaissance.png", ".images/cartes/backofcards.png", 9, 1);
$spring1Bis = new Image ("Images/spring1.png", ".images/cartes/backofcards.png", 10, 1);
$spring2Bis = new Image ("Images/spring2.png", ".images/cartes/backofcards.png", 11, 1);
$spring3Bis = new Image ("Images/spring3.png", ".images/cartes/backofcards.png", 12, 1);
$crown = new Image ("Images/crown.png", ".images/cartes/backofcards.png", 13, 1);
$renaissance1 = new Image ("Images/renaissance1.png", ".images/cartes/backofcards.png", 14, 1);
$eyes = new Image ("Images/eyes.png", ".images/cartes/backofcards.png", 15, 1);
$sunflowers = new Image ("Images/sunflowers.png", ".images/cartes/backofcards.png", 16, 1);
$grec = new Image ("Images/grec.png", ".images/cartes/backofcards.png", 17, 1);
$laurier = new Image ("Images/laurier.png", ".images/cartes/backofcards.png", 18, 1);
$crownBis = new Image ("Images/crown.png", ".images/cartes/backofcards.png", 19, 1);
$renaissance1Bis = new Image ("Images/renaissance1.png", ".images/cartes/backofcards.png", 20, 1);
$eyesBis = new Image ("Images/eyes.png", ".images/cartes/backofcards.png", 21, 1);
$sunflowersBis = new Image ("Images/sunflowers.png", ".images/cartes/backofcards.png", 22, 1);
$grecBis = new Image ("Images/grec.png", ".images/cartes/backofcards.png", 23, 1);
$laurierBis = new Image ("Images/laurier.png", ".images/cartes/backofcards.png", 24, 1);


$faceUpArrayEasy = array($lucifer, $reading, $renaissance, $luciferBis, $readingBis, $renaissanceBis);
$faceUpArrayMedium = array($lucifer, $reading, $renaissance, $spring1, $spring2,
$spring3, $luciferBis, $readingBis, $renaissanceBis, $spring1Bis, $spring2Bis, $spring3Bis);
$faceUpArrayHard = array($lucifer, $reading, $renaissance, $spring1, $spring2,
$spring3, $crown, $renaissance1, $eyes, $sunflowers, $grec, $laurier, $luciferBis, $readingBis, $renaissanceBis, $spring1Bis, $spring2Bis, $spring3Bis, $crownBis, $renaissance1Bis, $eyesBis, $sunflowersBis, $grecBis, $laurierBis);


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
    unset($_SESSION['indexShowed']);
    unset($_SESSION['start']);
    unset($_SESSION['clickcounter']);
    unset($_SESSION['signal']);
    unset($_SESSION['found']);
    unset($_SESSION['foundcards']);
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
    if(@isset($_SESSION['foundcards'])){
        if($_SESSION['foundcards'] == ((count($_SESSION['start'])/2)-1)){ 
            if(!empty($_SESSION['clickcounter'])){
                getScore($_SESSION['clickcounter']);
            }
        }
    }
} 


?>


<!doctype html>
<html lang="eng">
<head>
  <meta charset="utf-8">
  <title>Memory game</title>
  <link rel="stylesheet" href="style.css">
  <link rel="stylesheet" href="memory.css">
  <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Raleway:wght@300&display=swap" rel="stylesheet">
</head>
<body>

<?php if(!isset($_SESSION['user'])){
        ?>
    <header>
        <nav>
            <ul>
                <li><a href="index.php">Accueil</a></li>
                <li><a href="accueil-jeu.php">Game</a></li>
                <li><a href="inscription.php">Inscription</a></li>
                <li><a href="connexion.php">Connexion</a></li>
            </ul>
        </nav>
    </header>   
    <?php
    }else {
        ?>
    <header>
        <nav>
            <ul>
                <li><a href="index.php">Accueil</a></li>
                <li><a href="accueil-jeu.php">Game</a></li>
                <li><a href="profil.php">Profil</a></li>
                <li>
                    <form action="deconnexion.php" method="post">
                        <button class="#" type="submit" name="deco">
                            Deconnexion
                        </button>
                    </form>
                </li>
            </ul>
        </nav>
    </header>  
    <?php
        }
    ?>

<section class="form-jeu">
    <form action="" class="form-lvl" method="post">
        <label for="lvl">Choose a level:</label>
            <select id="lvl" name="lvl">
                <option value="easy">Easy</option>
                <option value="medium">Medium</option>
                <option value="hard">Hard</option>
            </select>
            <button type="submit" name="startgame">Start game</button>
    </form>

    <form action="" method="post">
        <button type="submit" name="restartgame">Restart game</button>
    </form>
</section>
    <div class="table-memory">
    <?php 
        if(isset($_SESSION['start'])){
            foreach($_SESSION['start'] as $key => $value) { 
                ?>
                
                <?php
                    // var_dump($value->_retourner);

                    if($value->_retourner == 2){
                ?>      
                        <img src="<?= $value -> _face; ?>" width="100px">                                
                <?php
                        }else{     
                ?> <form action="" method='post'>
                        <input type="hidden" name="retourner" value="<?= $value->_retourner ?>"/>
                        <input type="hidden" name="identifiant" value="<?= $value->_identifiant ?>"/>
                        <input type="hidden" name="index" value="<?= $key ?>"/>
                        <button type="submit" name="submit">
                            <img src="<?= $value -> _back; ?>" width="100px">
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
</body>
</html>