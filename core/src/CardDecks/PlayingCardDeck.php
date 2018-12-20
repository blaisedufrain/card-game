<?php

namespace Core\CardDecks;

class PlayingCardDeck extends Deck
{
    public static function getSuits(): array
    {
        return [
            'clubs',
            'spades',
            'hearts',
            'diamonds',
        ];
    }

    public static function getValues(): array
    {
        return [
            'ace' => '1',
            'two' => '2',
            'three' => '3',
            'four' => '4',
            'five' => '5',
            'six' => '6',
            'seven' => '7',
            'eight' => '8',
            'nine' => '9',
            'ten' => '10',
            'jack' => '11',
            'queen' => '12',
            'king' => '13',
        ];
    }

}