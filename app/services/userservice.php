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

    public function register($uname, $email, $password)
    {
        //default values for all new users
        $default_points = 10;
        $default_type = "user";

        $user = new User();
        $user->username = $uname;
        $user->email = $email;
        $user->password = $password;
        $user->points = $default_points;
        $user->type = $default_type;

        $this->repository->insert($user);
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
