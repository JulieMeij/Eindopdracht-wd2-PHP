<?php

namespace Services;

use Repositories\UserRepository;
use Models\Score;

class ScoreService {

    private $repository;

    function __construct(){
        $this->repository = new UserRepository();
    }

    public function getAll($offset = NULL, $limit = NULL){
        $users =  $this->repository->getAll("points", $offset, $limit);

        $scoreboard = [];
        foreach($users as $user){
            $score = new Score();
            $score->username = $user->username;
            $score->points = $user->points;
            array_push($scoreboard, $score);
        }

        return $scoreboard;
    }

    //to do
    public function getPoints($id){
        $user =  $this->repository->getOneForId($id);
        return $user->points;
    }

    public function setPoints($score, $id){
        $newpoints = $this->getPoints($id) + $score;
       
        $user = $this->repository->getOneforId($id);
        $user->points = $newpoints;
        return $this->repository->update($user, $id);
    }
}