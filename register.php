<?php
require_once 'classes/Connexion.php';
$message = array();


$connexion = new Connexion();

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    // The form was submitted, so try to register the user
    $result = $connexion->register($_POST['username'], $_POST['password'], $_POST['confirmPassword']);
    if ($result === true) {
        // The user was successfully registered, so redirect to the login page
        header('Location: login.php');
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
    <title>S'inscrire - Memory</title>
</head>
<body>
<!-- H E A D E R -->
    <?php include_once('./import/header.php'); ?>
<!-- H E A D E R - E N D -->
    <main>
        <article class="container">
            <section class="warpper">
                <div id="form_up">
                    <div class="flex_class1" >
                        <form action="" method="post">
                            <h1>S'inscrire</h1>
                            <div class="form-group" id="padding_signup">
                                <?php if (isset($error)): ?>
                                    <div class="alert alert-danger"><?php echo $error; ?></div>
                                <?php endif; ?> 
                            </div>
                            <div class="form-group">
                            <svg aria-hidden="true" focusable="false" data-prefix="fad" data-icon="face-grin" role="img" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512" class="svg-inline--fa fa-face-grin fa-fw fa-4x" style="--fa-secondary-opacity:1; --fa-secondary-color:var(--bs-teal); --fa-primary-color:var(--fa-navy);">
                                <g class="fa-duotone-group">
                                    <path fill="currentColor" d="M0 256C0 114.6 114.6 0 256 0C397.4 0 512 114.6 512 256C512 397.4 397.4 512 256 512C114.6 512 0 397.4 0 256zM256.3 331.8C208.9 331.8 164.1 324.9 124.5 312.8C112.2 309 100.2 319.7 105.2 331.5C130.1 390.6 188.4 432 256.3 432C324.2 432 382.4 390.6 407.4 331.5C412.4 319.7 400.4 309 388.1 312.8C348.4 324.9 303.7 331.8 256.3 331.8H256.3zM176.4 176C158.7 176 144.4 190.3 144.4 208C144.4 225.7 158.7 240 176.4 240C194 240 208.4 225.7 208.4 208C208.4 190.3 194 176 176.4 176zM336.4 240C354 240 368.4 225.7 368.4 208C368.4 190.3 354 176 336.4 176C318.7 176 304.4 190.3 304.4 208C304.4 225.7 318.7 240 336.4 240z" class="fa-secondary" style="color: #63E6BE;"></path>
                                    <path fill="currentColor" d="M144.4 208C144.4 190.3 158.7 176 176.4 176C194 176 208.4 190.3 208.4 208C208.4 225.7 194 240 176.4 240C158.7 240 144.4 225.7 144.4 208zM304.4 208C304.4 190.3 318.7 176 336.4 176C354 176 368.4 190.3 368.4 208C368.4 225.7 354 240 336.4 240C318.7 240 304.4 225.7 304.4 208z" class="fa-primary" style="color: #183153;"></path>
                                </g>
                            </svg>
                            </div>
                            <div>
                                <div class="form-group" id="padding_signup">
                                    <label for="login">Nom d'utilisateur :</label>
                                    <input type="text" name="username" id="login" class="form-control"
                                    placeholder="Entrer un nom d'utilisateur" aria-describedby="helpId">
                                </div>
                                <div class="form-group" id="padding_signup">
                                    <label for="password">Mot de passe :</label>
                                    <input type="password" name="password" id="password" class="form-control"
                                    placeholder="Entrer un mot de passe" aria-describedby="helpId">
                                </div>
                                <div class="form-group" id="padding_signup">
                                    <label for="confirmPassword">Confirmer le mot de passe :</label>
                                    <input type="password" name="confirmPassword" id="password_confirm" class="form-control"
                                    placeholder="Confirmer le mot de passe" aria-describedby="helpId">
                                </div>
                                <div class="form-group" id="padding_signup">
                                    <button type="submit" class="btn btn-outline-primary" id="btn_login">S'inscrire</button>
                                </div>
                                <div class="form-group" id="padding_signup">
                                    <p>Déjà inscrit ? <a href="login_form.php">Connectez-vous</a></p>
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
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js" integrity="sha384-oBqDVmMz9ATKxIep9tiCxS/Z9fNfEXiDAYTujMAeBAsjFuCZSmKbSSUnQlmh/jp3" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.min.js" integrity="sha384-mQ93GR66B00ZXjt0YO5KlohRA5SY2XofN4zfuZxLkoj1gXtW8ANNCe9d5Y3eG5eD" crossorigin="anonymous"></script>
    <script src="https://kit.fontawesome.com/8b26d30613.js" crossorigin="anonymous"></script>
</body>
</html>