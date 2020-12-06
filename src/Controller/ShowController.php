<?php

namespace App\Controller;

use App\Entity\Show;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class ShowController extends AbstractController
{
    /**
     * @Route("/", name="homepage")
     */
    public function index(): Response
    {
        $repository = $this->getDoctrine()->getRepository(Show::class);
        return $this->render('concert/index.html.twig', [
            'controller_name' => 'ConcertController',
            'concert_list' => $repository->findAll()
        ]);
    }


    /**
     * Affiche une liste de concerts
     *
     * @param string $name
     * @return Response
     *
     * @Route("/show/{name}", name="list")
     */
    public function list(string $name): Response
    {
        $repository = $this->getDoctrine()->getRepository(Show::class);

        return $this->render('show/list.html.twig', [
            'name' => $name,
            'concerts' => $repository->findAll()
            ]
        );
    }
}
