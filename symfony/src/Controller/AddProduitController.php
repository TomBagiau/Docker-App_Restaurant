<?php

namespace App\Controller;

use App\Entity\Produit;
use App\Form\ProduitType;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Route;

class AddProduitController extends AbstractController
{
    /**
     * @Route("/add/produit", name="add_produit")
     * @param Request $request
     * @return Response
     */
    public function new(Request $request): Response
    {
        $produit = new Produit();
        $produitForm = $this->createForm(ProduitType::class, $produit);
        $produitForm->handleRequest($request);
        if($produitForm->isSubmitted() && $produitForm->isValid()){
            $em = $this->getDoctrine()->getManager();

            $em->persist($produit);
            $em->flush();
        }

        return $this->render('add_produit/index.html.twig', [
            "produitForm" => $produitForm->createView(),
        ]); 
    }
}