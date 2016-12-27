<?php
/**
 * Created by PhpStorm.
 * @author: Zbyszek Cichanski
 * Date: 11.07.2016
 * Time: 16:37
 */

namespace Core\Core\Specification;

abstract class AbstractSpecification implements Specification
{
    public function and(Specification $other)
    {
        return new AndSpecification($this, $other);
    }

    public function or(Specification $specification)
    {
        return new OrSpecification($this, $specification);
    }

    public function not()
    {
        return new NotSpecification($this);
    }


}