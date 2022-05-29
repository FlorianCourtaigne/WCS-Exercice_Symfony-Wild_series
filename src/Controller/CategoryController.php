<?php
// src/Controller/CategoryController.php
namespace App\Controller;

use App\Entity\Category;
use App\Repository\CategoryRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Doctrine\Persistence\ManagerRegistry;

#[Route('/category', name: 'category_')]
class CategoryController extends AbstractController
{
    #[Route('/', name: 'index')]
    public function index(CategoryRepository $categoryRepository): Response
    {
        $categories = $categoryRepository->findAll();
        return $this->render('category/index.html.twig', [
            'website' => 'Wild Series',
            'categories' => $categories,
        ]);
    }

    #[Route('/category/{categoryName}', name: 'show')]
    public function show(string $categoryName, Program $programInCategory) : Response
    {
        $category = $categoryRepository->findBy(['categoryName' => $categoryName]);
        
        if (!$category) {
            throw $this->createNotFoundException(
                'No category with name : '.$categoryName .' found in category\'s table.'
            );
        } else {
            $programByCategory = $programInCategory->getTitle();
        }

        return $this->render('category/show.html.twig', [
            'categoryName' => $categoryName, 
    ]);
    }
}