<?php

declare(strict_types=1);
use PHPUnit\Framework\TestCase;
require_once './src/Deck.php';

class DeckTests extends TestCase
{

    public function testDeckContains52Cards(): void
    {
        $deck = new Deck;
        $this->assertEquals(52,  $deck->getCount());
    }

    public function testTheTopCardIsTheKingOfDiamonds(): void
    {
        $deck = new Deck;
        $cards = $deck->getCards();
        /** @var Card $card */
        $card = $cards[0];
        $this->assertEquals(13, $card->getRank());
        $this->assertEquals("D", $card->getSuit());
    }

    public function testDeckIsShuffled(): void
    {
        $deck = new Deck;
        $deck->shuffle();
        $cards = $deck->getCards();

        /** @var Card $topCard */
        $topCard = $cards[0];
        $this->assertNotEquals(13, $topCard->getRank());
        $this->assertNotEquals("D", $topCard->getSuit());

        /** @var Card $bottomCard */
        $bottomCard = $cards[51];
        $this->assertNotEquals(1, $bottomCard->getRank());
        $this->assertNotEquals("H", $bottomCard->getSuit());
    }

    public function testDrawnCardsCount(): void
    {
        $deck = new Deck;
        $drawnCards = $deck->draw(4);
        $this->assertCount(4, $drawnCards);
    }

    public function testRemainingCardsCount(): void
    {
        $deck = new Deck;
        $deck->draw(10);
        $this->assertEquals(42,  $deck->getCount());
    }


}