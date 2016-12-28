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

    public function createCategory($name, $idParentCategory = false)
    {
        try {

            if ($this->categoryNameIsUnique->not()->isSatisfiedBy($name)) {
                return ['status' => false, 'message' => 'Istnieje już kategoria o podanej nazwie.'];
            }

            $categoryAggregate = new CategoryAggregate();
            $categoryAggregate->setName($name);

            if ($idParentCategory != false) {

                $categoryAggregateParent = $this->categoryRepository->getOnIdentity($idParentCategory);
                if(!$categoryAggregateParent){
                    return ['status'=>false , 'message'=>'Wybrana wyższa kategoria nie istnieje.'];
                }

                $categoryAggregate->setParentCategoryId($idParentCategory);
            }

            $categoryAggregate->save();

            return ['status' => true, 'message' => 'Kategoria została dodana.'];


        } catch (\Exception $e) {
            throw new \Exception ("Błąd w procesie tworzenia kategorii." . $e->getMessage());
        }
    }

    public function changeCategoryName($categoryId, $newName)
    {
        try {

            /**
             *@var CategoryAggregate $categoryAggregate
             */
            $categoryAggregate = $this->categoryRepository->getOnIdentity($categoryId);
            if(!$categoryAggregate){
                return ['status'=>false , 'message'=>'Nie ma takiej kategorii.'];
            }

            if($categoryAggregate->getName() == $newName){
                return ['status' => false, 'message' => 'Wybrana kategoria ma już taką nazwę.'];
            }

            if ($this->categoryNameIsUnique->not()->isSatisfiedBy($newName)) {
                return ['status' => false, 'message' => 'Istnieje już kategoria o podanej nazwie.'];
            }

            $categoryAggregate->changeName($newName);

            $categoryAggregate->save();

            return ['status' => true, 'message' => 'Nazwa Kategorii została zmieniona.'];


        } catch (\Exception $e) {
            throw new \Exception ("Błąd w procesie zmiany nazwy kategorii." . $e->getMessage());
        }
    }

}