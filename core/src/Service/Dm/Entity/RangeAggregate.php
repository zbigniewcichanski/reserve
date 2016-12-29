<?php
/**
 * Created by PhpStorm.
 * @author: Zbyszek Cichanski
 * Date: 29.12.2016
 * Time: 13:57
 */

namespace Core\Service\Dm\Entity;

use Core\Service\Core\DomainObject;

class RangeAggregate extends DomainObject
{
    private $name;

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

    public function setName($name)
    {
        $this->name = $name;
    }




}