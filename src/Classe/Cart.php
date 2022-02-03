<?php

namespace App\Classe;

use Symfony\Component\HttpFoundation\Session\Session;
use Symfony\Component\HttpFoundation\Session\SessionInterface;


class Cart
{

  public function __construct(
    public SessionInterface $session,
  )
  {
    $this->session = $session;
  }

   public function add(int $id)
  {
    $this->session->set('cart' , [
      [  
        'id' => $id,
        'quantity' => 1
      ]
   ]);
  } 
}