<?php

namespace App\Controller;

use App\Entity\Restaurant;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\RedirectResponse;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class RestaurantsController extends AbstractController
{
    /**
     * @Route("/restaurants", name="restaurants")
     */
    public function index(): Response
    {
        //get all restaurants
        $restaurants = $this->getDoctrine()->getRepository(Restaurant::class)->findAll();

        return $this->render('restaurants/index.html.twig', [
            'restaurants' => $restaurants
        ]);
    }

    /**
     * @Route("/restaurants/{id}", name="menus")
     */
    public function restaurant($id){
        //recuperation de l'id d'un restaurant
        $restaurant = $this->getDoctrine()->getRepository(Restaurant::class)->findOneBy(['id' => $id]);

        //si le restaurant n'existe pas
        if(!$restaurant){
            throw $this->createNotFoundException('Le restaurant n\'existe pas');
        }

        //si le restaurant existe -> envoie à la vue
        return $this->render('restaurants/menus.html.twig', [
            'restaurant' => $restaurant,
            'produits' => $restaurant->getProduits()
        ]);
    }

    /**
     * @Route("restaurant/{id}/delete", name="restaurant_delete")
     * @param Restaurant $restaurant
     * @return RedirectResponse
     */
    public function deleteRestaurant(Restaurant $restaurant): RedirectResponse
    {
        $em = $this->getDoctrine()->getManager();
        $em->remove($restaurant);
        $em->flush();

        return $this->redirectToRoute("restaurants");
    }
}
