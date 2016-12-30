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

class TeacherMapper implements Mapper
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
             * @var \Core\Service\Dm\Entity\TeacherAggregate $object
             */
            $object;

            $stmt = $this->db->prepare(
                "UPDATE service_teacher set
                firstName =:firstName,
                lastName =:lastName,
                email =:email,
                city =:city,
                postCode =:postCode,
                driveToStudent =:driveToStudent,
                deleted =:deleted
                WHERE idTeacher = :id"
            );

            $id = $object->getId();
            $firstName = $object->getName();
            $lastName = $object->getSurname();
            $email = $object->getEmail();
            $city = $object->getCity();
            $postCode = $object->getPostCode();
            $driveToStudent = 0;
            if($object->isDriveToStudent()){
                $driveToStudent = 1;
            }
            $deleted = $object->isDeleted();


            $stmt->bindParam(':id', $id);
            $stmt->bindParam(':firstName', $firstName);
            $stmt->bindParam(':lastName', $lastName);
            $stmt->bindParam(':email', $email);
            $stmt->bindParam(':city', $city);
            $stmt->bindParam(':postCode', $postCode);
            $stmt->bindParam(':driveToStudent', $driveToStudent);
            $stmt->bindParam(':deleted', $deleted);

            $stmt->execute();

            return true;

        } catch (\Exception $e) {
            throw new \Exception("Błąd w trakcie aktualizowania danych Korepettora - Service. " . $e->getMessage());
        }
    }

    public function insert(DomainObject $object)
    {
        try {
            /**
             * @var \Core\Service\Dm\Entity\TeacherAggregate $object
             */
            $object;
            $stmt = $this->db->prepare(
                "INSERT INTO service_teacher(
                idTeacher,
                firstName,
                lastName,
                email,
                city,
                postCode,
                driveToStudent,
                deleted
                 ) VALUES (:id, :firstName, :lastName, :email, :city, :postCode, :driveToStudent, :deleted)"
            );

            $id = $object->getId();
            $firstName = $object->getName();
            $lastName = $object->getSurname();
            $email = $object->getEmail();
            $city = $object->getCity();
            $postCode = $object->getPostCode();
            $driveToStudent = 0;
            if($object->isDriveToStudent()){
                $driveToStudent = 1;
            }
            $deleted = $object->isDeleted();


            $stmt->bindParam(':id', $id);
            $stmt->bindParam(':firstName', $firstName);
            $stmt->bindParam(':lastName', $lastName);
            $stmt->bindParam(':email', $email);
            $stmt->bindParam(':city', $city);
            $stmt->bindParam(':postCode', $postCode);
            $stmt->bindParam(':driveToStudent', $driveToStudent);
            $stmt->bindParam(':deleted', $deleted);

            $stmt->execute();

            return true;


        } catch (\Exception $e) {
            throw new \Exception("Błąd w trakcie dodawwnia nowego Korepetytora - Service. " . $e->getMessage());
        }
    }

    public function delete(DomainObject $object)
    {
        //nie usuwamy, tylko oznaczamy jako usunięte
    }

}