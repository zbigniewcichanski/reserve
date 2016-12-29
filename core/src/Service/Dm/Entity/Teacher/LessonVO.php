<?php
/**
 * Created by PhpStorm.
 * @author: Zbyszek Cichanski
 * Date: 28.12.2016
 * Time: 23:09
 */

namespace Core\Service\Dm\Entity\Teacher;

use Core\Service\Core\DomainObject;

class LessonVO extends DomainObject
{
    private $date;

    private $startTime;

    private $endTime;

    private $location;

    private $studentId;

    private $description;

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
}