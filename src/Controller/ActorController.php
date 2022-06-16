<?php

namespace App\Controller;

use App\Entity\Actor;
use App\Entity\Program;
use App\Repository\ActorRepository;
use App\Repository\ProgramRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

#[Route('/actor', name: 'actor_')]
class ActorController extends AbstractController
{
    #[Route('/', name: 'index')]
    public function index(ActorRepository $actorRepository): Response
    {
        return $this->render('actor/index.html.twig', [
            'actors' => $actorRepository->findAll(),
        ]);
    }

    #[Route('/{id}', name: 'show', methods: ['GET'])]
    public function show(int $id, Actor $actor, ProgramRepository $programRepository, ActorRepository $actorRepository): Response
    {

        $actor = $actorRepository->findOneById($id);
        $programs = $programRepository->findByActor($actor);

        return $this->render('actor/show.html.twig', [
            'actor' => $actor,
            'programs' => $programRepository->findAll(),
        ]);
    }
}
