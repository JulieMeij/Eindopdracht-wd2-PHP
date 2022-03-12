<?php

namespace Services;

use Repositories\UserRepository;
use Models\Score;

class ScoreService {

    public function getAll(){
        $repository = new UserRepository();
        $users =  $repository->getAll("points");

        $scoreboard = [];
        foreach($users as $user){
            $score = new Score();
            $score->setUsername($user->getUsername());
            $score->setPoints($user->getPoints());
            array_push($scoreboard, $score);
        }

        return $scoreboard;
    }

    public function getPoints($username){
        $repository = new UserRepository();
        
        $user =  $repository->getOneForUsername($username);
        return $user->getPoints();
    }

    public function setPoints($username, $points){
        $repository = new UserRepository();
        $newpoints = $this->getPoints($username) + $points;
       
        $user = $repository->getOneforUsername($username);
        $user->setPoints($newpoints);
        $repository->edit($user);
    }
}