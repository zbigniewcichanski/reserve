<?php
/**
 * Created by PhpStorm.
 * @author: Zbyszek Cichanski
 * Date: 27.12.2016
 * Time: 22:34
 */

namespace Core\Service\Inf;

use Core\Service\Dm\Entity\TeacherAggregate;
use Core\Service\Inf\Repository\InfTeacherRepository;

class TeacherConvert
{
    private $repository;

    public function __construct(InfTeacherRepository $repository)
    {
        $this->repository = $repository;
    }

    public function getOneByCriteria($criteria)
    {
        $teacher = $this->repository->getOneByCriteria($criteria);
        if(empty($teacher)){
            return [];
        }
        $teacherAggregate = $this->buildAggregate($teacher);
        return $teacherAggregate[0];
    }

    public function getByCriteria($criteria)
    {
        $teacherList = $this->repository->getOneByCriteria($criteria);
        if(empty($teacherList)){
            return [];
        }
        $teacherAggregateList = $this->buildAggregate($teacherList);
        return $teacherAggregateList;
    }


    private function buildAggregate($teacherArray)
    {
        $result = [];
        foreach($teacherArray as $row){
            $teacherAggregate = new TeacherAggregate($row['idTeacher']);
            $teacherAggregate->setName($row['firstName']);
            $teacherAggregate->setSurname($row['lastName']);
            $teacherAggregate->setEmail($row['email']);
            $teacherAggregate->setCity($row['city']);
            $teacherAggregate->setPostCode($row['postCode']);
            if($row['driveToStudent']  == 1){
                $teacherAggregate->driveToStudent();
            }
            $result[]=$teacherAggregate;
        }

        return $result;
    }
}