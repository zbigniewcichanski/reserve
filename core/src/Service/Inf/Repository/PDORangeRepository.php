<?php
/**
 * Created by PhpStorm.
 * @author: Zbyszek Cichanski
 * Date: 27.12.2016
 * Time: 22:39
 */

namespace Core\Service\Inf\Repository;

use Core\Service\Inf\Database\DatabaseFactory;

class PDORangeRepository implements InfRangeRepository
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
                    service_range.idRange,
                    service_range.name
                    FROM service_range
                    WHERE service_range.deleted = 0
                    ";

            if(isset($criteria['id'])){
                $sql .="AND service_range.idRange =:id";
            }

            if(isset($criteria['name'])){
                $sql .="AND service_range.name =:name";
            }

            $stmt = $this->db->prepare($sql);

            if(isset($criteria['id'])){
                $stmt->bindParam(':id', $criteria['id']);
            }

            if(isset($criteria['name'])){
                $stmt->bindParam(':name', $criteria['name']);
            }

            $stmt->execute();

            $range = $stmt->fetchAll(\PDO::FETCH_ASSOC);

            if (!$range) {
                return [];
            }

            return $range;

        } catch (\PDOException $e) {
            throw new \PDOException ("Błąd w trackie pobierania informacji o danym zakresie na podstawie kryteriów. " . $e->getMessage());
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
                    service_range.idRange,
                    service_range.name
                    FROM service_range as range
                    WHERE service_range.deleted = 0
                    ";

            $stmt = $this->db->prepare($sql);

            $stmt->execute();

            $rangeList = $stmt->fetchAll(\PDO::FETCH_ASSOC);

            if (!$rangeList) {
                return [];
            }

            return $rangeList;

        } catch (\PDOException $e) {
            throw new \PDOException ("Błąd w trackie pobierania listy zakresów. " . $e->getMessage());
        }
    }

}