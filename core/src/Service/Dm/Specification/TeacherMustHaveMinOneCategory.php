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

class TeacherMustHaveMinOneCategory extends AbstractSpecification
{
    public function isSatisfiedBy($categories)
    {

        if(!is_array($categories)){
            return false;
        }

        if(count($categories) == 0){
            return false;
        }

        return true;
    }

}