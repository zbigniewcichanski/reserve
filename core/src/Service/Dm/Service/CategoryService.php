<?php
/**
 * Created by PhpStorm.
 * @author: Zbyszek Cichanski
 * Date: 27.12.2016
 * Time: 22:29
 */

namespace Core\Service\Dm\Service;

use Core\Core\Specification\Specification;
use Core\Service\Dm\Entity\CategoryAggregate;
use Core\Service\Dm\Repository\CategoryRepository;

class CategoryService
{
    /**
     * @var CategoryRepository
     */
    private $categoryRepository;

    /**
     * @var Specification
     */
    private $categoryNameIsUnique;

    public function __construct(CategoryRepository $categoryRepository, Specification $categoryNameIsUnique)
    {
        $this->categoryNameIsUnique = $categoryNameIsUnique;
        $this->categoryRepository = $categoryRepository;
    }

    public function createCategory($name)
    {
        try{

            if($this->categoryNameIsUnique->not()->isSatisfiedBy($name)){
                return ['status'=>false, 'message'=>'Istnieje już kategoria o podanej nazwie.'];
            }

            $category = new CategoryAggregate();
            $category->setName($name);

            $category->save();

            return ['status'=>true, 'message'=>'Kategoria została dodana.'];


        } catch (\Exception $e){
            throw new \Exception ("Błąd w procesie tworzenia kategorii.".$e->getMessage());
        }
    }
}