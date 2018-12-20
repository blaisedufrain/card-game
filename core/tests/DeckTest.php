<?php

use Core\DeckFactory;
use PHPUnit\Framework\TestCase;
use Core\Contracts\DeckInterface;
use Core\CardDecks\PlayingCardDeck;

class DeckTest extends TestCase
{
    /**
     * @var DeckInterface
     */
    protected $deck;

    public function setUp()
    {
        $cards = [];
        for ($i= 1; $i <=52; $i++) {
            array_push($cards, $this->createMock(\Core\Card::class));
        }
        $this->deck = new PlayingCardDeck($cards);
    }

    /** @test */
    public function it_should_get_all_cards()
    {
        $this->assertInstanceOf(DeckInterface::class, $this->deck);
        $this->assertCount(52, $this->deck->getAllCards());
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
        $this->assertCount(52, $this->deck->getAllCards());
        $this->deck->setCards([$this->createMock(\Core\Card::class)]);
        $this->assertCount(1, $this->deck->getAllCards());
    }
}