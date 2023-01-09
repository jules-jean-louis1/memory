<?php

class Card {
  public $face;
  public $suit;
  public $revealed = false;

  public function __construct($face, $suit)
  {
    $this->face = $face;
    $this->suit = $suit;
  }

  public function reveal()
  {
    $this->revealed = true;
  }
}

class Deck {
  public $cards = array();

  public function __construct()
  {
    $suits = array("clubs", "diamonds", "hearts", "spades");
    $faces = array("2", "3", "4", "5", "6", "7", "8", "9", "10", "J", "Q", "K", "A");
    foreach ($suits as $suit) {
      foreach ($faces as $face) {
        $this->cards[] = new Card($face, $suit);
      }
    }
  }

  public function shuffle()
  {
    shuffle($this->cards);
  }

  public function draw()
  {
    return array_pop($this->cards);
  }
}

class MemoryGame {
  public $deck;
  public $board = array();
  public $pairs = array();

  public function __construct()
  {
    $this->deck = new Deck();
    $this->deck->shuffle();

    // draw 16 cards from the deck and add them to the board
    for ($i = 0; $i < 16; $i++) {
      $this->board[] = $this->deck->draw();
    }
  }

  public function displayBoard()
  {
    echo "Current board:\n";
    $i = 1;
    foreach ($this->board as $card) {
      if ($card->revealed) {
        echo $i . ": " . $card->face . " of " . $card->suit . "\n";
      } else {
        echo $i . ": [hidden]\n";
      }
      $i++;
    }
  }

  public function selectCard()
  {
    echo "Enter the number of the card you want to select: ";
    $input = trim(fgets(STDIN));
    return $this->board[$input - 1];
  }

  public function removeCard($card)
  {
    $key = array_search($card, $this->board);
    unset($this->board[$key]);
    $this->board = array_values($this->board);
  }
  public function play()
  {
    while (count($this->pairs) < 8) {
      // display the board to the player
      $this->displayBoard();
  
      // prompt the player to select two cards to flip over
      $card1 = $this->selectCard();
      $card2 = $this->selectCard();
  
      // reveal the selected cards
      $card1->reveal();
      $card2->reveal();
  
      // check if the cards match
      if ($card1->face == $card2->face && $card1->suit == $card2->suit) {
        // if the cards match, add them to the pairs array and remove them from the board
        $this->pairs[] = $card1;
        $this->pairs[] = $card2;
        $this->removeCard($card1);
        $this->removeCard($card2);
      } else {
        // if the cards do not match, hide them again after a brief period of time
        sleep(2);
        $card1->revealed = false;
        $card2->revealed = false;
      }
    }
  
    // display a message to the player indicating that they have won
    echo "Congratulations! You have found all the pairs!";
  }
}