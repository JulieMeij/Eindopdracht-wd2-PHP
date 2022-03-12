<?php

namespace Models;

class Card implements \JsonSerializable {
    
    private int $id;
    private int $number;
    private string $name;
    private string $colour;
    private string $type;
    private int $price;

    public function jsonSerialize(): mixed {
        return get_object_vars($this);
    }

    public function setId(int $id){
        $this->id = $id;
    }

    public function getId(){
        return $this->id;
    }

    public function setNumber(int $number){
        $this->number = $number;
    }

    public function getNumber(){
        return $this->number;
    }

    public function setName(string $name){
        $this->name = $name;
    }

    public function getName(){
        return $this->name;
    }

    public function setColour(string $colour){
        $this->colour = $colour;
    }

    public function getColour(){
        return $this->colour;
    }

    public function setType(string $type){
        $this->type = $type;
    }

    public function getType(){
        return $this->type;
    }

    public function setPrice(int $price){
        $this->price = $price;
    }

    public function getPrice(){
        return $this->price;
    }

}