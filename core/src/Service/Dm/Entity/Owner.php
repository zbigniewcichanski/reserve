<?php
/**
 * Created by PhpStorm.
 * @author: Zbyszek Cichanski
 * Date: 28.12.2016
 * Time: 22:17
 */

namespace Core\Service\Dm;


interface Owner
{
    public function getName();

    public function getSurname();

    public function getCity();

    public function getEmail();

    public function getPhone();

    public function getCategoryId();

}