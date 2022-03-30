<?php

namespace Repositories;

use PDO;
use PDOException;
use Repositories\Repository;

class UserRepository extends Repository
{
    //to do
    function checkUsernamePassword($username, $password)
    {
        try {
            // retrieve the user with the given username
            $stmt = $this->connection->prepare("SELECT id, username, password, points, type FROM users WHERE username = :username");
            $stmt->bindParam(':username', $username);
            $stmt->execute();

            $stmt->setFetchMode(PDO::FETCH_CLASS, 'Models\\User');
            $user = $stmt->fetch();

            // verify if the password matches the hash in the database
            $result = $this->verifyPassword($password, $user->password);

            if (!$result)
                return false;

            // do not pass the password hash to the caller
            $user->password = "";

            return $user;
        } catch (PDOException $e) {
            echo $e;
        }
    }


    // hash the password (currently uses bcrypt)
    function hashPassword($password)
    {
        return password_hash($password, PASSWORD_DEFAULT);
    }

    // verify the password hash
    function verifyPassword($input, $hash)
    {
        return password_verify($input, $hash);
    }

    function getAll($orderBy, $offset = NULL, $limit = NULL)
    {
        if ($orderBy == "points") {
            $orderSql = "ORDER BY points DESC";
        } else if ($orderBy = "type") {
            $orderSql = "ORDER BY type";
        } else {
            $orderSql = "";
        }
        try {
            $query = "SELECT * FROM users $orderSql";
            if (isset($limit) && isset($offset)) {
                $query .= " LIMIT :limit OFFSET :offset ";
            }
            $stmt = $this->connection->prepare($query);
            if (isset($limit) && isset($offset)) {
                $stmt->bindParam(':limit', $limit, PDO::PARAM_INT);
                $stmt->bindParam(':offset', $offset, PDO::PARAM_INT);
            }
            $stmt->execute();

            $stmt->setFetchMode(PDO::FETCH_CLASS, 'Models\User');
            $users = $stmt->fetchAll();

            return $users;
        } catch (PDOException $e) {
            echo $e;
        }
    }

    function getOne($id)
    {
        try {
            $stmt = $this->connection->prepare("SELECT * FROM users WHERE id = :id");
            $stmt->bindParam(':id', $id);
            $stmt->execute();

            $stmt->setFetchMode(PDO::FETCH_CLASS, 'Models\\User');

            $user = $stmt->fetch();

            return $user;
        } catch (PDOException $e) {
            echo $e;
        }
    }

    //to do
    function getOneforId($id)
    {
        try {
            $stmt = $this->connection->prepare("SELECT * FROM users WHERE id = :id");
            $stmt->bindParam(':id', $id);
            $stmt->execute();

            $stmt->setFetchMode(PDO::FETCH_CLASS, 'Models\\User');

            $user = $stmt->fetch();

            return $user;
        } catch (PDOException $e) {
            return $e;
        }
    }

    function insert($user)
    {
        try {
            $stmt = $this->connection->prepare("INSERT INTO users(username, password, points, type) 
            VALUES(:uname, :password, :points, :type)");

            $stmt->bindParam(':uname', $user->username);

            //hashes password before storing in database
            $hashed_password = $this->hashPassword($user->password);
            $stmt->bindParam(':password', $hashed_password);

            $stmt->bindParam(':points', $user->points);
            $stmt->bindParam(':type', $user->type);

            $stmt->execute();

            return $user;
        } catch (PDOException $e) {
            echo $e;
        }
    }

    function update($user, $id)
    {
        try {
            $stmt = $this->connection->prepare("UPDATE users SET username = ?,
             password = ?, points = ?, type = ? WHERE id = ?");

            $stmt->execute([$user->username, $user->password, $user->points, $user->type, $id]);

            return $this->getOneforId($id);
        } catch (PDOException $e) {
            echo $e;
        }
    }

    //to do
    function delete($id)
    {
        try {
            $stmt = $this->connection->prepare('DELETE FROM users WHERE id = :id');
            $stmt->bindParam(':id', $id, PDO::PARAM_INT);
            $stmt->execute();
            return true;
        } catch (PDOException $e) {
            echo $e;
        }
        return false;
    }
}
