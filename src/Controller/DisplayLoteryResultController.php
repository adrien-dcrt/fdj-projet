<?php

namespace App\Controller;

use App\Services\ServiceDraws;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class DisplayLoteryResultController extends AbstractController
{
    /**
     * @Route("/", name="index")
     * @Route("/euromillions/result", name="display_euromillions_result")
     */
    public function index(ServiceDraws $loteryResult): Response
    {
        return $this->render('display_lotery_result/index.html.twig', [
            'controller_name' => 'DisplayLoteryResultController',
            'tirage' => $loteryResult->fetchLoteryResult(),
        ]);
    }
}
