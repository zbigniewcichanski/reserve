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
use Core\Service\Inf\RangeConvert;

class RangeRepository extends Repository
{
    private $repository;

    public function __construct(RangeConvert $repository)
    {
        $this->repository = $repository;
    }

    public function getOnIdentity($identity)
    {
        try {
            $range = $this->repository->getOneByCriteria(['id' => $identity]);
            if (empty($range)) {
                return false;
            }
            return $range;
        } catch (\Exception $e){
            throw new \Exception ("Błąd w procesie pobierania zakresu na podstawie id.".$e->getMessage());
        }
    }

    public function getRangeByName($name)
    {
        try {
            $range = $this->repository->getOneByCriteria(['name' => $name]);
            if (empty($range)) {
                return false;
            }
            return $range;
        } catch (\Exception $e){
            throw new \Exception ("Błąd w procesie pobierania zakresu na podstawie nazwy.".$e->getMessage());
        }
    }

    public function getAll(): array
    {
        try {
            $rangeList = $this->repository->getByCriteria([]);
            if (empty($rangeList)) {
                return false;
            }
            return $rangeList;
        } catch (\Exception $e){
            throw new \Exception ("Błąd w procesie pobierania listy zakresów.".$e->getMessage());
        }
    }

}