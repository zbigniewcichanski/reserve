<?php
/**
 * Created by PhpStorm.
 * @author: Zbyszek Cichanski
 * Date: 27.12.2016
 * Time: 14:03
 */

namespace Tests\Owner\Dm;


class OwnerServiceTest extends \PHPUnit_Framework_TestCase
{
    private $service;

    public function setUp()
    {
        $c = require_once "../../../config/container.php";
        $this->service =$c->get('owner-service');

        parent::setUp(); // TODO: Change the autogenerated stub
    }
}