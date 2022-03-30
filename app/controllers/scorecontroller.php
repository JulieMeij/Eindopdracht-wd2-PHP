<?php

namespace Controllers;

use Exception;
use Services\ScoreService;

class ScoreController extends Controller
{
    private $service;


    function __construct()
    {
        $this->service = new ScoreService();
    }

    public function getAll()
    {
        $offset = NULL;
        $limit = NULL;

        if (isset($_GET["offset"]) && is_numeric($_GET["offset"])) {
            $offset = $_GET["offset"];
        }
        if (isset($_GET["limit"]) && is_numeric($_GET["limit"])) {
            $limit = $_GET["limit"];
        }

        $scoreboard = $this->service->getAll($offset, $limit);

        $this->respond($scoreboard);
    }
}
