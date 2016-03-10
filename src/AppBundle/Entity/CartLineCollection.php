<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

namespace AppBundle\Entity;

/**
 * Description of CartLineCollection
 *
 * @author Николай
 */
class CartLineCollection implements ICartLineCollection {
   private $_lineCollection = array();
   public function addLine(Game $game, $quantity) {
        $line = $this->getLine($game);
        if (is_null($line)) {
            $cartLine = new CartLine();
            $cartLine->setGame($game);
            $cartLine->setQuantity($quantity);
            $this->_lineCollection[] = $cartLine;
        } else {
            $line->addQuantity($quantity);
        }
    }

    public function deleteLine(Game $game){
       foreach ($this->_lineCollection as $key=>$line){
           $lineGame = $line->getGame();
           if($game->getId() === $lineGame->getId()){
               unset($this->_lineCollection[$key]);
           }
       }
   }
   public function clearCollection(){
       $this->_lineCollection = array();
   }
   /**
    * 
    * @param \AppBundle\Entity\Game $game
    * @return  \AppBundle\Entity\CartLine
    */
   public function getLine(Game $game){
       foreach ($this->_lineCollection as $key=>$line){
           $lineGame = $line->getGame();
           if($game->getId() === $lineGame->getId()){
               return $line;
           }
       }
       return null;
   }
   public function getAllLines(){
       return $this->_lineCollection;
   }
}
