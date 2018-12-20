<?php

use PHPUnit\Framework\TestCase;
use Core\Card;

class CardTest extends TestCase
{
    /** @test */
    public function it_should_get_the_name()
    {
        $card = new Card('blue', 100);
        $card2 = new Card('hearts', 11, 'jack');
        $this->assertTrue(is_string($card->getName()));
        $this->assertSame('100', $card->getName());
        $this->assertSame('jack', $card2->getName());
    }

    /** @test */
    public function it_should_display_the_full_description()
    {
        $card = new Card('blue', 100);
        $card2 = new Card('spades', 13, 'king');

        $this->assertSame('100 of blue', $card->display());
        $this->assertSame('king of spades', $card2->display());
    }
}