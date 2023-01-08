<?php
session_start();
// Check if the user is logged in
if (!isset($_SESSION['user'])) {
    // The user is not logged in, so redirect to the login page
    header('Location: login.php');
    exit;
}
require_once 'Card.php';

?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Jouer</title>
</head>
<body>
    <main>
    <style>
.deck {
    display: flex;
    flex-wrap: wrap;
}

.card {
    width: 80px;
    height: 120px;
    background-color: white;
    border: 1px solid black;
    display: flex;
    align-items: center;
    justify-content: center;
    font-size: 36px;
    font-weight: bold;
    cursor: pointer;
    margin: 10px;
}

.card.hidden {
    visibility: hidden;
}

.card.flipped {
    background-color: lightgrey;
}

.card.matched {
    visibility: hidden;
}

.card:hover {
    background-color: red;
}
    </style>
</head>
<body>
    <div class="container">
        <div class="row">
            <div class="col-md-6 offset-md-3">
                <div class="deck">
                    <?php
                        // Create an array of Card objects
                        $cards = [];
                        $suits = [Card::SUIT_PIQUE, Card::SUIT_COEUR, Card::SUIT_CARREAUX, Card::SUIT_TREFLE];
                        $values = [
                            Card::VALUE_AS,
                            Card::VALUE_DEUX,
                            Card::VALUE_TROIS,
                            Card::VALUE_QUATRE,
                            Card::VALUE_CINQ,
                            Card::VALUE_SIX,
                            Card::VALUE_SEPT,
                            Card::VALUE_HUIT,
                            Card::VALUE_NEUF,
                            Card::VALUE_DIX,
                            Card::VALUE_VALET,
                            Card::VALUE_DAME,
                            Card::VALUE_ROI,
                        ];
                        foreach ($suits as $suit) {
                            foreach ($values as $value) {
                                $cards[] = new Card($suit, $value, true);
                            }
                        }

                        // Shuffle the cards
                        shuffle($cards);

                        // Display the cards
                        foreach ($cards as $card) {
                            $suit = $card->getSuit();
                            $value = $card->getValue();
                            $isFlipped = $card->isFlipped();
                            $cardClass = $isFlipped ? 'hidden' : '';
                            echo "<div class='card $cardClass'>$value of $suit</div>";
                        }
                    ?>
                </div>
            </div>
        </div>
    </div>

            <div class="points">0</div>
    </main>

    <script>
    const cards = document.querySelectorAll('.card');

    let flippedCards = [];
    let lockBoard = false;
    let countFlippedCards = 0;

    function flipCard() {
        if (lockBoard) return;
        if (this === flippedCards[0]) return;

        this.classList.add('flipped');

        if (flippedCards.length === 0) {
            flippedCards[0] = this;
            return;
        }
        else {
            flippedCards[1] = this;
            countFlippedCards++;

            checkForMatch();
        }
    }

    function checkForMatch() {
        let isMatch = flippedCards[0].dataset.suit === flippedCards[1].dataset.suit;

        isMatch ? disableCards() : unflipCards();
    }

    function disableCards() {
        flippedCards[0].removeEventListener('click', flipCard);
        flippedCards[1].removeEventListener('click', flipCard);
        flippedCards = [];
    }

    function unflipCards() {
        lockBoard = true;

        setTimeout(() => {
            flippedCards[0].classList.remove('flipped');
            flippedCards[1].classList.remove('flipped');

            flippedCards = [];
            lockBoard = false;
        }, 1500);
    }

    cards.forEach(card => card.addEventListener('click', flipCard));
</script>


</body>
</html>