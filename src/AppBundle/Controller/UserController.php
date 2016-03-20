<?php
namespace AppBundle\Controller;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Compoponent\Security\Core\SecurityContextInterface;
class UserController extends Controller
{
    
    public function LoginAction(){
        $authenticationUtils = $this->get('security.authentication_utils');
        $error = $authenticationUtils->getLastAuthenticationError();
        return $this->render('AppBundle:User:login.html.twig', ['error'=>$error,]);
    }
    public function LogOutAction(){
        
    }
}
