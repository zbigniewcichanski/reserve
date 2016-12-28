<?php
/**
 * Created by PhpStorm.
 * @author: Zbyszek Cichanski
 * Date: 27.12.2016
 * Time: 22:29
 */

namespace Tests\Owner\App;


use Core\Service\App\Command\CategoryCommand;
use Core\Service\App\CategoryService;

class CategoryServiceTest extends \PHPUnit_Framework_TestCase
{
    /**
     * @var CategoryService $service
     */
    private $service;

    public function setUp()
    {
        $c = require_once "../../../config/container.php";
        $this->service =$c->get('service-app-category-service');

        parent::setUp(); // TODO: Change the autogenerated stub
    }


    public function testCreateCategoryWithParent()
    {
        $categoryCommand = new CategoryCommand();
        $categoryCommand->name = 'Francuski';
        $categoryCommand->idParent = '1';

        $result = $this->service->createCategory($categoryCommand);
        var_dump($result);
        $this->assertNotNull($result);
        $this->assertInstanceOf('\Core\Core\MessageInterface', $result);
        $this->assertTrue($result->getStatus());
        $this->assertNotEmpty($result);
    }

    public function testCreateCategory()
    {
        $categoryCommand = new CategoryCommand();
        $categoryCommand->name = 'Francuski';

        $result = $this->service->createCategory($categoryCommand);
        var_dump($result);
        $this->assertNotNull($result);
        $this->assertInstanceOf('\Core\Core\MessageInterface', $result);
        $this->assertTrue($result->getStatus());
        $this->assertNotEmpty($result);
    }

    public function testChangeCategoryname()
    {
        $categoryCommand = new CategoryCommand();
        $categoryCommand->name = 'Francus';
        $categoryCommand->id = '88735a8be62a9ca02ab87a8fa573faef';

        $result = $this->service->changeCategoryName($categoryCommand);
        var_dump($result);
        $this->assertNotNull($result);
        $this->assertInstanceOf('\Core\Core\MessageInterface', $result);
        $this->assertTrue($result->getStatus());
        $this->assertNotEmpty($result);
    }

}
