<?php

namespace Core\Contracts;

interface DeckContract
{
    /**
     * Get all items in the deck.
     * @return array
     */
    public function getCards(): array;

    /**
     * Replace the cards in the deck.
     */
    public function setCards(): void;

    /**
     * Get the list of suits in this type of card deck
     * @return array
     */
    public static function getSuits(): array;

    /**
     * Get the values of this type of deck.
     * The key can be configured as an optional name for the card if
     * the value is not representative of this.
     *
     * @return array
     */
    public static function getValues(): array;

    /**
     * How many of each value in a suit.
     *
     * @return int
     */
    public static function repetitionsPerSuit(): int;
}