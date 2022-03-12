<?php

namespace Services;

use Repositories\CardRepository;
use Models\Card;

class CardService
{
    public function getAll()
    {
        $repository = new CardRepository();
        return $repository->getAll();
    }

    public function delete($id)
    {
        $repository = new CardRepository();
        return $repository->delete($id);
    }

    public function add($card)
    {
        $default_price = 10;
        $card->setPrice($default_price);
        
        $number = $card->getNumber();
        if ($number > 10) {
            switch ($number) {
                case 11:
                    $card->setName("J");
                    break;
                case 12:
                    $card->setName("Q");
                    break;
                case 13:
                    $card->setName("K");
                    break;
                case 14:
                    $card->setName("A");
                    break;
            }
        } else {
            $card->setName($number);
        }

        $type = $card->getType();
        if ($type == "hearts" || $type == "diams") $card->setColour("red");
        else $card->setColour("black");

        $repository = new CardRepository();
        $repository->add($card);
    }

    public function addWholeDeck(){
        $type = "";
        for($i = 0; $i <= 3; $i++){
            if($i == 0)$type = "hearts"; 
            else if($i == 1)$type = "diams";
            else if($i == 2)$type = "clubs";
            else if($i == 3)$type = "spades";
            
            for($j = 0; $j <= 12; $j++){
                $card = new Card();
                $card->setType($type);
                $card->setNumber($j+2);
                $card->setPrice(10);

                $this->add($card);
            }
        }
    }

    public function deleteAllCards(){
        $repository = new CardRepository();
        $repository->deleteAll();
    }

}
