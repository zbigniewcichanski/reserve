<?php
/**
 * Created by PhpStorm.
 * @author: Zbyszek Cichanski
 * Date: 06.01.2017
 * Time: 20:03
 */

namespace Core\Service\Dm\Service;

class LessonService
{
    public function addLesson($teacherId, $date, $starTime, $endTime, $studentId = false, $studentName = false, $location, $description, $atTeacherPlace = true)
    {

    }

    public function cancelLessonByStudent($lessonId, $studentId)
    {

    }

    public function cancelLessonByTeacher($lessonId, $teacherId)
    {

    }

    public function addFreeTerm($teacherId, $date, $startTime, $endTime, $location, $atTeacherPlace = true, $atStudentPlace = false)
    {

    }

    public function bookLesson($lessonId, $studentId)
    {

    }


}