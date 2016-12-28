<?php
/**
 * Created by PhpStorm.
 * @author: Zbyszek Cichanski
 * Date: 28.12.2016
 * Time: 15:17
 */

namespace Core\Service\Dm\Specification;

use Core\Core\Specification\AbstractSpecification;
use Core\Core\Specification\Specification;
use Core\Service\Dm\Repository\CategoryRepository;

class CategoryNameIsUnique extends  AbstractSpecification
{
    private $repository;

    public function __construct(CategoryRepository $repository)
    {
        $this->repository = $repository;
    }

    public function isSatisfiedBy($name)
    {
        if($this->repository->getCategoryByName($name)){
            return false;
        }

        return true;
    }

}