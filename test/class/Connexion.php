<?php

class Connexion
{
    protected $db;

    public function __construct()
    {
        // Connect to the database
        $this->db = new PDO('mysql:host=localhost;dbname=classes', 'root', '');
    }

    public function register($username, $password, $confirmPassword)
    {
        // Check if the username is already in use
        $stmt = $this->db->prepare('SELECT * FROM user WHERE username = :username');
        $stmt->bindParam(':username', $username);
        $stmt->execute();
        $user = $stmt->fetch();

        if ($user) {
            // The username is already in use
            return "Nom d'utilisateur déjà utilisé";
        } elseif ($password != $confirmPassword) {
            // The passwords do not match
            return 'Les mots de passe ne correspondent pas';
        } else {
            // The username is available and the passwords match, so create a hash for the password
            $hash = password_hash($password, PASSWORD_DEFAULT);

            // Insert the new user into the database
            $stmt = $this->db->prepare('INSERT INTO user (username, password) VALUES (:username, :password)');
            $stmt->bindParam(':username', $username);
            $stmt->bindParam(':password', $hash);
            $stmt->execute();

            return true;
        }
    }
        public function login($username, $password)
        {
            // Get the user from the database
            $stmt = $this->db->prepare('SELECT * FROM user WHERE username = :username');
            $stmt->bindParam(':username', $username);
            $stmt->execute();
            $user = $stmt->fetch();
    
            if ($user) {
                // The username was found, so check the password
                if (password_verify($password, $user['password'])) {
                    // The password is correct, so log the user in
                    session_start();
                    $_SESSION['user'] = $user;
                    return true;
                } else {
                    // The password is incorrect
                    return 'Mot de passe incorrect';
                }
            } else {
                // The username was not found
                return 'Nom d\'utilisateur incorrect';
            }
        }
        public function update($username, $password, $confirmPassword)
        {
            // Set the error message to an empty string by default
            $error = '';
    
            if ($username != $_SESSION['user']['username']) {
                // The username has changed, so check if the new username is already in use
                $stmt = $this->db->prepare('SELECT * FROM user WHERE username = :username');
                $stmt->bindParam(':username', $username);
                $stmt->execute();
                $user = $stmt->fetch();
                if ($user) {
                    // The username is already in use
                    $error = 'Nom d\'utilisateur déjà utilisé';
                }
            }
    
            if ($password != $confirmPassword) {
                // The passwords do not match
                $error = 'Les mots de passe ne correspondent pas';
            }
            if (!$error) {
                // The form is valid, so update the user in the database
                if ($password) {
                    // A new password was entered, so create a hash for it
                    $hash = password_hash($password, PASSWORD_DEFAULT);
    
                    // Update the user with the new username and password hash
                    $stmt = $this->db->prepare('UPDATE user SET username = :username, password = :password WHERE id = :id');
                    $stmt->bindParam(':username', $username);
                    $stmt->bindParam(':password', $hash);
                    $stmt->bindParam(':id', $_SESSION['user']['id']);
                    $stmt->execute();
                } else {
                    // No new password was entered, so just update the username
                    $stmt = $this->db->prepare('UPDATE user SET username = :username WHERE id = :id');
                    $stmt->bindParam(':username', $username);
                    $stmt->bindParam(':id', $_SESSION['user']['id']);
                    $stmt->execute();
                }
    
                // Update the user session variable
                $_SESSION['user']['username'] = $username;
    
                return true;
            } else {
                return $error;
            }
        }
        public function delete()
        {
            // Delete the user from the database
            $stmt = $this->db->prepare('DELETE FROM user WHERE id = :id');
            $stmt->bindParam(':id', $_SESSION['user']['id']);
            $stmt->execute();
    
            // Log the user out
            session_destroy();
    
            return true;
        }
        public function logout()
        {
            // Log the user out
            session_destroy();
    
            return true;
        }
    }    

