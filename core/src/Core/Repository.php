<?php
/**
 * Created by PhpStorm.
 * @author: Zbyszek Cichanski
 * Date: 24.08.2016
 * Time: 09:12
 */

namespace Core\Core;

abstract class Repository
{
    abstract public function getOnIdentity($identity);

    abstract public function getAll();
}