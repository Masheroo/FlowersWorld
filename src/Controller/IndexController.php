<?php

namespace App\Controller;

use App\Repository\ProductRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class IndexController extends AbstractController
{
    #[Route('/', name: 'about_us')]
    public function index(ProductRepository $productRepository): Response
    {

        return $this->render('index.html.twig', [
            'page_name' => "О нас",
            'products' => $productRepository->findAll()
        ]);
    }
}
