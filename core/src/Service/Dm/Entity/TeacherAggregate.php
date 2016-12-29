<?php
/**
 * Created by PhpStorm.
 * @author: Zbyszek Cichanski
 * Date: 23.12.2016
 * Time: 20:12
 */

namespace Core\Service\Dm\Entity;

use Core\Service\Core\DomainObject;

class TeacherAggregate extends DomainObject implements Owner
{
    private $name;

    private $surname;

    private $city;

    private $postCode;

    private $phone;

    private $email;

    private $categoryId;

    private $driveToStudent = false;

    private $range = [];

    private $students = [];

    private $schedule = [];

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
    public function getSurname()
    {
        return $this->surname;
    }

    /**
     * @param mixed $surname
     */
    public function changeSurname($surname)
    {
        $this->markDirty();
        $this->surname = $surname;
    }

    /**
     * @return mixed
     */
    public function getCity()
    {
        return $this->city;
    }

    /**
     * @param mixed $city
     */
    public function changeCity($city)
    {
        $this->markDirty();
        $this->city = $city;
    }

    /**
     * @return mixed
     */
    public function getPostCode()
    {
        return $this->postCode;
    }

    /**
     * @param mixed $postCode
     */
    public function changePostCode($postCode)
    {
        $this->markDirty();
        $this->postCode = $postCode;
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
     * @return mixed
     */
    public function getEmail()
    {
        return $this->email;
    }

    /**
     * @param mixed $email
     */
    public function changeEmail($email)
    {
        $this->markDirty();
        $this->email = $email;
    }

    /**
     * @return mixed
     */
    public function getCategoryId()
    {
        return $this->categoryId;
    }

    /**
     * @param mixed $categoryId
     */
    public function changeCategoryId($categoryId)
    {
        $this->markDirty();
        $this->categoryId = $categoryId;
    }

    /**
     * @return boolean
     */
    public function isDriveToStudent()
    {
        return $this->driveToStudent;
    }

    /**
     *
     */
    public function driveToStudent()
    {
        $this->markDirty();
        $this->driveToStudent = true;
    }

    /**
     * @return array
     */
    public function getRange()
    {
        return $this->range;
    }

    /**
     * @param array $range
     */
    public function addRange($range)
    {
        $this->markDirty();
        $this->range = $range;
    }

    /**
     * @return array
     */
    public function getStudents()
    {
        return $this->students;
    }

    /**
     * @param $student
     */
    public function addStudent($student)
    {
        $this->markDirty();
        $this->students[] = $student;
    }

    /**
     * @return array
     */
    public function getSchedule()
    {
        return $this->schedule;
    }

    /**
     * @param array $schedule
     */
    public function addSchedule($schedule)
    {
        $this->markDirty();
        $this->schedule[] = $schedule;
    }

    /**
     * @param mixed $name
     */
    public function setName($name)
    {
        $this->name = $name;
    }

    /**
     * @param mixed $surname
     */
    public function setSurname($surname)
    {
        $this->surname = $surname;
    }

    /**
     * @param mixed $city
     */
    public function setCity($city)
    {
        $this->city = $city;
    }

    /**
     * @param mixed $postCode
     */
    public function setPostCode($postCode)
    {
        $this->postCode = $postCode;
    }

    /**
     * @param mixed $phone
     */
    public function setPhone($phone)
    {
        $this->phone = $phone;
    }

    /**
     * @param mixed $email
     */
    public function setEmail($email)
    {
        $this->email = $email;
    }

    /**
     * @param mixed $categoryId
     */
    public function setCategoryId($categoryId)
    {
        $this->categoryId = $categoryId;
    }

    /**
     * @param boolean $driveToStudent
     */
    public function setDriveToStudent($driveToStudent)
    {
        $this->driveToStudent = $driveToStudent;
    }

    /**
     * @param array $range
     */
    public function setRange($range)
    {
        $this->range = $range;
    }

    /**
     * @param array $students
     */
    public function setStudents($students)
    {
        $this->students = $students;
    }

    /**
     * @param array $schedule
     */
    public function setSchedule($schedule)
    {
        $this->schedule = $schedule;
    }

}