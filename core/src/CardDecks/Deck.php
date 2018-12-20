<?php

namespace Core\CardDecks;

use Core\Contracts\DeckInterface;

abstract class Deck implements DeckInterface
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
    public function getAllCards(): array
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