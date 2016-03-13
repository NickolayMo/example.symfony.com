<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

namespace AppBundle\Entity;

/**
 * Description of CartLine
 *
 * @author Николай
 */
class CartLine {
    private $_game;
    private $_quantity;
    public function setGame(Game $game){
        $this->_game = $game;
    }
    public function getGame(){
        return $this->_game;
    }
    
    public function setQuantity($quantity){
        $this->_quantity = $quantity;
    }
    public function getQuantity(){
        return $this->_quantity;
    }
    public function addQuantity($quantity){
        $this->_quantity += $quantity;
    }
    
}
