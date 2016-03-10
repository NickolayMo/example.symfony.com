<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

namespace AppBundle\Repository;

/**
 * Description of GameRepository
 *
 * @author Николай
 */
class GameRepository extends \Doctrine\ORM\EntityRepository{
    const PAGE_SIZE = 4;

    public function getPaginatateGames($paginator, $category, $page) {

        $games = $this->createQueryBuilder('game')
                ->select();
        if (!empty($category)) {
            $games->where('game.category=?1')
                    ->setParameter(1, $category);
        }

        $query = $games->getQuery();

        $pagination = $paginator->paginate(
                $query, /* query NOT result */ $page/* page number */, self::PAGE_SIZE/* limit per page */
        );
        $pagination->setUsedRoute('_page');

        return $pagination;
    }
    public function getCategories(){
        $categories = $this->createQueryBuilder('game')
                ->select('game.category')
                ->distinct()
                ->getQuery()
                ->getResult();      
        return $categories;
    }
}
