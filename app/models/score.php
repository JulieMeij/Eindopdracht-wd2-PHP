<?php

namespace Models;

class Score implements \JsonSerializable {

    private string $username;
    private int $points;

    public function jsonSerialize(): mixed
    {
        return get_object_vars($this);
    }

    public function setUsername(string $uname){
        $this->username = $uname;
    }

    public function getUsername(){
        return $this->username;
    }

    public function setPoints(int $points){
        $this->points = $points;
    }

    public function getPoints(){
        return $this->points;
    }

}