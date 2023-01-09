<?php

class Cartes
{
    public $face;
    public $back;
    public $revealed = false;

    public function __construct($face, $back)
    {
        $this->face = $face;
        $this->back = $back;
    }
    public function reveal()
    {
        $this->revealed = true;
    }
}