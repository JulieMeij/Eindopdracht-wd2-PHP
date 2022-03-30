<?php

namespace Controllers;

use Exception;
use Services\UserService;
use Firebase\JWT\JWT;
use Firebase\JWT\Key;

class UserController extends Controller
{
    private $service;
    // initialize services
    function __construct()
    {
        $this->service = new UserService();
    }
    public function login()
    {
        try {
            $postedUser = $this->createObjectFromPostedJson("Models\\User");
            $user = $this->service->checkUsernamePassword($postedUser->username, $postedUser->password);
            if (!$user) {
                $this->respondWithError(401, "Invalid credentials");
                return false;
            }
            $key = "thismustbesecret";
            $payload = array(
                "iss" => "http://localhost",
                "aud" => "http://localhost",
                "iat" => time(),
                "nbf" => time(),
                "exp" => time() + 600,
                "data" => array(
                    "id" => $user->id,
                    "username" => $user->username
                )
            );
            $jwt = JWT::encode($payload, $key, 'HS256');

            $this->respond(
                ["token" => $jwt,
                "username" => $user->username,
                "type" => $user->type]
            );
        } catch (Exception $e) {
            $this->respondWithError(500, $e->getMessage());
        }
    }

    public function register()
    {
    }

    public function getAll()
    {
        try {
            $users = $this->service->getAll();
        } catch (Exception $e) {
            $this->respondWithError(500, $e->getMessage());
        }

        $this->respond($users);
    }

    public function getOne($id)
    {
        $user = $this->service->getOne($id);
        if (!$user) {
            $this->respondWithError(404, "User not found");
            return;
        }
        $this->respond($user);
    }

    public function update($id)
    {
        try {
            $user = $this->createObjectFromPostedJson("Models\\User");
            $user = $this->service->update($user, $id);
        } catch (Exception $e) {
            $this->respondWithError(500, $e->getMessage());
        }

        $this->respond($user);
    }

    public function create()
    {
        try {
            $user = $this->createObjectFromPostedJson("Models\\User");
            $user = $this->service->insert($user);
        } catch (Exception $e) {
            $this->respondWithError(500, $e->getMessage());
        }

        $this->respond($user);
    }

    public function delete($id)
    {
        try {
            $success = $this->service->delete($id);
        } catch (Exception $e) {
            $this->respondWithError(500, $e->getMessage());
        }

        $this->respond($success);
    }
}
