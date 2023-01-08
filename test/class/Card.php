<?php

class Card
{
    // The number of pairs of cards in the game
    const NUM_PAIRS = 8;

    // The array of cards, with each card represented as an array with the following format:
    // ['card value', 'is flipped', 'is matched']
    private $cards;

    // The number of moves made by the player
    private $moves;

    // The current card that is flipped
    private $currentCard;

    public function __construct()
    {
        // Initialize the cards array with NUM_PAIRS pairs of cards
        $this->cards = [];
        for ($i = 1; $i <= self::NUM_PAIRS; $i++) {
            $this->cards[] = ['value' => $i, 'is_flipped' => false, 'is_matched' => false];
            $this->cards[] = ['value' => $i, 'is_flipped' => false, 'is_matched' => false];
        }

        // Shuffle the cards
        shuffle($this->cards);

        $this->moves = 0;
        $this->currentCard = null;
    }

    public function getCards()
    {
        return $this->cards;
    }

    public function getMoves()
    {
        return $this->moves;
    }

    public function flipCard($index)
    {
        // If the card is already matched, return false
        if ($this->cards[$index]['is_matched']) {
            return false;
        }

        // Flip the card
        $this->cards[$index]['is_flipped'] = true;

        // If there is no current card, set the current card to the given index and return true
        if ($this->currentCard === null) {
            $this->currentCard = $index;
            return true;
        }

        // Otherwise, increment the number of moves and return the result of checkMatch
        $this->moves++;
        return $this->checkMatch();
    }

    public function checkMatch()
    {
        // If there is no current card, return false
        if ($this->currentCard === null) {
            return false;
        }
    
        // Check if the current card and the card at the given index match
        $isMatch = $this->cards[$this->currentCard]['value'] === $this->cards[$this->currentCard]['value'];
    
        // If they match, set is_matched to true for both cards
        if ($isMatch) {
            $this->cards[$this->currentCard]['is_matched'] = true;
            $this->cards[$this->currentCard]['is_matched'] = true;
        }
    
        // Reset the current card
        $this->currentCard = null;
    
        // Return whether the cards matched or not
        return $isMatch;
    }
}
?>
