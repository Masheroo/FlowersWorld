<?php

namespace App\Controller;

use App\Repository\ProductRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class CatalogController extends AbstractController
{
    #[Route('/catalog', name: 'catalog')]
    public function index(ProductRepository $productRepository): Response
    {
        return $this->render('catalog/index.html.twig', [
            'page_name' => 'Каталог',
            'products' => $productRepository->findAll()
        ]);
    }
}
