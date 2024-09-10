<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Doctrine\ORM\EntityManagerInterface;
use App\Repository\PersonRepository;

class PreviewController extends AbstractController
{
    #[Route('/', name: 'home')]
    public function index(PersonRepository $pr): Response
    {
        $name = 'Alex';
        $people = $pr->findAll();
        
        return $this->render('home/index.html.twig', [
            'name' => $name,
            'people' => $people,
        ]);
    }
}