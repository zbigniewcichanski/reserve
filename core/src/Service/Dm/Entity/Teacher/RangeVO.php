<?php
/**
 * Created by PhpStorm.
 * @author: Zbyszek Cichanski
 * Date: 29.12.2016
 * Time: 15:19
 */

namespace Core\Service\Dm\Entity\Teacher;

use Core\Service\Core\DomainObject;

class RangeVO extends DomainObject
{
    private $rangeId;

    private $teacherId;

    public function getId()
    {
        return $this->rangeId;
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
    public function getRangeId()
    {
        return $this->rangeId;
    }

    /**
     * @param mixed $rangeId
     */
    public function setRangeId($rangeId)
    {
        $this->rangeId = $rangeId;
    }

}