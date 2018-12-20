<?php

namespace Core\CardDecks;

class UnoDeck extends Deck
{
    public static function getSuits(): array
    {
        return [
            'blue',
            'green',
            'red',
            'yellow',
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
            'skip' => 'S',
            'revers' => 'R',
            'wildcard' => 'W',
        ];
    }

    /**
     * @return int
     */
    public static function repetitionsPerSuit(): int
    {
        return 4;
    }
}