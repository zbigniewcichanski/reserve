<?php
/**
 * Created by PhpStorm.
 * @author: Zbyszek Cichanski
 * Date: 24.08.2016
 * Time: 13:00
 */

namespace Core\Service\Core;

use Core\Service\Core\DomainObject;

class ObjectWatcher
{
    private $all = [];

    private $dirty = [];

    protected $new = [];

    private $delete = [];

    private static $instance = null;

    private function __construct()
    {

    }

    static function instance()
    {
        if(is_null(self::$instance)){
            self::$instance = new ObjectWatcher();
        }
        return self::$instance;
    }

    public function globalKey(DomainObject $object)
    {
        $key = get_class($object).".".$object->getId();
        return $key;
    }

    static function addNew(DomainObject $object)
    {
        $self = self::instance();
        $self->new[$self->globalKey($object)] = $object;
    }

    static function addDelete(DomainObject $object)
    {
        $self = self::instance();
        $self->delete[$self->globalKey($object)] = $object;
    }

    static function addDirty(DomainObject $object)
    {
        $self = self::instance();
        if(!in_array($object, $self->new, true)){
            $self->dirty[$self->globalKey($object)] = $object;
        }
    }

    static function addClean(DomainObject $object)
    {
        $self = self::instance();
        unset($self->delete[$self->globalKey($object)]);
        unset($self->dirty[$self->globalKey($object)]);
    }

    public function performOptions()
    {
        foreach($this->dirty as $key=>$obj){
            /**
             * @var DomainObject $obj
             */
            $obj;
            $obj->finder()->update($obj);
            unset($this->dirty[$key]);
        }
        foreach($this->new as $key=>$obj){
            /**
             * @var DomainObject $obj
             */
            $obj;
            $obj->finder()->insert($obj);
            unset($this->new[$key]);

        }
        foreach($this->delete as $key=>$obj){
            /**
             * @var DomainObject $obj
             */
            $obj;
            $obj->finder()->delete($obj);
            unset($this->delete[$key]);
        }
    }
}