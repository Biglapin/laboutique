<?php

namespace App\Controller;


use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpFoundation\Session\SessionInterface;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\HttpFoundation\Session\Session;




class CartController extends AbstractController
{
    public $session;
    public function __construct( SessionInterface $session)
    {
      $this->session = $session;
    }

    #[Route('/cart', name: 'cart')]
    public function index( $cart): Response
    {
       dd($cart->get());
        return $this->render('cart/index.html.twig');
    }
    
    #[Route('/cart/add/{id}', name: 'add_to_cart')]
    public function add( $cart, int $id): Response
    {
        $cart->add($id);

        return $this->render('cart/index.html.twig');
        $this->session->set('cart' , [
            [  
              'id' => $id,
              'quantity' => 1
            ]
         ]);
    }

    public function get()
    {
        $this->get('cart');
    }
}


