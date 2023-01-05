<?php
require_once 'classes/Connexion.php';
?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <script src="https://kit.fontawesome.com/8b26d30613.js" crossorigin="anonymous"></script>
    <title>S'inscrire - Memory</title>
</head>
<body>
<!-- H E A D E R -->
    <?php include_once('./import/header.php'); ?>
<!-- H E A D E R - E N D -->
    <main>
        <article>
            <section>
                <div id="form_up">
                    <form action="" method="post">
                        <div class="form-group">
                            <label for="login">Nom d'utilisateur :</label>
                            <input type="text" name="login" id="login" class="form-control" placeholder="Entrer un nom d'utilisateur" aria-describedby="helpId">
                            <label for="password">Mot de passe :</label>
                            <input type="text" name="password" id="password" class="form-control" placeholder="Entrer un mot de passe" aria-describedby="helpId">
                            <label for="password_confirm">Confirmer le mot de passe :</label>
                            <input type="text" name="password_confirm" id="password_confirm" class="form-control" placeholder="Confirmer le mot de passe" aria-describedby="helpId">
                        </div>
                    </form>
                </div>
            </section>
        </article>
    </main>
</body>
</html>