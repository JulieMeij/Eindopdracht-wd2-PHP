<?php

namespace Services;

use Repositories\UserRepository;
use Models\User;

class UserService{
    public function getAll(){
        $repository = new UserRepository();
        return $repository->getAll("type");
    }

    public function getAllExceptOne($id){
        $repository = new UserRepository();
        return $repository->getAllExceptOne($id);
    }

    public function register($uname, $email, $password){
        $repository = new UserRepository();
        
        //default values for all new users
        $default_points = 10;
        $default_type = "user";  
        
        $user = new User();
        $user->setUsername($uname);
        $user->setEmail($email);
        $user->setPassword($password);
        $user->setPoints($default_points);
        $user->setType($default_type);
        
        $repository->insert($user);
    }

    public function addUser($user){
        $repository = new UserRepository();
        return $repository->insert($user);
    }

    public function edit($user){
        $repository = new UserRepository();
        return $repository->edit($user);
    }

    public function getOneforId($id){
        $repository = new UserRepository();
        return $repository->getOneforId($id);
    }

    public function getOneforUsername($username){
        $repository = new UserRepository();
        return $repository->getOneforUsername($username);
    }

    public function delete($id)
    {
        $repository = new UserRepository();
        return $repository->delete($id);
    }
}