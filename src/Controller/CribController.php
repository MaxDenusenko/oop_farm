<?php


namespace App\Controller;


use App\Base\Entity\Controller;
use App\Helper\CribHelper;
use App\Service\CribService;

class CribController extends Controller
{
    use CribHelper;

    private $cribService;

    public function __construct()
    {
        $this->cribService = new CribService();
        $this->cribService->edit('Хлев #1');
    }

    public function actionIndex(): void
    {
        $this->cribService->addAnimals($this->createAnimals());
        $this->collection($this->cribService->getAnimals());
        $this->viewResult($this->cribService->getAnimals());
    }
}
