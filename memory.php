<?php
session_start();

if (isset($_POST['card_id']))
{
    $radioVal = $_POST["card"];
    if ($radioVal == "As de Pique") {
        echo "As de Pique";
    }
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
                <form method="post" class="d-flex flex-row justify-content-around">
                    <?php
                    $cards = 
                    [
                        "As de Pique", 
                        "2 de coeur", 
                        "Reine de Carreau", 
                        "Valets de trèfle", 
                        "As de Pique", 
                        "2 de coeur", 
                        "Reine de Carreau", 
                        "Valets de trèfle",
                    ];
                    shuffle($cards);
                    $i = 0;
                    foreach ($cards as $card) { ?>
                        <div class="display_row">
                            <div id="card_img_box">

                            </div>
                            <input type="radio" name="card" value="<?php echo $card ?>"> <!-- . $card . '<br>' --> 
                        </div>
                    <?php  $i++;
                    }
                    
                    ?>
                    </div>

                    <input type="hidden" name="card_id" value="<?php echo $i; ?>">
                    <button type="submit">Selectionné 2 Cartes</button>

                </form>

            </section>
        </article>
    </main>
</body>
</html>
