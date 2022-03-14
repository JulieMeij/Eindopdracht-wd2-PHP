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

    public function getOne($id)
    {
        $card = $this->service->getOne($id);

        if (!$card) {
            $this->respondWithError(404, "Card not found");
            return;
        }

        $this->respond($card);
    }

    //nog testen
    public function add()
    {
        try {
            $card = $this->createObjectFromPostedJson("Models\\Card");
            $this->service->add($card);

        } catch (Exception $e) {
            $this->respondWithError(500, $e->getMessage());
        }

        $this->respond($card);
    }

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
