<?php

use Core\Card;
use Core\Dealer;
use Core\CardDecks\Deck;
use Core\Shufflers\DefaultShuffler;
use PHPUnit\Framework\TestCase;
use Core\Exceptions\NoCardsRemainingException;

class DealerTest extends TestCase
{
    /**
     * @var
     */
    protected $number;
    /**
     * @var array
     */
    protected $cards = [];
    /**
     * @var Dealer
     */
    protected $dealer;

    public function setUp()
    {
        $this->number = rand(10, 50);
        for ($i = 0; $i < $this->number; $i++) {
            $c = $this->getMockBuilder(Card::class)
                ->disableOriginalConstructor()
                ->setMockClassName("Card$i")
                ->getMock();
            $c->method('display')->willReturn("Card$i");
            $this->cards[] = $c;
        }
        $deck = $this->createMock(Deck::class);
        $deck->method('getCards')->willReturn($this->cards);
        $shuffler = $this->createMock(DefaultShuffler::class);
        $shuffler->method('shuffle')->willReturnCallback(function () {
            return shuffle($this->cards);
        });
        $this->dealer = new \Core\Dealer($shuffler, $deck);
    }

    public function tearDown()
    {
        $this->dealer = null;
        $this->cards = null;
        $this->number = null;
    }

    /** @test */
    public function it_should_shuffle_the_deck()
    {
        $this->dealer->shuffle();
        $this->assertNotSame($this->cards, $this->dealer->getAllCards());
    }

    /** @test */
    public function it_should_deal_one_card_at_a_time()
    {
        $this->assertInstanceOf(Card::class, $this->dealer->dealOneCard());
        $this->assertCount($this->number - 1, $this->dealer->getAllCards());
    }

    /** @test */
    public function it_should_throw_an_exception_if_there_are_no_more_cards()
    {
        foreach ($this->cards as $card) {
            $this->dealer->dealOneCard();
        }

        $this->expectException(NoCardsRemainingException::class);
        $this->dealer->dealOneCard();
    }
}