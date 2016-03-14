<?php

namespace AppBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use AppBundle\Entity\Cart;
use AppBundle\Entity\Game;
use AppBundle\Entity\ShippingDetails;

class AdminController extends Controller{
    
    public function indexAction(Request $request, $category, $page, $message){
        $paginator = $this->get('knp_paginator');        
        $em = $this->getDoctrine()->getManager();
        $games = $em->getRepository('AppBundle:Game')->getPaginatateGames($paginator, $category, $page);
        $games->setUsedRoute('admin_page');
        return $this->render('AppBundle:Admin:index.html.twig', array(
            'games'=>$games,
            'category' => $category,
            'message'=>$message                       
                
        ));
    }
    public function newAction(Request $request){
        $game = new Game();
        $form->createForm('AppBundle\Form\GameType', $game);
        $form->handleRequest($request);
        if ($form->isSubmited() && $form->isValid()) {
            $em = $this->getDoctrne()->getManager();
            $em->persist($game);
            $em->flash();
            return $this->redirectToRoute('admin_game_index',['id'=>$game->getId()]);
        }
        return $this->render('AppBundle:Admin:new.html.twig', [
            'game'=>$game,
            'form'=>$form->createView()
            
        ]);    
        
    }
    public function showAction(){
        
    }
    public function deleteAction(Request $request, Game $game){
        $em = $this->getDoctrine()->getManager;
        $em->remove(game);
        $em->flush();   
        return $this->redirectToRoute('admin_game_index', [
            'message'=>'Игра '.$game.title.' была удалена'
            ]);    
    }
    public function editAction(Request $request, Game $game){
        $form->createForm('AppBundle\Form\GameType', $game);
        $form->handleRequest($request);
        if ($form->isSubmited() && $form->isValid()) {
            $em = $this->getDoctrne()->getManager();
            $em->persist($game);
            $em->flash();
            return $this->redirectToRoute('admin_game_index', [
            'message'=>'Игра '.$game.title.' была изменена'
            ]);
        }
        return $this->render('AppBundle:Admin:edit.html.twig', [
            'game'=>$game,
            'form'=>$form->createView()            
        ]);    
        
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