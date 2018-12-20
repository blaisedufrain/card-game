<?php

namespace Core\CardDecks;

class PinochleDeck extends Deck
{
    public static function getSuits(): array
    {
        return [
            'spades',
            'clubs',
            'hearts',
            'diamonds',
        ];
    }

    public static function getValues(): array
    {
        return [
            'nine' => '1',
            'jack' => '2',
            'queen' => '3',
            'king' => '4',
            'ten' => '5',
            'ace' => '6',
        ];
    }

    /**
     * @return int
     */
    public static function repetitionsPerSuit(): int
    {
        return 2;
    }
}