<?php

use PHPUnit\Framework\TestCase;
use Core\Card;

class CardTest extends TestCase
{
    protected $card;

    public function setUp()
    {
        $this->card = new Card('blue', 100);
    }

    /** @test */
    public function itShouldDisplayTheName()
    {
        $this->assertSame('100 of blue', $this->card->display());
    }
}