<?php

namespace Core;

use Core\Contracts\DeckContract;
use Core\Contracts\ShufflerContract;
use Core\Exceptions\NoCardsRemainingException;

class Dealer
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
    public function shuffle()
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
     * @return array
     */
    public function getAllCards()
    {
        return $this->cards;
    }
}