<?php

namespace AppBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Session\Session;

class CartController extends Controller
{
    
    public function IndexAction($returnUrl)
    {
        
        $session = $this->getRequest()->getSession();
        
        return $this->render('AppBundle:Cart:index.html.twig', array(
            // ...
        ));
    }

    public function AddToCartAction($gameId, $returnUrl)
    {
        return $this->redirectToRoute('_cart');
    }

}
