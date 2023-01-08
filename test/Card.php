<?php

class Card
{
    const SUIT_PIQUE = 'Pique';
    const SUIT_COEUR = 'Cœur';
    const SUIT_CARREAUX = 'Carreaux';
    const SUIT_TREFLE = 'Trèfle';

    const VALUE_AS = 'As';
    const VALUE_DEUX = 'Deux';
    const VALUE_TROIS = 'Trois';
    const VALUE_QUATRE = 'Quatre';
    const VALUE_CINQ = 'Cinq';
    const VALUE_SIX = 'Six';
    const VALUE_SEPT = 'Sept';
    const VALUE_HUIT = 'Huit';
    const VALUE_NEUF = 'Neuf';
    const VALUE_DIX = 'Dix';
    const VALUE_VALET = 'Valet';
    const VALUE_DAME = 'Dame';
    const VALUE_ROI = 'Roi';

    /**
     * @var string
     */
    private $suit;

    /**
     * @var string
     */
    private $value;

    /**
     * @var bool
     */
    private $isFlipped;

    /**
     * Card constructor.
     * @param string $suit
     * @param string $value
     * @param bool $isFlipped
     */
    public function __construct(string $suit, string $value, bool $isFlipped)
    {
        $this->suit = $suit;
        $this->value = $value;
        $this->isFlipped = $isFlipped;
    }

    /**
     * @return string
     */
    public function getSuit(): string
    {
        return $this->suit;
    }

    /**
     * @return string
     */
    public function getValue(): string
    {
        return $this->value;
    }

    /**
     * @return bool
     */
    public function isFlipped(): bool
    {
        return $this->isFlipped;
    }
}
?>
