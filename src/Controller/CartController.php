<?php

namespace App\Controller;

use App\Service\Cart\CartService;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

class CartController extends AbstractController
{
    /**
     * @Route("/panier", name="cart_index")
     */
    public function index(CartService $cartService)
    {

        return $this->render('cart/panier.html.twig', [
          'items'=> $cartService->getFullCart(),
          'total' => $cartService->getTotal(),
          'user' => $this->getUser()
        ]);
    }

    /**
     * @Route("/panier/add/{id}", name="cart_add")
     */
    public function add($id, CartService $cartService)
    {
      $cartService->add($id);

      return $this->redirectToRoute('cart_index');
    }

    /**
     * @Route("/panier/remove/{id}", name="cart_remove")
     */
    public function remove($id, CartService $cartService)
    {
      $cartService->remove($id);

      return $this->redirectToRoute('cart_index');
    }
}
