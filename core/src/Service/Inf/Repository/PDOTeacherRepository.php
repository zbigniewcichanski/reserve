<?php
/**
 * Created by PhpStorm.
 * @author: Zbyszek Cichanski
 * Date: 27.12.2016
 * Time: 22:39
 */

namespace Core\Service\Inf\Repository;

use Core\Service\Inf\Database\DatabaseFactory;

class PDOTeacherRepository implements InfTeacherRepository
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
                    teacher.idTeacher,
                    teacher.firstName,
                    teacher.lastName,
                    teacher.email,
                    teacher.city,
                    teacher.postCode,
                    teacher.driveToStudent
                    FROM service_teacher as teacher
                    WHERE teacher.deleted = 0
                    ";

            if(isset($criteria['id'])){
                $sql .=" AND teacher.idTeacher =:id";
            }

            if(isset($criteria['email'])){
                $sql .=" AND teacher.email =:email";
            }

            $stmt = $this->db->prepare($sql);

            if(isset($criteria['id'])){
                $stmt->bindParam(':id', $criteria['id']);
            }

            if(isset($criteria['email'])){
                $stmt->bindParam(':email', $criteria['email']);
            }

            $stmt->execute();

            $teacher = $stmt->fetchAll(\PDO::FETCH_ASSOC);

            if (!$teacher) {
                return [];
            }

            return $teacher;

        } catch (\PDOException $e) {
            throw new \PDOException ("Błąd w trackie pobierania danego korepetytora na podstawie kryteriów. " . $e->getMessage());
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
                    teacher.idTeacher,
                    teacher.firstName,
                    teacher.lastName,
                    teacher.email,
                    teacher.city,
                    teacher.postCode,
                    teacher.driveToStudent
                    FROM service_teacher as teacher
                    WHERE teacher.deleted = 0
                    ";

            $stmt = $this->db->prepare($sql);

            $stmt->execute();

            $teacherList = $stmt->fetchAll(\PDO::FETCH_ASSOC);

            if (!$teacherList) {
                return [];
            }

            return $teacherList;

        } catch (\PDOException $e) {
            throw new \PDOException ("Błąd w trackie pobierania Korepetytorów. " . $e->getMessage());
        }
    }

}