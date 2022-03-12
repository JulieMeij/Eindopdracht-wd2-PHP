<?php

namespace Controllers;

use Exception;
use Services\CardService;

class CardController extends Controller
{
    private $service;


    function __construct()
    {
        $this->service = new CardService();
    }

    public function getAll()
    {
        $cards = $this->service->getAll();

        $this->respond($cards);
    }

    //     public function getOne($id)
    //     {
    //         $category = $this->service->getOne($id);

    //         // we might need some kind of error checking that returns a 404 if the product is not found in the DB
    //         if (!$category) {
    //             $this->respondWithError(404, "Category not found");
    //             return;
    //         }

    //         $this->respond($category);
    //     }

    //     public function create()
    //     {
    //         try {
    //             $category = $this->createObjectFromPostedJson("Models\\Category");
    //             $this->service->insert($category);

    //         } catch (Exception $e) {
    //             $this->respondWithError(500, $e->getMessage());
    //         }

    //         $this->respond($category);
    //     }

    //     public function update($id)
    //     {
    //         try {
    //             $category = $this->createObjectFromPostedJson("Models\\Category");
    //             $this->service->update($category, $id);

    //         } catch (Exception $e) {
    //             $this->respondWithError(500, $e->getMessage());
    //         }

    //         $this->respond($category);
    //     }

    //     public function delete($id)
    //     {
    //         try {
    //             $this->service->delete($id);
    //         } catch (Exception $e) {
    //             $this->respondWithError(500, $e->getMessage());
    //         }

    //         $this->respond(true);
    //     }
    // }
}
