<?php
/**
 * Created by PhpStorm.
 * @author: Zbyszek Cichanski
 * Date: 28.12.2016
 * Time: 15:17
 */

namespace Core\Service\Dm\Specification;

use Core\Core\Specification\AbstractSpecification;
use Core\Service\Dm\Repository\TeacherRepository;

class TeacherEmailIsUnique extends  AbstractSpecification
{
    private $repository;

    public function __construct(TeacherRepository $repository)
    {
        $this->repository = $repository;
    }

    public function isSatisfiedBy($email)
    {
        if($this->repository->getTeacherByEmail($email)){
            return false;
        }

        return true;
    }

}