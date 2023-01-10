<?php

    function getScore (int $points){
        $points = $_SESSION['clickcounter'];
        $test = floor($points/2);
        echo $test;

        @addScore($test, $_SESSION['user']['id']);
    }


    function addScore($score, $id_utilisateur){
        require_once 'bdd_connect.php';

        // $id_utilisateur = $_SESSION['user']['id'];
        // $score = $test;

        @$insertDB=$pdo -> prepare('INSERT INTO game SET score=:score, id_utilisateurs=:id_utilisateur');
        @$insertDB -> execute(['score' => $score, 'id_utilisateur' => $id_utilisateur]);

    }
?>