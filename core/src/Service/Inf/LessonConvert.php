<?php
/**
 * Created by PhpStorm.
 * @author: Zbyszek Cichanski
 * Date: 08.01.2017
 * Time: 09:05
 */

namespace Core\Service\Inf;

use Core\Service\Dm\Entity\LessonAggregate;
use Core\Service\Inf\Repository\InfLessonRepository;

class LessonConvert
{
    private $repository;

    public function __construct(InfLessonRepository $repository)
    {
        $this->repository = $repository;
    }

    public function getOneByCriteria(array $criteria)
    {
        $lesson = $this->repository->getOneByCriteria($criteria);
        if(empty($lesson)){
            return [];
        }
        $lessonAggregate = $this->buildAggregate($lesson);
        return $lessonAggregate[0];
    }

    public function getByCriteria(array $criteria): array
    {
        $lessonList = $this->repository->getByCriteria($criteria);
        if(empty($lessonList)){
            return [];
        }
        $lessonAggregateList = $this->buildAggregate($lessonList);
        return $lessonAggregateList;
    }

    private function buildAggregate($lessonArray): array
    {
        $result = [];
        foreach($lessonArray as $row){
            $aggregate = new LessonAggregate($row['idLesson']);
            $aggregate->setTeacherId($row['idTeacher']);
            $aggregate->setDate($row['date']);
            $aggregate->setStartTime($row['startTime']);
            $aggregate->setEndTime($row['endTime']);
            $aggregate->setLocation($row['location']);
            if($row['idStudent'] != NULL){
                $aggregate->setStudentId($row['idStudent']);
            }
            $aggregate->setStudentName($row['studentName']);
            $aggregate->setDescription($row['description']);
            if($row['canceled'] == 1){
                $aggregate->setCanceled();
            }
            if($row['canceledByStudent'] == 1){
                $aggregate->setCanceledByStudent();
            }
            if($row['canceledByTeacher'] == 1){
                $aggregate->setCanceledByTeacher();
            }
            if($row['open'] == 1){
                $aggregate->setOpen();
            }
            if($row['atTeacherPlace'] == 1){
                $aggregate->setAtTeacherPlace();
            }
            if($row['atStudentPlace'] == 1){
                $aggregate->setAtStudentPlace();
            }

            $result[]=$aggregate;
        }

        return $result;
    }
}