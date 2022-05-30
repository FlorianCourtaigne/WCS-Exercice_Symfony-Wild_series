<?php
// src/Controller/CategoryController.php
namespace App\Controller;

use App\Entity\Program;
use App\Entity\Category;
use App\Repository\CategoryRepository;
use App\Repository\ProgramRepository;
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

    #[Route('/{categoryName}', name: 'show')]
    public function findProgramByCategory(string $categoryName, CategoryRepository $categoryRepository, ProgramRepository $programRepository): Response
    {
            $category = $categoryRepository->findOneByName($categoryName);
            $programs = $programRepository->findByCategory($category);
            
            if (!$category) {
                throw $this->createNotFoundException(
                    'No category with name : '.$categoryName .' found in category\'s table.'
                );
            } else {
            return $this->render('category/show.html.twig', [
                'website' => 'Wild Series',
                'programs' => $programs,
                'category' => $category,
            ]);
        }
    }
}
