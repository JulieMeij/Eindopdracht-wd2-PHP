<?php

namespace Models;

class Blackjack implements \JsonSerializable
{
    private int $id;
    private array $computer_hand;
    private array $player_hand;
    private int $player_score;
    private int $computer_score;
    private array $deck; 
    private int $points;
    private string $win;

    function __construct(){
        $this->win = "";
        $this->points = 0;
    }

    public function jsonSerialize(): mixed
    {
        return get_object_vars($this);
    }

    public function calculateScore(array $hand){
        $score = 0;
        $ace_count = 0;
        foreach ($hand as $card) {
            $value = $card->getNumber();
            if ($value > 10 && $value < 14) {
                $value = 10;
            }

            //ace is either worth 11 or 1
            if ($value == 14) {
                $value = 11;
                $ace_count++;
            }

            $score += $value;
        }

        //if you go bust because aces are 11 then aces are worth 1;
        for ($i = 0; $i < $ace_count; $i++) {
            if ($score > 21) $score = $score - 10;
        }

        return $score;
    }

    public function Playerscore()
    {
        $this->player_score = $this->calculateScore($this->player_hand);
        return $this->player_score;
    }

    public function Computerscore()
    {
        $this->computer_score = $this->calculateScore($this->computer_hand);
        return $this->computer_score;
    }

    public function setId(int $id)
    {
        $this->id = $id;
    }

    public function getId()
    {
        return $this->id;
    }

    public function setComputerHand(array $computer_hand)
    {
        $this->computer_hand = $computer_hand;
    }

    public function getComputerHand()
    {
        return $this->computer_hand;
    }

    public function setPlayerHand(array $player_hand)
    {
        $this->player_hand = $player_hand;
    }

    public function getPlayerHand()
    {
        return $this->player_hand;
    }

    public function setDeck(array $deck)
    {
        $this->deck = $deck;
    }

    public function getDeck()
    {
        return $this->deck;
    }

    public function setPoints(int $points)
    {
        $this->points = $points;
    }

    public function getPoints()
    {
        return $this->points;
    }

    public function setWin(string $win)
    {
        $this->win = $win;
    }

    public function getWin()
    {
        return $this->win;
    }
}
