<?php
session_start();

if (isset($_POST['card_id']))
{
    $radioVal = $_POST["card"];
    if ($radioVal == "As de Pique") {
        echo "As de Pique";
    }
}

$cards =
    [
        ["nom" => "as-de-pique", "image" => "images/cartes/01_of_spades_A.svg.png", "pair" => 1],
        ["nom" => "as-de-pique", "image" => "images/cartes/01_of_spades_A.svg.png", "pair" => 1],
        ["nom" => "2-de-pique", "image" => "images/cartes/02_of_spades.svg.png", "pair" => 2],
        ["nom" => "2-de-pique", "image" => "images/cartes/02_of_spades.svg.png", "pair" => 2],
        ["nom" => "Roi-de-pique", "image" => "images/cartes/167px-King_of_spades_fr.svg.png", "pair" => 3],
        ["nom" => "Roi-de-pique", "image" => "images/cartes/167px-King_of_spades_fr.svg.png", "pair" => 3],
    ];


if (!isset($_SESSION["score"])){
    $_SESSION["score"] = 0;
}

?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link rel="stylesheet" href="styles.css">
    <title>Memory Game</title>
</head>
<body>
    <main>
        <article class="with_view">
            <section class="container">
            <p>Select two cards to flip over and try to find pairs.</p>
            <div class="game-board">
                    <div class="class_me">
                        <form method="post" action="">
                        <?php
                        foreach($cards as $card) 
                        { ?>
                        
                        <div class='m-card'>
                            <button type="submit" name="<?= $card['nom'] ?>">
                                <img src='<?=$card["image"]?>' alt="" style="width: 50px;">
                            </button>
                        </div>
                        <?php
                        }
                        if ($_SERVER["REQUEST_METHOD"] == "POST") {
                            if (isset($_POST['as-de-pique'])) {
                                echo "as de pique";
                            } elseif (isset($_POST['2-de-pique'])) {
                                echo "2 de pique";
                            } elseif (isset($_POST['Roi-de-pique'])) {
                                echo "Roi de pique";
                            } else {
                                echo "rien";
                            }
                        }
                        ?>
                        </form>
                    </div>
            </section>
        </article>
    </main>
    <script>
        var count=0;
        $("input[name='card']").on("change", function() {
            if(count>=2){
                count=0;
                $("input[name='card']").prop('checked', false);
            }
            else
            count++;
        });
</script>
</body>
</html>
