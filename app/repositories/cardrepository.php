<?php
namespace Repositories;

use PDO;
use PDOException;
use Repositories\Repository;

class CardRepository extends Repository
{
    function getAll()
    {
        try {
            $stmt = $this->connection->prepare("SELECT * FROM cards ORDER BY id DESC");
            $stmt->execute();

            $stmt->setFetchMode(PDO::FETCH_CLASS, 'Models\\Card');

            $cards = $stmt->fetchAll();

            return $cards;
        } catch (PDOException $e) {
            return $e;
        }
    }

    function getOne($id){
        try {
            $stmt = $this->connection->prepare("SELECT * FROM cards WHERE id = :id");
            $stmt->bindParam(':id', $id);
            $stmt->execute();

            $stmt->setFetchMode(PDO::FETCH_CLASS, 'Models\\Card');

            $card = $stmt->fetch();

            return $card;
        } catch (PDOException $e) {
            return $e;
        }
    }

    function delete($id)
    {
        try {
            $stmt = $this->connection->prepare('DELETE FROM cards WHERE id = :id');
            $stmt->bindParam(':id', $id, PDO::PARAM_INT);
            $stmt->execute();
            return "success";
        } catch (PDOException $e) {
            return $e;
        }
    }

    function add($card)
    {
        try {
            $stmt = $this->connection->prepare("INSERT INTO cards(number, name, colour, type, price) 
            VALUES(:number, :name, :colour, :type, :price)");

            $number = $card->getNumber();
            $name = $card->getName();
            $colour = $card->getColour();
            $type = $card->getType();
            $price = $card->getPrice();

            $stmt->bindParam(':number', $number);
            $stmt->bindParam(':name', $name);
            $stmt->bindParam(':colour', $colour);
            $stmt->bindParam(':type', $type);
            $stmt->bindParam(':price', $price);

            $stmt->execute();
        } catch (PDOException $e) {
            return $e;
        }
    }

    function deleteAll(){
        try {
            $stmt = $this->connection->prepare('DELETE FROM cards');
            $stmt->execute();
        } catch (PDOException $e) {
            return $e;
        }
    }

}
