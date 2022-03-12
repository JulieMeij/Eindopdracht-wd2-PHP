<?php

namespace Models;

class User {
    private int $id;
    private string $username;
    private string $email;
    private string $password;
    private int $points;
    private string $type;

    public function setId(int $id){
        $this->id = $id;
    }

    public function getId(){
        return $this->id;
    }

    public function setUsername(string $uname){
        $this->username = $uname;
    }

    public function getUsername(){
        return $this->username;
    }

    public function setEmail(string $email){
        $this->email = $email;
    }

    public function getEmail(){
        return $this->email;
    }

    public function setPassword(string $password){
        $this->password = $password;
    }

    public function getPassword(){
        return $this->password;
    }

    public function setPoints(int $points){
        $this->points = $points;
    }

    public function getPoints(){
        return $this->points;
    }

    public function setType(string $type){
        $this->type = $type;
    }

    public function getType(){
        return $this->type;
    }




}