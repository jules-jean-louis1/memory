<?php
session_start();
require_once('./classes/Connexion.php');

$connexion = new Connexion();

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    // The form was submitted, so try to log the user in
    $result = $connexion->login($_POST['username'], $_POST['password']);
    if ($result === true) {
        // The user was successfully logged in, so redirect to the dashboard page
        header('Location: profil.php');
        exit;
    } else {
        // There was an error, so store it in a variable to be displayed to the user
        $error = $result;
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
    <link rel="stylesheet" href="styles.css">
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
            <section class="">
                <div class="container">
                    <div class="warpper_login">
                        <form action="" method="post">
                            <div class="form-group">
                                <div class="form-group row">
                                    <div class="title_login">
                                        <h3>Bienvenue</h3>
                                        <i class="fa-solid fa-user fa-2xl icon_user"></i>
                                    </div>
                                    <h1>Se connecter</h1>
                                    <p>Connectez-vous pour jouer</p>
                                </div>
                                <div class="form-group">
                                    <?php if (isset($error)): ?>
                                        <div class="alert alert-danger"><?php echo $error; ?></div>
                                    <?php endif; ?>
                                </div>
                                <div class="container_input">
                                    <div class="form-group row">
                                        <label for="username">Nom d'utilisateur</label>
                                        <input type="text" name="username" id="username" placeholder="Nom d'utilisateur">
                                    </div>
                                    <div class="form-group row">
                                        <label for="password">Mot de passe</label>
                                        <input type="password" name="password" id="password" placeholder="Mot de passe">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <button type="submit" class="btn btn-primary" id="btn_login">Connexion</button>
                                </div>
                                <div class="form-group">
                                    <p>Pas encore de compte ? <a href="signup_form.php">Inscrivez-vous</a></p>
                                </div>
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
        <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.16.6/dist/umd/popper.min.js" integrity="sha384-GxR4jRn+fQ4Xhv8gW4KjtEqhl+kSZJvb8WwTlC+jKlcs9X9vh8WJ+Gc0b7KjgxC" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js" integrity="sha384-B4gt1jrGC7Jh4AgTPSdUtOBvfO8shuf57BaghqFfPlYxofvL8/KUEfYiJOMMV+rV" crossorigin="anonymous"></script>
</body>
</html>