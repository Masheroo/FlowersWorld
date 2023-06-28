<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class WhereFindUsController extends AbstractController
{
    #[Route('/where/find/us', name: 'app_where_find_us')]
    public function index(): Response
    {
        return $this->render('where_find_us/index.html.twig', [
            'page_name' => 'Где найти нас?',
        ]);
    }
}
