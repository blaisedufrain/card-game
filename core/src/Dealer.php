<?php

namespace Core;

use Core\Contracts\DeckContract;
use Core\Contracts\DealerContract;
use Core\Contracts\ShufflerContract;
use Core\Exceptions\NoCardsRemainingException;

class Dealer implements DealerContract
{
    /**
     * @var ShufflerContract
     */
    protected $shuffler;
    /**
     * @var array
     */
    public $cards;

    /**
     * Dealer constructor.
     *
     * @param ShufflerContract $shuffler
     * @param DeckContract $deck
     */
    public function __construct(ShufflerContract $shuffler, DeckContract $deck)
    {
        $this->cards = $deck->getCards();
        $this->shuffler = $shuffler;
    }

    /**
     * @return void
     */
    public function shuffle(): void
    {
        $this->shuffler->shuffle($this->cards);
    }

    /**
     * @return mixed
     * @throws NoCardsRemainingException
     */
    public function dealOneCard()
    {
        if (empty($this->cards)) {
            throw new NoCardsRemainingException();
        }

        return array_shift($this->cards);
    }


    /**
     * @param DeckContract $deckContract
     */
    public function swapDeck(DeckContract $deckContract): void
    {
        $this->cards = $deckContract->getCards();
    }

    /**
     * @return array
     */
    public function getAllCards()
    {
        return $this->cards;
    }
}