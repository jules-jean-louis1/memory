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

        $sql = "SELECT * FROM utilisateurs WHERE login = :login AND password = :password";
        $exec = $this->db->prepare($sql);
        $exec->bindValue(':login', $this->login, PDO::PARAM_STR);
        $exec->bindValue(':password', $this->password, PDO::PARAM_STR);
        $exec->execute();
        $result = $exec->fetch(PDO::FETCH_ASSOC);
        

        if (password_verify($password, $result['password']) == 1) {
            $_SESSION['login'] = $result['login'];
            $_SESSION['id'] = $result['id'];
            $_SESSION['password'] = $result['password'];
            header('Location: index.php');
        } else {
            $this->message = 'Identifiants incorrects';
        }
        /* if ($result) {
            $_SESSION['login'] = $result['login'];
            $_SESSION['id'] = $result['id'];
            $_SESSION['password'] = $this->password;
            header('Location: index.php');
        } else {
            $this->message = 'Identifiants incorrects';
        } */
    }
    public function disconnect()
    {
        session_destroy();
        header('Location: index.php');
    }
}

?>