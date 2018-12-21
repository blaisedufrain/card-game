<?php

use Core\Card;
use Core\DeckFactory;
use PHPUnit\Framework\TestCase;
use Core\Contracts\DeckContract;
use Core\CardDecks\PlayingCardDeck;

class DeckTest extends TestCase
{
    /**
     * @var DeckContract
     */
    protected $deck;
    /**
     * @var DeckContract
     */
    protected $unoDeck;

    public function setUp()
    {
        $cards = [];
        for ($i = 1; $i <= 52; $i++) {
            array_push($cards, $this->createMock(Card::class));
        }
        $this->deck = new PlayingCardDeck($cards);
        $this->unoDeck = DeckFactory::make('Pinochle');
    }

    /** @test */
    public function it_should_get_all_cards()
    {
        $this->assertInstanceOf(DeckContract::class, $this->deck);
        $this->assertCount(52, $this->deck->getCards());
        $this->assertCount(48, $this->unoDeck->getCards());
    }

    /** @test */
    public function it_should_get_the_static_values_and_suits()
    {
        $this->assertIsArray($this->deck->getValues());
        $this->assertIsArray($this->deck->getSuits());
    }

    /** @test */
    public function cards_should_be_replaceable()
    {
        $this->assertCount(52, $this->deck->getCards());
        $this->deck->setCards([$this->createMock(Card::class)]);
        $this->assertCount(1, $this->deck->getCards());
    }
}