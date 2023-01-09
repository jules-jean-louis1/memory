<?php

session_start();

// include the card, deck, and memory game classes
include "card.php";
include "deck.php";
include "memorygame.php";

// check if a game is already in progress
if (isset($_SESSION["game"])) {
  $game = $_SESSION["game"];
} else {
  // if no game is in progress, create a new game and store it in the session
  $game = new MemoryGame();
  $_SESSION["game"] = $game;
}

// check if the player has selected a card
if (isset($_POST["card"])) {
  // reveal the selected card
  $card = $game->board[$_POST["card"] - 1];
  $card->reveal();

  // check if the player has selected a second card
  if (isset($_SESSION["selected"])) {
    // check if the cards match
    if ($_SESSION["selected"]->face == $card->face && $_SESSION["selected"]->suit == $card->suit) {
      // if the cards match, add them to the pairs array and remove them from the board
      $game->pairs[] = $card;
      $game->pairs[] = $_SESSION["selected"];
      $game->removeCard($card);
      $game->removeCard($_SESSION["selected"]);
      unset($_SESSION["selected"]);
    } else {
      // if the cards do not match, hide them again after a brief period of time
      sleep(2);
      $card->revealed = false;
      $_SESSION["selected"]->revealed = false;
      unset($_SESSION["selected"]);
    }
  } else {
    // if no second card has been selected, store the selected card in the session
    $_SESSION["selected"] = $card;
  }
}

// check if the game has been won
if (count($game->pairs) == 8) {
  // if the game has been won, display a message and unset the game from the session
  echo "Congratulations! You have found all the pairs!";
  unset($_SESSION["game"]);
} else {
  // if the game is still in progress, display the board
  $game->displayBoard();
}

?>
