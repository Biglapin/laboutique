<?php

namespace App\Controller;

use App\Entity\Product;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpFoundation\Session\SessionInterface;
use Symfony\Component\Routing\Annotation\Route;


class CartController extends AbstractController
{
    #[Route('/cart', name: 'cart')]
    public function index(SessionInterface $session): Response
    {
        $cart = $session->get('cart');
        dd($cart);
        return $this->render('cart/index.html.twig', [
            'cart' => $cart
        ]);
    }
    
    #[Route('/cart/add/{id}', name: 'add_to_cart')]
    public function add(int $id, SessionInterface $session, Product $product): Response
    {
        $session->set('cart', $product);
        return $this->redirectToRoute('cart');
    }

}


