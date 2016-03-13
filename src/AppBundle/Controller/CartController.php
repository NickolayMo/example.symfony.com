<?php

namespace AppBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use AppBundle\Entity\Cart;
use AppBundle\Entity\ShippingDetails;

class CartController extends Controller {

    public function IndexAction(Request $request) {
        $cartLines = $request->getSession()->get("cart");
        $returnUrl = $request->getSession()->get("returnUrl");
        if (is_null($cartLines)) {
            $cartLines = new Cart();
        }
        return $this->render('AppBundle:Cart:index.html.twig', array(
                    'games' => $cartLines->getAllLines(),
                    'total' => $cartLines->computeTotalValue(),
                    'returnUrl' => is_null($returnUrl) ? '' : $returnUrl
        ));
    }

    public function AddToCartAction(Request $request) {
        $returnUrl = $request->request->get('returnUrl');
        $gameId = $request->request->get('gameId');
        $cart = $request->getSession()->get("cart");
        if (is_null($cart)) {
            $cart = new Cart();
        }
        $em = $this->getDoctrine()->getManager();
        $game = $em->getRepository('AppBundle:Game')->find($gameId);
        $cart->addLine($game, 1);
        $request->getSession()->set("cart", $cart);
        $request->getSession()->set("returnUrl", $returnUrl);
        return $this->redirectToRoute('_cart');        
    }

    public function RemoveFromCartAction(Request $request) {       
        $gameId = $request->request->get('gameId');
        $cart = $request->getSession()->get("cart");
        if (is_null($cart)) {
            $cart = new Cart();
        }
        $em = $this->getDoctrine()->getManager();
        $game = $em->getRepository('AppBundle:Game')->find($gameId);
        $cart->deleteLine($game);
        $request->getSession()->set("cart", $cart);        
        return $this->redirectToRoute('_cart');
    }
    
    public function CheckoutAction(Request $request) {
        $cart = $request->getSession()->get("cart");

        $post = new ShippingDetails();
        $form = $this->createForm(\AppBundle\Form\ShippingDetailsType::class, $post);


        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $message = \Swift_Message::newInstance()
                    ->setSubject('Hello Email')
                    ->setFrom('send@example.com')
                    ->setTo('recipient@example.com')
                    ->setBody(
                    $this->renderView(
                            // app/Resources/views/Emails/registration.html.twig
                            'Emails/comfirm.html.twig', array()
                    ), 'text/html'
            );
            $this->get('mailer')->send($message);

            return $this->render('AppBundle:Cart:success.html.twig');
        }
        return $this->render('AppBundle:Cart:checkout.html.twig', array('form' => $form->createView()));
    }

}
