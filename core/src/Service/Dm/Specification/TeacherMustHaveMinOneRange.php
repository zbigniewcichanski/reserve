<?php
/**
 * Created by PhpStorm.
 * @author: Zbyszek Cichanski
 * Date: 06.01.2017
 * Time: 14:41
 */

namespace Core\Service\Dm\Specification;

use Core\Core\Specification\AbstractSpecification;
use Core\Core\Specification\Specification;

class TeacherMustHaveMinOneRange extends AbstractSpecification
{
    public function isSatisfiedBy($ranges)
    {

        if(!is_array($ranges)){
            return false;
        }

        if(count($ranges) == 0){
            return false;
        }

        return true;
    }

}