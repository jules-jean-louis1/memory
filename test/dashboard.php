<?php

session_start();

// Check if the user is logged in
if (!isset($_SESSION['user'])) {
    // The user is not logged in, so redirect to the login page
    header('Location: login.php');
    exit;
}

// Connect to the database
$db = new PDO('mysql:host=localhost;dbname=classes', 'root', '');

// Check if the form has been submitted
if (isset($_POST['submit'])) {
    // Get the form data
    $username = $_POST['username'];
    $password = $_POST['password'];
    $confirmPassword = $_POST['confirmPassword'];

    // Set the error message to an empty string by default
    $error = '';

    if ($username != $_SESSION['user']['username']) {
        // The username has changed, so check if the new username is already in use
        $stmt = $db->prepare('SELECT * FROM user WHERE username = :username');
        $stmt->bindParam(':username', $username);
        $stmt->execute();
        $user = $stmt->fetch();
        if ($user) {
            // The username is already in use
            $error = 'Username already in use';
        }
    }

    if ($password != $confirmPassword) {
        // The passwords do not match
        $error = 'Passwords do not match';
    }

    if (!$error) {
        // The form is valid, so update the user in the database
        if ($password) {
            // A new password was entered, so create a hash for it
            $hash = password_hash($password, PASSWORD_DEFAULT);

            // Update the user with the new username and password hash
            $stmt = $db->prepare('UPDATE user SET username = :username, password = :password WHERE id = :id');
            $stmt->bindParam(':username', $username);
            $stmt->bindParam(':password', $hash);
            $stmt->bindParam(':id', $_SESSION['user']['id']);
            $stmt->execute();
        } else {
            // No new password was entered, so just update the username
            $stmt = $db->prepare('UPDATE user SET username = :username WHERE id = :id');
            $stmt->bindParam(':username', $username);
            $stmt->bindParam(':id', $_SESSION['user']['id']);
            $stmt->execute();
        }

        // Update the user session variable
        $_SESSION['user']['username'] = $username;

        // Redirect to the dashboard page
        header('Location: dashboard.php');
        exit;
    }
}

?>
<!doctype html>
<html lang="en">
<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" integrity="sha384-JcKb8q3iqJ61gNV9KGb8thSsNjpSL0n8PARn9HuZOnIxN0hoP+VmmDGMN5t9UJ0Z" crossorigin="anonymous">

    <title>Dashboard</title>
</head>
<body>
<header>
    <?php include './import/header.php'; ?>
</header>
    <main>
        <div class="container mt-5">
            <h1>Votre Profil</h1>
            <?php if (isset($error)): ?>
                <div class="alert alert-danger"><?php echo $error; ?></div>
            <?php endif; ?>
            <form method="post">
                <div class="form-group">
                    <label for="username">Nom d'utilisateur</label>
                    <input type="text" class="form-control" id="username" name="username" value="<?php echo $_SESSION['user']['username']; ?>">
                </div>
                <div class="form-group">
                    <label for="password">Password</label>
                    <input type="password" class="form-control" id="password" name="password">
                </div>
                <div class="form-group">
                    <label for="confirmPassword">Confirmer Password</label>
                    <input type="password" class="form-control" id="confirmPassword" name="confirmPassword">
                </div>
                <button type="submit" class="btn btn-primary" name="submit">Update</button>
            </form>
        </div>
    </main>

    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.16.6/dist/umd/popper.min.js" integrity="sha384-GxR4jRn+fQ4Xhv8gW4KjtEqhl+kSZJvb8WwTlC+jKlcs9X9vh8WJ+Gc0b7KjgxC" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js" integrity="sha384-B4gt1jrGC7Jh4AgTPSdUtOBvfO8shuf57BaghqFfPlYxofvL8/KUEfYiJOMMV+rV" crossorigin="anonymous"></script>
</body>
</html>