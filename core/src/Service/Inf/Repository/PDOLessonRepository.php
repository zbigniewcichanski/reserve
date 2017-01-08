<?php
/**
 * Created by PhpStorm.
 * @author: Zbyszek Cichanski
 * Date: 27.12.2016
 * Time: 22:39
 */

namespace Core\Service\Inf\Repository;

use Core\Service\Inf\Database\DatabaseFactory;

class PDOLessonRepository implements InfLessonRepository
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
                    lesson.idLesson,
                    lesson.idTeacher,
                    lesson.date,
                    lesson.startTime,
                    lesson.endTime,
                    lesson.location,
                    lesson.idStudent,
                    lesson.studentName,
                    lesson.description,
                    lesson.canceled,
                    lesson.canceledByStudent,
                    lesson.canceledByTeacher,
                    lesson.open,
                    lesson.atTeacherPlace,
                    lesson.atStudentPlace
                    FROM service_lesson as lesson
                    WHERE lesson.deleted = 0
                    ";

            if(isset($criteria['id'])){
                $sql .=" AND lesson.idLesson =:id";
            }

            $stmt = $this->db->prepare($sql);

            if(isset($criteria['id'])){
                $stmt->bindParam(':id', $criteria['id']);
            }

            $stmt->execute();

            $lesson = $stmt->fetchAll(\PDO::FETCH_ASSOC);

            if (!$lesson) {
                return [];
            }

            return $lesson;

        } catch (\PDOException $e) {
            throw new \PDOException ("Błąd w trackie pobierania danej lekcji na podstawie kryteriów. " . $e->getMessage());
        }
    }

    public function getByCriteria(array $criteria): array
    {
        try {
            $sql = "SELECT
                    lesson.idLesson,
                    lesson.idTeacher,
                    lesson.date,
                    lesson.startTime,
                    lesson.endTime,
                    lesson.location,
                    lesson.idStudent,
                    lesson.studentName,
                    lesson.description,
                    lesson.canceled,
                    lesson.canceledByStudent,
                    lesson.canceledByTeacher,
                    lesson.open,
                    lesson.atTeacherPlace,
                    lesson.atStudentPlace
                    FROM service_lesson as lesson
                    WHERE lesson.deleted = 0
                    ";

            if(isset($criteria['id'])){
                $sql .=" AND lesson.idLesson =:id";
            }

            if(isset($criteria['date'])){
                $sql .=" AND lesson.date =:date";
            }

            if(isset($criteria['id_teacher'])){
                $sql .=" AND lesson.idTeacher =:idTeacher";
            }

            if(isset($criteria['open'])){
                $sql .=" AND lesson.open =:open";
            }

            $stmt = $this->db->prepare($sql);

            if(isset($criteria['id'])){
                $stmt->bindParam(':id', $criteria['id']);
            }

            if(isset($criteria['date'])){
                $stmt->bindParam(':date', $criteria['date']);
            }

            if(isset($criteria['id_teacher'])){
                $stmt->bindParam(':idTeacher', $criteria['id_teacher']);
            }

            if(isset($criteria['open'])){
                $stmt->bindParam(':open', $criteria['open']);
            }


            $stmt->execute();

            $lesson = $stmt->fetchAll(\PDO::FETCH_ASSOC);

            if (!$lesson) {
                return [];
            }

            return $lesson;

        } catch (\PDOException $e) {
            throw new \PDOException ("Błąd w trackie pobierania lekcji na podstawie kryteriów. " . $e->getMessage());
        }
    }

    public function getAll(): array
    {
        try {
            echo "Brak implementacji w PDO";
            exit;

        } catch (\PDOException $e) {
            throw new \PDOException ("Błąd w trackie pobierania Kategorii. " . $e->getMessage());
        }
    }

}