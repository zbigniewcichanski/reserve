<?php
/**
 * Created by PhpStorm.
 * @author: Zbyszek Cichanski
 * Date: 21.10.2016
 * Time: 14:25
 */

namespace Core\Core\Specification;


interface ExpandedSpecification
{
    public function isSatisfiedBy($candidate);

    public function and(Specification $other);

    public function or(Specification $other);

    public function not();
}