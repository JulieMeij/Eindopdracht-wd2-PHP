<?php
namespace Repositories;

use PDO;
use PDOException;
use Repositories\Repository;

class UserRepository extends Repository
{
    function checkUsernamePassword($username, $password)
    {
        try {
            // retrieve the user with the given username
            $stmt = $this->connection->prepare("SELECT id, username, password, email FROM user WHERE username = :username");
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
        //return password_verify($input, $hash);
        //TIJDELIJK zonder hash
        if($input == $hash) return true;
        return false;
    }

    function getAll($orderBy)
    {
        if($orderBy == "points"){
            $orderSql = "ORDER BY points DESC";
        }else if($orderBy = "type"){
            $orderSql = "ORDER BY type";
        }else{
            $orderSql = "";
        }
        try {
            $stmt = $this->connection->prepare("SELECT * FROM users $orderSql");
            $stmt->execute();

            $stmt->setFetchMode(PDO::FETCH_CLASS, 'Models\\User');

            $users = $stmt->fetchAll();

            return $users;
        } catch (PDOException $e) {
            return $e;
        }
    }

    function getAllExceptOne($id)
    {
        try {
            $stmt = $this->connection->prepare("SELECT * FROM users Except SELECT * FROM users WHERE id = :id");
            $stmt->bindParam(':id', $id);
            $stmt->execute();

            $stmt->setFetchMode(PDO::FETCH_CLASS, 'Models\\User');

            $users = $stmt->fetchAll();

            return $users;
        } catch (PDOException $e) {
            return $e;
        }
    }

    function getOneforUsername($username){
        try {
            $stmt = $this->connection->prepare("SELECT * FROM users WHERE username = :username");
            $stmt->bindParam(':username', $username);
            $stmt->execute();

            $stmt->setFetchMode(PDO::FETCH_CLASS, 'Models\\User');

            $user = $stmt->fetch();

            return $user;
        } catch (PDOException $e) {
            return $e;
        }
    }

    function getOneforId($id){
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
            $stmt = $this->connection->prepare("INSERT INTO users(username, email, password, points, type) 
            VALUES(:uname, :email, :password, :points, :type)");

            $uname = $user->getUsername();
            $email = $user->getEmail();
            $password = $user->getPassword();
            $points = $user->getPoints();
            $type = $user->getType();

            $stmt->bindParam(':uname', $uname);
            $stmt->bindParam(':email', $email);
            $stmt->bindParam(':password', $password);
            $stmt->bindParam(':points', $points);
            $stmt->bindParam(':type', $type);

            $stmt->execute();
        } catch (PDOException $e) {
            echo $e;
        }
    }

    function edit($user){
        try {
            $stmt = $this->connection->prepare("UPDATE users SET username = :username,
            email = :email, password = :password, points = :points, type = :type WHERE id = :id");

            $username = $user->getUsername();
            $email = $user->getEmail();
            $password = $user->getPassword();
            $points = $user->getPoints();
            $type = $user->getType();
            $id = $user->getId();

            $stmt->bindParam(':username', $username);
            $stmt->bindParam(':email', $email);
            $stmt->bindParam(':password', $password);
            $stmt->bindParam(':points', $points);
            $stmt->bindParam(':type', $type);
            $stmt->bindParam(':id', $id);

            $stmt->execute();

            return "success";
        } catch (PDOException $e) {
            return $e;
        }
    }

    function delete($id)
    {
        try {
            $stmt = $this->connection->prepare('DELETE FROM users WHERE id = :id');
            $stmt->bindParam(':id', $id, PDO::PARAM_INT);
            $stmt->execute();
            return "success";
        } catch (PDOException $e) {
            return $e;
        }
    }

    function getScoreboard(){
        
    }
}
