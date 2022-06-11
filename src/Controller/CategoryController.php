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
use App\Form\CategoryType;
use Symfony\Component\HttpFoundation\Request;

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

    #[Route('/new', name: 'new')]
    public function new(Request $request, CategoryRepository $categoryRepository): Response
    {
        $category = new Category();

        // Create the form, linked with $category
        $form = $this->createForm(CategoryType::class, $category);
        
        $form->handleRequest($request);
        // Was the form submitted ?
        if ($form->isSubmitted()) {
            $categoryRepository->add($category, true);            

            // Redirect to categories list
            return $this->redirectToRoute('category_index');
        }
        // Render the form (best practice)
        return $this->renderForm('category/new.html.twig', [
            'form' => $form,
        ]);

        // Alternative
        // return $this->render('category/new.html.twig', [
        //   'form' => $form->createView(),
        // ]);
    }

    #[Route('/{categoryName}', name: 'show')]
    public function findProgramByCategory(string $categoryName, CategoryRepository $categoryRepository, ProgramRepository $programRepository): Response
    {
        
            $category = $categoryRepository->findOneByName($categoryName);
            $programs = $programRepository->findByCategory($category);
            
            if (!$category) {
                throw $this->createNotFoundException(
                    'Aucune catégorie nommée '.$categoryName .''
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
