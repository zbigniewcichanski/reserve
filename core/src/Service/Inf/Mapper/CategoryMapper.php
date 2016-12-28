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

class CategoryMapper implements Mapper
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
        try{
            /**
             *@var \Core\Service\Dm\Entity\CategoryAggregate $object
             */
            $object;

            $stmt = $this->db->prepare(
                "UPDATE service_category set
                idParentCategory =:idParentCategory,
                name =:name,
                deleted =:deleted
                WHERE idCategory = :id"
            );

            $id = $object->getId();
            $parentCategoryId = $object->getParentCategoryId();
            if($parentCategoryId == false){
                $parentCategoryId = null;
            }
            $name = $object->getName();
            $deleted = $object->isDeleted();


            $stmt->bindParam(':id', $id);
            $stmt->bindParam(':idParentCategory', $parentCategoryId);
            $stmt->bindParam(':name', $name);
            $stmt->bindParam(':deleted', $deleted);

            $stmt->execute();

            return true;

        } catch(\Exception $e) {
            throw new \Exception("Błąd w trakcie aktualizowania danych Kategori - Service. ".$e->getMessage());
        }
    }

    public function insert(DomainObject $object)
    {
        try{
            /**
             *@var \Core\Service\Dm\Entity\CategoryAggregate $object
             */
            $object;
            $stmt = $this->db->prepare(
                "INSERT INTO service_category(
                idCategory,
                idParentCategory,
                name,
                deleted
                 ) VALUES (:id, :idParentCategory, :name, :deleted)"
            );

            $id = $object->getId();
            $parentCategoryId = $object->getParentCategoryId();
            if($parentCategoryId == false){
                $parentCategoryId = null;
            }
            $name = $object->getName();
            $deleted = $object->isDeleted();


            $stmt->bindParam(':id', $id);
            $stmt->bindParam(':idParentCategory', $parentCategoryId);
            $stmt->bindParam(':name', $name);
            $stmt->bindParam(':deleted', $deleted);

            $stmt->execute();

            return true;


        } catch(\Exception $e) {
            throw new \Exception("Błąd w trakcie dodawwnia nowej Kategori - Service. ".$e->getMessage());
        }
    }

    public function delete(DomainObject $object)
    {
        //nie usuwamy, tylko oznaczamy jako usunięte
    }

}