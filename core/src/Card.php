<?php

namespace Core;

class Card
{
    public $suit;
    public $value;

    /**
     * Card constructor.
     * @param $suit
     * @param $value
     */
    public function __construct($suit, $value)
    {
        $this->suit = $suit;
        $this->value = $value;
    }

    public function display()
    {
        return "$this->value of $this->suit";
    }
}