<?php

namespace Core\CardDecks;

use Core\Contracts\DeckContract;

abstract class Deck implements DeckContract
{
    /**
     * @var array
     */
    protected $cards;

    /**
     * Deck constructor.
     * @param array $cards
     */
    public function __construct(array $cards = [])
    {
        $this->cards = $cards;
    }

    public static function repetitionsPerSuit(): int
    {
        return 1;
    }

    /**
     * @return array
     */
    public function getCards(): array
    {
        return $this->cards;
    }

    /**
     * @param $cards
     */
    public function setCards($cards = []): void
    {
        $this->cards = $cards;
    }
}