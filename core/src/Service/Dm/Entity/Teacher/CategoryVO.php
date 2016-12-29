<?php
/**
 * Created by PhpStorm.
 * @author: Zbyszek Cichanski
 * Date: 29.12.2016
 * Time: 15:19
 */

namespace Core\Service\Dm\Entity\Teacher;

use Core\Service\Core\DomainObject;

class CategoryVO extends DomainObject
{
    private $categoryId;

    private $teacherId;

    public function getId()
    {
        return $this->categoryId;
    }

    /**
     * @return mixed
     */
    public function getTeacherId()
    {
        return $this->teacherId;
    }

    /**
     * @param mixed $teacherId
     */
    public function setTeacherId($teacherId)
    {
        $this->teacherId = $teacherId;
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
    public function setCategoryId($categoryId)
    {
        $this->categoryId = $categoryId;
    }



}