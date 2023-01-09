<?php

class Deck
{
    public $cartes = array();

    public function __construct()
    {
        $back = array("Pique", "Carreau", "Coeurs", "Trèfle");
        $face = array("2", "3", "4", "5", "6", "7", "8", "9", "10", "J", "Q", "K", "A");
        foreach ($back as $back) {
            foreach ($face as $face) {
                $this->cartes[] = new Cartes($face, $back);
            }
        }
    }
    public function shuffle()
    {
        shuffle($this->cartes);
    }
    public function draw()
    {
        return array_pop($this->cartes);
    }
}