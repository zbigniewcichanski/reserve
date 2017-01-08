<?php
/**
 * Created by PhpStorm.
 * @author: Zbyszek Cichanski
 * Date: 07.01.2017
 * Time: 16:24
 */

namespace Core\Service\Dm\Repository;

use Core\Core\Repository;
use Core\Service\Inf\LessonConvert;

class LessonRepository extends Repository
{
    /**
     * @var LessonConvert
     */
    private $repository;

    public function __construct(LessonConvert $repository)
    {

        $this->repository = $repository;
    }

    public function getOnIdentity($identity)
    {
        try {
            $lesson = $this->repository->getOneByCriteria(['id' => $identity]);
            if (empty($lesson)) {
                return false;
            }
            return $lesson;
        } catch (\Exception $e){
            throw new \Exception ("Błąd w procesie pobierania lekcji na podstawie id.".$e->getMessage());
        }
    }

    public function getAll()
    {
        // TODO: Implement getAll() method.
    }


    public function getTeacherScheduleForDay($teacherId, $date)
    {

    }

    public function getTeacherScheduleForAWeek($teacherId, $startDate)
    {

    }

    public function getFreeTermsForDay($date): array
    {
        try {
            $lessonList = $this->repository->getByCriteria(['date' => $date, 'open'=>'1']);
            if (empty($lessonList)) {
                return [];
            }
            return $lessonList;
        } catch (\Exception $e){
            throw new \Exception ("Błąd w procesie pobierania wolnych terminów w danym dniu.".$e->getMessage());
        }
    }

    public function getFreeTermsTeacherThisWeek($teacherId, $startDate)
    {

    }
}