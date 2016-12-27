<?php
/**
 * Created by PhpStorm.
 * @author: Zbyszek Cichanski
 * Date: 27.12.2016
 * Time: 22:35
 */

namespace Core\Service\Inf\Repository;

interface InfCategoryRepository
{
    public function getOneByCriteria(array $criteria): array;

    public function getByCriteria(array $criteria): array;

    public function getAll(): array;
}