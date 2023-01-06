<?php

class Connexion
{
    public $id;
    public $login;
    public $password;
    public $message;
    protected $db;

    public function __construct()
    {
        try {
            $this->db = new PDO('mysql:host=localhost;dbname=memory', 'root', '');
            $this->db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        } catch (PDOException $e) {
            echo 'Connexion échouée : ' . $e->getMessage();
            exit;
        }
    }
    public function register($login, $password)
    {
        $this->login = $login;
        $this->password = $password;

        $sql = "INSERT INTO utilisateurs (login,password) VALUES (:login,:password)";
        $exec = $this->db->prepare($sql);
        $exec->bindValue(':login', $this->login, PDO::PARAM_STR);
        $exec->bindValue(':password', $this->password, PDO::PARAM_STR);
        $exec->execute();

    }
    public function connect($login, $password)
    {
        $this->login = $login;
        $this->password = $password;
        $message = [];

        $sql = "SELECT * FROM utilisateurs WHERE login = :login";
        $exec = $this->db->prepare($sql);
        $exec->bindValue(':login', $this->login, PDO::PARAM_STR);
        $exec->execute();
        $result = $exec->fetch(PDO::FETCH_ASSOC);

        if (is_array($result)) {
            if (password_verify($this->password, $result['password'])) {
                $_SESSION['id'] = $result['id'];
                $_SESSION['login'] = $result['login'];
                $message [] = 'Vous êtes connecté';
                header('Location: index.php');
            } else {
                $message [] = 'Mot de passe incorrect';
            }
        } else {
            $message [] = 'Utilisateur inexistant';
        }
        return $message;

    }
    public function disconnect()
    {
        session_destroy();
        header('Location: index.php');
    }
    public function delete()
    {
        $this->id = $_SESSION['id'];
        $sql = "DELETE FROM utilisateurs WHERE id = :id";
        $exec = $this->db->prepare($sql);
        $exec->bindValue(':id', $this->id, PDO::PARAM_INT);
        $exec->execute();
    }
    public function update($login, $password)
    {
        $this->id = $login;
        $this->password = $password;

        $sql = "UPDATE utilisateurs SET login = :login, password = :password WHERE id = :id";
        $exec = $this->db->prepare($sql);
        $exec->bindValue(':login', $this->login, PDO::PARAM_STR);
        $exec->bindValue(':password', $this->password, PDO::PARAM_STR);
        $exec->execute();
    }
}

?>