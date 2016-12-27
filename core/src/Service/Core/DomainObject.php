<?php
/**
 * Created by PhpStorm.
 * @author: Zbyszek Cichanski
 * Date: 24.08.2016
 * Time: 13:03
 */

namespace Core\Service\Core;


use Core\Core\IDGenerateFactory;

abstract class DomainObject
{
    protected $id = -1;

    protected $deleted = 0;

    abstract public function getId();

    final public function __construct($id=null)
    {
        if(is_null($id)){
            $this->id = IDGenerateFactory::generateID();
            $this->markNew();
        } else {
            $this->id = $id;
        }
    }

    public function finder()
    {
        return self::getFinder(get_class($this));
    }

    public function markNew()
    {
        ObjectWatcher::addNew($this);
    }

    public function markDirty()
    {
        ObjectWatcher::addDirty($this);
    }

    public function markDeleted()
    {
        ObjectWatcher::addDelete($this);
    }

    static function getFinder($type = null)
    {
        if(is_null($type)){
            return MapperFactory::getFinder(get_called_class());
        }
        return MapperFactory::getFinder($type);
    }

    public function now()
    {
        $date = new \DateTime('now');
        $result = $date->format("Y-m-d H:i:s");
        return $result;
    }

    final public function save()
    {
        ObjectWatcher::instance()->performOptions();
        return true;
    }

    public function deleted()
    {
        $this->deleted = 1;
        $this->markDirty();
    }

    public function isDeleted()
    {
        return $this->deleted;
    }

    public function setDeleted()
    {
        $this->deleted = 1;
    }

    public function refresh()
    {
        $this->markDirty();
    }

}