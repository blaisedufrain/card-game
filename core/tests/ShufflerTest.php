<?php

use Core\Card;
use PHPUnit\Framework\TestCase;
use Core\Shufflers\Shuffler;
use Core\CardDecks\PlayingCardDeck;
use Core\Contracts\ShufflerContract;
use Core\Contracts\DeckContract;

class ShufflerTest extends TestCase
{
    protected $number;
    protected $cards;
    /**
     * @var DeckContract
     */
    protected $deck;
    /**
     * @var ShufflerContract
     */
    protected $shuffler;

    public function setUp()
    {
        $this->shuffler = new Shuffler();
        $this->cards = [];
        $this->number = random_int(10, 25);
        for ($i = 1; $i <= $this->number; $i++) {
            array_push($this->cards, $this->getMockBuilder(Card::class)->setMockClassName("Card$i")->disableOriginalConstructor()->getMock());
        }
        $this->deck = $this->createMock(PlayingCardDeck::class);

        $this->deck->method('getCards')->willReturn($this->cards);
    }

    /** @test */
    public function it_should_not_be_the_same_after_shuffling()
    {
        $cards = $this->deck->getCards();
        $this->assertSame($this->cards, $cards);
        $this->shuffler->shuffle($cards);
        $this->assertNotSame($this->cards, $cards);
    }

    /** @test */
    public function it_should_not_have_repeated_elements()
    {
        $cards = $this->deck->getCards();
        $this->shuffler->shuffle($cards);
        $this->assertCount($this->number, collect($this->cards)->unique());
    }


    /** @test */
    public function it_should_be_different_each_time()
    {
        //While there is a possibilility of getting an identical permutation it is unlikely.
        $original = $cards = $this->deck->getCards();
        $this->shuffler->shuffle($cards);
        $cards2 = $cards;
        $this->shuffler->shuffle($cards);
        $this->assertNotEquals($original, $cards);
        $this->assertNotEquals($cards2, $cards);
        $this->assertNotEquals($cards2, $original);
    }
}