<?php
/**
 * Created by PhpStorm.
 * @author: Zbyszek Cichanski
 * Date: 28.12.2016
 * Time: 15:17
 */

namespace Core\Service\Dm\Specification;

use Core\Core\Specification\AbstractSpecification;
use Core\Service\Dm\Repository\RangeRepository;

class RangeNameIsUnique extends  AbstractSpecification
{
    private $repository;

    public function __construct(RangeRepository $repository)
    {
        $this->repository = $repository;
    }

    public function isSatisfiedBy($name)
    {
        if($this->repository->getRangeByName($name)){
            return false;
        }

        return true;
    }

}