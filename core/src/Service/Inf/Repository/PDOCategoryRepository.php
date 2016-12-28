<?php
/**
 * Created by PhpStorm.
 * @author: Zbyszek Cichanski
 * Date: 27.12.2016
 * Time: 22:39
 */

namespace Core\Service\Inf\Repository;

use Core\Service\Inf\Database\DatabaseFactory;

class PDOCategoryRepository implements InfCategoryRepository
{
    /**
     * @var \PDO $db
     */
    private $db;

    public function __construct(DatabaseFactory $factory)
    {
        $this->db = $factory->create()->db();
    }

    public function getOneByCriteria(array $criteria): array
    {
        try {
            $sql = "SELECT
                    category.idCategory,
                    category.idParentCategory,
                    category.name
                    FROM service_category as category
                    WHERE category.deleted = 0
                    ";

            if(isset($criteria['id'])){
                $sql .=" AND category.idCategory =:id";
            }

            if(isset($criteria['name'])){
                $sql .=" AND category.name =:name";
            }

            $stmt = $this->db->prepare($sql);

            if(isset($criteria['id'])){
                $stmt->bindParam(':id', $criteria['id']);
            }

            if(isset($criteria['name'])){
                $stmt->bindParam(':name', $criteria['name']);
            }

            $stmt->execute();

            $category = $stmt->fetchAll(\PDO::FETCH_ASSOC);

            if (!$category) {
                return [];
            }

            return $category;

        } catch (\PDOException $e) {
            throw new \PDOException ("Błąd w trackie pobierania danej Kategori na podstawie kryteriów. " . $e->getMessage());
        }
    }

    public function getByCriteria(array $criteria): array
    {
        // TODO: Implement getByCriteria() method.
    }

    public function getAll(): array
    {
        try {
            $sql = "SELECT
                    category.idCategory
                    category.idParentCategory
                    category.name
                    FROM service_category as category
                    WHERE category.deleted = 0
                    ";

            $stmt = $this->db->prepare($sql);

            $stmt->execute();

            $categoryList = $stmt->fetchAll(\PDO::FETCH_ASSOC);

            if (!$categoryList) {
                return [];
            }

            return $categoryList;

        } catch (\PDOException $e) {
            throw new \PDOException ("Błąd w trackie pobierania Kategorii. " . $e->getMessage());
        }
    }

}