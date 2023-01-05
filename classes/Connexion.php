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
    }
    public function disconnect()
    {
        session_destroy();
        header('Location: index.php');
    }
}

?>