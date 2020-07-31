<?php

declare(strict_types=1);
use PHPUnit\Framework\TestCase;
require_once './src/Card.php';

class CardTests extends TestCase
{
    public function testCardHasRank(): void
    {
        $this->assertClassHasAttribute('rank', Card::class);
    }

    public function testCardHasSuit(): void
    {
        $this->assertClassHasAttribute('suit', Card::class);
    }

    public function testCardCanBeCreatedWithValidRank(): void
    {
        $card = new Card("S", 3);
        $this->assertEquals(3, $card->getRank());
    }

    public function testCardCanBeCreatedWithValidASuit(): void
    {
        $card = new Card("D", 8);
        $this->assertEquals("D", $card->getSuit());
    }

    public function testCardIsHumanReadable(): void
    {
        $card = new Card("D", 1);
        $this->assertEquals("Ace of Diamonds", $card->__toString());
    }

    public function testCardIsFaceCard(): void
    {
        $card = new Card("D", 4);
        $this->assertEquals(false, $card->isFaceCard());
    }

}