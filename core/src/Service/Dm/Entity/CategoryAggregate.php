<?php
/**
 * Created by PhpStorm.
 * @author: Zbyszek Cichanski
 * Date: 27.12.2016
 * Time: 22:21
 */

namespace Core\Service\Dm\Entity;

use Core\Service\Core\DomainObject;

class CategoryAggregate extends DomainObject
{
    private $name;

    private $parentCategoryId = false;

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
     * @param mixed $name
     */
    public function setName($name)
    {
        $this->name = $name;
    }

    /**
     * @return mixed
     */
    public function getParentCategoryId()
    {
        return $this->parentCategoryId;
    }

    /**
     * @param mixed $parentCategoryId
     */
    public function changeParentCategoryId($parentCategoryId)
    {
        $this->markDirty();
        $this->parentCategoryId = $parentCategoryId;
    }

    /**
     * @param mixed $parentCategoryId
     */
    public function setParentCategoryId($parentCategoryId)
    {
        $this->parentCategoryId = $parentCategoryId;
    }
}