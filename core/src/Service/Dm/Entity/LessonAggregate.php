<?php
/**
 * Created by PhpStorm.
 * @author: Zbyszek Cichanski
 * Date: 28.12.2016
 * Time: 23:09
 */

namespace Core\Service\Dm\Entity;

use Core\Service\Core\DomainObject;

class LessonAggregate extends DomainObject
{
    private $teacherId;

    private $date;

    private $startTime;

    private $endTime;

    private $location;

    private $studentId = false;

    private $studentName;

    private $description;

    private $canceledByStudent = false;

    private $canceledByTeacher = false;

    private $canceled = false;

    private $open = false;

    private $atTeacherPlace = false;

    private $atStudentPlace = false;

    public function getId()
    {
        return $this->id;
    }

    /**
     * @return mixed
     */
    public function getDate()
    {
        return $this->date;
    }

    /**
     * @param mixed $date
     */
    public function changeDate($date)
    {
        $this->markDirty();
        $this->date = $date;
    }

    /**
     * @return mixed
     */
    public function getStartTime()
    {
        return $this->startTime;
    }

    /**
     * @param mixed $startTime
     */
    public function changeStartTime($startTime)
    {
        $this->markDirty();
        $this->startTime = $startTime;
    }

    /**
     * @return mixed
     */
    public function getEndTime()
    {
        return $this->endTime;
    }

    /**
     * @param mixed $endTime
     */
    public function changeEndTime($endTime)
    {
        $this->markDirty();
        $this->endTime = $endTime;
    }

    /**
     * @return mixed
     */
    public function getLocation()
    {
        return $this->location;
    }

    /**
     * @param mixed $location
     */
    public function changeLocation($location)
    {
        $this->markDirty();
        $this->location = $location;
    }

    /**
     * @return mixed
     */
    public function getStudentId()
    {
        return $this->studentId;
    }

    /**
     * @param mixed $studentId
     */
    public function changeStudentId($studentId)
    {
        $this->markDirty();
        $this->studentId = $studentId;
    }

    /**
     * @return mixed
     */
    public function getDescription()
    {
        return $this->description;
    }

    /**
     * @param mixed $description
     */
    public function changeDescription($description)
    {
        $this->markDirty();
        $this->description = $description;
    }

    /**
     * @param mixed $date
     */
    public function setDate($date)
    {
        $this->date = $date;
    }

    /**
     * @param mixed $startTime
     */
    public function setStartTime($startTime)
    {
        $this->startTime = $startTime;
    }

    /**
     * @param mixed $endTime
     */
    public function setEndTime($endTime)
    {
        $this->endTime = $endTime;
    }

    /**
     * @param mixed $location
     */
    public function setLocation($location)
    {
        $this->location = $location;
    }

    /**
     * @param mixed $studentId
     */
    public function setStudentId($studentId)
    {
        $this->studentId = $studentId;
    }

    /**
     * @param mixed $description
     */
    public function setDescription($description)
    {
        $this->description = $description;
    }

    /**
     * @return mixed
     */
    public function getTeacherId()
    {
        return $this->teacherId;
    }

    /**
     * @param mixed $TeacherId
     */
    public function setTeacherId($TeacherId)
    {
        $this->teacherId = $TeacherId;
    }

    /**
     * @return mixed
     */
    public function getStudentName()
    {
        return $this->studentName;
    }

    /**
     * @param mixed $studentName
     */
    public function changeStudentName($studentName)
    {
        $this->markDirty();
        $this->studentName = $studentName;
    }

    /**
     * @param mixed $studentName
     */
    public function setStudentName($studentName)
    {
        $this->studentName = $studentName;
    }

    /**
     * @return boolean
     */
    public function isCanceledByStudent()
    {
        return $this->canceledByStudent;
    }

    /**
     *
     */
    public function setCanceledByStudent()
    {
        $this->canceledByStudent = true;
    }

    /**
     *
     */
    public function cancelByStudent()
    {
        $this->markDirty();
        $this->canceledByStudent = true;
    }


    /**
     * @return boolean
     */
    public function isCanceledByTeacher()
    {
        return $this->canceledByTeacher;
    }

    /**
     *
     */
    public function setCanceledByTeacher()
    {
        $this->canceledByTeacher = true;
    }

    /**
     *
     */
    public function cancelByTeacher()
    {
        $this->markDirty();
        $this->canceledByTeacher = true;
    }

    /**
     * @return boolean
     */
    public function isCanceled()
    {
        return $this->canceled;
    }

    /**
     *
     */
    public function setCanceled()
    {
        $this->canceled = true;
    }

    public function cancel()
    {
        $this->markDirty();
        $this->canceled = true;
    }

    /**
     * @return boolean
     */
    public function isOpen()
    {
        return $this->open;
    }

    /**
     *
     */
    public function setOpen()
    {
        $this->open = true;
    }

    /**
     *
     */
    public function open()
    {
        $this->markDirty();
        $this->open = true;
    }

    /**
     * @return boolean
     */
    public function isAtTeacherPlace()
    {
        return $this->atTeacherPlace;
    }

    /**
     *
     */
    public function setAtTeacherPlace()
    {
        $this->atTeacherPlace = true;
    }


    public function atTeacherPlace()
    {
        $this->markDirty();
        $this->atTeacherPlace = true;
    }

    /**
     * @return boolean
     */
    public function isAtStudentPlace()
    {
        return $this->atStudentPlace;
    }

    /**
     *
     */
    public function setAtStudentPlace()
    {
        $this->atStudentPlace = true;
    }

    /**
     *
     */
    public function atStudentPlace()
    {
        $this->markDirty();
        $this->atStudentPlace = true;
    }





}