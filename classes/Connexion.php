<?php

class Connexion
{
    public $id;
    public $login;
    public $password;
    public $nom;
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
    public function register($login,$password,$nom)
    {
        $this->login = $login;
        $this->password = $password;
        $this->nom = $nom;

        $sql = "INSERT INTO users (login,password,nom) VALUES (:login,:password,:nom)";
        $stmt = $this->db->prepare($sql);
        $stmt->execute(['login' => $login, 'password' => $password, 'nom' => $nom]);
        
    }
}

?>