<?php
/**
 * Created by PhpStorm.
 * @author: Zbyszek Cichanski
 * Date: 23.12.2016
 * Time: 20:16
 */

namespace Core\Admin\Inf\Repository;


interface AdminInfRepository
{
    public function getOneByCriteria(array $criteria): array;

    public function getByCriteria(array $criteria): array;

    public function getAll(): array;
}