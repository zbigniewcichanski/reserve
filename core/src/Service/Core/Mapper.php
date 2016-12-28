<?php
/**
 * Created by PhpStorm.
 * @author: Zbyszek Cichanski
 * Date: 24.08.2016
 * Time: 20:48
 */

namespace Core\Service\Core;


interface Mapper
{
    public function update(DomainObject $object);

    public function insert(DomainObject $object);

    public function delete(DomainObject $object);
}