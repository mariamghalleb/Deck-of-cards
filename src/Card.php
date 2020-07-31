<?php

declare(strict_types=1);

class Card
{
    const SUITS = [
        'H' => 'Hearts',
        'C' => 'Clubs',
        'D' => 'Diamonds',
        'S' => 'Spades'
    ];
    const VALUES = [
        1 => 'Ace',
        2 => 'Two',
        3 => 'Three',
        4 => 'Four',
        5 => 'Five',
        6 => 'Six',
        7 => 'Seven',
        8 => 'Eight',
        9 => 'Nine',
        10 => 'Ten',
        11 => 'Jack',
        12 => 'Queen',
        13 => 'King'
    ];
    protected string $suit;
    protected int $rank;

    function __construct($suit = null, $rank = null) {
        if ( !is_null($suit) ) {
            $this->setSuit($suit);
        }

        if ( !is_null($rank) ) {
            $this->setRank($rank);
        }
    }

    public function getRank(): int
    {
        return $this->rank;
    }

    public function setRank(int $rank): void
    {
        if ( !$this->isValidRank($rank)) {
            throw new Exception("An invalid rank was set for a card: $rank");
        }

        $this->rank = $rank;
    }

    public function getSuit(): string
    {
        return $this->suit;
    }

    public function setSuit(string $suit): void
    {
        if ( !$this->isValidSuit($suit)) {
            throw new Exception("An invalid suit was set for a card: $suit");
        }

        $this->suit = $suit;
    }

    public function isFaceCard(): bool
    {
        return $this->rank > 10;
    }

    public function __toString(): string {

        return self::VALUES[$this->rank] .' of ' . self::SUITS[$this->suit] ;
    }
    
    protected function isValidRank(int $rank): bool
    {
        return array_key_exists($rank, self::VALUES);
    }

    protected function isValidSuit(string $suit): bool
    {
        return array_key_exists($suit, self::SUITS);
    }
}
