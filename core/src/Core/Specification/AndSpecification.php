<?php
/**
 * Created by PhpStorm.
 * @author: Zbyszek Cichanski
 * Date: 12.07.2016
 * Time: 09:30
 */

namespace Core\Core\Specification;

class AndSpecification extends AbstractSpecification
{
    /**
     * @var AbstractSpecification
     */
    private $one;

    /**
     * @var AbstractSpecification
     */
    private $two;

    public function __construct(AbstractSpecification $one, AbstractSpecification $two)
    {
        $this->one = $one;
        $this->two = $two;
    }

    public function isSatisfiedBy($candidate)
    {
        return $this->one->isSatisfiedBy($candidate) && $this->two->isSatisfiedBy($candidate);
    }

}