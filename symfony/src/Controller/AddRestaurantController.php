<?php

namespace App\Controller;

use App\Entity\Restaurant;
use App\Form\RestaurantType;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class AddRestaurantController extends AbstractController
{
    /**
     * @Route("/add/restaurant", name="add_restaurant")
     * @param Request $request
     * @return Response
     */
    public function new(Request $request): Response
    {
        $restaurant = new Restaurant();
        $form = $this->createForm(RestaurantType::class, $restaurant);
        $form->handleRequest($request);
        if($form->isSubmitted() && $form->isValid()){
            $em = $this->getDoctrine()->getManager();

            $em->persist($restaurant);
            $em->flush();
        }
        return $this->render('add_restaurant/index.html.twig', [
            "form" => $form->createView()
        ]);
    }
}
