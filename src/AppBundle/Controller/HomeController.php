<?php

namespace AppBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
class HomeController extends Controller
{
    public function IndexAction(Request $request, $category, $page)
    {
        $returnUrl = $request->getRequestUri();
        $paginator = $this->get('knp_paginator');        
        $em = $this->getDoctrine()->getManager();
        $games = $em->getRepository('AppBundle:Game')->getPaginatateGames($paginator, $category, $page);
        return $this->render('AppBundle:Home:index.html.twig', array(
            'games'=>$games,
            'category' => $category,
            'returnUrl'=> $returnUrl
                
        ));
    }
    
    public function sidebarAction($currentCategory){
        $em = $this->getDoctrine()->getManager();
        $categories = $em->getRepository('AppBundle:Game')->getCategories();        
        return $this->render('AppBundle:Shared:sidebar.html.twig', array(            
            'categories'=>$categories,
            'currentCategory'=>$currentCategory
                
        ));
        
    }

}
