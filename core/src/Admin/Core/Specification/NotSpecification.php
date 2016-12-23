<?php
/**
 * Created by PhpStorm.
 * @author: Zbyszek Cichanski
 * Date: 12.07.2016
 * Time: 09:30
 */

namespace Core\Core\Specification;

class NotSpecification extends AbstractSpecification
{
    /**
     * @var AbstractSpecification
     */
    private $one;


    public function __construct(AbstractSpecification $one)
    {
        $this->one = $one;
    }

    public function isSatisfiedBy($candidate)
    {
        return !$this->one->isSatisfiedBy($candidate);
    }

}