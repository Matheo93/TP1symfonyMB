<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use App\Repository\UserRepository;
use App\Repository\NoteRepository;
use App\Repository\CategoryRepository;

class TPController extends AbstractController
{
    #[Route('/', name: 'app_home')]
    public function home(): Response
    {
        return $this->render('tp/home.html.twig');
    }

    #[Route('/tp', name: 'app_tp')]
    public function index(UserRepository $userRepo, NoteRepository $noteRepo, CategoryRepository $categoryRepo): Response
    {
        $users = $userRepo->findAll();
        $notes = $noteRepo->findAll();
        $categories = $categoryRepo->findAll();

        return $this->render('tp/index.html.twig', [
            'users' => $users,
            'notes' => $notes,
            'categories' => $categories,
        ]);
    }
}