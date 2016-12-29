<?php
/**
 * Created by PhpStorm.
 * @author: Zbyszek Cichanski
 * Date: 20.09.2016
 * Time: 16:43
 */

namespace Core\Service\Inf\Mapper;

use Core\Service\Core\DomainObject;
use Core\Service\Core\Mapper;
use Core\Service\Inf\Database\DatabaseFactory;

class RangeMapper implements Mapper
{
    /**
     * @var \PDO $db
     */
    private $db;

    public function __construct(DatabaseFactory $factory)
    {
        $this->db = $factory->create()->db();
    }

    public function update(DomainObject $object)
    {
        try {
            /**
             * @var \Core\Service\Dm\Entity\RangeAggregate $object
             */
            $object;

            $stmt = $this->db->prepare(
                "UPDATE service_range set
                name =:name,
                deleted =:deleted
                WHERE idRange = :id"
            );

            $id = $object->getId();
            $name = $object->getName();
            $deleted = $object->isDeleted();


            $stmt->bindParam(':id', $id);
            $stmt->bindParam(':name', $name);
            $stmt->bindParam(':deleted', $deleted);

            $stmt->execute();

            return true;

        } catch (\Exception $e) {
            throw new \Exception("Błąd w trakcie aktualizowania danych Zakres - Service. " . $e->getMessage());
        }
    }

    public function insert(DomainObject $object)
    {
        try {
            /**
             * @var \Core\Service\Dm\Entity\RangeAggregate $object
             */
            $object;
            $stmt = $this->db->prepare(
                "INSERT INTO service_range(
                idRange,
                name,
                deleted
                 ) VALUES (:id, :name, :deleted)"
            );

            $id = $object->getId();
            $name = $object->getName();
            $deleted = $object->isDeleted();


            $stmt->bindParam(':id', $id);
            $stmt->bindParam(':name', $name);
            $stmt->bindParam(':deleted', $deleted);

            $stmt->execute();

            return true;


        } catch (\Exception $e) {
            throw new \Exception("Błąd w trakcie dodawwnia nowego Zakresu - Service. " . $e->getMessage());
        }
    }

    public function delete(DomainObject $object)
    {
        //nie usuwamy, tylko oznaczamy jako usunięte
    }

}