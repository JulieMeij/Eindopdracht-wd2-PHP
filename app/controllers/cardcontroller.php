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

}

