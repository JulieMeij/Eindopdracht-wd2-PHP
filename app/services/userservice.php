<?php

namespace Services;

use Repositories\UserRepository;
use Models\User;

class UserService
{

    private $repository;

    function __construct()
    {
        $this->repository = new UserRepository();
    }

    function checkUsernamePassword($username, $password)
    {
        return $this->repository->checkUsernamePassword($username, $password);
    }

    public function getAll()
    {
        return $this->repository->getAll("type");
    }

    public function getOne($id)
    {
        return $this->repository->getOne($id);
    }

    public function register($postedUser)
    {
        //default values for all new users
        $default_points = 10;
        $default_type = "user";

        $user = new User();
        $user->username = $postedUser->username;
        $user->password = $postedUser->password;
        $user->points = $default_points;
        $user->type = $default_type;

        return $this->repository->insert($user);
    }

    public function checkUsernameExists($username){
        $user = $this->repository->getOneforUsername($username);
        if($user->username == $username) return true;
        return false;
    }

    public function insert($user)
    {
        return $this->repository->insert($user);
    }

    public function update($user, $id)
    {
        return $this->repository->update($user, $id);
    }

    public function getOneforId($id)
    {
        return $this->repository->getOneforId($id);
    }

    public function delete($id)
    {
        return $this->repository->delete($id);
    }
}
