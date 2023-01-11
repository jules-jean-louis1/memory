<?php

    function getScore (int $points){
        $points = $_SESSION['clickcounter'];
        $test = floor($points/2);
        echo $test;

        @addScore($test, $_SESSION['id']);
    }


    function addScore($score, $id_utilisateur){

        $pdo = new PDO('mysql:host=localhost;dbname=memory', 'root', '');
        $sql = "SELECT * FROM game WHERE id_utilisateurs = :id_utilisateur";
        @$insertDB = $pdo -> prepare($sql);
        @$insertDB -> execute(['score' => $score, 'id_utilisateur' => $id_utilisateur]);

    }
?>