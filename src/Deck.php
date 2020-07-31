<?php

declare(strict_types=1);
require_once 'Card.php';

class Deck {

    public static array $suits = ["D", "S", "C", "H"];
    public static array $ranks = [13, 12, 11, 10, 9, 8, 7, 6, 5, 4, 3, 2, 1];
    protected array $cards = [];

    public function __construct()
    {
        $this->createDeck();
    }

    public function createDeck(): void
    {
        foreach(self::getSuits() as $suit){
            foreach(self::getRanks() as $rank){
                $this->addCard(new Card($suit, $rank));
            }
        }
    }

    public function getSuits(): array
    {
        return self::$suits;
    }

    public function getRanks(): array
    {
        return self::$ranks;
    }

    public function addCard(Card $card): self
    {
        $this->cards[] = $card;

        return $this;
    }

    public function getCount(): int
    {
        return count( $this->getCards());
    }

    public function getCards(): array
    {
        return $this->cards;
    }

    public function shuffle(): void
    {
        shuffle($this->cards);
    }


    // Removes the drawn cards from the deck
    // Return the drawn cards
    public function draw(int $numberOfCards): array
    {
        if (empty($numberOfCards))
            return [];

        array_splice($this->cards, -$numberOfCards);

        return array_slice($this->cards, -$numberOfCards);
    }

}
