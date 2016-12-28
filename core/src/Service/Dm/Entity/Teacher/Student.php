<?php
/**
 * Created by PhpStorm.
 * @author: Zbyszek Cichanski
 * Date: 28.12.2016
 * Time: 22:56
 */

namespace Core\Service\Dm\Entity\Teacher;


use Core\Service\Core\DomainObject;

class Student extends DomainObject
{
    private $name;

    private $description;

    private $phone;
    
    private $studentAggregateId;

    public function getId()
    {
        return $this->id;
    }

    /**
     * @return mixed
     */
    public function getName()
    {
        return $this->name;
    }

    /**
     * @param mixed $name
     */
    public function changeName($name)
    {
        $this->markDirty();
        $this->name = $name;
    }

    /**
     * @return mixed
     */
    public function getStudentAggregateId()
    {
        return $this->studentAggregateId;
    }

    /**
     * @param mixed $studentAggregateId
     */
    public function changeStudentAggregateId($studentAggregateId)
    {
        $this->markDirty();
        $this->studentAggregateId = $studentAggregateId;
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
     * @return mixed
     */
    public function getPhone()
    {
        return $this->phone;
    }

    /**
     * @param mixed $phone
     */
    public function changePhone($phone)
    {
        $this->markDirty();
        $this->phone = $phone;
    }

    /**
     * @param mixed $name
     */
    public function setName($name)
    {
        $this->name = $name;
    }

    /**
     * @param mixed $description
     */
    public function setDescription($description)
    {
        $this->description = $description;
    }

    /**
     * @param mixed $phone
     */
    public function setPhone($phone)
    {
        $this->phone = $phone;
    }

    /**
     * @param mixed $studentAggregateId
     */
    public function setStudentAggregateId($studentAggregateId)
    {
        $this->studentAggregateId = $studentAggregateId;
    }
}