<?php
/**
 * Created by PhpStorm.
 * @author: Zbyszek Cichanski
 * Date: 27.12.2016
 * Time: 22:34
 */

namespace Core\Service\Inf;

use Core\Service\Dm\Entity\RangeAggregate;
use Core\Service\Inf\Repository\InfRangeRepository;

class RangeConvert
{
    private $repository;

    public function __construct(InfRangeRepository $repository)
    {
        $this->repository = $repository;
    }

    public function getOneByCriteria($criteria)
    {
        $range = $this->repository->getOneByCriteria($criteria);
        if(empty($range)){
            return [];
        }
        $rangeAggregate = $this->buildAggregate($range);
        return $rangeAggregate[0];
    }

    public function getByCriteria($criteria)
    {
        $rangeList = $this->repository->getOneByCriteria($criteria);
        if(empty($rangeList)){
            return [];
        }
        $rangeAggregateList = $this->buildAggregate($rangeList);
        return $rangeAggregateList;
    }

    private function buildAggregate($rangeArray)
    {
        $result = [];
        foreach($rangeArray as $row){
            $rangeAggregate = new RangeAggregate($row['idRange']);
            $rangeAggregate->setName($row['name']);
            $result[]=$rangeAggregate;
        }

        return $result;
    }
}