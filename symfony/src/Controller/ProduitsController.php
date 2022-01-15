<?php

namespace App\Controller;

use App\Entity\Produit;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Annotation\Route;

class ProduitsController extends AbstractController
{
    /**
     * @Route("/produits", name="produits")
     */
    public function index(): Response
    {
        //get all produits
        $produits = $this->getDoctrine()->getRepository(Produit::class)->findAll();

        return $this->render('produits/index.html.twig', [
            'produits' => $produits,
        ]);
    }
}
