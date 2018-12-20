<?php

namespace Core;

use Core\Contracts\DeckInterface;

class DeckFactory
{
    public static function make($type, $cards = null)
    {
        if (!file_exists(__DIR__ . '/CardDecks/' . $type . 'Deck.php')) {
            throw new \Exception('Unable to make deck of type: ' . $type);
        }
        $class = "\\Core\\CardDecks\\{$type}Deck";
        if (is_null($cards)
            && (!method_exists($class, 'getSuits') || !method_exists($class, 'getValues'))) {
            throw new \Exception("Please provide an array of cards or implement the method getSuits and getValues");
        }

        $cards = [];
        foreach ($class::getSuits() as $suit) {
            foreach ($class::getValues() as $name => $value) {
                array_push($cards, new Card($suit, $value, (is_string($name) ? $name : null)));
            }
        }

        return new $class($cards);
    }
}