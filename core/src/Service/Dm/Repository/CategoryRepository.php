<?php
/**
 * Created by PhpStorm.
 * @author: Zbyszek Cichanski
 * Date: 27.12.2016
 * Time: 22:33
 */

namespace Core\Service\Dm\Repository;

use Core\Core\Repository;
use Core\Service\Inf\CategoryConvert;

class CategoryRepository extends Repository
{
    private $repository;

    public function __construct(CategoryConvert $repository)
    {
        $this->repository = $repository;
    }

    public function getOnIdentity($identity)
    {
        try {
            $category = $this->repository->getOneByCriteria(['id' => $identity]);
            if (empty($category)) {
                return false;
            }
            return $category;
        } catch (\Exception $e){
            throw new \Exception ("Błąd w procesie pobierania kategorii na podstawie id.");
        }
    }

    public function getCategoryByName($name)
    {
        try {
            $category = $this->repository->getOneByCriteria(['name' => $name]);
            if (empty($category)) {
                return false;
            }
            return $category;
        } catch (\Exception $e){
            throw new \Exception ("Błąd w procesie pobierania kategorii na podstawie nazwy.");
        }
    }

    public function getAll()
    {
        // TODO: Implement getAll() method.
    }

}