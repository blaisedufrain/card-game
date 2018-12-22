<?php

namespace Core\Contracts;

interface DealerContract
{
    public function shuffle(): void;

    public function dealOneCard();

    public function swapDeck(DeckContract $deckContract): void;
}