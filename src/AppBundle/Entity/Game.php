<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of Game
 *
 * @author Николай
 */
namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Game
 * 
 * @ORM\Table(name="game")
 * @ORM\Entity(repositoryClass="AppBundle\Repository\GameRepository")
 */
class Game {
    /**
     * @var int
     * 
     * @ORM\Column(name="id", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    private $id;
    
    /**
     * @var string 
     * 
     * @ORM\Column(name="title", type="string", length=100)
     * 
     */
    private $title;
    
    /**
     *
     * @var string
     * 
     * @ORM\Column(name="description", type="text")
     */
    private $description;
    
    /**
     *
     * @var string
     * 
     * @ORM\Column(name="category", type="string", length=50)
     */
    private $category;
    
    /**
     *
     * @var float 
     * 
     * @ORM\Column(name="price", type="float")
     */
    private $price;


    /**
     * 
     * @return int
     */
    public function getId(){
        return $this->id;
    }
    
    /**
     * 
     * @return string
     */
    public function getTitle(){
        return $this->title;
    }
    
    /**
     * 
     * @param string $title
     * @return \AppBundle\Entity\Game
     */
    public function setTitle($title){
        $this->title = $title;
        return $this;
    }
    
    /**
     * 
     * @return string
     */
    public function getDescription(){
        return $this->description;
    }
    
    /**
     * 
     * @param string $description
     * @return \AppBundle\Entity\Game
     */
    public function setDescription($description){
        $this->description = $description;
        return $this;
    }
    
     /**
     * 
     * @return string
     */
    public function getCategory(){
        return $this->category;
    }
    
    /**
     * 
     * @param string $category
     * @return \AppBundle\Entity\Game
     */
    public function setCategory($category){
        $this->category = $category;
        return $this;
    }
    /**
     * 
     * @return float
     */
    public function getPrice(){
        return $this->price;
    }
    /**
     * 
     * @param float $price
     * @return \AppBundle\Entity\Game
     */
    public function setPrice($price){
        $this->price = $price;
        return $this;
    }
}
