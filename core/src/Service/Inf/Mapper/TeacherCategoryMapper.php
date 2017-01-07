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

class TeacherCategoryMapper implements Mapper
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
             *@var \Core\Service\Dm\Entity\Teacher\CategoryVO $object
             */
            $object;

            $idTeacher = $object->getTeacherId();
            $idCategory = $object->getCategoryId();


            $stmt = $this->db->prepare(
                "DELETE FROM service_teacher_category WHERE idCategory =:idCategory and idRange =:idRange"
            );

            $stmt->bindParam(':idTeacher', $idTeacher);
            $stmt->bindParam(':idCategory', $idCategory);

            $stmt->execute();

            return true;

        } catch(\Exception $e) {
            throw new \Exception("Błąd w trakcie usuwania kategori Nauczyciela - Service. ".$e->getMessage());
        }
    }

    public function insert(DomainObject $object)
    {
        try{
            /**
             *@var \Core\Service\Dm\Entity\Teacher\CategoryVO $object
             */
            $object;

            $idTeacher = $object->getTeacherId();
            $idCategory = $object->getCategoryId();


            $stmt = $this->db->prepare(
                "INSERT INTO service_teacher_category(
                idCategory,
                idTeacher
                 ) VALUES (:idCategory, :idTeacher)"
            );


            $stmt->bindParam(':idTeacher', $idTeacher);
            $stmt->bindParam(':idCategory', $idCategory);

            $stmt->execute();

            return true;


        } catch(\Exception $e) {
            throw new \Exception("Błąd w trakcie dodawwnia kategori naucziciela- Service. ".$e->getMessage());
        }
    }

    public function delete(DomainObject $object)
    {
        //nie usuwamy, tylko oznaczamy jako usunięte
    }

}