<?php 
$id = 'jules';
$pdo = new PDO('mysql:host=localhost;dbname=memory', 'root', '');
$sql = "SELECT * FROM utilisateurs WHERE username = :username";
$query = $pdo->prepare($sql);
$query->bindParam(':username', $id);
$query->execute();
$user = $query->fetch();
var_dump($user);
echo $user['username'];