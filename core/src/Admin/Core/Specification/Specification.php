<?php
/**
 * Created by PhpStorm.
 * @author: Zbyszek Cichanski
 * Date: 11.07.2016
 * Time: 15:29
 */

namespace Core\Core\Specification;

interface Specification
{
    public function isSatisfiedBy($candidate);

    public function and(Specification $other);

    public function or(Specification $other);

    public function not();
}