<?php
session_start();
require_once('./classes/Connexion.php');

$message = [];

if (isset($_POST['connect'])) {
    $login = $_POST['username'];
    $password = $_POST['password'];

    if(!empty($login) && !empty($password)) {
        $connexion = new Connexion();
        $connexion->connect($login, $password);
    } else {
        $message [] = 'Veuillez remplir tous les champs';
    }

}

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
    <title>Connexion - PDO </title>
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
                    <form action="" method="post">
                        <div class="form-group">
                            <div class="col-12">
                                <h1>Connexion</h1>
                                <p>Connectez-vous pour jouer</p>
                            </div>
                            <div class="form-group">
                                <label for="username">Nom d'utilisateur</label>
                                <input type="text" name="username" id="username" placeholder="Nom d'utilisateur">
                            </div>
                            <div class="form-group">
                                <label for="password">Mot de passe</label>
                                <input type="password" name="password" id="password" placeholder="Mot de passe">
                            </div>
                            <div class="form-group">
                                <?php if (isset($message)) : ?>
                                    <?php foreach ($message as $msg) : ?>
                                        <p><?= $msg ?></p>
                                    <?php endforeach; ?>
                                    <?php endif; ?>
                            </div>
                            <div class="form-group">
                                <input type="submit" value="Connexion" name="connect">
                            </div>
                        </div>
                    </form>
                </div>
            </section>
        </article>
    </main>
    <!-- C O N T E N T - E N D -->
<!-- F O O T E R -->
<?php include_once('./import/footer.php'); ?>
<!-- F O O T E R - E N D -->
</body>
</html>