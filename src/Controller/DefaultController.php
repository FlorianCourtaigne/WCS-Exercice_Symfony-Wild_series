<?php
// src/Controller/DefaultController.php
namespace App\Controller;

use App\Entity\Category;
use App\Repository\CategoryRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class DefaultController extends AbstractController
{
    #[Route('/', name: 'app_index')]
    public function index(CategoryRepository $categoryRepository): Response
    {
        $categories = $categoryRepository->findAll();
        return $this->render('index.html.twig', 
            ['categories' => $categories
        ]);
    }

    // #[Route('/', name: 'show_category_nav')]
    // public function showCategoryNav(CategoryRepository $categoryRepository): Response
    // {
    //     $categories = $categoryRepository->findAll();
    //     // var_dump($categories); die;
    //     return $this->render('layout/_navbar.html.twig', [
    //         'categories' => $categories,
    //     ]);
    // }
}
