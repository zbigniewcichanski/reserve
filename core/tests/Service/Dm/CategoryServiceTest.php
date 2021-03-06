<?php
/**
 * Created by PhpStorm.
 * @author: Zbyszek Cichanski
 * Date: 27.12.2016
 * Time: 22:29
 */

namespace Tests\Owner\Dm;

use Core\Service\Dm\Service\CategoryService;

class CategoryServiceTest extends \PHPUnit_Framework_TestCase
{
    /**
     * @var CategoryService $service
     */
    private $service;

    public function setUp()
    {
        $c = require_once "../../../config/container.php";
        $this->service =$c->get('service-category-service');

        parent::setUp(); // TODO: Change the autogenerated stub
    }


    public function testCreateCategory()
    {
        $name = 'Angielski';

        $result = $this->service->createCategory($name);
        var_dump($result);
        $this->assertNotNull($result);
        $this->assertTrue($result['status']);
        $this->assertNotEmpty($result);
    }

    public function testCreateCategoryWithParent()
    {
        $name = 'Niemiecki';
        $parentId = '1';

        $result = $this->service->createCategory($name, $parentId);
        var_dump($result);
        $this->assertNotNull($result);
        $this->assertTrue($result['status']);
        $this->assertNotEmpty($result);
    }

    public function testChangeCategoryName()
    {
        $name = 'Anglik';
        $id = '0e2e6f3514efd2376c6ddccfe3b5590f';

        $result = $this->service->changeCategoryName($id, $name);
        var_dump($result);
        $this->assertNotNull($result);
        $this->assertTrue($result['status']);
        $this->assertNotEmpty($result);
    }

    public function testRemoveCategory()
    {
        $id = '0e2e6f3514efd2376c6ddccfe3b5590f';

        $result = $this->service->removeCategory($id);
        var_dump($result);
        $this->assertNotNull($result);
        $this->assertTrue($result['status']);
        $this->assertNotEmpty($result);
    }

}
