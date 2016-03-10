<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

namespace AppBundle\Entity;

/**
 *
 * @author Николай
 */
interface ICartLineCollection {
   public function addLine(Game $game, $quantity);
   public function deleteLine(Game $game);
   public function clearCollection();
   public function getLine(Game $game);
   public function getAllLines();
   
}
