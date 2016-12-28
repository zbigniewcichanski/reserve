<?php
/**
 * Created by PhpStorm.
 * @author: Zbyszek Cichanski
 * Date: 27.12.2016
 * Time: 22:34
 */

namespace Core\Service\Inf;

use Core\Service\Dm\Entity\CategoryAggregate;
use Core\Service\Inf\Repository\InfCategoryRepository;

class CategoryConvert
{
    private $repository;

    public function __construct(InfCategoryRepository $repository)
    {
        $this->repository = $repository;
    }

    public function getOneByCriteria($criteria)
    {
        $category = $this->repository->getOneByCriteria($criteria);
        if(empty($category)){
            return [];
        }
        $categoryAggregate = $this->buildCategory($category);
        return $categoryAggregate[0];
    }

    private function buildCategory($categoryArray)
    {
        $result = [];
        foreach($categoryArray as $row){
            $categoryAggregate = new CategoryAggregate($row['idCategory']);
            $categoryAggregate->setName($row['name']);
            if($row['idParentCategory'] != null){
                $categoryAggregate->setParentCategoryId($row['idParentCategory']);
            }
            $result[]=$categoryAggregate;
        }

        return $result;
    }
}