<?php

namespace AppBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use AppBundle\Entity\Cart;
use AppBundle\Entity\ShippingDetails;

class AdminController extends Controller{
    
    public function indexAction(Request $request, $category, $page){
        $paginator = $this->get('knp_paginator');        
        $em = $this->getDoctrine()->getManager();
        $games = $em->getRepository('AppBundle:Game')->getPaginatateGames($paginator, $category, $page);
        $games->setUsedRoute('admin_page');
        return $this->render('AppBundle:Admin:index.html.twig', array(
            'games'=>$games,
            'category' => $category                       
                
        ));
    }
    public function newAction(Request $request){
        $game = new Game();
        $form->createForm('AppBundle\Form\GameType');
        $form->handleRequest($request);
        if ($form->isSubmited() && $form->isValid()) {
            $em = $this->getDoctrne()->getManager();
            
            
        }
        
    }
    public function showAction(){
        
    }
    public function deleteAction(){
        
    }
    public function editAction(){
        
    }
    
    
    public function sidebarAction($currentCategory){
        $em = $this->getDoctrine()->getManager();
        $categories = $em->getRepository('AppBundle:Game')->getCategories();        
        return $this->render('AppBundle:Shared:admin_sidebar.html.twig', array(            
            'categories'=>$categories,
            'currentCategory'=>$currentCategory
                
        ));
        
    }
}