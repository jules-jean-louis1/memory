<?php
session_start();
require_once('./classes/Connexion.php');



?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css"
    rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC"
    crossorigin="anonymous">
    <script src="https://kit.fontawesome.com/8b26d30613.js" crossorigin="anonymous"></script>
    <title>Memory - Profil</title>
</head>
<body>
<!-- H E A D E R -->
<?php include_once('./import/header.php'); ?>
<!-- H E A D E R - E N D -->
<!-- C O N T E N T -->
<main>
    <article>
        <section>
            <div class="container">
                <div class="row">
                    <h1>
                        <?php
                            if (isset($_SESSION['login']) != null) {
                                echo 'Bonjour ' . $_SESSION['login'];
                            } else {
                                echo 'Vous n\'êtes pas connecté';
                            }
                        ?>
                    </h1>
                    <div class="">
                            <h2>Meilleur Scores</h2>
                    </div>
                    <div>
                        
                    </div>
                    <h5>Modifier Votre profil</h5>
                    <form action="" method="post">
                        <div class="form-group">
                            <label for="login">Nom d'utilisateur : <?= $_SESSION['login'];?></label>
                            <input type="text" name="login" id="login" value="<?= $_SESSION['login'];?>">
                        </div>
                        <div class="form-group">
                            <label for="password">Mot de passe :</label>
                            <input type="password" name="password" id="password" value="Mot de passe">
                        </div>
                        <div class="row">
                            <input type="submit" value="Modifier" class="btn btn-primary" name="modify">
                            <input type="submit" value="Supprimer compte" class="btn btn-danger" name="suppr">
                        </div>
                    </form>
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