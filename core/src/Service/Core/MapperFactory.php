<?php
/**
 * Created by PhpStorm.
 * @author: Zbyszek Cichanski
 * Date: 24.08.2016
 * Time: 16:08
 */

namespace Core\Service\Core;

use Symfony\Component\Config\Definition\Exception\Exception;

class MapperFactory
{
    public static function getFinder($type)
    {
        $c = require __DIR__."/../../../config/container.php";
        switch($type){
            case 'Core\Service\Dm\Entity\CategoryAggregate':
                $mapper = $c->get('service-category-mapper');
                break;
            case 'Core\Service\Dm\Entity\RangeAggregate':
                $mapper = $c->get('service-range-mapper');
                break;
            case 'Core\Service\Dm\Entity\TeacherAggregate':
                $mapper = $c->get('service-teacher-mapper');
                break;
            default:
                throw new Exception('Brak powiązania klasy rodziny Domain Object z Mapperem.');
        }

        if($mapper instanceof \Core\Service\Core\Mapper){
            return $mapper;
        }

        throw new Exception('Klasa Mappera musi implementować interfejs Mapper');
    }
}